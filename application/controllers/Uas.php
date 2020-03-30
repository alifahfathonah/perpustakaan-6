<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uas extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$uass = $this->uas->getAll();
		$jumlah = $this->uas->jumlahProvinsi();
		$main_view = "Uas/index";
		$this->load->view("Template", compact("uass", "jumlah", "main_view"));

	}

	public function download() {
		$datas  = $this->uas->getAll();

    	$this->load->library('Pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_Data_Penduduk.pdf";
        $this->pdf->load_view('Uas/laporan', compact("datas"));
	}

}