<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends Operator_Controller {


	public function __construct() {
		parent::__construct();
	}

	public function index($page = null)
	{
		$siswas = $this->siswa->getAll($page);
		$jumlah = $this->siswa->total();
		$pagination = $this->siswa->makePagination(site_url("siswa"), 2, $jumlah);
		$main_view = "Siswa/Index";
		$this->load->view("Template", compact("main_view", "jumlah","siswas", "pagination"));
	}

	public function create()
	{
		if(!$_POST)
		{
			$input = (object) $this->siswa->getDefaultValues();
		}

		else {     $input = (object) $this->input->post(null, true);	}

		if(!$this->siswa->validate())
		{
			$main_view = "Siswa/Form";
			$form_action = "Siswa/create";
			$this->load->view("Template", compact("input", "main_view", "form_action"));
			return;
		}

		if($this->db->insert("siswa", $input))
		{
			$this->session->set_flashdata("success", "Data Berhasil Tambahkan");
		}
		
		else
		{
			$this->session->set_flashdata("error", "Data Gagal di Jalankan");
		}

		redirect("Siswa");
	}

	public function edit($id_siswa)
	{
		$siswa = $this->db->where("id_siswa", $id_siswa)->get("siswa")->row();
		
		if(!$siswa)
		{
			$this->session->set_flashdata("error", "Data Tidak Di Temukan");
			redirect("Siswa");
		}

		if(!$_POST)
		{
			$input = (object) $siswa;
		}
		
		else
		{
			$input = (object) $this->input->post(null, true);
			$input->cover = $siswa->cover;
		}
		

		if(!$this->siswa->validate())
		{
			$main_view = "Siswa/Form";
			$form_action = "Siswa/edit/$id_siswa";
			$this->load->view("Template", compact("main_view", "input", "form_action"));
			return;
		}

		if($this->siswa->where("id_siswa", $id_siswa)->update($input))
		{
			$this->session->set_flashdata("success", "Data Berhasil Di Update");
		}
		else
		{
			$this->session->set_flashdata("error", "Data Gagal di Update");
		}

		redirect("Siswa");
	}

	public function delete()
	{
		$id_siswa = $this->input->post("id_siswa", true);

		$siswa = $this->siswa->get($id_siswa);
		if(!$siswa)
		{
			$this->session->set_flashdata("error", "Data Gagal Di Hapus");
			redirect("Siswa");
		}

		if($this->siswa->where("id_siswa", $id_siswa)->delete())
		{
			$this->session->set_flashdata('success', 'Data Berhasil Di hapus');
		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal Di Hapus');
		}

		redirect('Siswa');
	}

	public function nis_unik()
	{
		$nis = $this->input->post("nis");
		$id = $this->input->post("id_siswa");

		$this->siswa->where("nis", $nis);
		!$id || $this->siswa->where("id_siswa !=", $id);
		$siswa = $this->siswa->get();

		if($siswa)
		{
			$this->form_validation->set_message("nis_unik", "%s Sudah Di Gunakan");
			return false;
		}

		return true;
	}

}