<?php
/****************************************************************************
* axuda.php
*
* Carga lo necesario para la visualización de la ayuda
*******************************************************************************/

include ('paths.php');
include_once ($PFN_paths['include'].'basicweb.php');

session_write_close();

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');

$PFN_tempo->rexistra('cabeceira');

include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('opcions');

include ($PFN_paths['plantillas'].'posicion.inc.php');

$PFN_tempo->rexistra('posicion');

include ($PFN_paths['plantillas'].'axuda.inc.php');

$PFN_tempo->rexistra('axuda');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
