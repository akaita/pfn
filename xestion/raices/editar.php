<?php
/****************************************************************************
* xestion/raices/editar.php
*
* Carga la pantalla para la administraci�n de una ra�z
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

PFN_quita_url_SERVER('id');

session_write_close();

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

$id = $PFN_vars->get('id');

include ($PFN_paths['xestion'].'raices/editar.inc.php');
include ($PFN_paths['plantillas'].'Xraiz.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
