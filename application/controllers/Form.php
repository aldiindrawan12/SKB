<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_form');//load model
        $this->load->model('model_home');//load model
    }

    public function joborder($customer_name){
        $data["customer"] = $this->model_home->getcustomer();
        $data["customer_by_name"] = $this->model_form->getcustomerbyname($customer_name);
        if($data["customer_by_name"] == null){
            $data["customer_by_name"] = [];
        }
        $data["mobil"] = $this->model_home->gettruck();
        $data["supir"] = $this->model_home->getsupir();
        $this->load->view('header');
        $this->load->view('sidebar');
		$this->load->view('form/joborder',$data);
        $this->load->view('footer');
    }

    public function insert_JO(){
        $data["data"]=array(
            "mobil_no"=>$this->input->post("Kendaraan"),
            "supir_id"=>$this->input->post("Supir"),
            "muatan"=>$this->input->post("Muatan"),
            "asal"=>$this->input->post("Asal"),
            "tujuan"=>$this->input->post("Tujuan"),
            "uang_jalan"=>str_replace(".","",$this->input->post("Uang")),
            "terbilang"=>$this->input->post("Terbilang"),
            "tanggal_surat"=>date("Y-m-d"),
            "keterangan"=>$this->input->post("Keterangan"),
            "customer_id"=>$this->input->post("Customer"),
            "status"=>"Dalam Perjalanan",
            "status_upah"=>"Belum Dibayar"
        );
        $this->model_form->insert_JO($data["data"]);
        $data["supir"] = $this->model_home->getsupirbyid($data["data"]["supir_id"]);
        $data["mobil"] = $this->model_home->getmobilbyid($data["data"]["mobil_no"]);
        $this->load->view("print/jo_print",$data);
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
        $data["data"]=array(
            "supir_id"=>$this->input->post("Supir"),
            "bon_jenis"=>$this->input->post("Jenis"),
            "bon_nominal"=>str_replace(".","",$this->input->post("Nominal")),
            "bon_keterangan"=>$this->input->post("Keterangan"),
            "bon_tanggal"=>date("Y-m-d H:i:s")
        );
        // echo print_r($data);
        $this->model_form->insert_bon($data["data"]);
        $data["supir"] = $this->model_home->getsupirbyid($data["data"]["supir_id"]);
        $this->load->view("print/bon_print",$data);
    }

    public function insert_customer(){
        $data=array(
            "customer_name"=>$this->input->post("Customer")
        );
        // echo($data["customer_name"]);
        $this->model_form->insert_customer($data);
        redirect(base_url("index.php/form/joborder/").$data["customer_name"]);
    }

    public function insert_supir(){
        $data=array(
            "supir_name"=>$this->input->post("Supir"),
            "supir_kasbon"=>0,
            "status_jalan"=>"Tidak Jalan"
        );
        // echo($data["customer_name"]);
        $this->model_form->insert_supir($data);
        redirect(base_url("index.php/home/penggajian"));
    }

    public function insert_truck(){
        $data=array(
            "mobil_no"=>$this->input->post("mobil_no"),
            "mobil_jenis"=>$this->input->post("mobil_jenis"),
            "mobil_max_load"=>$this->input->post("mobil_max_load"),
            "status_jalan"=>"Tidak Jalan",
        );
        // echo($data["customer_name"]);
        $this->model_form->insert_truck($data);
        redirect(base_url("index.php/home/truck"));
    }

    public function update_supir(){
        $supir_name = $this->input->post("supir_name");
        $supir_id = $this->input->post("supir_id");
        $this->model_form->update_supir($supir_id,$supir_name);
        redirect(base_url("index.php/home/penggajian"));
    }

    public function deletesupir(){
        $supir_id = $this->input->get("id");
        $this->model_form->deletesupir($supir_id);
        echo $supir_id;
    }

    public function deletetruck(){
        $mobil_no = $this->input->get("id");
        $this->model_form->deletetruck($mobil_no);
        echo $mobil_no;
    }

    public function getsupirname(){
        $supir_id = $this->input->get("id");
        $supir = $this->model_form->getsupirname($supir_id);
        echo $supir["supir_name"];
    }

    public function generate_terbilang($uang){
        $uang = abs($uang);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "sebelas");
		$temp = "";

		if ($uang < 12) {
			$temp = " ". $huruf[$uang];
		} else if ($uang <20) {
			$temp = $this->generate_terbilang($uang - 10). " Belas";
		} else if ($uang < 100) {
			$temp = $this->generate_terbilang($uang/10)." Puluh". $this->generate_terbilang($uang % 10);
		} else if ($uang < 200) {
			$temp = " Seratus" . $this->generate_terbilang($uang - 100);
		} else if ($uang < 1000) {
			$temp = $this->generate_terbilang($uang/100) . " Ratus" . $this->generate_terbilang($uang % 100);
		} else if ($uang < 2000) {
			$temp = " Seribu" . $this->generate_terbilang($uang - 1000);
		} else if ($uang < 1000000) {
			$temp = $this->generate_terbilang($uang/1000) . " Ribu" . $this->generate_terbilang($uang % 1000);
		} else if ($uang < 1000000000) {
			$temp = $this->generate_terbilang($uang/1000000) . " Juta" . $this->generate_terbilang($uang % 1000000);
		}     
		return $temp;
    }

    public function generate_terbilang_fix($uang){
        if($uang != "x"){
            echo $this->generate_terbilang(str_replace(".","",$uang))." Rupiah";
        }else{
            echo "";
        }
    }

    function getbonsupir()
    {
        $supir_id = $this->input->get('id');
        $data = $this->model_form->getbonbysupir($supir_id);
        echo $data["supir_kasbon"];
    }
}