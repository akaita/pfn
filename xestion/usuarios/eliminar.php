<?php
/****************************************************************************
* xestion/usuarios/eliminar.php
*
* Elimina un usuario y su relaci�n con las raices
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

PFN_quita_url_SERVER('id');

session_write_close();

$erros = array();
$id = intval($PFN_vars->get('id'));

if (empty($id) || ($id == $sPFN['usuario']['id'])) {
	$erros[] = 13;
} else {
	$query = 'DELETE FROM '.$PFN_usuarios->tabla('usuarios')
		.' WHERE id="'.$id.'";';
	
	if ($PFN_usuarios->actualizar($query) == -1) {
		$erros[] = 6;
	} else {
		$query = 'DELETE FROM '.$PFN_usuarios->tabla('r_u')
			.' WHERE id_usuario="'.$id.'";';
		$PFN_usuarios->actualizar($query);

		$info_usuario = $PFN_paths['info'].'usuario'.$id;

		if (is_dir($info_usuario)) {
			include_once ($PFN_paths['include'].'class_accions.php');

			$PFN_conf->p(false, 'logs', 'accions');

			$PFN_accions = new PFN_Accions($PFN_conf);
			$PFN_accions->eliminar($info_usuario);
		}
	}
}

$ok = count($erros)?false:2;

Header('Location: index.php?'.PFN_cambia_url(array('id','erros','ok'), array(false, implode(',', $erros), $ok), false, true));
exit;
?>
