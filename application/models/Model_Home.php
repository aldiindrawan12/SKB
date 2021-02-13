<?php
// error_reporting(0);
class Model_Home extends CI_model
{
    public function gettruck()
    {
        return $this->db->get("skb_mobil")->result_array();
    }
    public function getmobilbyid($mobil_no)
    {
        return $this->db->get_where("skb_mobil",array("mobil_no"=>$mobil_no))->row_array();
    }
    public function getcustomer()
    {
        return $this->db->get("skb_customer")->result_array();
    }
    public function getcustomerbyid($customer_id)
    {
        return $this->db->get_where("skb_customer",array("customer_id"=>$customer_id))->row_array();
    }
    public function getsupir()
    {
        return $this->db->get("skb_supir")->result_array();
    }
    public function getsupirbyid($supir_id)
    {
        return $this->db->get_where("skb_supir",array("supir_id"=>$supir_id))->row_array();
    }
    public function getjo()
    {
        return $this->db->get("skb_job_order")->result_array();
    }
    public function getjobyid($jo_id)
    {
        return $this->db->get_where("skb_job_order",array("Jo_id"=>$jo_id))->row_array();
    }
     //function-fiunction datatable truck
        public function count_all_truck()
        {
            return $this->db->count_all_results("skb_mobil");
        }

        public function filter_truck($search, $limit, $start, $order_field, $order_ascdesc)
        {
            $this->db->like('mobil_no', $search);
            $this->db->or_like('mobil_jenis', $search);
            $this->db->order_by($order_field, $order_ascdesc);
            $this->db->limit($limit, $start);
            return $this->db->get('skb_mobil')->result_array();
        }

        public function count_filter_truck($search)
        {
            $this->db->like('mobil_no', $search);
            $this->db->or_like('mobil_jenis', $search);
            return $this->db->get('skb_mobil')->num_rows();
        }
     //akhir function-fiunction datatable truck
     //function-fiunction datatable JO
        public function count_all_JO($tanggal,$bulan,$tahun)
        {
            $like=$tahun."-".$bulan."-".$tanggal;
            if($like != "--"){
                if ($tanggal != "x" && $bulan=="x" && $tahun=="x") {
                    $this->db->like("tanggal_surat", "-".$tanggal);
                }
                if ($tanggal == "x" && $bulan!="x" && $tahun=="x") {
                    $this->db->like("tanggal_surat", "-".$bulan."-");
                }
                if ($tanggal == "x" && $bulan=="x" && $tahun!="x") {
                    $this->db->like("tanggal_surat", $tahun."-");
                }
                if ($tanggal != "x" && $bulan=="x" && $tahun!="x") {
                    $this->db->like("tanggal_surat", $tahun."-__-".$tanggal);
                }
                if ($tanggal == "x" && $bulan!="x" && $tahun!="x") {
                    $this->db->like("tanggal_surat", $tahun."-".$bulan."-");
                }
                if ($tanggal != "x" && $bulan!="x" && $tahun=="x") {
                    $this->db->like("tanggal_surat", "-".$bulan."-".$tanggal);
                }
                if ($tanggal != "x" && $bulan!="x" && $tahun!="x") {
                    $this->db->like("tanggal_surat", $tahun."-".$bulan."-".$tanggal);
                }
            }
            $this->db->join("skb_customer", "skb_customer.customer_id = skb_job_order.customer_id", 'left');
            return $this->db->count_all_results("skb_job_order");
        }

        public function filter_JO($search, $limit, $start, $order_field, $order_ascdesc,$tanggal,$bulan,$tahun)
        {
            $like=$tahun."-".$bulan."-".$tanggal;
            if($like != "--"){
                if ($tanggal != "x" && $bulan=="x" && $tahun=="x") {
                    $this->db->like("tanggal_surat", "-".$tanggal);
                }
                if ($tanggal == "x" && $bulan!="x" && $tahun=="x") {
                    $this->db->like("tanggal_surat", "-".$bulan."-");
                }
                if ($tanggal == "x" && $bulan=="x" && $tahun!="x") {
                    $this->db->like("tanggal_surat", $tahun."-");
                }
                if ($tanggal != "x" && $bulan=="x" && $tahun!="x") {
                    $this->db->like("tanggal_surat", $tahun."-__-".$tanggal);
                }
                if ($tanggal == "x" && $bulan!="x" && $tahun!="x") {
                    $this->db->like("tanggal_surat", $tahun."-".$bulan."-");
                }
                if ($tanggal != "x" && $bulan!="x" && $tahun=="x") {
                    $this->db->like("tanggal_surat", "-".$bulan."-".$tanggal);
                }
                if ($tanggal != "x" && $bulan!="x" && $tahun!="x") {
                    $this->db->like("tanggal_surat", $tahun."-".$bulan."-".$tanggal);
                }
            }
            $this->db->like('JO_id', $search);
            // $this->db->or_like('customer_name', $search);
            $this->db->order_by($order_field, $order_ascdesc);
            $this->db->limit($limit, $start);
            $this->db->join("skb_customer", "skb_customer.customer_id = skb_job_order.customer_id", 'left');
            return $this->db->get('skb_job_order')->result_array();
        }

