<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ibu_model extends MY_Model {

	public function getDefaultValues() {
		return [
			"nama_ibu" => "",
			"umur_ibu" => "",
			"foto" => "",
		];
	}

    public function getJumlah() {
        $sql = "SELECT COUNT(ibu.id_ibu) AS jumlah FROM ibu";
        return $this->db->query($sql)->row()->jumlah;
    }

	public function getValidationRules() {
		$validationRules = [

			[
				"field" => "nama_ibu",
				"label" => "Nama Ibu",
				"rules" => "trim|required"
			],
			[
				"field" => "umur_ibu",
				"label" => "Umur",
				"rules" => "trim|required"
			],
			[
				"field" => "foto",
				"label" => "Foto",
				"rules" => "trim"
			]
		];

		return $validationRules;
	}

	public function uploadFoto($fieldname, $filename)
    {
        $config = [
            'upload_path'      => './foto/',
            'file_name'        => $filename,
            'allowed_types'    => 'jpg|png',
            'max_size'         => 1024,     // 1MB
            'max_width'        => 0,
            'max_height'       => 0,
            'overwrite'        => true,
            'file_ext_tolower' => true,
        ];

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldname)) {
            // Upload OK, return uploaded file info.
            return $this->upload->data();
        } else {
            // Add error to $_error_array
            $this->form_validation->add_to_error_array($fieldname, $this->upload->display_errors('', ''));
            return false;
        }
    }

    public function coverResize($fieldname, $source_path, $width, $height)
    {
        $config = [
            'image_library'  => 'gd2',
            'source_image'   => $source_path,
            'maintain_ratio' => true,
            'width'          => $width,
            'height'         => $height,
        ];

        $this->load->library('image_lib', $config);

        if ($this->image_lib->resize()) {
            return true;
        } else {
            $this->form_validation->add_to_error_array($fieldname, $this->image_lib->display_errors('', ''));
            return false;
        }
    }



    public function deleteCover($imgFile) {
    	
        if (file_exists("./foto/$imgFile")) {
            unlink("./foto/$imgFile");
        }
    }

}