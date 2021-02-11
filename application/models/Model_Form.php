<?php
// error_reporting(0);
class Model_Form extends CI_model
{
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
}