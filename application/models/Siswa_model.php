<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends MY_Model {

	public $perPage = 9;

	public function getAll($page = null)
	{
		$offset = $this->calculateRealOffset($page);

		$sql = "SELECT siswa.id_siswa,
					   siswa.nis,
					   siswa.nama_siswa,
					   siswa.jenis_kelamin
				FROM siswa
				ORDER BY id_siswa DESC
				LIMIT $this->perPage
				OFFSET $offset";

		return $this->db->query($sql)->result();
	}

	public function total()
	{
		$sql = "SELECT COUNT(id_siswa) as total FROM siswa";
		return $this->db->query($sql)->row()->total;
	}

	public function getDefaultValues()
	{
		return
		[
			"id_siswa" => "",
			"nis" => "",
			"nama_siswa" => "",
			"jenis_kelamin" => "",
			"email" => ""
		];
	}

	public function getValidationRules() {

		$validationRules = [
			[
				"field" => "nis",
				"label" => "NIS",
				"rules" => "trim|required|callback_nis_unik"
			],
			[
				"field" => "nama_siswa",
				"label" => "Nama Siswa",
				"rules" => "trim|required"
			],
			[
				"field" => "jenis_kelamin",
				"label" => "Jenis Kelamin",
				"rules" => "trim|required"
			],
			[
				"field" => "email",
				"label" => "Email",
				"rules" => "trim|required"
			]
		];

		return $validationRules;

	}



}