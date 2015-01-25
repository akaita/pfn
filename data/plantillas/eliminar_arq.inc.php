<?php
/****************************************************************************
* data/plantillas/eliminar_arq.inc.php
*
* plantilla para la visualización de la acción de eliminar un fichero
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>

		<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('eliminar_arq'); ?></h1></div>
		<form action="accion.php?<?php echo PFN_cambia_url('accion','eliminar',false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<input type="hidden" name="cal" value="<?php echo $cal; ?>" />
		<div class="aviso_info"><?php echo PFN___('estado_eliminar_arq_2'); ?></div>

		<div style="text-align: center; margin-top: 10px;">
			<input type="reset" value=" <?php echo PFN___('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" />
			<input type="submit" value=" <?php echo PFN___('aceptar'); ?> " class="boton" style="margin-left: 40px;" />
		</div>
		</fieldset>
		</form>
	</div>
</div>
