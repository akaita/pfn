<?php
/****************************************************************************
* data/include/Xusuarios.php
*
* Control de acceso de los usuarios a la administración
*******************************************************************************/

defined('OK') or die();

define('XESTION', true);

if (!$PFN_conf->g('usuario','admin')) {
	$PFN_usuarios->garda_rexistro('xestion',0);
	envia_erro(4);
}
?>
