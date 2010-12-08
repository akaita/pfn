<?php
/****************************************************************************
* data/plantillas/permisos.inc.php
*
* plantilla para la visualización de la acción de cambio de permisos a ficheros
* y directorios
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>

		<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('permisos'); ?></h1></div>
		<form action="accion.php?<?php echo PFN_cambia_url('accion','permisos',false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<input type="hidden" name="cal" value="<?php echo $cal; ?>" />

		<table class="tabla_info" summary="" style="text-align: center;">
			<tr>
				<th><?php echo PFN___('escritura'); ?></th>
				<th><?php echo PFN___('execucion'); ?></th>
				<th><?php echo PFN___('lectura'); ?></th>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<td><input type="checkbox" name="p200" value="200" <?php echo ($actuales & 0x0080)?'checked="checked"':''; ?> class="checkbox" /></td>
				<td><input type="checkbox" name="p100" value="100" <?php echo ($actuales & 0x0040)?'checked="checked"':''; ?> class="checkbox" /></td>
				<td><input type="checkbox" name="p400" value="400" <?php echo ($actuales & 0x0100)?'checked="checked"':''; ?> class="checkbox" /></td>
				<th><?php echo PFN___('propietario'); ?></th>
			</tr>
			<tr>
				<td><input type="checkbox" name="p020" value="20" <?php echo ($actuales & 0x0010)?'checked="checked"':''; ?> class="checkbox" /></td>
				<td><input type="checkbox" name="p010" value="10" <?php echo ($actuales & 0x0008)?'checked="checked"':''; ?> class="checkbox" /></td>
				<td><input type="checkbox" name="p040" value="40" <?php echo ($actuales & 0x0020)?'checked="checked"':''; ?> class="checkbox" /></td>
				<th><?php echo PFN___('grupo'); ?></th>
			</tr>
			<tr>
				<td><input type="checkbox" name="p002" value="2" <?php echo ($actuales & 0x0002)?(($perms & 0x0400)?'':'checked="checked"'):''; ?> class="checkbox" /></td>
				<td><input type="checkbox" name="p001" value="1" <?php echo ($actuales & 0x0001)?(($perms & 0x0200)?'':'checked="checked"'):''; ?> class="checkbox" /></td>
				<td><input type="checkbox" name="p004" value="4" <?php echo ($actuales & 0x0004)?(($perms & 0x0800)?'':'checked="checked"'):''; ?> class="checkbox" /></td>
				<th><?php echo PFN___('todos'); ?></th>
			</tr>
		</table>
		<div style="text-align: center; margin-top: 10px;">
			<input type="reset" value=" <?php echo PFN___('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" />
			<input type="submit" value=" <?php echo PFN___('aceptar'); ?> " class="boton" style="margin-left: 40px;" />
		</div>
		</fieldset>
		</form>
	</div>
</div>
