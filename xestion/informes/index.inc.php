<?php
/****************************************************************************
* xestion/informes/index.inc.php
*
* Prepara los datos para ser mostrador en el informe
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$executa = $PFN_vars->post('executa').$PFN_vars->get('executa');
$erros = array();
$log = array();
$lineas = 0;
$txt = '';
$i = 1;

if ($executa == 'mysql') {
	include_once ($PFN_paths['xestion'].'informes/mysql.inc.php');
} elseif ($executa == 'accions') {
	include_once ($PFN_paths['xestion'].'informes/accions.inc.php');
} elseif ($executa == 'accesos') {
	include_once ($PFN_paths['xestion'].'informes/accesos.inc.php');
} elseif ($executa == 'uso_disco') {
	include_once ($PFN_paths['xestion'].'informes/uso_disco.inc.php');
} elseif ($executa == 'ancho_banda') {
	include_once ($PFN_paths['xestion'].'informes/ancho_banda.inc.php');
}
?>
