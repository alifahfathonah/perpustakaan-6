<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends Operator_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($page = null) {
		$peminjamans = $this->peminjaman->getAll($page);
		$jumlah = $this->peminjaman->total();
		$pagination = $this->peminjaman->makePagination(site_url("Peminjaman"), 2, $jumlah);
		$main_view = "Peminjaman/index";
		$this->load->view("Template", compact("main_view", "jumlah","peminjamans", "pagination"));
	}

	public function create()
	{
		if(!$_POST)
		{
			$input = (object) $this->peminjaman->getDefaultValues();
		}

		else {     $input = (object) $this->input->post(null, true);	}

		if(!$this->peminjaman->validate())
		{
			$judul = $this->peminjaman->get_judul();
			$buku = $this->peminjaman->get_buku();
			$judul_selected = "";
			$buku_selected = "";
			$main_view = "Peminjaman/Form";
			$form_action = "Peminjaman/create";
			$this->load->view("Template", compact("input", "main_view", "form_action", "judul", "buku", "judul_selected", "buku_selected"));
			return;
		}
		
		$this->db->where("id_buku", $input->id_buku)->update("buku", ["is_ada" => 'n']);

		if($this->db->insert("peminjaman", $input))
		{

			$this->session->set_flashdata("success", "Data Berhasil Tambahkan");
		}
		
		else
		{
			$this->session->set_flashdata("error", "Data Gagal di Jalankan");
		}

		redirect("Peminjaman");
	}

	public function delete()
	{
		$id_pinjam = $this->input->post("id_pinjam", true);

		$peminjaman = $this->peminjaman->get($id_pinjam);
		if(!$peminjaman)
		{
			$this->session->set_flashdata("error", "Data Gagal Di Hapus");
			redirect("Peminjaman");
		}

		if($this->peminjaman->where("id_pinjam", $id_pinjam)->delete())
		{
			$this->session->set_flashdata('success', 'Data Berhasil Di hapus');
		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal Di Hapus');
		}

		redirect('Peminjaman');
	}

	public function cek_siswa() {
		$id_siswa = $this->input->post("id_siswa");
		$sql = "SELECT COUNT(id_pinjam) AS jumlah_item
                FROM peminjaman
                WHERE id_siswa = '$id_siswa'
                AND is_kembali = 'n'";
        $item = $this->db->query($sql)->row()->jumlah_item;

        if ($item < 2) {
        	
            return true;
        }
        $this->form_validation->set_message("cek_siswa", "Siswa ini Sudah Meminjam Lebih dari 2 buku");
        return false;
	}
}