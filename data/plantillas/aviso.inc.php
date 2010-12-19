<?php
/****************************************************************************
* data/plantillas/aviso.inc.php
*
* plantilla para la visualización de un aviso
*******************************************************************************/

defined('OK') or die();
?>

		<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___($accion); ?></h1></div>

		<div class="bloque_info">
			<div class="aviso_info">
				<?php echo $estado_accion; ?>
				<br /><br /><a href="#" onclick="history.back(); return false;">&laquo; <?php echo PFN___('volver'); ?></a>
			</div>
		</div>
	</div>
</div>
