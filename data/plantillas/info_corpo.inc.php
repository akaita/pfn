<?php
/****************************************************************************
* data/plantillas/info_corpo.inc.php
*
* plantilla para la visualizaci�n del detalle de ifnormaci�n de un fichero o
* directorio
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>
		<?php if (in_array('descricion', $capas)) { ?>
		<div class="bloque_info">
			<h1><?php echo PFN___('informacion_xeral'); ?></h1>
			<table class="tabla_info" summary="">
				<tr>
					<th><?php echo PFN___('tamano_real'); ?></th>
					<td><?php echo $tamano_real; ?></td>
					<th><?php echo PFN___('propietario'); ?></th>
					<td><?php echo $datos['uid']; ?></td>
				</tr>
				<tr>
					<th><?php echo PFN___('tamano_disco'); ?></th>
					<td><?php echo $tamano_disco; ?></td>
					<th><?php echo PFN___('grupo'); ?></th>
					<td><?php echo $datos['gid']; ?></td>
				</tr>
				<tr>
					<th><?php echo PFN___('ultima_modificacion'); ?></th>
					<td><?php echo date($PFN_conf->g('data'), $datos['mtime']); ?></td>
					<th><?php echo PFN___('permisos'); ?></th>
					<td><?php echo $permisos; ?></td>
				</tr>
				<?php if ($e_imaxe) { ?>
				<tr>
					<th><?php echo PFN___('ancho_imaxe'); ?></th>
					<td><?php echo $e_imaxe[0]; ?>px</td>
					<th><?php echo PFN___('alto_imaxe'); ?></th>
					<td><?php echo $e_imaxe[1]; ?>px</td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<?php } if (in_array('enlaces', $capas)) { ?>
		<div class="bloque_info">
			<h1><?php echo PFN___('enlaces'); ?></h1>
			<table class="tabla_info" summary="">
				<tr>
					<th><?php echo PFN___('absoluto'); ?></th>
					<td><?php echo $enlace_abs; ?></td>
				</tr>
				<tr>
					<th><?php echo PFN___('relativo'); ?></th>
					<td><?php echo $enlace_rel; ?></td>
				</tr>
				<tr>
					<th><?php echo PFN___('ahref'); ?></th>
					<td><?php echo $enlace_href; ?></td>
				</tr>
				<tr>
					<th><?php echo PFN___('phpwiki'); ?></th>
					<td><?php echo $enlace_phpwiki; ?></td>
				</tr>
				<tr>
					<th><?php echo PFN___('mediawiki'); ?></th>
					<td><?php echo $enlace_mediawiki; ?></td>
				</tr>
			</table>
		</div>
		<?php } if (count($datos_inc['desc'][0]['valor']) != '') { ?>
		<div class="bloque_info">
			<h1><?php echo PFN___('informacion_adicional'); ?></h1>
			<table class="tabla_info" summary="">
			<?php foreach ($datos_inc['desc'] as $v) { ?>
				<tr>
					<th><?php echo $v['campo']; ?></th>
					<td><?php echo $v['valor']; ?></td>
				</tr>
			<?php } ?>
			</table>
		</div>
		<?php } if (count($datos_inc['form']) > 0) { ?>
		<div class="bloque_info">
			<h1><?php echo PFN___('form_info_adicional'); ?></h1>
			<form id="form_inc" action="accion.php?<?php echo PFN_cambia_url(array('dir','arq','accion'),array($dir,$arq,'info'),false); ?>" method="post" onsubmit="return submitonce();">
			<fieldset>
			<input type="hidden" name="executa" value="true" />
			<input type="hidden" name="formulario" value="form_inc" />
			<input type="hidden" name="cal" value="<?php echo $cal; ?>" />
			<table class="tabla_info" summary="">
			<?php foreach ($datos_inc['form'] as $k => $v) { ?>
				<tr>
					<th><?php echo $v['campo']; ?></th>
					<td><?php echo $v['valor']; ?></td>
				</tr>
			<?php } ?>
				<tr>
					<th>&nbsp;</th>
					<td>
						<input type="reset" name="<?php echo PFN___('cancelar'); ?>" value="<?php echo PFN___('cancelar'); ?>" />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="<?php echo PFN___('aceptar'); ?>" value="<?php echo PFN___('aceptar'); ?>" />
					</td>
				</tr>
			</table>
			</fieldset>
			</form>
		</div>
		<?php } if (in_array('protexer', $capas) && $PFN_conf->g('usuario','admin') && $tipo == 'dir') { ?>
		<div class="bloque_info">
			<h1><?php echo PFN___('protexer'); ?></h1>
			<?php if ($protexido) { ?>
			<div class="aviso"><?php echo PFN___('directorio_protexido'); ?>
			<?php } ?>
			<form id="form_protexer" action="accion.php?<?php echo PFN_cambia_url(array('dir','arq','accion'),array($dir,$arq,'info'),false); ?>" method="post" onsubmit="return submitonce();">
			<fieldset>
			<input type="hidden" name="executa" value="true" />
			<input type="hidden" name="formulario" value="protexer" />
			<input type="hidden" name="cal" value="<?php echo $cal; ?>" />
			<table class="tabla_info" summary="">
				<tr>
					<th><?php echo PFN___('usuario'); ?></th>
					<td><input type="text" name="ht_usuario" value="" class="text" /></td>
				</tr>
				<tr>
					<th><?php echo PFN___('contrasinal'); ?></th>
					<td><input type="password" name="ht_contrasinal" value="" class="text" /></td>
				</tr>
				<tr>
					<th>&nbsp;</th>
					<td>
						<input type="reset" name="<?php echo PFN___('cancelar'); ?>" value="<?php echo PFN___('cancelar'); ?>" />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="<?php echo PFN___('aceptar'); ?>" value="<?php echo PFN___('aceptar'); ?>" />
					</td>
				</tr>
			</table>
			</fieldset>
			</form>
			<?php if ($protexido) { ?>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>
