<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {


	public function __construct() {
		parent::__construct();
	}

	public function index($page = null)
	{
		$users = $this->user->getAll($page);
		$jumlah = $this->user->total();
		$pagination = $this->user->makePagination(site_url("user"), 2, $jumlah);
		$main_view = "User/Index";
		$this->load->view("Template", compact("main_view", "jumlah","users", "pagination"));
	}

	public function create()
	{
		if(!$_POST)
		{
			$input = (object) $this->user->getDefaultValues();
		}

		else {     $input = (object) $this->input->post(null, true);	}

		if(!$this->user->validate())
		{
			$main_view = "User/Form";
			$form_action = "User/create";
			$this->load->view("Template", compact("input", "main_view", "form_action"));
			return;
		}

		$input->password = md5($input->password);

		if($this->db->insert("user", $input))
		{
			$this->session->set_flashdata("success", "Data Berhasil Tambahkan");
		}
		
		else
		{
			$this->session->set_flashdata("error", "Data Gagal di Jalankan");
		}

		redirect("User");
	}

	public function edit($id_user)
	{
		$user = $this->db->where("id_user", $id_user)->get("user")->row();
		
		if(!$user)
		{
			$this->session->set_flashdata("error", "Data Tidak Di Temukan");
			redirect("User");
		}

		if(!$_POST)
		{
			$input = (object) $user;
		}
		
		else
		{
			$input = (object) $this->input->post(null, true);
			$input->cover = $user->cover;
		}
		

		if(!$this->user->validate())
		{
			$main_view = "User/Form";
			$form_action = "User/edit/$id_user";
			$this->load->view("Template", compact("main_view", "input", "form_action"));
			return;
		}

		if($this->user->where("id_user", $id_user)->update($input))
		{
			$this->session->set_flashdata("success", "Data Berhasil Di Update");
		}
		else
		{
			$this->session->set_flashdata("error", "Data Gagal di Update");
		}

		redirect("User");
	}

	public function delete()
	{
		$id_user = $this->input->post("id_user", true);

		$user = $this->user->get($id_user);
		if(!$user)
		{
			$this->session->set_flashdata("error", "Data Gagal Di Hapus");
			redirect("User");
		}

		if($this->user->where("id_user", $id_user)->delete())
		{
			$this->session->set_flashdata('success', 'Data Berhasil Di hapus');
		}
		else
		{
			$this->session->set_flashdata('error', 'Data Gagal Di Hapus');
		}

		redirect('User');
	}

	public function blokir() {

		$id_user = $this->input->post("id_user", true);

		if($this->db->where("id_user", $id_user)->update("user", ["is_blokir" => "y"])) {

			$this->session->set_flashdata("success", "user Berhasil Di Blokir");
			redirect("User");

		}
		else {

			$this->session->set_flashdata("error", "user Gagal Di Blokir");
			redirect("User");

		}


	}

	public function unBlokir() {


		$id_user = $this->input->post("id_user", true);

		if($this->db->where("id_user", $id_user)->update("user", ["is_blokir" => "n"])) {

			$this->session->set_flashdata("success", "user Berhasil Di Un Block");
			redirect("User");

		}
		else {

			$this->session->set_flashdata("error", "user Gagal Di Un Blokir");
			redirect("User");

		}

	}

}