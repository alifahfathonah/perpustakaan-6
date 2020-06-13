<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judul extends Operator_Controller {


	public function __construct() {
		parent::__construct();
	}

	public function index($page = null)
	{
		$juduls = $this->judul->getAll($page);
		$jumlah = $this->judul->total();
		$pagination = $this->judul->makePagination(site_url("Judul"), 2, $jumlah);
		$main_view = "Judul/Index";
		$this->load->view("Template", compact("main_view", "jumlah","juduls", "pagination"));
	}

	public function create()
	{
		if(!$_POST)
		{
			$input = (object) $this->judul->getDefaultValues();
		}

		else {     $input = (object) $this->input->post(null, true);	}

		if(!$this->judul->validate() || $this->form_validation->error_array())
		{
			$main_view = "Judul/Form";
			$form_action = "Judul/create";
			$this->load->view("Template", compact("input", "main_view", "form_action"));
			return;
		}

		if(!empty($_FILES) && $_FILES['cover']['size'] > 0)
		{
			$ext = "";
			if($_FILES['cover']['type'] == 'image/png') {
				$ext = 'png';
			} else {
				$ext = 'jpg';
			}

			$coverFileName = date('YmdHis');
			$upload = $this->judul->uploadcover('cover', $coverFileName);

			if($upload)
			{
				$input->cover = "$coverFileName.".$ext;
				$this->judul->coverResize("cover", "./cover/$coverFileName.".$ext, 455, 341);
			}
		}

		
		if($this->db->insert("judul", $input))
		{
			$this->session->set_flashdata("success", "Data Berhasil Tambahkan");
		}
		
		else
		{
			$this->session->set_flashdata("error", "Data Gagal di Jalankan");
		}

		redirect("Judul");
	}

	public function edit($id_judul)
	{
		$judul = $this->db->where("id_judul", $id_judul)->get("judul")->row();
		
		if(!$judul)
		{
			$this->session->set_flashdata("error", "Data Tidak Di Temukan");
			redirect("Judul");
		}

		if(!$_POST)
		{
			$input = (object) $judul;
		}
		
		else
		{
			$input = (object) $this->input->post(null, true);
			$input->cover = $judul->cover;
		}

		if(!empty($_FILES) && $_FILES['cover']['size'] > 0)
		{
			$ext = "";
			if($_FILES['cover']['type'] == 'image/png') {
				$ext = 'png';
			} else {
				$ext = 'jpg';
			}

			$coverFileName = date('YmdHis');
			$upload = $this->judul->uploadcover('cover', $coverFileName);

			if($upload)
			{
				$input->cover = "$coverFileName.".$ext;
				$this->judul->coverResize("cover", "./cover/$coverFileName.".$ext, 455, 341);

				if ($judul->cover) {
                    $this->judul->deleteCover($judul->cover);
            	}
			}

			
		}
		

		if(!$this->judul->validate() || $this->form_validation->error_array())
		{
			$main_view = "Judul/Form";
			$form_action = "Judul/edit/$id_judul";
			$this->load->view("Template", compact("main_view", "input", "form_action"));
			return;
		}

		if($this->judul->where("id_judul", $id_judul)->update($input))
		{
			$this->session->set_flashdata("success", "Data Berhasil Di Update");
		}
		else
		{
			$this->session->set_flashdata("error", "Data Gagal di Update");
		}

		redirect("Judul");
	}

	public function delete()
	{
		$id_judul = $this->input->post("id_judul", true);
		$cover = $this->input->post("cover", true);

		$judul = $this->judul->get($id_judul);
		if(!$judul)
		{
			$this->session->set_flashdata("error", "Data Gagal Di Hapus");
			redirect("Judul");
		}

		if($this->judul->where("id_judul", $id_judul)->delete())
		{
			$this->judul->deletecover($cover);
			$this->session->set_flashdata('success', 'Data Berhasil Di hapus');
		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal Di Hapus');
		}

		redirect('Judul');
	}

	

}