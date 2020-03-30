<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_model extends MY_Model {
			public $perPage = 9;

	   protected $maxLama      = 7;    // Lama maksimum peminjaman.
    	protected $dendaPerHari = 1000; // Denda perhari.


	public function getAll($page = null)
	{
		$offset = $this->calculateRealOffset($page);
		$currentDate = (string) date('Y-m-d');

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
					   siswa.email,
					   IF (
                       		DATEDIFF('$currentDate', tanggal_pinjam) > $this->maxLama,
                                (DATEDIFF('$currentDate', tanggal_pinjam) - $this->maxLama) * $this->dendaPerHari,
                                0
                            ) AS denda

				FROM peminjaman
				INNER JOIN siswa
					ON(peminjaman.id_siswa = siswa.id_siswa)
				INNER JOIN buku
					ON(peminjaman.id_buku = buku.id_buku)
				INNER JOIN judul
					ON(peminjaman.id_judul = judul.id_judul)
				WHERE peminjaman.is_kembali = 'n'
				ORDER BY id_pinjam DESC
				LIMIT $this->perPage
				OFFSET $offset";

		return $this->db->query($sql)->result();
	}

	public function total()
	{
		$sql = "SELECT COUNT(id_pinjam) as total FROM peminjaman WHERE peminjaman.is_kembali = 'n'";
		return $this->db->query($sql)->row()->total;
	}

}