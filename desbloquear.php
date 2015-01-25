<?php
/****************************************************************************
* reactivar.php
*
* Activa un usuario que ha sido bloqueado por excesivos intentos de acceso
* fallidos
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

if (($PFN_vars->post('desbloquear_usuario') != '')
&& ($PFN_vars->post('desbloquear_email') != '')) {
	include_once ($PFN_paths['include'].'mysql.php');
	include_once ($PFN_paths['include'].'clases.php');
	include_once ($PFN_paths['include'].'class_encriptar.php');
	include_once ($PFN_paths['include'].'class_usuarios.php');

	$PFN_usuarios->vars($PFN_vars);

	$ok = $PFN_usuarios->correo_desbloqueo();

	if ($ok === 1) {
		$txt_erro = PFN___('avisos_desbloquear_usuario_1');
	} else {
		$txt_erro = PFN___('avisos_desbloquear_usuario_'.$ok);
	}
} else {
	$txt_erro = PFN___('txt_desbloquear_usuario');
}

$PFN_tempo->rexistra('preplantillas');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['plantillas'].'desbloquear.inc.php');
include ($PFN_paths['plantillas'].'pe.inc.php');
?>
