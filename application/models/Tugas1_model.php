<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas1_model extends MY_Model {

	public function getBook() {
        
    }

	public function coba() {
        return $this->db->select('gender, count(gender) as jumlah')->from("chart")->where("gender", "wanita")->group_by('gender')->get()->row()->jumlah;
    }

    public function coba2() {
        return $this->db->select('gender, count(gender) as jumlah')->from("chart")->where("gender", "pria")->group_by('gender')->get()->row()->jumlah;
    }
	
}