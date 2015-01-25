<?php
/*******************************************************************************
* instalar/include/nada.inc.php
*
* Ejecuta la pantalla de fin de instalación o de error
*******************************************************************************/

defined('OK') or die();

if (is_array($actual) && is_writable($PFN_paths['conf'].'basicas.inc.php')) {
	if ($con = @mysql_connect($actual['db']['host'], $actual['db']['usuario'], $actual['db']['contrasinal'])) {
		if (!@mysql_select_db($actual['db']['base_datos'], $con)) $erro[] = 18;
	} else $erro[] = 17;	
}
if (!is_writable($PFN_paths['conf'])) $erro[] = 19;
if (!is_writable($PFN_paths['tmp'])) $erro[] = 21;
if (!is_writable($PFN_paths['logs'])) $erro[] = 22;
if (!is_writable($PFN_paths['info'])) $erro[] = 23;

$accion = 'nada';

if (is_array($erro)) {
	include ($PFN_paths['instalar'].'plantillas/cab_instalar.inc.php');
} else {
	include ($PFN_paths['instalar'].'plantillas/ok.inc.php');
}

@mysql_close($con);
?>
