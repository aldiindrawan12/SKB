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
        $this->db->where("status_upah","Belum Dibayar");
        $this->db->join("skb_supir","skb_supir.supir_id=skb_job_order.supir_id","left");
        return $this->db->get_where("skb_job_order",array("skb_job_order.supir_id"=>$supir_id))->result_array();
    }

    public function getinvoicebyjo($jo_id){
        $this->db->join("skb_job_order","skb_job_order.Jo_id=skb_invoice.jo_id","left");
        return $this->db->get_where("skb_invoice",array("skb_invoice.jo_id"=>$jo_id))->row_array();
    }

    public function update_upah($data){
        $supir_id = $data["supir_id"];
        $Jo_id = $data["Jo_id"];
        $upah = $data["upah"];
        $supir_kasbon = $data["supir_kasbon"];

        $grand_upah = $upah-$supir_kasbon;
        if($grand_upah < 0){
            $this->db->set("supir_kasbon",$grand_upah*(-1));
            $this->db->where("supir_id",$supir_id);
            $this->db->update("skb_supir");
        }else{
            $this->db->set("supir_kasbon",0);
            $this->db->where("supir_id",$supir_id);
            $this->db->update("skb_supir");
        }

        //update status upah pada jo id
        for($i=0;$i<count($Jo_id);$i++){
            $this->db->set("status_upah","Sudah Dibayar");
            $this->db->where("Jo_id",$Jo_id[$i]);
            $this->db->update("skb_job_order");
        }
        //end update status upah pada jo id

        return $supir_id."==".$Jo_id[1]."==".$upah."==".$supir_kasbon;
        
    }

    //function-fiunction datatable Jo Sampai
    public function count_all_JO_Sampai($customer_id)
    {
        $this->db->where("skb_job_order.customer_id",$customer_id);
        $this->db->where("skb_job_order.status","Sampai Tujuan");
        $this->db->join("skb_customer","skb_customer.customer_id=skb_job_order.customer_id","left");
        return $this->db->count_all_results("skb_job_order");
    }

    public function filter_JO_Sampai($search, $limit, $start, $order_field, $order_ascdesc,$customer_id)
    {
        $this->db->like('Jo_id', $search);
        $this->db->where("skb_job_order.customer_id",$customer_id);
        $this->db->where("skb_job_order.status","Sampai Tujuan");
        $this->db->join("skb_customer","skb_customer.customer_id=skb_job_order.customer_id","left");
        $this->db->order_by($order_field, $order_ascdesc);
        $this->db->limit($limit, $start);
        return $this->db->get('skb_job_order')->result_array();
    }

    public function count_filter_JO_Sampai($search,$customer_id)
    {
        $this->db->like('Jo_id', $search);
        $this->db->where("skb_job_order.customer_id",$customer_id);
        $this->db->where("skb_job_order.status","Sampai Tujuan");
        $this->db->join("skb_customer","skb_customer.customer_id=skb_job_order.customer_id","left");
        return $this->db->get('skb_job_order')->num_rows();
    }
     //akhir function-fiunction datatable Jo Sampai

         //function-fiunction datatable Jo Perjalanan
    public function count_all_JO_Perjalanan($customer_id)
    {
        $this->db->where("skb_job_order.customer_id",$customer_id);
        $this->db->where("skb_job_order.status","Dalam Perjalanan");
        $this->db->join("skb_customer","skb_customer.customer_id=skb_job_order.customer_id","left");
        return $this->db->count_all_results("skb_job_order");
    }

    public function filter_JO_Perjalanan($search, $limit, $start, $order_field, $order_ascdesc,$customer_id)
    {
        $this->db->like('Jo_id', $search);
        $this->db->where("skb_job_order.customer_id",$customer_id);
        $this->db->where("skb_job_order.status","Dalam Perjalanan");
        $this->db->join("skb_customer","skb_customer.customer_id=skb_job_order.customer_id","left");
        $this->db->order_by($order_field, $order_ascdesc);
        $this->db->limit($limit, $start);
        return $this->db->get('skb_job_order')->result_array();
    }

    public function count_filter_JO_Perjalanan($search,$customer_id)
    {
        $this->db->like('Jo_id', $search);
        $this->db->where("skb_job_order.customer_id",$customer_id);
        $this->db->where("skb_job_order.status","Dalam Perjalanan");
        $this->db->join("skb_customer","skb_customer.customer_id=skb_job_order.customer_id","left");
        return $this->db->get('skb_job_order')->num_rows();
    }
     //akhir function-fiunction datatable Jo Perjalanan
}
