<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
    // contruck
        public function __construct()
        {
            parent::__construct();
            $this->load->model('model_home');//load model
            $this->load->model('model_detail');//load model
        }
    // end contruck

    //fungsi untuk Detail JO
        public function detail_jo($Jo_id)
        {
            $data["jo"] = $this->model_home->getjobyid($Jo_id);
            $data["invoice"] = $this->model_detail->getinvoicebyjo($Jo_id);
            $data["customer"] = $this->model_home->getcustomerbyid($data["jo"]["customer_id"]);
            $data["mobil"] = $this->model_home->getmobilbyid($data["jo"]["mobil_no"]);
            $data["supir"] = $this->model_home->getsupirbyid($data["jo"]["supir_id"]);
            $data["page"] = "JO_page";
            $this->load->view('header',$data);
            $this->load->view('sidebar');
            $this->load->view('detail/joborder');
            $this->load->view('footer');
        }
    //end fungsi untuk Detail JO

    //fungsi untuk Detail invoice
        public function detail_invoice($invoice_id)
        {
            $data["invoice"] = $this->model_detail->getinvoicebyid($invoice_id);
            $data["customer"] = $this->model_home->getcustomerbyid($data["invoice"]["customer_id"]);
            $data["page"] = "Invoice_page";
            $this->load->view('header',$data);
            $this->load->view('sidebar');
            $this->load->view('detail/invoice');
            $this->load->view('footer');
        }

        public function updatestatusjo($supir,$mobil){
            $data_jo = $this->model_home->getjobyid($this->input->post("jo_id"));
            $keterangan = "<strong>Catatan JO : </strong>".$data_jo["keterangan"]."<br><strong>Catatan Konfirmasi : </strong>".$this->input->post("Keterangan");
            $TOD = $this->input->post("TOD");
            $data = array(
                "tonase"=>$this->input->post("tonase"),
                "upah"=>str_replace(".","",$this->input->post("upah")),
                "harga/kg"=>str_replace(".","",$this->input->post("harga")),
                "bonus"=>str_replace(".","",$this->input->post("bonus")),
                "keterangan"=>$keterangan,
                "tanggal_bongkar"=>date('Y-m-d'),
                "Jo_id"=>$this->input->post("jo_id")
            );

            $total = $data["tonase"]*$data["harga/kg"]*1000;
            $ppn = $total * 0.1;
            $grand_total = $total + $ppn;
            $data_invoice = array(
                "jo_id"=>$this->input->post("jo_id"),
                "customer_id"=>$data_jo["customer_id"],
                "tanggal_invoice"=>date("Y-m-d"),
                "batas_pembayaran"=>date("Y-m-d",strtotime('+'.$TOD.' days', strtotime(date("Y-m-d")))),
                "total"=>$total,
                "ppn"=>$ppn,
                "grand_total"=>$grand_total,
                "status_bayar"=>"Belum Lunas"
            );

            $this->model_detail->updatestatusjo($data,$supir,$mobil,$data_invoice);
            redirect(base_url("index.php/detail/detail_jo/").$this->input->post("jo_id"));
        }

        public function updateinvoice(){
            $invoice_kode = $this->input->post("invoice-kode");
            $this->model_detail->updateinvoice($invoice_kode);
            redirect(base_url("index.php/detail/detail_invoice/").$invoice_kode);
        }
    //end fungsi untuk Detail invoice

    //fungsi untuk Detail customer
        public function detail_customer($customer_id)
        {
            $data["customer"] = $this->model_home->getcustomerbyid($customer_id);
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('detail/customer',$data);
            $this->load->view('footer');
        }
    //end fungsi untuk Detail customer

    //fungsi untuk Detail bon
        function getbon()
        {
            $bon_id = $this->input->get('id');
            $data = $this->model_detail->getbonbyid($bon_id);
            echo json_encode($data);
        }
    //end fungsi untuk Detail bon
    
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

        public function update_upah(){
            $data = array(
                "supir_id"=>$this->input->get("supir_id"),
                "supir_kasbon"=>$this->input->get("supir_kasbon"),
                "upah"=>$this->input->get("upah"),
                "Jo_id"=>$this->input->get("jo_id")
            );
            $this->model_detail->update_upah($data);
            echo $data["supir_id"];
        }
    //end fungsi untuk Detail penggajian

}