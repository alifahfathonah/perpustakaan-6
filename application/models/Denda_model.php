<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Denda_model extends MY_Model {
	public $perPage = 9;

	public function getAll($page = null)
	{
		$offset = $this->calculateRealOffset($page);

		$sql = "SELECT denda.id_denda,
					   denda.tanggal_kembali,
					   denda.id_pinjam,
					   denda.jumlah,
					   peminjaman.id_siswa,
					   siswa.nama_siswa,
					   peminjaman.tanggal_pinjam
				FROM denda
				INNER JOIN peminjaman
					ON (denda.id_pinjam = peminjaman.id_pinjam)
				INNER JOIN siswa
					ON(peminjaman.id_siswa = siswa.id_siswa)
				ORDER BY id_denda DESC
				LIMIT $this->perPage
				OFFSET $offset";

		return $this->db->query($sql)->result();
	}

	public function total()
	{
		$sql = "SELECT COUNT(id_denda) as total FROM denda";
		return $this->db->query($sql)->row()->total;
	}
}