<?php
/****************************************************************************
* nagega.inc.php
*
* Carga lo necesario para la visualización de la navegación principal
*******************************************************************************/

defined('OK') or die();

$PFN_tempo->rexistra('i:navega');

$lista = $PFN_vars->get('lista');
$orde = $PFN_vars->get('orde');
$pos = $PFN_vars->get('pos');

$PFN_niveles->posicion($lista);
$cada = $PFN_niveles->get_contido($PFN_conf->g('raiz','path').$dir,$orde,$pos);

$cnt_dir = $PFN_niveles->cnt('dir');
$cnt_arq = $PFN_niveles->cnt('arq');
$cnt_peso = PFN_peso($PFN_niveles->cnt('peso'));

if ($PFN_conf->g('inc','estado')) {
	include_once ($PFN_paths['include'].'class_inc.php');
	$PFN_inc = new PFN_INC($PFN_conf);

	$PFN_inc->carga_datos($PFN_conf->g('raiz','path').$dir.'/');
}

$PFN_tempo->rexistra('f:navega');

include ($PFN_paths['plantillas'].'posicion.inc.php');

$PFN_tempo->rexistra('posicion');

include ($PFN_paths['plantillas'].'navega.inc.php');
?>
