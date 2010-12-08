<?php
/****************************************************************************
* xestion/informes/index.php
*
* Carga la pantalla para la visualizaci�n de informes sobre los logs
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

PFN_quita_url_SERVER(array('ud_ordenar','ud_modo','executa','ab_ordenar','ab_modo','ab_mes','ab_ano'));

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['xestion'].'informes/index.inc.php');
include ($PFN_paths['plantillas'].'Xinformes.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
