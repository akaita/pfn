<?php
/****************************************************************************
* data/plantillas/Xcsv.inc.php
*
* plantilla para la visualizaci&oacute;n de importacion de usuarios y raices
* desde CSV
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('xestion').' &raquo; '.PFN___('Ximportar_csv'); ?></h1></div>
	<div class="bloque_info paragrafos">
		<?php echo PFN___('Xcsv_intro'); ?>

		<?php echo PFN___('Xcsv_taboa_campos'); ?>

		<br /><h2><?php echo PFN___('Xcargar_arquivo_csv'); ?></h2>

		<?php
		if ($executa) {
			if (count($erros)) {
				echo '<div class="atencion">'.sprintf(PFN___('Xerros_'.(($boton == 'probar') ? 53 : 54)), count($linhas), $ok, count($erros)).'</div>';
				echo '<div class="erro">'.implode('</div><div class="erro">', $erros).'</div>';
			} else if ($boton == 'probar') {
				echo '<div class="ok">'.sprintf(PFN___('Xok_8'), count($linhas)).'</div>';
			} else {
				echo '<div class="ok">'.sprintf(PFN___('Xok_9'), count($linhas)).'</div>';
			}
		}
		?>

		<div class="centro">
			<form id="form_accion" action="?<?php echo PFN_get_url(false); ?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<input type="hidden" name="executa" value="1" />

					<p>
						<label for="arquivo"><?php echo PFN___('Xescolle_arquivo_csv'); ?>:</label>
						<input type="file" id="arquivo" name="arquivo" value="" />
					</p>

					<p>
						<?php echo PFN___('Xseparados_por'); ?>
						<input type="radio" id="separador_coma" name="separador" value="," checked="checked" /> <label for="separador_coma"><?php echo PFN___('Xcoma'); ?></label>
						<input type="radio" id="separador_puntocoma" name="separador" value=";" /> <label for="separador_puntocoma"><?php echo PFN___('Xpunto_coma'); ?></label>
					</p>

					<p>
						<input type="submit" name="probar" value=" <?php echo PFN___('Xprobar'); ?> " class="boton" />
						<input type="submit" name="procesar" value=" <?php echo PFN___('Xprocesar'); ?> " class="boton" style="margin-left: 40px;" />
					</p>
				</fieldset>
			</form>
		</div>
	</div>
</div>
