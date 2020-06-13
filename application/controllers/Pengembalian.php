<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends Operator_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($page = null) {
		$pengembalians = $this->pengembalian->getAll($page);
		$jumlah = $this->pengembalian->total();
		$pagination = $this->pengembalian->makePagination(site_url("Pengembalian"), 2, $jumlah);
		$main_view = "Pengembalian/Index";
		$this->load->view("Template", compact("main_view", "jumlah","pengembalians", "pagination"));
	}

	public function kembalikan() {
		$id_buku = $this->input->post("id_buku");
		$id_pinjam = $this->input->post("id_pinjam");
		$denda = $this->input->post("denda");
		$tanggal = (string) date('Y-m-d');

		if($this->db->where("id_pinjam", $id_pinjam)->update("peminjaman", ["is_kembali" => "y", "tanggal_kembali" => $tanggal])) {
			if($denda != 0) {
				$this->db->insert("denda", ["jumlah" => $denda, "tanggal_kembali" => $tanggal, "id_pinjam" => $id_pinjam ]);
			}
			$this->db->where("id_buku", $id_buku)->update("buku", ["is_ada" => "y"]);
			$this->session->set_flashdata("success", "Buku Berhasil Di kembalikan");
		} else {
			$this->session->set_flashdata("error", "Data Gagal Di kembalikan");
		}

		redirect("Pengembalian");
	}

	public function kirimEmail() {
		
		$email = $this->input->post("email");
		$nama = $this->input->post("nama_siswa");
		$config = Array(
			"protocol" => "smtp",
			"smtp_host" => "ssl://smtp.googlemail.com",
			"smtp_port" => 465,
			"smtp_user" => "dioramadhan74@gmail.com",
			"smtp_pass" => "ramadhan74",
			"mailtype" => "html",
			"charset" => "iso-8859-1",
			"wordwrap" => TRUE
		);

			$this->load->library("email", $config);
			$this->email->set_newline("\r\n");

			$this->email->from("dioramadhan74@gmail.com", "Perpustakaan SMK Fadilah");
			$this->email->to($email);
			$this->email->subject("Pengembalian Buku");
			$this->email->message("Hai ".$nama." Segera Kembalikan Buku");


		if($this->email->send()) {

			$this->session->set_flashdata("success", "Email Berhasil Di Kirim");

		}
		else {

			$this->session->set_flashdata("error", "Email Gagal Di Kirim");

		}

		redirect("Pengembalian");

	}


}