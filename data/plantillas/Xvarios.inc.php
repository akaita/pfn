<?php
/****************************************************************************
* data/plantillas/Xvarios.inc.php
*
* plantilla para la visualización de la administración diversa
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('xestion').' &raquo; '.PFN___('Xvarios'); ?></h1></div>
	<div class="bloque_info">
		<?php include ($PFN_paths['plantillas'].'Xvarios_indexador.inc.php'); ?>

		<?php include ($PFN_paths['plantillas'].'Xvarios_logs.inc.php'); ?>
	</div>
</div>
