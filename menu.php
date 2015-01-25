<?php
/****************************************************************************
* menu.php
*
* Realiza la precarga del menú de selección de raíces
*******************************************************************************/

define('MENU', true);

include ('paths.php');
include_once ($PFN_paths['include'].'basicweb.php');

$PFN_tempo->rexistra('preplantillas');

include ($PFN_paths['web'].'menu.inc.php');
include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['plantillas'].'menu.inc.php');
include ($PFN_paths['plantillas'].'pe.inc.php');
?>
