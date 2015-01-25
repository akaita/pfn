<?php
/****************************************************************************
* data/plantillas/Xinformes_accions.inc.php
*
* plantilla para la visualización del informe sobre acciones a ficheros y
* directorios
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
				<strong><?php echo PFN___('Xdesc_accions'); ?></strong><br /><br />
				<table width="100%" summary="">
					<tr>
						<td style="width: 50%" valign="top">
							<ul>
								<li><input type="checkbox" name="ai_marcar_desmarcar" id="ai_marcar_desmarcar" value="1" <?php echo $ai_marcar_desmarcar?'checked="checked"':''; ?> class="checkbox" onclick="Xmarcar_desmarcar('ai_');" />&nbsp;&nbsp;<label for="ai_marcar_desmarcar"><strong><?php echo PFN___('Xmarca_desmarca'); ?></strong></label>
								<?php if ($executa == 'accions') { ?>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_1" value="copiar_arq" <?php echo $ai_copiar_arq?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_1"><?php echo PFN___('Xamosar_copiar_arq'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_2" value="copiar_dir" <?php echo $ai_copiar_dir?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_2"><?php echo PFN___('Xamosar_copiar_dir'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_3" value="mover_arq" <?php echo $ai_mover_arq?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_3"><?php echo PFN___('Xamosar_mover_arq'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_4" value="mover_dir" <?php echo $ai_mover_dir?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_4"><?php echo PFN___('Xamosar_mover_dir'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_5" value="eliminar_arq" <?php echo $ai_eliminar_arq?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_5"><?php echo PFN___('Xamosar_eliminar_arq'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_6" value="eliminar_dir" <?php echo $ai_eliminar_dir?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_6"><?php echo PFN___('Xamosar_eliminar_dir'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_7" value="crear_dir" <?php echo $ai_crear_dir?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_7"><?php echo PFN___('Xamosar_crear_dir'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_8" value="subir_arq" <?php echo $ai_subir_arq?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_8"><?php echo PFN___('Xamosar_subir_arq'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_9" value="subir_url" <?php echo $ai_subir_url?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_9"><?php echo PFN___('Xamosar_subir_url'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_10" value="renomear" <?php echo $ai_renomear?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_10"><?php echo PFN___('Xamosar_renomear'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_11" value="enlazar_arq" <?php echo $ai_enlazar_arq?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_11"><?php echo PFN___('Xamosar_enlazar_arq'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_12" value="editar" <?php echo $ai_editar?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_12"><?php echo PFN___('Xamosar_editar'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_13" value="extraer" <?php echo $ai_extraer?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_13"><?php echo PFN___('Xamosar_extraer'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_14" value="enviar_correo" <?php echo $ai_enviar_correo?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_14"><?php echo PFN___('Xamosar_enviar_correo'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_15" value="descargar" <?php echo $ai_descargar?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_15"><?php echo PFN___('Xamosar_descargar'); ?></label></li>
								<?php } else { ?>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_1" value="copiar_arq" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_1"><?php echo PFN___('Xamosar_copiar_arq'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_2" value="copiar_dir" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_2"><?php echo PFN___('Xamosar_copiar_dir'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_3" value="mover_arq" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_3"><?php echo PFN___('Xamosar_mover_arq'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_4" value="mover_dir" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_4"><?php echo PFN___('Xamosar_mover_dir'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_5" value="eliminar_arq" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_5"><?php echo PFN___('Xamosar_eliminar_arq'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_6" value="eliminar_dir" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_6"><?php echo PFN___('Xamosar_eliminar_dir'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_7" value="crear_dir" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_7"><?php echo PFN___('Xamosar_crear_dir'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_8" value="subir_arq" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_8"><?php echo PFN___('Xamosar_subir_arq'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_9" value="subir_url" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_9"><?php echo PFN___('Xamosar_subir_url'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_10" value="renomear" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_10"><?php echo PFN___('Xamosar_renomear'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_11" value="enlazar_arq" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_11"><?php echo PFN___('Xamosar_enlazar_arq'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_12" value="editar" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_12"><?php echo PFN___('Xamosar_editar'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_13" value="extraer" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_13"><?php echo PFN___('Xamosar_extraer'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_14" value="enviar_correo" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_14"><?php echo PFN___('Xamosar_enviar_correo'); ?></label></li>
								<li><input type="checkbox" name="ai_amosar[]" id="ai_amosar_15" value="descargar" checked="checked" class="checkbox" />&nbsp;&nbsp;<label for="ai_amosar_15"><?php echo PFN___('Xamosar_descargar'); ?></label></li>
								<?php } ?>
							</ul>
						</td>
						<td style="width: 50%" valign="top">
							<label for="ai_raiz"><?php echo PFN___('Xescolle_raiz'); ?>:</label>
							<select name="ai_raiz" id="ai_raiz">
								<option value=""><?php echo PFN___('Xtodas'); ?></option>
								<?php for ($PFN_usuarios->init('raices'); $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) { ?>
								<option value="<?php echo $PFN_usuarios->get('id'); ?>"<?php echo ($ai_raiz == $PFN_usuarios->get('id'))?' selected="selected"':''; ?>><?php echo $PFN_usuarios->get('nome'); ?></option>
								<?php } ?>
							</select>

							<br /><br />

							<label for="ai_usuario"><?php echo PFN___('Xescolle_usuario'); ?>:</label>
							<select name="ai_usuario" id="ai_usuario">
								<option value=""><?php echo PFN___('Xtodos'); ?></option>
								<?php for ($PFN_usuarios->init('usuarios'); $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) { ?>
								<option value="<?php echo $PFN_usuarios->get('id'); ?>"<?php echo ($ai_usuario == $PFN_usuarios->get('id'))?' selected="selected"':''; ?>><?php echo $PFN_usuarios->get('nome'); ?></option>
								<?php } ?>
							</select>

							<br /><br />

							<label for="ai_lineas"><?php echo PFN___('Xamosar_lineas'); ?>:</label>
							<input type="text" name="ai_lineas" id="ai_lineas" value="<?php echo $ai_lineas; ?>" size="5" />

							<br /><br />

							<label for="ai_buscar"><?php echo PFN___('Xbuscar_texto'); ?>:</label>
							<input type="text" name="ai_buscar" id="ai_buscar" value="<?php echo $PFN_vars->post('ai_buscar'); ?>" size="20" />

							<br /><br />

							<label for="ai_data_inicio_d"><?php echo PFN___('Xdata_inicio'); ?>:</label>
							<select name="ai_data_inicio_d" id="ai_data_inicio_d">
								<option value=""> - </option>
								<?php
								for ($i = 1; $i < 32; $i++) {
									echo '<option value="'.$i.'" '.(($i == $ai_data_inicio_d)?'selected="selected"':'').'>'.$i.'</option>';
								}
								?>
							</select>
							/
							<select name="ai_data_inicio_m" id="ai_data_inicio_m">
								<option value=""> - </option>
								<?php
								foreach (array(1,2,3,4,5,6,7,8,9,10,11,12) as $num) {
									echo '<option value="'.$num.'" '.(($num == $ai_data_inicio_m)?'selected="selected"':'').'>'.PFN___('meses_'.sprintf('%02d', $num)).'</option>';
								}
								?>
							</select>
							/
							<select name="ai_data_inicio_y" id="ai_data_inicio_y">
								<option value=""> - </option>
								<?php
								for ($i = 2009; $i <= date('Y'); $i++) {
									echo '<option value="'.$i.'" '.(($i == $ai_data_inicio_y)?'selected="selected"':'').'>'.$i.'</option>';
								}
								?>
							</select>

							<br /><br />

							<label for="ai_data_fin_d"><?php echo PFN___('Xdata_fin'); ?>:</label>
							<select name="ai_data_fin_d" id="ai_data_fin_d">
								<option value=""> - </option>
								<?php
								for ($i = 1; $i < 32; $i++) {
									echo '<option value="'.$i.'" '.(($i == $ai_data_fin_d)?'selected="selected"':'').'>'.$i.'</option>';
								}
								?>
							</select>
							/
							<select name="ai_data_fin_m" id="ai_data_fin_m">
								<option value=""> - </option>
								<?php
								foreach (array(1,2,3,4,5,6,7,8,9,10,11,12) as $num) {
									echo '<option value="'.$num.'" '.(($num == $ai_data_fin_m)?'selected="selected"':'').'>'.PFN___('meses_'.sprintf('%02d', $num)).'</option>';
								}
								?>
							</select>
							/
							<select name="ai_data_fin_y" id="ai_data_fin_y">
								<option value=""> - </option>
								<?php
								for ($i = 2009; $i <= date('Y'); $i++) {
									echo '<option value="'.$i.'" '.(($i == $ai_data_fin_y)?'selected="selected"':'').'>'.$i.'</option>';
								}
								?>
							</select>
						</td>
					</tr>
				</table>
