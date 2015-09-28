<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Negocios extends CI_Controller {

	public function index()
		{
			$num_pag = $this->input->get('pagina');


			$data['negocios'] 			= $this->negociosm->getNegocios($num_pag);
			$numero						= $this->negociosm->getCantidad();
			$data['getCategorias']		= $this->modeloMostrar->getCategorias();

			$url = base_url()."negocios";
                                                
            $num_paginas = ceil($numero / CANT_ELEMENTOS_POR_PAGINA);

            $pagina = $this->input->get('pagina');
	    	if ($pagina == FALSE) $pagina = 1;

            $min = $pagina - 5;
            
            if ($min < 1) $min = 1;

            $max = $min + 10;

            if ($max >= $num_paginas) $max = $num_paginas;

            $data['url'] = $url;
            $data['num_paginas'] = $num_paginas;
            $data['min'] = $min;
            $data['max'] = $max;
            $data['pagina'] = $pagina;
			
			$this->load->view('fijos/header', $data);
			$this->load->view('body/negocios', $data);
			$this->load->view('fijos/footer');
		}
}		