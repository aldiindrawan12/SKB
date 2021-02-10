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
        $keterangan = $data_jo["keterangan"]."==tambahan:".$this->input->post("Keterangan");

        $data = array(
            "tonase"=>$this->input->post("tonase"),
            "upah"=>$this->input->post("upah"),
            "harga/kg"=>$this->input->post("harga"),
            "bonus"=>$this->input->post("bonus"),
            "keterangan"=>$keterangan,
            "tanggal_bongkar"=>date('Y-m-d'),
            "Jo_id"=>$this->input->post("jo_id")
        );
        $this->model_detail->updatestatusjo($data,$supir,$mobil);
        redirect(base_url("index.php/detail/detail_jo/").$this->input->post("jo_id"));
    }

    
}