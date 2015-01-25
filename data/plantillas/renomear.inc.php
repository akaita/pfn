<?php
/****************************************************************************
* data/plantillas/renomear.inc.php
*
* plantilla para la visualización de la acción de renombrar un fichero
* o directorio
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>
		<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('renomear'); ?></h1></div>
		<form id="formulario" action="accion.php?<?php echo PFN_cambia_url('accion','renomear',false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<input type="hidden" name="cal" value="<?php echo $cal; ?>" />

		<table class="tabla_info" summary="">
			<tr>
				<th><label for="antigo"><?php echo PFN___('orixinal'); ?>:</label></th>
				<td><?php echo $PFN_vars->get('cal'); ?></td>
			</tr>
			<tr>
				<th><label for="novo_nome"><?php echo PFN___('novo'); ?>:</label></th>
				<td><input type="text" id="novo_nome" name="novo_nome" value="<?php echo htmlentities($PFN_vars->get('cal'), ENT_NOQUOTES, $PFN_conf->g('charset')); ?>" class="text" /></td>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<td>
					<input type="reset" value=" <?php echo PFN___('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" />
					<input type="submit" value=" <?php echo PFN___('aceptar'); ?> " class="boton" style="margin-left: 40px;" />
				</td>
			</tr>
		</table>
		</fieldset>
		</form>
		<script type="text/javascript"><!--

		document.getElementById('novo_nome').focus();

		//--></script>
	</div>
</div>
