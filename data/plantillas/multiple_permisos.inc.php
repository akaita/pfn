<?php
/****************************************************************************
* data/plantillas/multiple_permisos.inc.php
*
* plantilla para la visualización de la acción de cambio de permisos a multiples
* ficheros y directorios al mismo tiempo
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>

<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('multiple_permisos'); ?></h1></div>
	<div class="bloque_info">
		<form action="accion.php?<?php echo PFN_cambia_url('accion','multiple_permisos',false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<?php foreach ($multiple_escollidos as $v) { ?>
		<input type="hidden" name="multiple_escollidos[]" value="<?php echo $v; ?>" />
		<?php } ?>
		<input type="hidden" name="executa" value="true" />

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
		</form>

		<br /><table id="listado" summary="">
		<?php foreach ($multiple_escollidos as $k => $v) { ?>
			<tr class="trarq<?php echo !($k % 2); ?>">
				<td class="tdnome">
					<?php if (is_dir($PFN_conf->g('raiz','path').$PFN_niveles->path_correcto($dir.'/').'/'.$v)) { ?>
					<img src="<?php echo $PFN_imaxes->icono('dir'); ?>" alt="<?php echo PFN___('dir'); ?>" class="icono" />
					<?php } else { ?>
					<img src="<?php echo $PFN_imaxes->icono($v); ?>" alt="<?php echo PFN___('arq'); ?>" class="icono" />
					<?php } ?> 
					<?php echo $v; ?>
				</td>
			</tr>
		<?php } ?>
		</table>
	</div>
</div>
