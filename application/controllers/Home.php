<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_home');//load model
    }
    
    public function index(){
        $data["invoice"] = $this->model_home->getinvoice();
        $this->load->view('header',$data);
        $this->load->view('home/index',$data);
    }

    public function invoice(){
        $data["supir"] = $this->model_home->getallsupir();
        $data["mobil"] = $this->model_home->getallmobil();
        $data["supir_kosong"] = $this->model_home->getsupirkosong();
        $data["mobil_kosong"] = $this->model_home->getmobilkosong();
        $data["invoice"] = $this->model_home->getinvoice();
        $this->load->view('header',$data);
        $this->load->view('home/invoice',$data);
    }

    public function supir(){
        $data["supir"] = $this->model_home->getallsupir();
        $this->load->view('header',$data);
        $this->load->view('home/supir',$data);
    }

    public function mobil(){
        $data["mobil"] = $this->model_home->getallmobil();
        $this->load->view('header',$data);
        $this->load->view('home/mobil',$data);
    }

    public function detailsupir($id){
        $data["allsupir"] = $this->model_home->getallsupir();
        $data["mobil"] = $this->model_home->getallmobil();
        $data["supir"] = $this->model_home->getsupirbyid($id);
        $data["perjalanan_supir"] = $this->model_home->getsupirbyinvoice($id);
        $this->load->view('header',$data);
        $this->load->view('home/detail_supir',$data);
    }

    public function updatestatussupir(){
        $kode_supir = $this->input->post("kode_supir");
        $status_supir = $this->input->post("status_supir");
        if($status_supir!=""){
            $this->model_home->updatestatussupir($kode_supir,$status_supir);
        }
        redirect(base_url("index.php/home/supir"));
    }

    public function updatepengiriman($supir,$mobil){
        $kode_invoice = $this->input->post("kode_invoice_pengiriman");
        $kode_supir = $this->input->post("kode_supir");
        $kode_mobil = $this->input->post("kode_mobil");
        $this->model_home->updatepengiriman($kode_invoice,$kode_supir,$kode_mobil,$supir,$mobil);
        redirect(base_url("index.php/home/invoice"));
    }

    public function updatestatusmobil(){
        $kode_mobil = $this->input->post("kode_mobil");
        $status_mobil = $this->input->post("status_mobil");
        if($status_mobil!=""){
            $this->model_home->updatestatusmobil($kode_mobil,$status_mobil);
        }
        redirect(base_url("index.php/home/mobil"));
    }

    public function updatestatusinvoice(){
        $kode_invoice = $this->input->post("kode_invoice_status");
        $status_invoice = "Sampai Tujuan";
        if($status_invoice!=""){
            $this->model_home->updatestatusinvoice($kode_invoice,$status_invoice);
        }
        redirect(base_url("index.php/home/invoice"));
    }

    public function kasbonsupir(){
        $kode_supir = $this->input->post("kode_supir_kasbon");
        $kasbon_supir = $this->input->post("kasbon_supir");
        $transaksi_supir = $this->input->post("transaksi_supir");
        $keterangan = $this->input->post("keterangan");
        if($transaksi_supir!=""){
            $this->model_home->updatekasbonsupir($kode_supir,$kasbon_supir,$transaksi_supir,$keterangan);
        }
        redirect(base_url("index.php/home/supir"));
    }

    function getdetailinvoice()
    {
        $id_invoice = $this->input->get('id');
        $data = $this->model_home->getinvoicebyid($id_invoice);
        echo json_encode($data);
    }

    function getdetailsupir()
    {
        $kode_supir = $this->input->get('id');
        $data = $this->model_home->getsupirbyid($kode_supir);
        echo json_encode($data);
    }

    function getdetailmobil()
    {
        $kode_mobil = $this->input->get('id');
        $data = $this->model_home->getmobilbyid($kode_mobil);
        echo json_encode($data);
    }

    public function addtiket(){
        $kurir_biaya = $this->model_home->getbiaya($this->input->post("provinsi_penerima"));

        $satuan_barang = $this->input->post("satuan");
        $berat_barang = $this->input->post("berat_volume");
        $pembayaran = $berat_barang * $kurir_biaya[$satuan_barang];

        $data_tiket = array(
            "nama_pengirim" => $this->input->post("nama_pengirim"),
            "nama_penerima" => $this->input->post("nama_penerima"),
            "hp_pengirim" => $this->input->post("no_telvon"),
            "hp_penerima" => $this->input->post("no_telvon_penerima"),
            "provinsi_pengirim" => $this->input->post("provinsi_pengirim"),
            "provinsi_penerima" => $kurir_biaya["kode_wilayah"],
            "alamat_pengirim" => $this->input->post("alamat_pengirim"),
            "alamat_penerima" => $this->input->post("alamat_penerima"),
            "tanggal_invoice" => date("Y-m-d"),
            "tanggal_pengiriman" => $this->input->post("tanggal_pengiriman"),
            "nama_barang" => $this->input->post("nama_barang"),
            "berat_barang" => $this->input->post("berat_volume"),
            "satuan_barang" => $this->input->post("satuan"),
            "status" => "Diproses",
            "total_pembayaran" => $pembayaran
        );
        $this->model_home->insert_tiket($data_tiket);
        redirect(base_url());
    }
}