<?php
// error_reporting(0);
class Model_Form extends CI_model
{
    public function getcustomerbyname($customer_name){
        return $this->db->get_where("skb_customer",array("customer_name"=>str_replace("%20"," ",$customer_name)))->row_array();
    }

    public function getbonbysupir($supir_id){
        return $this->db->get_where("skb_supir",array("supir_id"=>$supir_id))->row_array();
    }

    public function insert_JO($data){
        $this->db->set("status_jalan","Jalan");
        $this->db->where("supir_id",$data["supir_id"]);
        $this->db->update("skb_supir");

        $this->db->set("status_jalan","Jalan");
        $this->db->where("mobil_no",$data["mobil_no"]);
        $this->db->update("skb_mobil");

        return $this->db->insert("skb_job_order", $data);
    }

    public function insert_bon($data){
        $supir=$this->db->get_where("skb_supir",array("supir_id"=>$data["supir_id"]))->row_array();
        if($data["bon_jenis"]=="Pengajuan"){
            $bon_now = $supir["supir_kasbon"]+$data["bon_nominal"];
        }else{
            $bon_now = $supir["supir_kasbon"]-$data["bon_nominal"];
        }
        $this->db->set("supir_kasbon",$bon_now);
        $this->db->where("supir_id",$data["supir_id"]);
        $this->db->update("skb_supir");

        return $this->db->insert("skb_bon", $data);
    }

    public function insert_customer($data){
        return $this->db->insert("skb_customer", $data);
    }

    public function insert_supir($data){
        return $this->db->insert("skb_supir", $data);
    }

    public function insert_truck($data){
        return $this->db->insert("skb_mobil", $data);
    }


}