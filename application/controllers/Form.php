<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_form');//load model
        $this->load->model('model_home');//load model
    }

    public function joborder(){
        $data["customer"] = $this->model_home->getcustomer();
        $data["mobil"] = $this->model_home->gettruck();
        $data["supir"] = $this->model_home->getsupir();
        $this->load->view('header');
        $this->load->view('sidebar');
		$this->load->view('form/joborder',$data);
        $this->load->view('footer');
    }

    public function insert_JO(){
        $data=array(
            "mobil_no"=>$this->input->post("Kendaraan"),
            "supir_id"=>$this->input->post("Supir"),
            "muatan"=>$this->input->post("Muatan"),
            "asal"=>$this->input->post("Asal"),
            "tujuan"=>$this->input->post("Tujuan"),
            "uang_jalan"=>$this->input->post("Uang"),
            "terbilang"=>$this->input->post("Terbilang"),
            "tanggal_surat"=>date("Y-m-d"),
            "keterangan"=>$this->input->post("Keterangan"),
            "customer_id"=>$this->input->post("Customer"),
            "status"=>"Dalam Perjalanan"
        );
        $this->model_form->insert_JO($data);
        redirect(base_url());
    }

    public function bon(){
        $data["supir"] = $this->model_home->getsupir();
        $this->load->view('header');
        $this->load->view('sidebar');
		$this->load->view('form/form_bon',$data);
        $this->load->view('footer');
    }

    public function insert_bon(){
        date_default_timezone_set('Asia/Jakarta');
        $data=array(
            "supir_id"=>$this->input->post("Supir"),
            "bon_jenis"=>$this->input->post("Jenis"),
            "bon_nominal"=>$this->input->post("Nominal"),
            "bon_keterangan"=>$this->input->post("Keterangan"),
            "bon_tanggal"=>date("Y-m-d H:i:s")
        );
        // echo print_r($data);
        $this->model_form->insert_bon($data);
        redirect(base_url("index.php/home/bon"));
    }
}