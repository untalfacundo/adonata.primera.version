<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crearcuenta extends CI_Controller {

	public function index()
		{
			$this->load->view('fijos/header');
			$this->load->view('body/crearcuenta');
			$this->load->view('fijos/footer');
		}
}