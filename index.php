<?php
/****************************************************************************
* index.php
*
* Carga lo necesario para la visualización de la pantalla de login
*******************************************************************************/

include ('paths.php');
include_once ($PFN_paths['include'].'class_tempo.php');
include_once ($PFN_paths['include'].'funcions.php');
include_once ($PFN_paths['include'].'class_conf.php');
include_once ($PFN_paths['include'].'class_vars.php');

if (is_dir($PFN_paths['web'].'instalar/')) {
	header('Location: instalar/index.php');
	exit;
}

$PFN_conf->carga();

$PFN_tempo->rexistra('preplantillas');

$erro = intval(base64_decode(urldecode($PFN_vars->get('erro'))));

if ($erro > 0) {
	$txt_erro = PFN___('alertas_login_'.$erro);
} else {
	$txt_erro = '';
}

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['plantillas'].'login.inc.php');
include ($PFN_paths['plantillas'].'pe.inc.php');
?>
