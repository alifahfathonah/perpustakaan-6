<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ibu extends Operator_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index($page = null)
	{
		$datas = $this->db->get("ibu")->result();
		$main_view = "Ibu/index";
		$jumlah = $this->ibu->getJumlah();
		$pagination = "";
		$this->load->view("Template2", compact("datas", "main_view", "jumlah", "pagination"));
	}

	public function create()
	{

		if(!$_POST)
		{
			$input = (object) $this->ibu->getDefaultValues();
		}

		else {     $input = (object) $this->input->post(null, true);	}

		if(!$this->ibu->validate() || $this->form_validation->error_array())
		{
			$main_view = "ibu/Form";
			$form_action = "ibu/create";
			$this->load->view("Template2", compact("input", "main_view", "form_action", "main_view"));
			return;
		}

		if(!empty($_FILES) && $_FILES['foto']['size'] > 0)
		{
			$ext = "";
			if($_FILES['foto']['type'] == 'image/png') {
				$ext = 'png';
			} else {
				$ext = 'jpg';
			}

			$fotoFileName = date('YmdHis');
			$upload = $this->ibu->uploadFoto('foto', $fotoFileName);

			if($upload)
			{
				$input->foto = "$fotoFileName.".$ext;
				$this->ibu->coverResize("foto", "./foto/$fotoFileName.".$ext, 455, 341);
			}
		}

		
		if($this->db->insert("ibu", $input))
		{
			$this->session->set_flashdata("success", "Data Berhasil Tambahkan");
		}
		
		else
		{
			$this->session->set_flashdata("error", "Data Gagal di Jalankan");
		}

		redirect("ibu");
	}

	public function update($id_ibu)
	{
		$ibu = $this->db->where("id_ibu", $id_ibu)->get("ibu")->row();
		
		if(!$ibu)
		{
			$this->session->set_flashdata("error", "Data Tidak Di Temukan");
			redirect("ibu");
		}

		if(!$_POST)
		{
			$input = (object) $ibu;
		}
		
		else
		{
			$input = (object) $this->input->post(null, true);
			$input->foto = $ibu->foto;
		}

		if(!empty($_FILES) && $_FILES['foto']['size'] > 0)
		{
			$ext = "";
			if($_FILES['foto']['type'] == 'image/png') {
				$ext = 'png';
			} else {
				$ext = 'jpg';
			}

			$fotoFileName = date('YmdHis');
			$upload = $this->ibu->uploadfoto('foto', $fotoFileName);

			if($upload)
			{
				$input->foto = "$fotoFileName.".$ext;
				$this->ibu->coverResize("foto", "./foto/$fotoFileName.".$ext, 455, 341);

				if ($ibu->foto) {
                    $this->ibu->deleteCover($ibu->foto);
            	}
			}

			
		}

		if(!$this->ibu->validate() || $this->form_validation->error_array())
		{
			$main_view = "ibu/Form";
			$form_action = "ibu/update/$id_ibu";
			$this->load->view("Template2", compact("input", "form_action", "main_view"));
			return;
		}

		if($this->ibu->where("id_ibu", $id_ibu)->update($input))
		{
			$this->session->set_flashdata("success", "Data Berhasil Di Update");
		}
		else
		{
			$this->session->set_flashdata("error", "Data Gagal di Update");
		}

		redirect("ibu");
	}

	public function delete() {
		$id_ibu = $this->input->post("id_ibu");

		$ibu = $this->db->where("id_ibu", $id_ibu)->get("ibu")->row();

		if(!$ibu) {
			echo "data tidak ditemukan";
			die();
		}

		if($this->ibu->where("id_ibu", $id_ibu)->delete()) {
			$this->session->set_flashdata("success", "Data Berhasil Di Hapus");
			redirect("ibu");
		} else {
			$this->session->set_flashdata("error", "Data Gagal di Hapus");
			redirect("ibu");
		} 
	}

	public function nik_unik()
	{
		$nik = $this->input->post("nik");
		$id = $this->input->post("id_anggota");

		$this->anggota->where("nik", $nik);
		!$id || $this->anggota->where("id_anggota !=", $id);
		$anggota = $this->anggota->get();

		if(count($anggota))
		{
			$this->form_validation->set_message("nik_unik", "%s Sudah Di Gunakan");
			return false;
		}

		return true;
	}

	public function download()
        {
        		$this->load->library('excel');
        		$excel = $this->excel;
                $excel->setActiveSheetIndex(0)->setTitle('Export Data');
                //table header
                $excel->getActiveSheet()->setCellValue('A1', 'Id Ibu');
                $excel->getActiveSheet()->setCellValue('B1', 'Nama');
                $excel->getActiveSheet()->setCellValue('C1', 'Umur');

                $i = 1;

                $data = $this->db->get("ibu")->result();

                foreach($data as $data) {
              		$excel->getActiveSheet()->setCellValue('A'.++$i, $data->id_ibu);
                	$excel->getActiveSheet()->setCellValue('B'.$i, $data->nama_ibu);
                	$excel->getActiveSheet()->setCellValue('C'.$i, $data->umur_ibu);

                }
   
                $filename='export_data.xls';
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="'.$filename.'"');
                header('Cache-Control: max-age=0');
                            
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                $objWriter->save('php://output');
        }

   	public function cobs() {
   		$main_view = "Ibu/Coba_ibu";
   		$this->load->view("Template2", compact("main_view"));
   	}

	
}