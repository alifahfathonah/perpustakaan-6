<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends MY_Model {

	public $perPage = 10;

	public function getAll($page = null)
	{
		$offset = $this->calculateRealOffset($page);

		$sql = "SELECT buku.id_buku,
					   buku.kode_buku,
					   buku.is_ada,
					   buku.id_judul,
					   judul.judul_buku
				FROM buku
				INNER JOIN judul
					ON (buku.id_judul = judul.id_judul)
				ORDER BY id_buku DESC
				LIMIT $this->perPage
				OFFSET $offset";

		return $this->db->query($sql)->result();
	}

	public function getSearch($keywords, $page)
    {
    	$offset = $this->calculateRealOffset($page);

    	$sql = "SELECT buku.id_buku,
					   buku.kode_buku,
					   buku.is_ada,
					   buku.id_judul,
					   judul.judul_buku
				FROM buku
				INNER JOIN judul
					ON (buku.id_judul = judul.id_judul)
				WHERE buku.kode_buku = '$keywords'
				OR buku.kode_buku LIKE '%$keywords%'
				ORDER BY id_buku DESC
				LIMIT $this->perPage
				OFFSET $offset";

		return $this->db->query($sql)->result();
    }

	public function total()
	{
		$sql = "SELECT COUNT(id_buku) as total FROM buku";
		return $this->db->query($sql)->row()->total;
	}

	public function getDefaultValues()
	{
		return
		[
			"id_buku" => "",
			"kode_buku" => "",
			"id_judul" => "",
			"is_ada" => "y"
		];
	}

	public function getValidationRules() {

		$validationRules = [
			[
				"field" => "kode_buku",
				"label" => "Kode Buku",
				"rules" => "trim|required|callback_kode_buku_unik"
			],
			[
				"field" => "id_judul",
				"label" => "Judul",
				"rules" => "trim|required"
			]
		];

		return $validationRules;

	}

	public function jumlahPageSearch($keywords)
	{
		$sql = "SELECT COUNT(buku.id_buku) as jumlah
				FROM buku 
				WHERE buku.kode_buku = '$keywords'
				OR buku.kode_buku LIKE '%$keywords%'
				ORDER BY id_buku DESC";

		return $this->db->query($sql)->row()->jumlah;
	}

	



}