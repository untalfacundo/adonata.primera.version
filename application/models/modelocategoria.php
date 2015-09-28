<?php

class ModeloCategoria extends CI_Model {
	public function __construct()
	{
		

	}	
	/* MODELOS PARA OBTENER LA ID DE CADA SLUG Y USARLOS EN HOME*/
	public function getId_cat($slugCategoria = NULL)
	{
		if ($slugCategoria == NULL) return FALSE;

		$sql = "SELECT id FROM categorias WHERE slug = '$slugCategoria' LIMIT 1";

		$result = $this->db->query($sql);

		if ($result->num_rows() > 0) 
		{
			$result = $result->result_array();
			return $result[0]['id'];
		}

		return FALSE;

	}

	public function getId_subcat($slugSubcategoria = NULL)
	{
		if ($slugSubcategoria == NULL) return FALSE;

		$sql = "SELECT id FROM subcategorias WHERE slug = '$slugSubcategoria' LIMIT 1";

		$result = $this->db->query($sql);

		if ($result->num_rows() > 0) 
		{
			$result = $result->result_array();
			return $result[0]['id'];
		}

		return FALSE;

	}	

	public function getId_anuncio($slugAnuncio = NULL)
	{
		if ($slugAnuncio == NULL) return FALSE;

		$sql = "SELECT id FROM anuncios WHERE slug = '$slugAnuncio' LIMIT 1";

		$result = $this->db->query($sql);

		if ($result->num_rows() > 0) 
		{
			$result = $result->result_array();
			return $result[0]['id'];
		}


		return FALSE;

	}
	/* FIN MODELOS PARA OBTENER LA ID DE CADA SLUG Y USARLOS EN HOME*/
	/* MUESTRA LOS ANUNCIOS SEGUN LA CATEGORIA VISTA CATEGORIA CONTROLADOR HOME/LISTADO CON CONDICION LIMIT PARA PAGINATION*/
	public function anunciosCategoria($id_categoria, $num_pag)
	{
		$max 	= CANT_ELEMENTOS_POR_PAGINA;

		$inicio = ($num_pag - 1) * $max;

		$resultado = ($inicio == -10) ? FALSE : TRUE;

		if ($resultado == FALSE) $inicio = 0;

		if ($id_categoria == "") $id_categoria = 1;

		$sql	= 	"SELECT A.nombre, A.direccion, C.categoria, S.subcategoria, A.infoGral, A.slug slugA, C.slug slugC, S.slug slugS
					FROM categorias C
					INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
					INNER JOIN anuncios A ON CD.id_anuncio = A.id
					INNER JOIN subcategorias S ON S.id_categoria = C.id
					INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
					INNER JOIN telefonos T ON T.id_anuncio = A.id
					INNER JOIN localidades L ON A.id_localidad = L.id
					INNER JOIN provincias P ON P.id = L.id_provincia
					WHERE CD.id_categoria = $id_categoria
					LIMIT $inicio, $max
					";


		$result = $this->db->query($sql);

		if($result->num_rows() > 0)
		{
			$result = $result->result_array();
			return $result;
		}            	

		return array();			

	}
	/* FIN MUESTRA LOS ANUNCIOS SEGUN LA CATEGORIA VISTA CATEGORIA CONTROLADOR HOME/LISTADO CON CONDICION LIMIT PARA PAGINATION*/
	/* MUESTRA LOS ANUNCIOS SEGUN LA SUBCATEGORIA VISTA SUBCATEGORIA CONTROLADOR HOME/SUBLISTADO CON CONDICION LIMIT PARA PAGINATION*/

	public function anunciosSubcategoria($id_subcategoria, $num_pag)
	{
		$max	= CANT_ELEMENTOS_POR_PAGINA;

		$inicio	= ($num_pag - 1) * $max;

		$resultado = ($inicio == -10) ? FALSE : TRUE;

		if ($resultado == FALSE) $inicio = 0;

		if ($id_subcategoria == "") $id_subcategoria = 1;

		$sql	= 	"SELECT A.nombre, A.direccion, C.categoria, S.subcategoria, A.infoGral, A.slug slugA, C.slug slugC, S.slug slugS 
					FROM categorias C
					INNER JOIN categoria_del_anuncio CD ON CD.id_categoria = C.id
					INNER JOIN anuncios A ON CD.id_anuncio = A.id
					INNER JOIN subcategorias S ON S.id_categoria = C.id
					INNER JOIN subcategoria_del_anuncio SB ON SB.id_subcategoria = S.id AND SB.id_anuncio = A.id
					INNER JOIN telefonos T ON T.id_anuncio = A.id
					INNER JOIN localidades L ON A.id_localidad = L.id
					INNER JOIN provincias P ON P.id = L.id_provincia
					WHERE SB.id_subcategoria = $id_subcategoria
					LIMIT $inicio, $max
					";

		$result = $this->db->query($sql);

		if($result->num_rows() > 0)
		{
			$result = $result->result_array();
			return $result;
		}            	

		return array();				
	}
	/* FIN MUESTRA LOS ANUNCIOS SEGUN LA SUBCATEGORIA VISTA SUBCATEGORIA CONTROLADOR HOME/SUBLISTADO CON CONDICION LIMIT PARA PAGINATION*/
}	

