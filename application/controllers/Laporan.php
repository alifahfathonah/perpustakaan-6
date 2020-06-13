<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends Operator_Controller {

	public function __construct() {
		parent::__construct();

	}

	public function laporan_peminjaman()
    {
        if (!$_POST) {
            $input      = (object) ['tanggal_awal' => '', 'tanggal_akhir' => ''];
            $first_load = true;
        } else {
            $input         = (object) $this->input->post(null, true);
            $first_load    = false;
        }

        $tanggalAwal = "";
        $tanggalAkhir = "";
        if($input->tanggal_awal) {
        	$pisah = explode('/',$input->tanggal_awal);
			$array = array($pisah[2],$pisah[0],$pisah[1]);
			$tanggalAwal = implode('-',$array);
        }

        if($input->tanggal_akhir) {
        	$pisah1 = explode('/',$input->tanggal_akhir);
			$array1 = array($pisah1[2],$pisah1[0],$pisah1[1]);
			$tanggalAkhir = implode('-',$array1);
        }

  		 $peminjamans  = $this->laporan->laporanPeminjaman($tanggalAwal, $tanggalAkhir);
         $data = $this->laporan->dataBuku();
		 $jumlah_total = count($peminjamans);
		 $main_view    = 'Laporan/Peminjaman';
		 $form_action  = 'Laporan/laporan_peminjaman';
		 $this->load->view('Template', compact('main_view', 'input', 'peminjamans', 'jumlah_total', 'first_load', 'form_action', 'tanggalAwal', 'tanggalAkhir', "data"));
    }

    public function download($tanggalAwal, $tanggalAkhir) {
    	$peminjamans  = $this->laporan->laporanPeminjaman($tanggalAwal, $tanggalAkhir);

    	$this->load->library('Pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_peminjaman.pdf";
        $this->pdf->load_view('Laporan/laporan_pdf', compact("peminjamans"));
    }

    public function download2($tanggalAwal, $tanggalAkhir) {
        $peminjamans  = $this->laporan->laporanpengembalian($tanggalAwal, $tanggalAkhir);

        $this->load->library('Pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_peminjaman.pdf";
        $this->pdf->load_view('Laporan/laporan_pdf', compact("peminjamans"));
    }

    public function laporan_pengembalian() {
        if (!$_POST) {
            $input      = (object) ['tanggal_awal' => '', 'tanggal_akhir' => ''];
            $first_load = true;
        } else {
            $input         = (object) $this->input->post(null, true);
            $first_load    = false;
        }

        $tanggalAwal = "";
        $tanggalAkhir = "";
        if($input->tanggal_awal) {
            $pisah = explode('/',$input->tanggal_awal);
            $array = array($pisah[2],$pisah[0],$pisah[1]);
            $tanggalAwal = implode('-',$array);
        }

        if($input->tanggal_akhir) {
            $pisah1 = explode('/',$input->tanggal_akhir);
            $array1 = array($pisah1[2],$pisah1[0],$pisah1[1]);
            $tanggalAkhir = implode('-',$array1);
        }

         $pengembalians  = $this->laporan->laporanpengembalian($tanggalAwal, $tanggalAkhir);
         $data1 = $this->laporan->bukuKembali();
         $data2 = $this->laporan->bukuPinjam();
         $jumlah_total = count($pengembalians);
         $main_view    = 'Laporan/Pengembalian';
         $form_action  = 'Laporan/laporan_pengembalian';
         $this->load->view('Template', compact('main_view', 'input', 'pengembalians', 'jumlah_total', 'first_load', 'form_action', 'tanggalAwal', 'tanggalAkhir', "data1", "data2"));
    }


}