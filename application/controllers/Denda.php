<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Denda extends Operator_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($page = null)
	{
		$dendas = $this->denda->getAll($page);
		$jumlah = $this->denda->total();
		$pagination = $this->denda->makePagination(site_url("Denda"), 2, $jumlah);
		$main_view = "denda/index";
		$this->load->view("Template", compact("main_view", "jumlah","dendas", "pagination"));
	}

}