<?php
/*******************************************************************************
* instalar/include/paso_2.inc.php
*
* Segundo paso de la instalación
*******************************************************************************/

defined('OK') or die();

$erros = false;
$comprobar = array();

if (is_writable($PFN_paths['servidor']) && file_exists($PFN_paths['servidor'].'.')) {
	$comprobar[0] = 1;
} else {
	$erros = true;
}

if (is_writable($PFN_paths['conf']) && file_exists($PFN_paths['conf'].'.')) {
	$comprobar[1] = 1;
} else {
	$erros = true;
}

if (($basicas['version'] > 0) && is_writable($PFN_paths['conf'].'basicas.inc.php')) {
	$comprobar[2] = 1;
} elseif ($basicas['version'] == 0) {
	$comprobar[2] = 1;
} else {
	$erros = true;
}

include ($PFN_paths['instalar'].'plantillas/paso_2.inc.php');
?>
