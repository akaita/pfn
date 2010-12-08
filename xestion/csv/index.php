<?php
/****************************************************************************
* xestion/csv/index.php
*
* Carga la pantalla de importacion masiva de usuarios y raices
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['xestion'].'csv/index.inc.php');
include ($PFN_paths['plantillas'].'Xcsv.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
