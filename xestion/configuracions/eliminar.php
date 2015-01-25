<?php
/****************************************************************************
* xestion/configuracions/eliminar.inc.php
*
* Elimina un fichero de configuración y sus relaciones en la base de datos
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

PFN_quita_url_SERVER('id');

session_write_close();

$ok = 0;
$erros = array();

$id = $PFN_vars->get('id');
$existe = $PFN_usuarios->init('configuracion', $id);
$nome_arq = $PFN_paths['conf'].$PFN_niveles->nome_correcto($PFN_usuarios->get('conf').'.inc.php');

if (!$existe) {
	$erros[] = 18;
} elseif ($PFN_usuarios->get('vale') != 1) {
	$erros[] = 25;
} elseif ($PFN_usuarios->init('configuracion_raices', $id)) {
	$erros[] = 26;
} elseif ($PFN_usuarios->init('configuracion_grupos', $id)) {
	$erros[] = 27;
}

if (count($erros) == 0) {
	$PFN_usuarios->accion('conf_eliminar', $id);
	@unlink($nome_arq);
}

$ok = count($erros)?false:4;

if ($ok) {
	Header('Location: index.php?'.PFN_cambia_url(array('id', 'ok'), array(false, $ok), false, true));
} else {
	Header('Location: resumo.php?'.PFN_cambia_url(array('id', 'erros'), array($id, implode(',', $erros)), false, true));
}

exit;
?>
