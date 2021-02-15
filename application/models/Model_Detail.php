<?php
// error_reporting(0);
class Model_Detail extends CI_model
{
    public function updatestatusjo($data,$supir,$mobil,$data_invoice){
        $this->db->set("tonase",$data["tonase"]);
        $this->db->set("upah",$data["upah"]);
        $this->db->set("harga/kg",$data["harga/kg"]);
        $this->db->set("bonus",$data["bonus"]);
        $this->db->set("keterangan",$data["keterangan"]);
        $this->db->set("status","Sampai Tujuan");
        $this->db->set("tanggal_bongkar",$data["tanggal_bongkar"]);
        $this->db->where("Jo_id",$data["Jo_id"]);
        $this->db->update("skb_job_order");

        $this->db->set("status_jalan","Tidak Jalan");
        $this->db->where("supir_id",$supir);
        $this->db->update("skb_supir");

        $this->db->set("status_jalan","Tidak Jalan");
        $this->db->where("mobil_no",str_replace("%20"," ",$mobil));
        $this->db->update("skb_mobil");

        $this->db->insert("skb_invoice",$data_invoice);
    }

    public function getbonbyid($bon_id){
        $this->db->join("skb_supir","skb_supir.supir_id=skb_bon.supir_id","left");
        return $this->db->get_where("skb_bon",array("bon_id"=>$bon_id))->row_array();
    }

    public function getjobbysupir($supir_id){
        $this->db->join("skb_supir","skb_supir.supir_id=skb_job_order.supir_id","left");
        return $this->db->get_where("skb_job_order",array("skb_job_order.supir_id"=>$supir_id))->result_array();
    }

    public function getinvoicebyjo($jo_id){
        $this->db->join("skb_job_order","skb_job_order.Jo_id=skb_invoice.jo_id","left");
        return $this->db->get_where("skb_invoice",array("skb_invoice.jo_id"=>$jo_id))->row_array();
    }
}