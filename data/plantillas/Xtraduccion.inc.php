<?php
/****************************************************************************
* data/plantillas/Xtraduccion.inc.php
*
* plantilla para la visualizaci&oacute;n de la descarga y subida de los
* ficheros gettext
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('xestion').' &raquo; '.PFN___('Xtraduccion'); ?></h1></div>
	<div class="bloque_info paragrafos">
		<div><?php echo PFN___('Xtraduccion_intro'); ?></div>

		<form id="form_accion" action="?<?php echo PFN_get_url(false); ?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<input type="hidden" name="executa" value="1" />

				<br /><h2><?php echo PFN___('Xdescargar_arquivo_gettext'); ?></h2>

				<?php
				if ($executa && $erros_descargar) {
					echo '<div class="erro">'.implode('</div><div class="erro">', $erros_descargar).'</div>';
				}
				?>

				<div class="centro">
					<p>
						<label for="idioma_descargar"><?php echo PFN___('idioma'); ?>:</label>

						<select name="idioma_descargar" id="idioma_descargar" style="margin-left: 10px;">
							<option value=""><?php echo PFN___('Xescolle_idioma'); ?></option>
							<?php foreach ($idiomas_existen as $k => $v) { ?>
							<option value="<?php echo $k; ?>" <?php echo ($idioma == $k) ? 'selected="selected"' : ''; ?>><?php echo $v; ?></option>
							<?php } ?>
						</select>
					</p>

					<p>
						<input type="submit" name="descargar_orixinal" value=" <?php echo PFN___('Xdescargar_orixinal'); ?> " class="boton" />
						<input type="submit" name="descargar_personalizado" value=" <?php echo PFN___('Xdescargar_personalizado'); ?> " class="boton" style="margin-left: 20px;" />
					</p>
				</div>

				<br /><h2><?php echo PFN___('Xsubir_arquivos_gettext'); ?></h2>

				<?php
				if ($executa) {
					if ($erros_subir) {
						echo '<div class="erro">'.implode('</div><div class="erro">', $erros_subir).'</div>';
					} else if (!$erros_descargar) {
						echo '<div class="ok">'.PFN___('Xok_6').'</div>';
					}
				}
				?>

				<br /><?php echo PFN___('Xtraduccion_subir_intro'); ?>

				<div class="centro">
					<p>
						<label for="idioma_subir"><?php echo PFN___('idioma'); ?>:</label>

						<select name="idioma_subir" id="idioma_subir" style="margin-left: 10px;">
							<option value=""><?php echo PFN___('Xescolle_idioma'); ?></option>
							<?php foreach ($idiomas_valen as $k => $v) { ?>
							<option value="<?php echo $k; ?>" <?php echo ($idioma == $k) ? 'selected="selected"' : ''; ?>><?php echo $v; ?></option>
							<?php } ?>
						</select>
					</p>

					<p>
						<label for="arquivo_po" style="margin-right: 10px;"><?php echo PFN___('Xarquivo_po'); ?>:</label>
						<input type="file" name="arquivo_po" id="arquivo_po" value="" />
					</p>

					<p>
						<label for="arquivo_mo" style="margin-right: 10px;"><?php echo PFN___('Xarquivo_mo'); ?>:</label>
						<input type="file" name="arquivo_mo" id="arquivo_mo" value="" />
					</p>

					<p>
						<input type="submit" name="subir" value=" <?php echo PFN___('actualizar'); ?> " class="boton" onclick="return confirm(HtmlDecode('<?php echo PFN___('Xsubir_traduccion'); ?>'));" />
					</p>
				</div>
			</div>
		</fieldset>
	</form>
</div>
