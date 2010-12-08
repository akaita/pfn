<?php
/****************************************************************************
* data/plantillas/eliminar_dir.inc.php
*
* plantilla para la visualización de la acción de eliminar un directorio
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>

		<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('eliminar_dir'); ?></h1></div>
		<form action="accion.php?<?php echo PFN_cambia_url('accion','eliminar',false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<input type="hidden" name="cal" value="<?php echo $cal; ?>" />
		<div class="aviso_info"><?php echo $adv; ?></div>

		<div style="text-align: center; margin-top: 10px;">
			<input type="reset" value=" <?php echo PFN___('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" />
			<input type="submit" value=" <?php echo PFN___('aceptar'); ?> " class="boton" style="margin-left: 40px;" />
		</div>

		<div style="text-align: center; width: 100%;">
		<table summary=""><tr><td style="text-align: left;"><?php echo $PFN_arbore->arbore_txt; ?></td></tr></table>
		</div>

		</fieldset>
		</form>
	</div>
</div>
