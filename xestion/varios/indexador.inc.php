<?php
/****************************************************************************
* xestion/varios/indexador.inc.php
*
* Realiza el proceso de reindexación de ficheros y directorios
*******************************************************************************/

$id_raiz = intval($PFN_vars->post('indexador_id_raiz'));

if ($id_raiz > 0) {
	$PFN_usuarios->init('raiz', $id_raiz);

	if ($PFN_usuarios->filas() === 1) {
		include_once ($PFN_paths['include'].'class_inc.php');
		include_once ($PFN_paths['include'].'class_indexador.php');

		$PFN_inc = new PFN_INC($PFN_conf);
		$PFN_indexador = new PFN_Indexador($PFN_conf);

		$PFN_indexador->niveles($PFN_niveles);
		$PFN_indexador->inc($PFN_inc);

		$txt = $PFN_indexador->reindexar($PFN_usuarios->get('id'), $PFN_usuarios->get('path'));
	} else {
		$erros[] = 36;
	}
} else {
	$erros[] = 36;
}
?>
