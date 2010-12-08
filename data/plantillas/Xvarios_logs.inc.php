<?php
/****************************************************************************
* data/plantillas/Xvarios_logs.inc.php
*
* plantilla para la visualización de la sección de logs dentro de
* la administración de Varios
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
		<div id="capa_logs" style="margin-top: 15px;">
			<h2><?php echo PFN___('Xarquivos_logs'); ?></h2>

			<?php if ($executa == 'logs' && $ok) { ?>
			<div class="aviso">
				<?php echo PFN___('Xok_7'); ?>
			</div>
			<?php } ?>

			<form action="index.php?<?php echo PFN_get_url(false); ?>" method="post" onsubmit="return submitonce();">
			<fieldset>
			<input type="hidden" name="executa" value="logs" />

			<table class="tabla_info" summary="">
				<caption><?php echo PFN___('Xlogs_info'); ?></caption>
				<tr>
					<th>
						<?php if (is_file($PFN_paths['logs'].$PFN_conf->g('logs','mysql'))) { ?>
						<input type="checkbox" name="log_mysql" id="log_mysql" value="true" class="checkbox" /> <label for="log_mysql"><?php echo PFN___('Xlogs_arq_mysql').' ('.PFN_peso(filesize($PFN_paths['logs'].$PFN_conf->g('logs','mysql'))).')'; ?></label><br />
						<?php
						}

						foreach ($raices as $k => $v) {
							$arq = $PFN_paths['info'].'raiz'.$k.'/'.$PFN_conf->g('logs','accions');

							if (is_file($arq)) {
								
						?>
							<input type="checkbox" name="logs_accions[]" id="logs_accions_<?php echo $k; ?>" value="<?php echo $k; ?>" class="checkbox" /> <label for="logs_accions_<?php echo $k; ?>"><?php echo PFN___('Xlogs_arq_accions').' '.$v.' ('.PFN_peso(filesize($arq)).')'; ?></label><br />
						<?php } } ?>
					</th>
					<td><input type="submit" value=" <?php echo PFN___('eliminar'); ?> " /></td>
				</tr>
			</table>

			</fieldset>
			</form>
		</div>
