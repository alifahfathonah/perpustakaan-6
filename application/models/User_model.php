<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

	public $perPage = 9;

	public function getAll($page = null)
	{
		$offset = $this->calculateRealOffset($page);

		$sql = "SELECT user.id_user,
					   user.username,
					   user.password,
					   user.nama_user,
					   user.level,
					   user.is_blokir
				FROM user
				WHERE user.level = 'operator'
				ORDER BY id_user DESC
				LIMIT $this->perPage
				OFFSET $offset";

		return $this->db->query($sql)->result();
	}

	public function total()
	{
		$sql = "SELECT COUNT(id_user) as total FROM user WHERE user.level = 'operator'";
		return $this->db->query($sql)->row()->total;
	}

	public function getDefaultValues()
	{
		return
		[
			"id_user" => "",
			"username" => "",
			"password" => "",
			"nama_user" => "",
			"level" => "",
			"is_blokir" => 'n'
		];
	}

	public function getValidationRules() {

		$validationRules = [
			[
				"field" => "username",
				"label" => "Username",
				"rules" => "trim|required"
			],
			[
				"field" => "password",
				"label" => "Password",
				"rules" => "trim|required"
			],
			[
				"field" => "nama_user",
				"label" => "Nama User",
				"rules" => "trim|required"
			],
			[
				"field" => "level",
				"label" => "Level",
				"rules" => "trim|required"
			]
		];

		return $validationRules;

	}



}