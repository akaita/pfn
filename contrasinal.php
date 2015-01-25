<?php
/****************************************************************************
* contrasinal.php
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

$ok = false;

if (($PFN_vars->post('recuperar_usuario') != '')
&& ($PFN_vars->post('recuperar_email') != '')) {
	include_once ($PFN_paths['include'].'mysql.php');
	include_once ($PFN_paths['include'].'clases.php');
	include_once ($PFN_paths['include'].'class_usuarios.php');

	$PFN_usuarios->vars($PFN_vars);

	$ok = $PFN_usuarios->nova_contrasinal();

	if ($ok === 1) {
		$txt_erro = PFN___('avisos_novo_contrasinal_1');
	} else {
		$txt_erro = PFN___('avisos_novo_contrasinal_'.$ok);
	}
} else {
	$txt_erro = PFN___('txt_novo_contrasinal');
}

$PFN_tempo->rexistra('preplantillas');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['plantillas'].'contrasinal.inc.php');
include ($PFN_paths['plantillas'].'pe.inc.php');
?>
