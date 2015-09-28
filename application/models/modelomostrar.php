<?php
class ModeloMostrar extends CI_Model {
	public function __construct()
	{
		

	}
	/* MUESTRA EL LISTADO DE CATEGORIAS PARA MOSTRAR EN LA TOPBAR HOME*/
	public function getCategorias()
	{
		$sql = 		"SELECT C.categoria, C.slug 
					FROM categorias C
					LIMIT 20
					";

		$result = $this->db->query($sql);		

		if($result->num_rows() > 0){

			$result = $result->result_array();
			return $result;
		}

		return array();	
	}
	/* FIN MUESTRA EL LISTADO DE CATEGORIAS PARA MOSTRAR EN LA TOPBAR HOME*/
	public function getSubcategoria($id_categoria)
	{
		$sql =  	"SELECT DISTINCT C.categoria, S.subcategoria, S.slug 
					FROM categorias C 
					INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
					INNER JOIN anuncios A ON CD.id_anuncio = A.id
					INNER JOIN subcategorias S ON S.id_categoria = C.id
					INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
					WHERE CD.id_categoria = $id_categoria
					LIMIT 20";

		$result = $this->db->query($sql);		

		if($result->num_rows() > 0){

			$result = $result->result_array();
			return $result;
		}

		return array();		
	}
	/* METODO ENCARGADO DE MOSTRAR EL NEGOCIO DE FORMA PARTICULAR VISTA NEGOCIO CONTROLADOR HOME/MOSTRAR*/
	public function getNegocio($id_categoria, $id_subcategoria, $id_negocio)
	{
		$sql = "SELECT A.id, A.servicios, A.nombre, A.direccion, A.infoGral, A.nombre, A.web, A.url, T.telefono, T.caracteristica, L.localidad, P.provincia, A.lat, A.lng, L.id, A.slug slugA, C.slug slugC, S.slug slugS 
				FROM categorias C
            	INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
				INNER JOIN anuncios A ON CD.id_anuncio = A.id
				INNER JOIN subcategorias S ON S.id_categoria = C.id
				INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
				INNER JOIN telefonos T ON T.id_anuncio = A.id
				INNER JOIN localidades L ON A.id_localidad = L.id
				INNER JOIN provincias P ON P.id = L.id_provincia
				WHERE S.id = $id_subcategoria AND C.id = $id_categoria AND A.id = $id_negocio";

		$result = $this->db->query($sql);

		if ($result->num_rows() > 0) {
			
			$result = $result->result_array();
			return $result;
		}

		return array();		
	}
	/* FIN METODO ENCARGADO DE MOSTRAR EL NEGOCIO DE FORMA PARTICULAR VISTA NEGOCIO CONTROLADOR HOME/MOSTRAR*/
	/* MUESTRA UN GRUPO DE ANUNCIOS EN CATEGORIA VISTA CATEGORIA CONTROLADOR HOME/LISTADO*/
	public function getAnunciosLimitados($id_categoria)
	{
		$sql = 		"SELECT A.id, A.nombre, A.direccion, A.infoGral, A.web, A.url, S.subcategoria, C.categoria, C.slug slugC, S.slug slugS, A.slug slugA
	            	FROM categorias C
					INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
					INNER JOIN anuncios A ON CD.id_anuncio = A.id
					INNER JOIN subcategorias S ON S.id_categoria = C.id
					INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
					INNER JOIN telefonos T ON T.id_anuncio = A.id
					INNER JOIN localidades L ON A.id_localidad = L.id
					INNER JOIN provincias P ON P.id = L.id_provincia
	            	
	            	WHERE CD.id_categoria = $id_categoria
	            	
	            	LIMIT 0, 8";

	    $result = $this->db->query($sql);

	    if ($result->num_rows() > 0) 
	    {        
	        $result = $result->result_array();
	    	return $result;
	    }

	    return array();        	
	}
	/* FIN MUESTRA UN GRUPO DE ANUNCIOS EN CATEGORIA VISTA CATEGORIA CONTROLADOR HOME/LISTADO*/
	/* MUESTRA UN GRUPO DE ANUNCIOS EN SUBCATEGORIA VISTA SUBCATEGORIA CONTROLADOR HOME/SUBLISTADO*/
	public function getSubAnunciosLimitados($id_subcategoria)
	{
		$sql = 		"SELECT A.id, A.nombre, A.direccion, A.infoGral, A.web, A.url, S.subcategoria, C.categoria, C.slug slugC, S.slug slugS, A.slug slugA
	            	FROM categorias C
					INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
					INNER JOIN anuncios A ON CD.id_anuncio = A.id
					INNER JOIN subcategorias S ON S.id_categoria = C.id
					INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
					INNER JOIN telefonos T ON T.id_anuncio = A.id
					INNER JOIN localidades L ON A.id_localidad = L.id
					INNER JOIN provincias P ON P.id = L.id_provincia
	            	
	            	WHERE SB.id_subcategoria = $id_subcategoria
	            	
	            	LIMIT 0, 8";

	    $result = $this->db->query($sql);

	    if ($result->num_rows() > 0) 
	    {        
	        $result = $result->result_array();
	    	return $result;
	    }

	    return array();        	
	}
	/* FIN MUESTRA UN GRUPO DE ANUNCIOS EN CATEGORIA VISTA SUBCATEGORIA CONTROLADOR HOME/SUBLISTADO*/
	/* MUESTRA ANUNCIOS EN HOME*/
	public function getAnuncios()
	{
		$sql = 		"SELECT A.id, A.nombre, A.direccion, A.infoGral, A.nombre, A.web, A.url, A.slug slugA, C.categoria, C.slug slugC, S.slug slugS  
	            	FROM categorias C
	            	INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
					INNER JOIN anuncios A ON CD.id_anuncio = A.id
					INNER JOIN subcategorias S ON S.id_categoria = C.id
					INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
	            	
	            	LIMIT 1, 8";

    	$result = $this->db->query($sql);	

	    if ($result->num_rows() > 0) 
	    {        
	        $result = $result->result_array();
	    	return $result;
	    }

	    return array();        	
	}
	/* MUESTRA ANUNCIOS EN HOME*/
	/* METODO QUE CUENTA LA CANTIDAD DE FILAS DE LA BD PARA PAGINATION*/
	public function getCantidad($id_categoria)
	{
		$numero =   "SELECT COUNT('A.id') cnt
				 	FROM categorias C
	            	INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
					INNER JOIN anuncios A ON CD.id_anuncio = A.id
					INNER JOIN subcategorias S ON S.id_categoria = C.id
					INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
					WHERE CD.id_categoria = $id_categoria
					LIMIT 50";

		$result = $this->db->query($numero);

		if ($result->num_rows() > 0) 
		{      
	        $result = $result->result_array();
	        $result = $result[0]['cnt'];
		}			 
		else
			$result = 0;

		return $result;			 
	}
	/* FIN METODO QUE CUENTA LA CANTIDAD DE FILAS DE LA BD PARA PAGINATION*/
	/* BUSCADOR DE HOME*/
	public function buscador($nombreAnuncio)
	{
		$sql =		"SELECT A.nombre, A.direccion, C.categoria, S.subcategoria, A.infoGral, A.slug slugA, C.slug slugC, S.slug slugS
					FROM categorias C
					INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
					INNER JOIN anuncios A ON CD.id_anuncio = A.id
					INNER JOIN subcategorias S ON S.id_categoria = C.id
					INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
					INNER JOIN telefonos T ON T.id_anuncio = A.id
					INNER JOIN localidades L ON A.id_localidad = L.id
					INNER JOIN provincias P ON P.id = L.id_provincia
					WHERE A.nombre
					LIKE '%$nombreAnuncio%'
					LIMIT 20

					UNION

					SELECT A.nombre, A.direccion, C.categoria, S.subcategoria, A.infoGral, A.slug slugA, C.slug slugC, S.slug slugS
					FROM categorias C
					INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
					INNER JOIN anuncios A ON CD.id_anuncio = A.id
					INNER JOIN subcategorias S ON S.id_categoria = C.id
					INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
					INNER JOIN telefonos T ON T.id_anuncio = A.id
					INNER JOIN localidades L ON A.id_localidad = L.id
					INNER JOIN provincias P ON P.id = L.id_provincia
					WHERE S.subcategoria 
					LIKE '%$nombreAnuncio%'
					LIMIT 20

					UNION

					SELECT A.nombre, A.direccion, C.categoria, S.subcategoria, A.infoGral, A.slug slugA, C.slug slugC, S.slug slugS
					FROM categorias C
					INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
					INNER JOIN anuncios A ON CD.id_anuncio = A.id
					INNER JOIN subcategorias S ON S.id_categoria = C.id
					INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
					INNER JOIN telefonos T ON T.id_anuncio = A.id
					INNER JOIN localidades L ON A.id_localidad = L.id
					INNER JOIN provincias P ON P.id = L.id_provincia
					WHERE C.categoria 
					LIKE '%$nombreAnuncio%'
					LIMIT 20
					";

    	$result = $this->db->query($sql);	

	    if ($result->num_rows() > 0) 
	    {        
	        $result = $result->result_array();
	    	return $result;
	    }

	    return array(); 			

	}
	/* FIN BUSCADOR DE HOME*/
	/* DESPUES DE LA BUSQUEDA EN HOME EL METODO MUESTAR LAS SUBCATEGORIAS QUE TIENEN RELACION CON LA BUSQUEDA*/
	public function subcategoriaSegunBuscador($nombreAnuncio)
	{
		$sql =  	"SELECT DISTINCT C.categoria, S.subcategoria, S.slug, A.nombre 
					FROM categorias C 
					INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
					INNER JOIN anuncios A ON CD.id_anuncio = A.id
					INNER JOIN subcategorias S ON S.id_categoria = C.id
					INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
					WHERE A.nombre LIKE '%$nombreAnuncio%'
					GROUP BY C.categoria
					LIMIT 20";

		$result = $this->db->query($sql);		

		if($result->num_rows() > 0){

			$result = $result->result_array();
			return $result;
		}

		return array();
	}
	/* FIN DESPUES DE LA BUSQUEDA EN HOME EL METODO MUESTAR LAS SUBCATEGORIAS QUE TIENEN RELACION CON LA BUSQUEDA*/
}		