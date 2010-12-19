<?php
/****************************************************************************
* data/plantillas/multiple_copiar.inc.php
*
* plantilla para la visualización de la acción de enviar multiples ficheros
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___($accion); ?></h1></div>
	<div class="bloque_info">
		<form action="accion.php?<?php echo PFN_cambia_url('accion',$accion,false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<?php foreach ($multiple_escollidos as $v) { ?>
		<input type="hidden" name="multiple_escollidos[]" value="<?php echo $v; ?>" />
		<?php } ?>

		<?php if (strlen($estado_accion)) { ?>
		<div class="aviso_info"><?php echo $estado_accion; ?></div>
		<?php } ?>

		<br /><table class="tabla_info" summary="">
			<tr>
				<th><label for="para"><?php echo PFN___('para'); ?>:</label></th>
				<td><input type="text" id="para" name="para" value="<?php echo htmlentities($para, ENT_NOQUOTES, $PFN_conf->g('charset')); ?>" class="text" /></td>
			</tr>
			<tr>
				<th><label for="titulo"><?php echo PFN___('titulo'); ?>:</label></th>
				<td><input type="text" id="titulo" name="titulo" value="<?php echo htmlentities($titulo, ENT_NOQUOTES, $PFN_conf->g('charset')); ?>" class="text" /></td>
			</tr>
			<tr>
				<th><label for="mensaxe"><?php echo PFN___('mensaxe'); ?>:</label></th>
				<td><textarea id="mensaxe" name="mensaxe" style="height: 200px;"><?php echo htmlentities($mensaxe, ENT_NOQUOTES, $PFN_conf->g('charset')); ?></textarea></td>
			</tr>
			<tr>
				<th><label for="so_lista"><?php echo PFN___('so_lista'); ?></label></th>
				<td><input type="checkbox" id="so_lista" name="so_lista" value="true" <?php echo ($so_lista == 'true')?'checked="checked"':''; ?> /> <?php echo PFN___('so_lista_txt'); ?></td>
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

		document.getElementById('para').focus();

		//--></script>

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
