<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");

	}

	public function login_index()
	{
		if(!$_POST)
		{
			$input = (object) $this->login->getDefaultValues();
		}
		else
		{
			$input = (object) $this->input->post(null, true);
		}

		if(!$this->login->validate())
		{
			$main_view = "Login_form";
			$form_action = "Login/login_index";
			$this->load->view("Login_form", compact("form_action", "input"));
			return;
		}

		if($this->login->run($input))
		{
			$this->session->set_flashdata('success', 'Selamat Datang '.$this->session->userdata("username"));
			redirect("Buku");
		}
		else
		{
			$this->session->set_flashdata('error', 'Invalid Login');
			redirect("Login/login_index");
		}
		
	}

	public function logout()
	{
		$this->login->keluar();
		redirect('Login/login_index');
	}
}