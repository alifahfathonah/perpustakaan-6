<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar extends MY_Controller {

	public function __construct() {

		parent::__construct();

	}

	public function index() {
		$nama = $this->db->get("tb_member")->result();
		$this->load->view('Belajar/Belajar', compact("nama"));
	}

	public function getName() {

		$name = $this->input->post('name');


		$data = (object) [
			"name" => $name
		];

		if($this->db->insert("tb_member", $data)) {
			echo "success";
		} else {
			echo "error";
		}
		
	}

	public function cobs() {
		$nama = $this->db->get("tb_member")->result();
		echo json_encode($nama);
	}

	public function hitung() {
		$harga = 1000;
		$this->load->view("Belajar/same", compact("harga"));
	}

	public function sendSms() {
		$message='I am xyz';
		$mobile='62859623506';
		// If Mobile No and Message are  Dynamic  so write   below the line.
		//$message=$this->input->post(‘Message’);
		// $mobile = $this->input->post(‘mobileno’);
		$this->belajar->send($mobile,$message);

		}



	public function modal() {

		$this->load->view("Belajar/Modal");

	}









	}