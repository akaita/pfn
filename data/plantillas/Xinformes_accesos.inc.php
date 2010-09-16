<?php
/****************************************************************************
* data/plantillas/Xinformes_accesos.inc.php
*
* plantilla para la visualización del informe de accesos
*

PHPfileNavigator versión 2.1.0

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net/

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
términos de la Licencia Pública General de GNU según es publicada por la Free
Software Foundation, bien de la versión 2 de dicha Licencia o bien (según su
elección) de cualquier versión posterior. 

Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA
GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la
CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de
GNU para más detalles. 

Debería haber recibido una copia de la Licencia Pública General junto con este
programa. Si no ha sido así, escriba a la Free Software Foundation, Inc., en
675 Mass Ave, Cambridge, MA 02139, EEUU. 
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
				<strong><?php echo $PFN_conf->t('Xdesc_accesos'); ?></strong><br /><br />
				<table width="100%" summary="">
					<tr>
						<td style="width: 50%" valign="top">
							<ul>
								<li><input type="checkbox" name="ae_amosar[]" id="ae_amosar_1" value="entradas" <?php echo $ae_entradas?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ae_amosar_1"><?php echo $PFN_conf->t('Xamosar_entradas'); ?></label></li>
								<li><input type="checkbox" name="ae_amosar[]" id="ae_amosar_1-2" value="certificado" <?php echo $ae_certificado?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ae_amosar_1-2"><?php echo $PFN_conf->t('Xamosar_certificado'); ?></label></li>
								<li><input type="checkbox" name="ae_amosar[]" id="ae_amosar_2" value="saidas" <?php echo $ae_saidas?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ae_amosar_2"><?php echo $PFN_conf->t('Xamosar_saidas'); ?></label></li>
								<li><input type="checkbox" name="ae_amosar[]" id="ae_amosar_3" value="erros" <?php echo $ae_erros?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ae_amosar_3"><?php echo $PFN_conf->t('Xamosar_erros'); ?></label></li>
								<li><input type="checkbox" name="ae_amosar[]" id="ae_amosar_4" value="bloqueados" <?php echo $ae_bloqueados?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ae_amosar_4"><?php echo $PFN_conf->t('Xamosar_bloqueados'); ?></label></li>
								<li><input type="checkbox" name="ae_amosar[]" id="ae_amosar_5" value="sen_datos" <?php echo $ae_sen_datos?'checked="checked"':''; ?> class="checkbox" />&nbsp;&nbsp;<label for="ae_amosar_5"><?php echo $PFN_conf->t('Xamosar_sen_datos'); ?></label></li>
							</ul>
						</td>
						<td style="width: 50%" valign="top">
							<label for="ae_lineas"><?php echo $PFN_conf->t('Xamosar_lineas'); ?>:</label>
							<input type="text" name="ae_lineas" id="ae_lineas" value="<?php echo $ae_lineas; ?>" size="5" /><br /><br />
							<label for="ae_buscar"><?php echo $PFN_conf->t('Xbuscar_usuario'); ?>:</label>
							<input type="text" name="ae_buscar" id="ae_buscar" value="<?php echo $PFN_vars->post('ae_buscar'); ?>" size="20" />

							<br /><br />

							<label for="ae_data_inicio_d"><?php echo $PFN_conf->t('Xdata_inicio'); ?>:</label>
							<select name="ae_data_inicio_d" id="ae_data_inicio_d">
								<option value=""> - </option>
								<?php
								for ($i = 1; $i < 32; $i++) {
									echo '<option value="'.$i.'" '.(($i == $ae_data_inicio_d)?'selected="selected"':'').'>'.$i.'</option>';
								}
								?>
							</select>
							/
							<select name="ae_data_inicio_m" id="ae_data_inicio_m">
								<option value=""> - </option>
								<?php
								foreach ($PFN_conf->t('meses') as $num => $mes) {
									echo '<option value="'.$num.'" '.(($num == $ae_data_inicio_m)?'selected="selected"':'').'>'.$mes.'</option>';
								}
								?>
							</select>
							/
							<select name="ae_data_inicio_y" id="ae_data_inicio_y">
								<option value=""> - </option>
								<?php
								for ($i = 2009; $i <= date('Y'); $i++) {
									echo '<option value="'.$i.'" '.(($i == $ae_data_inicio_y)?'selected="selected"':'').'>'.$i.'</option>';
								}
								?>
							</select>

							<br /><br />

							<label for="ae_data_fin_d"><?php echo $PFN_conf->t('Xdata_fin'); ?>:</label>
							<select name="ae_data_fin_d" id="ae_data_fin_d">
								<option value=""> - </option>
								<?php
								for ($i = 1; $i < 32; $i++) {
									echo '<option value="'.$i.'" '.(($i == $ae_data_fin_d)?'selected="selected"':'').'>'.$i.'</option>';
								}
								?>
							</select>
							/
							<select name="ae_data_fin_m" id="ae_data_fin_m">
								<option value=""> - </option>
								<?php
								foreach ($PFN_conf->t('meses') as $num => $mes) {
									echo '<option value="'.$num.'" '.(($num == $ae_data_fin_m)?'selected="selected"':'').'>'.$mes.'</option>';
								}
								?>
							</select>
							/
							<select name="ae_data_fin_y" id="ae_data_fin_y">
								<option value=""> - </option>
								<?php
								for ($i = 2009; $i <= date('Y'); $i++) {
									echo '<option value="'.$i.'" '.(($i == $ae_data_fin_y)?'selected="selected"':'').'>'.$i.'</option>';
								}
								?>
							</select>
						</td>
					</tr>
				</table>