        public function count_filter_JO($search,$tanggal,$bulan,$tahun)
        {   
            $like=$tahun."-".$bulan."-".$tanggal;
            if($like != "--"){
                if ($tanggal != "x" && $bulan=="x" && $tahun=="x") {
                    $this->db->like("tanggal_surat", "-".$tanggal);
                }
                if ($tanggal == "x" && $bulan!="x" && $tahun=="x") {
                    $this->db->like("tanggal_surat", "-".$bulan."-");
                }
                if ($tanggal == "x" && $bulan=="x" && $tahun!="x") {
                    $this->db->like("tanggal_surat", $tahun."-");
                }
                if ($tanggal != "x" && $bulan=="x" && $tahun!="x") {
                    $this->db->like("tanggal_surat", $tahun."-__-".$tanggal);
                }
                if ($tanggal == "x" && $bulan!="x" && $tahun!="x") {
                    $this->db->like("tanggal_surat", $tahun."-".$bulan."-");
                }
                if ($tanggal != "x" && $bulan!="x" && $tahun=="x") {
                    $this->db->like("tanggal_surat", "-".$bulan."-".$tanggal);
                }
                if ($tanggal != "x" && $bulan!="x" && $tahun!="x") {
                    $this->db->like("tanggal_surat", $tahun."-".$bulan."-".$tanggal);
                }
            }
            $this->db->like('JO_id', $search);
            // $this->db->or_like('customer_name', $search);
            $this->db->join("skb_customer", "skb_customer.customer_id = skb_job_order.customer_id", 'left');
            return $this->db->get('skb_job_order')->num_rows();
        }
     //akhir function-fiunction datatable JO
     //function-fiunction datatable truck
        public function count_all_bon()
        {
            $this->db->join("skb_supir", "skb_supir.supir_id = skb_bon.supir_id", 'left');
            return $this->db->count_all_results("skb_bon");
        }

        public function filter_bon($search, $limit, $start, $order_field, $order_ascdesc)
        {
            $this->db->like('bon_id', $search);
            $this->db->or_like('supir_name', $search);
            $this->db->order_by($order_field, $order_ascdesc);
            $this->db->limit($limit, $start);
            $this->db->join("skb_supir", "skb_supir.supir_id = skb_bon.supir_id", 'left');
            return $this->db->get('skb_bon')->result_array();
        }

        public function count_filter_bon($search)
        {
            $this->db->like('bon_id', $search);
            $this->db->or_like('supir_name', $search);
            $this->db->join("skb_supir", "skb_supir.supir_id = skb_bon.supir_id", 'left');
            return $this->db->get('skb_bon')->num_rows();
        }
     //akhir function-fiunction datatable truck


    //  Function Customer
    public function count_all_customer()
    {
        return $this->db->count_all_results("skb_customer");
    }

    public function filter_customer($search, $limit, $start, $order_field, $order_ascdesc)
    {
        $this->db->like('customer_id', $search);
        $this->db->or_like('customer_name', $search);
        $this->db->order_by($order_field, $order_ascdesc);
        $this->db->limit($limit, $start);
        return $this->db->get('skb_customer')->result_array();
    }

    public function count_filter_customer($search)
    {
        $this->db->like('customer_id', $search);
        $this->db->or_like('customer_name', $search);
        return $this->db->get('skb_customer')->num_rows();
    }

    //  Function Supir
    public function count_all_supir()
    {
        return $this->db->count_all_results("skb_supir");
    }

    public function filter_supir($search, $limit, $start, $order_field, $order_ascdesc)
    {
        $this->db->like('supir_id', $search);
        $this->db->or_like('supir_name', $search);
        $this->db->or_like('status_jalan', $search);
        $this->db->order_by($order_field, $order_ascdesc);
        $this->db->limit($limit, $start);
        return $this->db->get('skb_supir')->result_array();
    }

    public function count_filter_supir($search)
    {
        $this->db->like('supir_id', $search);
        $this->db->or_like('supir_name', $search);
        $this->db->or_like('status_jalan', $search);
        return $this->db->get('skb_supir')->num_rows();
    }
}