<?php
/****************************************************************************
* data/plantillas/multiple_copiar.inc.php
*
* plantilla para la visualizaci�n de la acci�n de copiar multiples ficheros
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('$accion); ?></h1></div>
	<div class="bloque_info">
		<form action="accion.php?<?php echo PFN_cambia_url('accion',$accion,false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<?php foreach ($multiple_escollidos as $v) { ?>
		<input type="hidden" name="multiple_escollidos[]" value="<?php echo $v; ?>" />
		<?php } ?>

		<table id="listado" summary="">
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
		</table><br />

		<div class="aviso_info"><?php echo $adv; ?></div>

		<br /><div style="width: 100%; text-align: center;">
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
