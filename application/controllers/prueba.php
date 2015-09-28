<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prueba extends CI_Controller {

	public function index()
		{
			$this->load->view('fijos/header');
			$this->load->view('body/prueba');
			$this->load->view('fijos/footer');
		}
}		