<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$num_pag = $this->input->get('pagina');                                 
		
		$negocio = $this->uri->segment(3);

		$categoria 		= (empty($_POST['categoria'])) ? $this->uri->segment(1) : $_POST['categoria'];
		$subcategoria 	= (empty($_POST['subcategoria'])) ? $this->uri->segment(2) : $_POST['subcategoria'];
		
		$nombreAnuncio = urldecode($this->input->get('busqueda'));

		if($nombreAnuncio != "")
			$this->mostrarAnuncio();
		else if (empty($categoria)) 
			$this->inicio();
		else if (empty($subcategoria))
			$this->listado($categoria, $subcategoria);
		else if (empty($negocio))
			$this->sublistado($categoria, $subcategoria);
		else
			$this->mostrar($categoria, $subcategoria, $negocio);	
	}

	public function enviar_formulario()
	{
		$mensaje = $_POST['message'];
		$mensaje.= "\n-------------------------\n";
		$mensaje.= "\nDe: ".$_POST['name'];
		$mensaje.= "\nE-mail: ".$_POST['email'];

		$destino = "elias.ghinaudo@gmail.com";
		$remitente = $_POST['email'];
		$asunto = $_POST['message'];

		$fecha = time();
		$fechaFormateada = date("J/n/Y", $fecha);

		mail($destino, $asunto, $mensaje, "FROM: $remitente");
		echo "Mensaje enviado";

		$this->load->view('fijos/header');
		$this->load->view('body/contacto');
		$this->load->view('fijos/footer');			
	}

	public function inicio()
	{
		$nombreAnuncio = urldecode($this->input->get('busqueda'));

		$data['anuncio']				= $this->modeloMostrar->getAnuncios();
		$data['sidebar']				= $this->negociosm->getSidebar();
		$data['getCategorias'] 			= $this->modeloMostrar->getCategorias();
		$data['getNegocio']				= $this->modeloMostrar->buscador($nombreAnuncio);

		$this->load->view('fijos/header', $data);
		$this->load->view('body/sliderbox', $data);
		$this->load->view('fijos/footer');
				
	}
	/* VISTA CATEGORIA*/
	public function listado($categoria = NULL, $subcategoria = NULL)
	{
		if ($categoria == NULL) $this->inicio();

		$id_categoria 		= $this->modeloCategoria->getId_cat($categoria);

		$num_pag = $this->input->get('pagina');
	
		$data['anunciosCategoria'] 		= $this->modeloCategoria->anunciosCategoria($id_categoria, $num_pag);
		$data['anunciosLimitados']		= $this->modeloMostrar->getAnunciosLimitados($id_categoria);
		$data['getCategorias']			= $this->modeloMostrar->getCategorias();/**/
		$data['getSubcategoria']		= $this->modeloMostrar->getSubcategoria($id_categoria);/**/

		$getCantidad = $this->modeloMostrar->getCantidad($id_categoria);

	    $url = base_url()."$categoria";
	    
	    $num_paginas = ceil($getCantidad / CANT_ELEMENTOS_POR_PAGINA);

	    $pagina = $this->input->get('pagina');
	    if ($pagina == FALSE) $pagina = 1;

	    $min = $pagina - 5;
	    
	    if ($min < 1) $min = 1;

	    $max = $min + 10;

	    if ($max >= $num_paginas) $max = $num_paginas;

		$data['pagina'] = $pagina;
		$data['max'] = $max;
		$data['min'] = $min;
		$data['num_paginas'] = $num_paginas;
		$data['url'] = $url;

		$this->load->view('fijos/header', $data);
		$this->load->view('body/categoria', $data);
		$this->load->view('fijos/footer');
	}
	/* FIN VISTA CATEGORIA*/
	/* VISTA SUBCATEGORIA*/
	public function sublistado($categoria = NULL, $subcategoria = NULL)
	{
		if ($subcategoria == NULL) $this->listado();
		
		$negocio = $this->uri->segment(3);

		$id_categoria 		= $this->modeloCategoria->getId_cat($categoria);
		$id_subcategoria 	= $this->modeloCategoria->getId_subcat($subcategoria);

		$num_pag = $this->input->get('pagina');

		$data['anunciosSubcategoria']	= $this->modeloCategoria->anunciosSubcategoria($id_subcategoria, $num_pag);
		$data['subanunciosLimitados']	= $this->modeloMostrar->getSubAnunciosLimitados($id_subcategoria);
		$data['getCategorias']			= $this->modeloMostrar->getCategorias();/**/
		$data['getSubcategoria']		= $this->modeloMostrar->getSubcategoria($id_categoria);/**/

		$getCantidad = $this->modeloMostrar->getCantidad($id_categoria);

		$url = base_url()."$categoria/$subcategoria";        
                                            
        $num_paginas = ceil($getCantidad / CANT_ELEMENTOS_POR_PAGINA);

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
		$this->load->view('body/subcategoria', $data);
		$this->load->view('fijos/footer');
	}
	/* FIN VISTA SUBCATEGORIA*/
	/* VISTA DEL ANUNCIO POR EL BUSCADOR*/
	public function mostrarAnuncio()
	{
		$nombreAnuncio = $this->input->get('busqueda');

		$data['getNegocio']				= $this->modeloMostrar->buscador($nombreAnuncio);
		$data['getCategorias']			= $this->modeloMostrar->getCategorias();
		$data['getSubcategoria']		= $this->modeloMostrar->subcategoriaSegunBuscador($nombreAnuncio);

		if (empty($data['getNegocio']) == TRUE) {
			$var = TRUE;
		}
		else
			$var = FALSE;

		$data['sinNegocio'] = $var;

		$this->load->view('fijos/header', $data);
		$this->load->view('body/mostrarAnuncio', $data);
		$this->load->view('fijos/footer');
	}
	/* FIN VISTA DEL ANUNCIO POR EL BUSCADOR*/
	/* VISTA DEL ANUNCIO*/
	public function mostrar($categoria = NULL, $subcategoria = NULL, $negocio = NULL)
	{
		if ($negocio = NULL) $this->sublistado();

		$categoria = $this->uri->segment(1);
		$subcategoria = $this->uri->segment(2);
		$negocio = $this->uri->segment(3);

		$id_categoria 		= $this->modeloCategoria->getId_cat($categoria);
		$id_subcategoria 	= $this->modeloCategoria->getId_subcat($subcategoria);
		$id_negocio 		= $this->modeloCategoria->getId_anuncio($negocio);

		$data['getNegocio'] 			= $this->modeloMostrar->getNegocio($id_categoria, $id_subcategoria, $id_negocio);
		$data['anunciosLimitados']		= $this->modeloMostrar->getAnunciosLimitados($id_categoria);
		$data['getCategorias']			= $this->modeloMostrar->getCategorias();

		$this->load->view('fijos/header', $data);
		$this->load->view('body/negocio', $data);
		$this->load->view('fijos/footer');
	}
	/* FIN VISTA DEL ANUNCIO*/
	public function pr()
	{
		redirect('/asdasd');
	}
}
