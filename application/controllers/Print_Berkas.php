<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require("assets/dom_pdf/autoload.inc.php");
use Dompdf\Dompdf;

class Print_Berkas extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_home');//load model
        $this->load->model('model_print');//load model
    }
    public function cetaklaporanpdf($tanggal,$bulan,$tahun){
        $data["jo"] = $this->model_print->getjobyperiode($tanggal,$bulan,$tahun);
        $data["tanggal"] = $tanggal."-".$bulan."-".$tahun;
        // $this->load->view("print/report_pdf",$data);
        $dompdf = new Dompdf();
        $html = $this->load->view("print/report_pdf",$data,true);
        $dompdf->loadHtml($html);

        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');

        // Rendering dari HTML Ke PDF
        $dompdf->render();

        // Melakukan output file Pdf
        $name_file = "JobOrder_".$data["tanggal"].".pdf";
        $dompdf->stream($name_file);
    }
    public function cetaklaporanexcel($tanggal,$bulan,$tahun){
        echo $tahun."-".$bulan."-".$tanggal;
    }
    
}
