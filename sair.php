<?php
/****************************************************************************
* sair.php
*
* Cierra sesión y redirige hacia el destino especificado
*******************************************************************************/

include ('paths.php');
include_once ($PFN_paths['include'].'class_tempo.php');
include_once ($PFN_paths['include'].'borra_cache.php');
include_once ($PFN_paths['include'].'funcions.php');
include_once ($PFN_paths['include'].'class_conf.php');
include_once ($PFN_paths['include'].'class_vars.php');
include_once ($PFN_paths['include'].'mysql.php');
include_once ($PFN_paths['include'].'clases.php');
include_once ($PFN_paths['include'].'class_sesion.php');
include_once ($PFN_paths['include'].'class_usuarios.php');
include_once ($PFN_paths['include'].'usuarios.php');

$PFN_conf->carga();

if (!$PFN_conf->g('manter_sesion')) {
	$PFN_sesion->encriptar(true,false);
}

$PFN_usuarios->garda_rexistro('sair',1);

$url = $PFN_conf->g('saida');

$sPFN = '';

session_unregister('sPFN');

if ($PFN_conf->g('manter_sesion')) {
	$url .= (strstr($url, '?')?'&':'?').session_name().'='.session_id();
} else {
	session_unset();
	session_destroy();
}

session_write_close();

Header('Location: '.$url);
exit;
?>
