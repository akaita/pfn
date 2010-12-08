<?php
/****************************************************************************
* data/plantillas/Xvarios_indexador.inc.php
*
* plantilla para la visualización de la sección de indexador dentro de
* la administración de Varios
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
		<div id="capa_indexador">
			<h2><?php echo PFN___('Xreindexar'); ?></h2>

			<?php if ($executa == 'indexador') { ?>
			<div class="aviso">
				<?php
				if (count($erros)) {
					foreach ($erros as $v) {
						echo PFN___('Xerros_'.$v).'<br />';
					}
				} else {
					echo PFN___('Xok_reindexar').' '.$PFN_indexador->cnt('dir').' '.PFN___('dirs')
						.' | '.$PFN_indexador->cnt('arq').' '.PFN___('arqs').'<br /><br />'
						.'<a href="#" onclick="amosa_axuda(\'detalle_indexador\');">'
						.PFN___('Xver_detalle').'</a>'
						.'<div id="detalle_indexador" style="display: none;"><pre>'.$txt.'</pre></div>';
				}
				?>
			</div>
			<?php } ?>

			<form action="index.php?<?php echo PFN_get_url(false); ?>" method="post" onsubmit="return submitonce();">
			<fieldset>
			<input type="hidden" name="executa" value="indexador" />

			<table class="tabla_info" summary="">
				<caption><?php echo PFN___('Xreindexar_info'); ?></caption>
				<tr>
					<th><strong><?php echo PFN___('Xconfirmar_reindexar'); ?></strong></th>
					<td>
						<strong><label for="indexador_id_raiz"><?php echo PFN___('Xescolle_raiz'); ?>:</label></strong>

						<select id="indexador_id_raiz" name="indexador_id_raiz">
							<?php
							foreach ($raices as $k => $v) {
								echo '<option value="'.$k.'"'.(($k == $id_raiz)?' selected="selected"':'').'>'.$v.'</option>';
							}
							?>
						</select>
					</td>
					<th><input type="submit" value=" <?php echo PFN___('enviar'); ?> " /></th>
				</tr>
			</table>

			</fieldset>
			</form>
		</div>
