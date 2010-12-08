<?php
/****************************************************************************
* preferencias.php
*
* Precarga de los includes para la ejecución de la pantalla de preferencias
* del usuario
*******************************************************************************/

include ('paths.php');
include_once ($PFN_paths['include'].'basicweb.php');

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');
include ($PFN_paths['plantillas'].'posicion.inc.php');

$PFN_tempo->rexistra('opcions');

include ($PFN_paths['web'].'preferencias.inc.php');
include ($PFN_paths['plantillas'].'preferencias.inc.php');

$PFN_tempo->rexistra('preferencias');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
