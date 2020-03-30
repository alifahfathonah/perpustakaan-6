<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buku extends Operator_Controller {


	public function __construct() {
		parent::__construct();
	}

	public function index($page = null)
	{
		$bukus = $this->buku->getAll($page);
		$jumlah = $this->buku->total();
		$pagination = $this->buku->makePagination(site_url("Buku"), 2, $jumlah);
		$main_view = "buku/index";
		$this->load->view("Template", compact("main_view", "jumlah","bukus", "pagination"));
	}

	public function create()
	{
		if(!$_POST)
		{
			$input = (object) $this->buku->getDefaultValues();
		}

		else {     $input = (object) $this->input->post(null, true);	}

		if(!$this->buku->validate())
		{
			$main_view = "buku/Form";
			$form_action = "buku/create";
			$this->load->view("Template", compact("input", "main_view", "form_action"));
			return;
		}

		if(!empty($_FILES) && $_FILES['foto']['size'] > 0)
		{
			$fotoFileName = date('YmdHis');
			$upload = $this->buku->uploadfoto('foto', $fotoFileName);

			if($upload)
			{
				$input->foto = "$fotoFileName.jpg";
				$this->buku->coverResize("foto", "./foto/$fotoFileName.jpg", 455, 341);
			}
		}
		
		if($this->db->insert("buku", $input))
		{
			$this->session->set_flashdata("success", "Data Berhasil Tambahkan");
		}
		
		else
		{
			$this->session->set_flashdata("error", "Data Gagal di Jalankan");
		}

		redirect("buku");
	}

	public function edit($id_buku)
	{
		$buku = $this->db->where("id_buku", $id_buku)->get("buku")->row();
		
		if(!$buku)
		{
			$this->session->set_flashdata("error", "Data Tidak Di Temukan");
			redirect("buku");
		}

		if(!$_POST)
		{
			$input = (object) $buku;
		}
		
		else
		{
			$input = (object) $this->input->post(null, true);
		}

		

		if(!$this->buku->validate())
		{
			$main_view = "buku/Form";
			$form_action = "buku/edit/$id_buku";
			$this->load->view("Template", compact("main_view", "input", "form_action"));
			return;
		}

		if($this->buku->where("id_buku", $id_buku)->update($input))
		{
			$this->session->set_flashdata("success", "Data Berhasil Di Update");
		}
		else
		{
			$this->session->set_flashdata("error", "Data Gagal di Update");
		}

		redirect("buku");
	}

	public function delete()
	{
		$id_buku = $this->input->post("id_buku", true);

		$buku = $this->buku->get($id_buku);
		if(!$buku)
		{
			$this->session->set_flashdata("error", "Data Gagal Di Hapus");
			redirect("buku");
		}

		if($this->buku->where("id_buku", $id_buku)->delete())
		{
			$this->session->set_flashdata('success', 'Data Berhasil Di hapus');
		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal Di Hapus');
		}

		redirect('buku');
	}

	public function kode_buku_unik()
	{
		$kode_buku = $this->input->post("kode_buku");
		$id = $this->input->post("id_buku");

		$this->buku->where("kode_buku", $kode_buku);
		!$id || $this->buku->where("id_buku !=", $id);
		$buku = $this->buku->get();

		if($buku)
		{
			$this->form_validation->set_message("kode_buku_unik", "%s Sudah Di Gunakan");
			return false;
		}

		return true;
	}

	public function search($page = null)
	{
		$keywords = $this->input->get("keywords", true);

		$bukus = $this->buku->getSearch($keywords, $page);
		$jumlah = $this->buku->jumlahPageSearch($keywords);
		$pagination = $this->buku->makePagination(site_url("buku/search/"), 3, $jumlah);

		if(!$bukus)
		{
			$this->session->set_flashdata("error", "Data Tidak Di Temukan");
			redirect("buku");
		}
		
		$main_view = "buku/Index";
		$this->load->view("Template", compact("keywords", "bukus", "jumlah", "pagination", "main_view"));
	}

	
}