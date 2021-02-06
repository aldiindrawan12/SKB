<?php
// error_reporting(0);
class Model_Home extends CI_model
{
    public function getinvoice()
    {
        return $this->db->get("kurir_invoice")->result_array();
    }

    public function getinvoicebyid($id)
    {
        return $this->db->get_where("kurir_invoice", array("invoice_kode" => $id))->row_array();
    }

    public function getsupirbyid($id)
    {
        return $this->db->get_where("kurir_supir", array("kode_supir" => $id))->row_array();
    }

    public function getsupirbyinvoice($id)
    {
        return $this->db->get_where("kurir_invoice", array("supir_pengiriman" => $id))->result_array();
    }

    public function getmobilbyid($id)
    {
        return $this->db->get_where("kurir_mobil", array("kode_mobil" => $id))->row_array();
    }

    public function getallsupir()
    {
        return $this->db->get("kurir_supir")->result_array();
    }

    public function getallmobil()
    {
        return $this->db->get("kurir_mobil")->result_array();
    }

    public function getbiaya($wilayah)
    {
        return $this->db->get_where("kurir_biaya", array("nama_wilayah" => $wilayah))->row_array();
    }

    public function getsupir($supir)
    {
        return $this->db->get_where("kurir_supir", array("nama_supir" => $supir))->row_array();
    }

    public function getsupirkosong()
    {
        return $this->db->get_where("kurir_supir", array("status_supir" => "Tidak Jalan"))->result_array();
    }

    public function getmobilkosong()
    {
        return $this->db->get_where("kurir_mobil", array("status_mobil" => "Tidak Jalan"))->result_array();
    }
    public function updatestatussupir($kode_supir,$status_supir){
        $this->db->set("status_supir",$status_supir);
        $this->db->where("kode_supir",$kode_supir);
        $this->db->update("kurir_supir");
    }

    public function updatestatusmobil($kode_mobil,$status_mobil){
        $this->db->set("status_mobil",$status_mobil);
        $this->db->where("kode_mobil",$kode_mobil);
        $this->db->update("kurir_mobil");
    }

    public function updatepengiriman($kode_invoice,$kode_supir,$kode_mobil,$supir,$mobil){
        $this->db->set("supir_pengiriman",$kode_supir);
        $this->db->set("mobil_pengiriman",$kode_mobil);
        $this->db->set("status","Dalam Pengiriman");
        $this->db->where("invoice_kode",$kode_invoice);
        $this->db->update("kurir_invoice");

        if($kode_supir!=$supir){
            $this->db->set("status_supir","Jalan");
            $this->db->where("kode_supir",$kode_supir);
            $this->db->update("kurir_supir");

            $this->db->set("status_supir","Tidak Jalan");
            $this->db->where("kode_supir",$supir);
            $this->db->update("kurir_supir");
        }
        if($kode_mobil!=$mobil){
            $this->db->set("status_mobil","Jalan");
            $this->db->where("kode_mobil",$kode_mobil);
            $this->db->update("kurir_mobil");

            $this->db->set("status_mobil","Tidak Jalan");
            $this->db->where("kode_mobil",$mobil);
            $this->db->update("kurir_mobil");
        }
    }

    public function updatestatusinvoice($kode_invoice,$status_invoice){
        $invoice = $this->db->get_where("kurir_invoice", array("invoice_kode" => $kode_invoice))->row_array();        
        $this->db->set("status",$status_invoice);
        $this->db->set("tanggal_sampai",date("Y-m-d"));
        $this->db->where("invoice_kode",$kode_invoice);
        $this->db->update("kurir_invoice");

        $this->db->set("status_supir","Tidak Jalan");
        $this->db->where("kode_supir",$invoice["supir_pengiriman"]);
        $this->db->update("kurir_supir");

        $this->db->set("status_mobil","Tidak Jalan");
        $this->db->where("kode_mobil",$invoice["mobil_pengiriman"]);
        $this->db->update("kurir_mobil");
    }

    public function updatekasbonsupir($kode_supir,$kasbon_supir,$transaksi_supir,$keterangan){
        $data_supir = $this->db->get_where("kurir_supir", array("kode_supir" => $kode_supir))->row_array();        
        if($transaksi_supir == "Kasbon"){
            $kasbon_now = $data_supir["kasbon_supir"]+$kasbon_supir;
        }else{
            $kasbon_now = $data_supir["kasbon_supir"]-$kasbon_supir;
        }
        $this->db->set("kasbon_supir",$kasbon_now);
        $this->db->where("kode_supir",$kode_supir);
        $this->db->update("kurir_supir");

        //insert transaksi kasbon
        $data = [
            "kode_supir" => $kode_supir,
            "kasbon_supir" => $kasbon_supir,
            "transaksi_supir" => $transaksi_supir,
            "tanggal_kasbon" => date("Y-m-d"),
            "keterangan" => $keterangan
        ];
        $this->db->insert("kurir_kasbon",$data);

    }

    public function insert_tiket($data){
        return $this->db->insert("kurir_invoice", $data);
    }
}
