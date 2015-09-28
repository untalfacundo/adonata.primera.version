<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuenta extends CI_Controller {

	public function index()
		{
			$this->load->view('fijos/header');
			$this->load->view('body/cuenta');
			$this->load->view('fijos/footer');
		}	
}		