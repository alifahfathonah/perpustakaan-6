<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uas_model extends MY_Model {

	public function getAll() {
		$sql = "SELECT  provinsi.id_provinsi,
						provinsi.nama_provinsi,
						kota.penduduk,
						kota.id_provinsi,
						kota.nama_kota,
						SUM(IF( provinsi.id_provinsi = kota.id_provinsi, kota.penduduk, 0)) AS jumlah_penduduk
				FROM kota
				INNER JOIN provinsi
					ON(kota.id_provinsi = provinsi.id_provinsi)
				GROUP BY kota.id_provinsi";
		return $this->db->query($sql)->result();
	}

	public function jumlahProvinsi() {
		$sql = "SELECT COUNT(kota.id_kota) AS jumlah FROM kota";

		return $this->db->query($sql)->row()->jumlah;
	}

}