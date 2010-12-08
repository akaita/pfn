<?php
/****************************************************************************
* arbore.inc.php
*
* Carga lo necesario para la visualización del árbol de directorios
*******************************************************************************/

defined('OK') or die();

include_once ($PFN_paths['include'].'class_arbore.php');
include_once ($PFN_paths['include'].'class_imaxes.php');

$PFN_imaxes = new PFN_Imaxes($PFN_conf);
$PFN_arbore = new PFN_Arbore($PFN_conf);

$PFN_arbore->imaxes($PFN_imaxes);
$PFN_arbore->carga_arbore($PFN_conf->g('raiz','path'), './', $PFN_vars->get('completo'));

include ($PFN_paths['plantillas'].'arbore.inc.php');
?>
