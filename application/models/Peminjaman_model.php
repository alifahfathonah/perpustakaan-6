<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends MY_Model {
	public $perPage = 9;

	public function getAll($page = null)
	{
		$offset = $this->calculateRealOffset($page);

		$sql = "SELECT peminjaman.id_pinjam,
					   peminjaman.tanggal_pinjam,
					   peminjaman.id_siswa,
					   peminjaman.id_buku,
					   peminjaman.tanggal_kembali,
					   peminjaman.is_kembali,
					   peminjaman.id_judul,
					   siswa.nama_siswa,
					   buku.kode_buku,
					   judul.judul_buku,
					   siswa.email
				FROM peminjaman
				INNER JOIN siswa
					ON(peminjaman.id_siswa = siswa.id_siswa)
				INNER JOIN buku
					ON(peminjaman.id_buku = buku.id_buku)
				INNER JOIN judul
					ON(peminjaman.id_judul = judul.id_judul)
				ORDER BY id_pinjam DESC
				LIMIT $this->perPage
				OFFSET $offset";

		return $this->db->query($sql)->result();
	}

	public function total()
	{
		$sql = "SELECT COUNT(id_pinjam) as total FROM peminjaman";
		return $this->db->query($sql)->row()->total;
	}

	public function getDefaultValues()
	{
		return
		[
			"id_pinjam" => "",
			"id_buku" => "",
			"id_judul" => "",
			"id_siswa" => ""
		];
	}

	public function getValidationRules() {

		$validationRules = [
			[
				"field" => "id_buku",
				"label" => "kode_buku",
				"rules" => "trim|required"
			],
			[
				"field" => "id_judul",
				"label" => "Judul",
				"rules" => "trim|required"
			],
			[
				"field" => "id_siswa",
				"label" => "siswa",
				"rules" => "trim|required|callback_cek_siswa"
			]
		];

		return $validationRules;

	}


	public function get_judul()
        {
            $this->db->order_by('judul_buku', 'asc');
            return $this->db->get('judul')->result();
        }
 
        public function get_buku()
        {
            $this->db->order_by('kode_buku', 'asc');
            $this->db->join('judul', 'buku.id_judul = judul.id_judul');
            return $this->db->where("is_ada", "y")->get('buku')->result();
        }
 
        public function get_kecamatan()
        {
            // kita joinkan tabel kecamatan dengan kota
            $this->db->order_by('nama_kecamatan', 'asc');
            $this->db->join('kota', 'kecamatan.id_kota_fk = kota.id_kota');
            return $this->db->get('kecamatan')->result();
        }
 
 
        // untuk edit ambil dari id level paling bawah
        public function get_selected_by_id_kecamatan($id_kecamatan)
        {
            $this->db->where('id_kecamatan', $id_kecamatan);
            $this->db->join('kota', 'kecamatan.id_kota_fk = kota.id_kota');
            $this->db->join('provinsi', 'kota.id_provinsi_fk = provinsi.id_provinsi');
            return $this->db->get('kecamatan')->row();
        }





}