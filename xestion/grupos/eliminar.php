<?php
/****************************************************************************
* xestion/grupos/eliminar.php
*
* Elimina un grupo y sus relaciones
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

$erros = array();
$id = intval($PFN_vars->get('id'));

if (empty($id) || ($sPFN['usuario']['id_grupo'] == $id)) {
	$erros[] = 16;
} else {
	$query = 'DELETE FROM '.$PFN_usuarios->tabla('grupos')
		.' WHERE id="'.$id.'";';
	
	if ($PFN_usuarios->actualizar($query) == -1) {
		$erros[] = 6;
	} else {
		$query = 'DELETE FROM '.$PFN_usuarios->tabla('r_g_c')
			.' WHERE id_grupo="'.$id.'";';
		$PFN_usuarios->actualizar($query);
	}
}

$ok = count($erros)?false:2;

Header('Location: index.php?'.PFN_cambia_url(array('id','erros','ok'), array(false, implode(',', $erros), $ok), false, true));
exit;
?>
