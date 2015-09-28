<?php
class Negociosm extends CI_Model {
	public function __construct()
		{
			

		}

			/**
			* 
			*		public function getNegocios($id_categoria, $id_subcategoria, $num_pag)
			*  		{
			* 			$max = CANT_ELEMENTOS_POR_PAGINA;
			*	
			*   		$inicio = ($num_pag - 1) * $max;  
			*
			*		    $sql 	= 	"SELECT A.id, A.nombre, A.direccion, A.infoGral, A.nombre, A.web, A.url, C.categoria, S.subcategoria, A.slug, C.slug, S.slug, S.id, C.id 
			*		            	FROM categorias C
			*		            	INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
			*						INNER JOIN anuncios A ON CD.id_anuncio = A.id
			*						INNER JOIN subcategorias S ON S.id_categoria = C.id
			*						INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
			*						INNER JOIN telefonos T ON T.id_anuncio = A.id
			*						INNER JOIN localidades L ON A.id_localidad = L.id
			*						INNER JOIN provincias P ON P.id = L.id_provincia
			*						WHERE S.id = $id_subcategoria AND C.id = $id_categoria
			*		            	
			*		            	LIMIT $inicio, $max";		            	
			*
			*		    $result = $this->db->query($sql);
			*
			*		    if ($result->num_rows() > 0) 
			*		    {        
			*		        $result = $result->result_array();
			*		    	return $result;
			*		    }
			*
			*		    return array();
			*		}
			*/

	public function getNegocios($num_pag)
	{
		$max = CANT_ELEMENTOS_POR_PAGINA;

		$inicio = ($num_pag - 1) * $max;

		$sql = "SELECT A.id, A.nombre, A.direccion, A.infoGral, A.web, A.url, C.categoria, S.subcategoria, A.slug slugA, S.slug slugS, C.slug slugC
				FROM categorias C
            	INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
				INNER JOIN anuncios A ON CD.id_anuncio = A.id
				INNER JOIN subcategorias S ON S.id_categoria = C.id
				INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
				INNER JOIN telefonos T ON T.id_anuncio = A.id
				INNER JOIN localidades L ON A.id_localidad = L.id
				INNER JOIN provincias P ON P.id = L.id_provincia
            	
            	LIMIT $inicio, $max";
		
		$result = $this->db->query($sql);

		if($result->num_rows() > 0)
		{
			$result = $result->result_array();
			return $result;
		}            	

		return array();
	}	    

	public function getCantidad()
	{
		$numero =   "SELECT COUNT('id') cnt
					 FROM anuncios";

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

				/**
				*	LA ID VIENE DE LA TRANSFORMACION DEL SLUG CON EL METODO getId($slug = NULL) Y SLUG ES UN SEGMENTO DE LA URL EXTRAIDO POR URI. 
				*/

		$result = $this->db->query($sql);

		if ($result->num_rows() > 0) {
			
			$result = $result->result_array();
			return $result;
		}

		return array();		
	}

	public function getProvincia()
	{
		$sql = "SELECT P.provincia
				FROM provincias P 
				LIMIT 24";

		$result = $this->db->query($sql);
		
		if ($result->num_rows() > 0){

			$result = $result->result_array();
			return $result;
		}

		return array();		
	}

	public function getCategoria()
	{
		$sql = "SELECT C.categoria, A.nombre, A.direccion, A.infoGral
				FROM categorias C 
				INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
				INNER JOIN anuncios A ON CD.id_anuncio = A.id
				LIMIT 4";

		$result = $this->db->query($sql);		

		if($result->num_rows() > 0){

			$result = $result->result_array();
			return $result;
		}

		return array();
	}

	public function getCategorias()
	{
		$sql = "SELECT C.categoria 
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

	public function getSidebar()
	{
		$sql 	= 	"SELECT A.id, A.nombre, A.direccion, A.infoGral, A.nombre, A.web, A.url, A.slug slugA, C.categoria, C.slug slugC, S.slug slugS  
	            	FROM categorias C
	            	INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
					INNER JOIN anuncios A ON CD.id_anuncio = A.id
					INNER JOIN subcategorias S ON S.id_categoria = C.id
					INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
	            	
	            	LIMIT 0, 8";		            	

		    $result = $this->db->query($sql);

		    if ($result->num_rows() > 0) 
		    {        
		        $result = $result->result_array();
		    	return $result;
		    }

		    return array();
	}

	public function getId($slug = NULL)
	{
		if ($slug == NULL) return FALSE;

		$sql = "SELECT id FROM anuncios WHERE slug = '$slug' LIMIT 1";

		$result = $this->db->query($sql);

		if ($result->num_rows() > 0) 
		{
			$result = $result->result_array();
			return $result[0]['id'];
		}


		return FALSE;

		/**
		 * ESTA FUNCION HACE QUE EL SLUG SE TRANSFORME EN UN ID. O SIMPLEMENTE SE COMPARA EL SLUG DE LA CONSULTA CON $SLUG PARA EXTRAER EL ID.
		 * SI EL SLUG ES NULL RETORNA FALSE.
		 */
	}

	public function getSubcategorias()
	{	
		$sql = "SELECT S.subcategoria
				FROM subcategorias S
				LIMIT 20
				";

		$result = $this->db->query($sql);		

		if($result->num_rows() > 0){

			$result = $result->result_array();
			return $result;
		}

		return array();
	}

	public function getLocalidades()
	{
		$sql = "SELECT L.localidad
				FROM localidades L
				";

		$result = $this->db->query($sql);		

		if($result->num_rows() > 0){

			$result = $result->result_array($sql);		
			return $result;
		}
		
		return array();	
	}

	public function getId_cat($categoria = NULL)
	{
		if ($categoria == NULL) return FALSE;

		$sql = "SELECT id FROM categorias WHERE slug = '$categoria' LIMIT 1";

		$result = $this->db->query($sql);

		if ($result->num_rows() > 0) 
		{
			$result = $result->result_array();
			return $result[0]['id'];
		}

		return FALSE;

	}

	public function getId_subcat($subcategoria = NULL)
	{
		if ($subcategoria == NULL) return FALSE;

		$sql = "SELECT id FROM subcategorias WHERE slug = '$subcategoria' LIMIT 1";

		$result = $this->db->query($sql);

		if ($result->num_rows() > 0) 
		{
			$result = $result->result_array();
			return $result[0]['id'];
		}

		return FALSE;

	}


}