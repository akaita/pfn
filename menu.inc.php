<?php
/****************************************************************************
* menu.inc.php
*
* Carga lo necesario para la visualización del menú de selección de Raíz
*******************************************************************************/

defined('OK') or die();

unset($sPFN['raiz']);

$PFN_vars->session(array('sPFN','raiz'),'');

$PFN_usuarios->init('menu_raices', $sPFN['usuario']['id']);

if ($PFN_usuarios->filas() == 1) {
	$sPFN['raiz']['unica'] = true;	
	$sPFN['raiz']['id'] = $PFN_usuarios->get('id');	

	$PFN_vars->session('sPFN', $sPFN);

	session_write_close();

	Header ('Location: navega.php?id='.$PFN_usuarios->get('id').'&'.session_name().'='.session_id());
	exit;
} else {
	$PFN_vars->session('sPFN', $sPFN);

	session_write_close();
}
?>
