<?php
/****************************************************************************
* data/plantillas/copiar.inc.php
*
* plantilla para la visualización de la acción de copiar
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>
		<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('copiar_'.$tipo); ?></h1></div>
		<form action="accion.php?<?php echo PFN_cambia_url('accion','copiar',false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<input type="hidden" name="cal" value="<?php echo $cal; ?>" />
		<div class="aviso_info"><?php echo $adv; ?></div>

		<div style="width: 100%; text-align: center;">
			<table summary=""><tr><td style="text-align: left;"><?php echo $PFN_arbore->arbore_txt; ?></td></tr></table>
			<p>
			<input type="reset" value=" <?php echo PFN___('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" />
			<input type="submit" value=" <?php echo PFN___('aceptar'); ?> " class="boton" style="margin-left: 40px;" />
			</p>
		</div>

		</fieldset>
		</form>
	</div>
</div>
