<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends MY_Model
{
	public $table = "user";

	public function getDefaultValues()
	{
		return [
			"username" => "",
			"password" => "",
		];
	}

	public function run($input)
	{
		$input->password = md5($input->password);
		$user = $this->db->where('username', $input->username)
						 ->where('password', $input->password)
						 ->where('is_blokir', 'n')
						 ->limit(1)
						 ->get('user')
						 ->row();
		if($user)
		{
			$sess_data = 
			[
				'id_user' => $user->id_user,
				'username' => $user->username,
				'level' => $user->level,
				'nama_user' => $user->nama_user,
				'profile' => $user->profile,
				'login'		=> true
			];

			$this->session->set_userdata($sess_data);
			return true;
		}

		return false;
	}

	public function keluar()
	{
		$sess_data = 
		[
			'id_user' => null,
			'username' => null,
			'login'		=> null,
			'nama_user' => null,
			'profile' => null,
			'level' => null
		];
		$this->session->unset_userdata($sess_data);
		$this->session->sess_destroy();
	}

	public function getValidationRules()
	{
		$validationRules = 
		[
			[
				"field" => "username",
				"label" => "Username",
				"rules" => "trim|required"
			],
			[
				"field" => "password",
				"label" => "Password",
				"rules" => "trim|required"
			]
		];

		return $validationRules;
	}
}