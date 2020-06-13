<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Operator_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$main_view = "Profile";
		$this->load->view("Template", compact("main_view"));
	}

	public function gantiPass() {

		$id_user = $this->session->userdata("id_user");

		if(!$_POST)
		{
			$input = (object) [ "password1" => "", "password2" => "" ];
		}
		else
		{
			$input = (object) $this->input->post(null, true);
		}

		

		if(!$this->profile->validate())
		{
			$main_view = "Profile_form";
			$form_action = "Profile/gantiPass";
			$this->load->view("Template", compact("form_action", "input", "main_view"));
			return;
		}

		$input->password2 = md5($input->password2);


		if($this->db->where("id_user", $id_user)->update("user", ["password" => $input->password2 ]))
		{
			$this->session->set_flashdata('success', 'Selamat Datang');
		}
		else
		{
			$this->session->set_flashdata('error', 'Data gagal');
			
		}
		redirect("profile");
	}

	public function gantiFoto() {

		$id_user = $this->session->userdata("id_user");

		$profile = $this->db->where("id_user", $id_user)->get("user")->row();
		
		if(!$profile)
		{
			$this->session->set_flashdata("error", "Data Tidak Di Temukan");
			redirect("profile");
		}

		if(!$_POST)
		{
			$input = (object) $profile;
		}
		
		else
		{
			$input = (object) $this->input->post(null, true);
			$input->profile = $profile->profile;
		}

		if(!empty($_FILES) && $_FILES['profile']['size'] > 0)
		{
			$ext = "";
			if($_FILES['profile']['type'] == 'image/png') {
				$ext = 'png';
			} else {
				$ext = 'jpg';
			}

			$profileFileName = date('YmdHis');
			$upload = $this->profile->uploadProfile('profile', $profileFileName);

			if($upload)
			{
				$input->ini = "$profileFileName.".$ext;
				$this->profile->profileResize("profile", "./profile/$profileFileName.".$ext, 455, 341);

				if($profile->profile) {
                    $this->profile->deleteProfile($profile->profile);
            	}
			}

			
		}


		

		if(!$this->profile->validate2() || $this->form_validation->error_array())
		{
			$main_view = "Form_foto";
			$form_action = "Profile/gantiFoto";
			$this->load->view("Template", compact("main_view", "input", "form_action"));
			return;
		}

		if($this->db->where("id_user", $id_user)->update("user", [ "profile" => $input->ini ]))
		{
			$this->session->set_userdata("profile", $input->ini);
			$this->session->set_flashdata("success", "Data Berhasil Di Update");
		}
		else
		{
			$this->session->set_flashdata("error", "Data Gagal di Update");
		}

		redirect("Profile");

	}

	public function password()
	{
		$password1 = $this->input->post("password1");
		$password2 = $this->input->post("password2");
		

		if($password1 != $password2) {
			$this->form_validation->set_message("password", "Password Tidak Sama");
			return false;
		}

		return true;
	}



}