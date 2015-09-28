<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {

	public function index()
		{
			$data['getCategorias']			= $this->modeloMostrar->getCategorias();

			$this->load->view('fijos/header', $data);
			$this->load->view('body/contacto');
			$this->load->view('fijos/footer');
		}
}	