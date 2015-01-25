<?php
/****************************************************************************
* arbore.php
*
* Precarga los includes para arbore.inc.php
*******************************************************************************/

include ('paths.php');
include ($PFN_paths['include'].'basicweb.php');

session_write_close();

$PFN_tempo->rexistra('preplantillas');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['plantillas'].'posicion.inc.php');
include ($PFN_paths['web'].'arbore.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
