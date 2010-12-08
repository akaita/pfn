<?php
/****************************************************************************
* xestion/traduccion/index.php
*
* Carga la pantalla de descarga y subida de textos traducidos
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['xestion'].'traduccion/index.inc.php');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['plantillas'].'Xtraduccion.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
