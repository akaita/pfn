<?php
/****************************************************************************
* navega.php
*
* Precarga de los includes para la ejecución de navega.inc.php
*******************************************************************************/

include ('paths.php');
include_once ($PFN_paths['include'].'basicweb.php');

session_write_close();

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');

$PFN_tempo->rexistra('cabeceira');

include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('opcions');

include_once ($PFN_paths['include'].'class_imaxes.php');
$PFN_imaxes = new PFN_Imaxes($PFN_conf);

include ($PFN_paths['web'].'navega.inc.php');

$PFN_tempo->rexistra('navega');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
