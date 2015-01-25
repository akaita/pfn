<?php
/****************************************************************************
* xestion/index.php
*
* Carga la pantalla menú de administración de usuarios y raices
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

PFN_quita_url_SERVER(array('id','erros','ok'));

$PFN_tempo->rexistra('precarga');

$erros = array();
$ok = false;

if (strlen($PFN_vars->get('erros'))) {
	$erros = explode(',', $PFN_vars->get('erros'));
}

if (intval($PFN_vars->get('ok'))) {
	$ok = intval($PFN_vars->get('ok'));
}

$PFN_usuarios->init('configuracions');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['plantillas'].'Xconfiguracions.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
