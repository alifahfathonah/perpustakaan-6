<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Email extends MY_Controller {

	public function __construct() {

		parent::__construct();

	}

	public function index() {

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

		$this->email->from("dioramadhan74@gmail.com", "Penerimaan Siswa SMK 1 Purbalingga");
		$this->email->to("Awartid@gmail.com");
		$this->email->subject("Selamat anda di terima di sekolah SMK 1 Purbalingga");
		$this->email->message("bekerja");

		if($this->email->send()) {

			echo "berhasil";

		} else {

			show_error($this->email->print_debugger());

		}

	}



}