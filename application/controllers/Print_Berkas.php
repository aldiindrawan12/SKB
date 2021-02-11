<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_Berkas extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_home');//load model
        $this->load->model('model_print');//load model
    }
    public function cetaklaporanpdf($tanggal,$bulan,$tahun){
        echo $tahun."-".$bulan."-".$tanggal;
    }
    public function cetaklaporanexcel($tanggal,$bulan,$tahun){
        echo $tahun."-".$bulan."-".$tanggal;
    }
    
}
