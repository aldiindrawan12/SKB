<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_home');//load model
        $this->load->model('model_detail');//load model
    }

    //fungsi untuk Detail JO
	public function detail_jo($Jo_id)
	{
        $data["jo"] = $this->model_home->getjobyid($Jo_id);
        $data["invoice"] = $this->model_detail->getinvoicebyjo($Jo_id);
        $data["customer"] = $this->model_home->getcustomerbyid($data["jo"]["customer_id"]);
        $data["mobil"] = $this->model_home->getmobilbyid($data["jo"]["mobil_no"]);
        $data["supir"] = $this->model_home->getsupirbyid($data["jo"]["supir_id"]);
        $this->load->view('header');
        $this->load->view('sidebar');
		$this->load->view('detail/joborder',$data);
        $this->load->view('footer');
	}

    public function updatestatusjo($supir,$mobil){
        $data_jo = $this->model_home->getjobyid($this->input->post("jo_id"));
        $keterangan = $data_jo["keterangan"].",".$this->input->post("Keterangan");

        $data = array(
            "tonase"=>$this->input->post("tonase"),
            "upah"=>str_replace(".","",$this->input->post("upah")),
            "harga/kg"=>str_replace(".","",$this->input->post("harga")),
            "bonus"=>str_replace(".","",$this->input->post("bonus")),
            "keterangan"=>$keterangan,
            "tanggal_bongkar"=>date('Y-m-d'),
            "Jo_id"=>$this->input->post("jo_id")
        );

        $data_invoice = array(
            "jo_id"=>$this->input->post("jo_id"),
            "customer_id"=>$data_jo["customer_id"],
            "tanggal_invoice"=>date("Y-m-d"),
            "batas_pembayaran"=>date("Y-m-d",strtotime('+14 days', strtotime(date("Y-m-d")))),
            "grand_total"=>$data["tonase"]*$data["harga/kg"]*1000
        );
        $this->model_detail->updatestatusjo($data,$supir,$mobil,$data_invoice);
        redirect(base_url("index.php/detail/detail_jo/").$this->input->post("jo_id"));
    }

    function getbon()
    {
        $bon_id = $this->input->get('id');
        $data = $this->model_detail->getbonbyid($bon_id);
        echo json_encode($data);
    }
    
    //fungsi untuk Detail penggajian
	public function detail_penggajian($supir_id)
	{
        $data["jo"] = $this->model_detail->getjobbysupir($supir_id);
        $data["supir"] = $this->model_home->getsupirbyid($supir_id);
        $this->load->view('header');
        $this->load->view('sidebar');
		$this->load->view('detail/penggajian',$data);
        $this->load->view('footer');
	}
}