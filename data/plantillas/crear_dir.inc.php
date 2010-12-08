<?php
/****************************************************************************
* data/plantillas/crear_dir.inc.php
*
* plantilla para la visualización de la acción de crear un directorio
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>

<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('crear_dir'); ?></h1></div>
	<div class="bloque_info">
		<form action="accion.php?<?php echo PFN_get_url(false); ?>" method="post" id="formulario" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="accion" value="crear_dir" />
		<input type="hidden" name="executa" value="true" />

		<table class="tabla_info" summary="">
			<tr>
				<th><label for="nome_directorio"><?php echo PFN___('nome'); ?>:</label></th>
				<td><input type="text" name="nome_directorio" id="nome_directorio" class="text" /></td>
			</tr>
			<?php foreach ($PFN_inc->crea_formulario('dir') as $v) { ?>
			<tr>
				<th><?php echo $v['campo']; ?></th>
				<td><?php echo $v['valor']; ?></td>
			</tr>
			<?php } ?>
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

		document.getElementById('nome_directorio').focus();

		//--></script>
	</div>
</div>
