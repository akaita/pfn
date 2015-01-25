<?php
/****************************************************************************
* data/plantillas/arbore.inc.php
*
* plantilla para la visualización del árbol de directorios
*******************************************************************************/

defined("OK") or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('arbore'); ?></h1></div>
	<div class="bloque_info" style="float: right;">
		<?php if ($PFN_vars->get('completo')) { ?>
			<a href="<?php echo PFN_quita_url('completo'); ?>"><?php echo PFN___('so_directorios'); ?></a>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			[<?php echo PFN___('arbore_completo'); ?>]
		<?php } else { ?>
			[<?php echo PFN___('so_directorios'); ?>]
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="<?php echo PFN_cambia_url('completo','true'); ?>"><?php echo PFN___('arbore_completo'); ?></a>
		<?php } ?>
	</div>

	<div class="bloque_info">
		<?php echo $PFN_arbore->cnt('dir').' '.PFN___('dirs'); ?>
		<?php if ($PFN_vars->get('completo')) { ?>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<?php echo $PFN_arbore->cnt('arq').' '.PFN___('arqs'); ?>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<?php echo PFN___('peso').' '.PFN_peso($PFN_arbore->cnt('peso')); ?>
		<?php } ?>
	</div>

	<div class="bloque_info"><?php echo $PFN_arbore->arbore_txt; ?></div>
</div>
