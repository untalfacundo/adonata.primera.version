<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	public function index()
	{
		$this->load->view('fijos/header');
		$this->load->view('body/add');
		$this->load->view('fijos/footer');

	}

}