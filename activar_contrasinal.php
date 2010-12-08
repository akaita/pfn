<?php
/****************************************************************************
* activar_contrasinal.php
*
* Comprueba que el usuario puede recuperar su contraseña y envía un correo
* con ella
*******************************************************************************/

$sPFN = '';

session_start();
session_unset('sPFN');
session_write_close();

include ('paths.php');
include_once ($PFN_paths['include'].'class_tempo.php');
include_once ($PFN_paths['include'].'funcions.php');
include_once ($PFN_paths['include'].'class_conf.php');
include_once ($PFN_paths['include'].'class_vars.php');

$PFN_conf->carga();

$PFN_tempo->rexistra('precodigo');

$erro = 0;
$usuario = $PFN_vars->post('activar_usuario');
$contrasinal = md5($PFN_vars->post('activar_contrasinal'));

include ($PFN_paths['plantillas'].'cab.inc.php');

if (empty($usuario) || empty($contrasinal)) {
	$txt_erro = PFN___('activar_contrasinal_intro');

	include ($PFN_paths['plantillas'].'activar_contrasinal.inc.php');
} else {
	include_once ($PFN_paths['include'].'mysql.php');
	include_once ($PFN_paths['include'].'clases.php');
	include_once ($PFN_paths['include'].'class_usuarios.php');

	$PFN_usuarios->vars($PFN_vars);

	if ($PFN_usuarios->activar_contrasinal($usuario, $contrasinal)) {
		$erro = 1;
		$txt_erro = PFN___('activar_contrasinal_ok');

		include ($PFN_paths['plantillas'].'login.inc.php');
	} else {
		$txt_erro = PFN___('activar_contrasinal_erro');

		include ($PFN_paths['plantillas'].'activar_contrasinal.inc.php');
	}
}

$PFN_tempo->rexistra('preplantillas');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
