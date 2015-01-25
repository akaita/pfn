<?php
/****************************************************************************
* paths.php
*
* Carga las rutas necesarias para la realización de los includes y requires
*******************************************************************************/

define('OK', true);

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$PFN_version = '1000';
$borra_cache = true;
$b = str_replace('\\', '/', dirname(__FILE__));

$PFN_paths = array(
	'web' => $b.'/',
	'tmp' => $b.'/data/servidor/tmp/',
	'xestion' => $b.'/xestion/',
	'data' => $b.'/data/',
	'conf' => $b.'/data/conf/',
	'plantillas' => $b.'/data/plantillas/',
	'logs' => $b.'/data/servidor/logs/',
	'idiomas' => $b.'/data/idiomas/',
	'include' => $b.'/data/include/',
	'accions' => $b.'/data/accions/',
	'info' => $b.'/data/servidor/info/',
	'extra' => $b.'/data/servidor/extra/',
	'bin' => $b.'/data/bin/',
	'servidor' => $b.'/data/servidor/'
);
?>
