<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends MY_Model {

	public function laporanPeminjaman($tanggal_awal, $tanggal_akhir)
    {
        $sql = "SELECT peminjaman.tanggal_pinjam,
                          siswa.nis,
                          siswa.nama_siswa,
                          buku.kode_buku,
                          judul.judul_buku,
                          peminjaman.id_pinjam
                     FROM peminjaman
               INNER JOIN buku
                       ON (peminjaman.id_buku = buku.id_buku)
               INNER JOIN judul
                       ON (buku.id_judul = judul.id_judul)
               INNER JOIN siswa
                       ON (peminjaman.id_siswa = siswa.id_siswa)
                    WHERE (peminjaman.tanggal_pinjam BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                    AND is_kembali = 'y')
                 ORDER BY peminjaman.id_pinjam ASC";

        return $this->db->query($sql)->result();
    }

    public function laporanpengembalian($tanggal_awal, $tanggal_akhir)
    {
        $sql = "SELECT peminjaman.tanggal_pinjam,
                          siswa.nis,
                          siswa.nama_siswa,
                          buku.kode_buku,
                          judul.judul_buku,
                          peminjaman.id_pinjam
                     FROM peminjaman
               INNER JOIN buku
                       ON (peminjaman.id_buku = buku.id_buku)
               INNER JOIN judul
                       ON (buku.id_judul = judul.id_judul)
               INNER JOIN siswa
                       ON (peminjaman.id_siswa = siswa.id_siswa)
                    WHERE (peminjaman.tanggal_pinjam BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                    AND is_kembali = 'n')
                 ORDER BY peminjaman.id_pinjam ASC";

        return $this->db->query($sql)->result();
    }

    public function dataBuku() {
      $sql = "SELECT peminjaman.tanggal_pinjam,
                          siswa.nis,
                          siswa.nama_siswa,
                          buku.kode_buku,
                          judul.judul_buku,
                          peminjaman.id_pinjam,
                          IFNULL((SELECT COUNT(peminjaman.id_siswa)
                         FROM peminjaman
                         WHERE peminjaman.id_siswa = siswa.id_siswa
                         GROUP BY buku.id_judul), 0) AS jumlah_total
                     FROM peminjaman
               INNER JOIN buku
                       ON (peminjaman.id_buku = buku.id_buku)
               INNER JOIN judul
                       ON (buku.id_judul = judul.id_judul)
               INNER JOIN siswa
                       ON (peminjaman.id_siswa = siswa.id_siswa)
                GROUP BY peminjaman.id_siswa
                 ORDER BY peminjaman.id_pinjam ASC";

      return $this->db->query($sql)->result();
    }

    public function dataSiswa() {
      $sql = "SELECT  pinjam.id_pinjam,
                      pinjam.id_buku,
                      judul.nama_judul,
                      IFNULL((SELECT COUNT(buku.id_buku)
                         FROM buku
                         INNER JOIN judul
                          ON (buku.id_buku = buku.id_judul)
                         GROUP BY buku.id_buku), 0) AS jumlah_total
               FROM pinjam
               INNER JOIN buku
                       ON (pinjam.id_buku = buku.id_buku)
               INNER JOIN judul
                       ON (buku.id_judul = judul.id_judul)
                 ORDER BY pinjam.id_pinjam ASC";

      return $this->db->query($sql)->result();
    }

    public function bukuKembali() {
      $sql = "SELECT COUNT(peminjaman.id_pinjam) AS jumlah FROM peminjaman WHERE is_kembali = 'n'";

      return $this->db->query($sql)->row()->jumlah;
    }

    public function bukuPinjam() {
      $sql = "SELECT COUNT(peminjaman.id_pinjam) AS jumlah FROM peminjaman WHERE is_kembali = 'y'";

      return $this->db->query($sql)->row()->jumlah;
    }

}