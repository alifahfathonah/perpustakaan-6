<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends MY_Model {

	public function getValidationRules()
	{
		$validationRules = 
		[
			[
				"field" => "password1",
				"label" => "password1",
				"rules" => "trim|required"
			],
			[
				"field" => "password2",
				"label" => "Password2",
				"rules" => "trim|required|callback_password"
			]
		];

		return $validationRules;
	}

	public function getValidationRules2()
	{
		$validationRules = 
		[
			[
				"field" => "password1",
				"label" => "Pas",
				"rules" => "trim"
			]
		];

		return $validationRules;
	}

	public function uploadProfile($fieldname, $filename)
    {
        $config = [
            'upload_path'      => './profile/',
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

    public function profileResize($fieldname, $source_path, $width, $height)
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



    public function deleteProfile($imgFile) {
    	
        if (file_exists("./profile/$imgFile")) {
            unlink("./profile/$imgFile");
        }
    }
}