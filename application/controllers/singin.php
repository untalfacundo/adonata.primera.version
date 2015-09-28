<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Singin extends CI_Controller {

	public function index()
		{
			$this->load->view('fijos/header');
			$this->load->view('body/singin');
			$this->load->view('fijos/footer');
		}	
}		