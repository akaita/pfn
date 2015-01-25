<?php
/****************************************************************************
* data/plantillas/Xusuarios.inc.php
*
* plantilla para la visualización de la pantalla de modificación de un usuario
* y sus relaciones con las raices
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('xestion').' &raquo; '.PFN___('Xmodi_usuario'); ?></h1></div>
	<div class="bloque_info">

		<ul id="tabs">
			<li id="tab_li1"><a href="../raices/" id="tab_a1"><?php echo PFN___('Xraices'); ?></a></li>
			<li id="tab_li2"><a href="../usuarios/" id="tab_a2" class="activo"><?php echo PFN___('Xusuarios'); ?></a></li>
			<li id="tab_li3"><a href="../grupos/" id="tab_a3"><?php echo PFN___('Xgrupos'); ?></a></li>
			<li id="tab_li4"><a href="../configuracions/" id="tab_a4"><?php echo PFN___('Xconfiguracions'); ?></a></li>
		</ul>

		<div class="capa_tab"> 
			<?php if (count($erros) || $ok > 0) { ?>
			<div class="aviso">
				<?php
				if (count($erros)) {
					foreach ($erros as $v) {
						echo PFN___('Xerros_'.intval($v)).'<br />';
					}
				} else {
					echo PFN___('Xok_'.intval($ok)).'<br />';
				}
				?>
			</div>
			<?php } ?>
		
			<form action="gdar.php?<?php echo PFN_get_url(false); ?>" method="post" enctype="multipart/form-data" onsubmit="return validar_campos();">
				<fieldset>
					<input type="hidden" name="id" value="<?php echo $PFN_usuarios->get('id'); ?>" />
			
					<table class="tabla_info" summary="">
						<?php if ($PFN_usuarios->get('id') > 0) { ?>
						<tr>
							<th><?php echo PFN___('id'); ?></th>
							<td><?php echo $PFN_usuarios->get('id'); ?></td>
						</tr>
						<?php } ?>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(1); return false;">(?)</a> <label for="nome"><?php echo PFN___('Xnome'); ?>*</label></th>
							<td><input type="text" id="nome" name="nome" value="<?php echo $PFN_usuarios->get('nome'); ?>" class="text" tabindex="10" /></td>
						</tr>
						<tr id="tr_axuda1" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_usuario_nome'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(2); return false;">(?)</a> <label for="usuario"><?php echo PFN___('Xusuario'); ?>*</label></th>
							<td><input type="text" id="usuario" name="usuario" value="<?php echo $PFN_usuarios->get('usuario'); ?>" class="text" tabindex="20" /></td>
						</tr>
						<tr id="tr_axuda2" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_usuario_usuario'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(3); return false;">(?)</a> <label for="contrasinal"><?php echo PFN___('Xcontrasinal'); ?></label></th>
							<td><input type="password" id="contrasinal" name="contrasinal" value="" class="text" tabindex="30" /></td>
						</tr>
						<tr id="tr_axuda3" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_usuario_contrasinal'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(4); return false;">(?)</a> <label for="rep_contrasinal"><?php echo PFN___('Xrep_contrasinal'); ?></label></th>
							<td><input type="password" id="rep_contrasinal" name="rep_contrasinal" value="" class="text" tabindex="40" /></td>
						</tr>
						<tr id="tr_axuda4" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_usuario_rep_contrasinal'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(14); return false;">(?)</a> <label for="id_control"><?php echo PFN___('Xcodigo_acceso'); ?></label></th>
							<td><input type="text" id="id_control" name="id_control" value="<?php echo $PFN_usuarios->get('id_control'); ?>" class="text" tabindex="45" /></td>
						</tr>
						<tr id="tr_axuda14" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_usuario_codigo_acceso'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(5); return false;">(?)</a> <label for="email"><?php echo PFN___('Xemail'); ?></label></th>
							<td><input type="text" id="email" name="email" value="<?php echo $PFN_usuarios->get('email'); ?>" class="text" tabindex="50" /></td>
						</tr>
						<tr id="tr_axuda5" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_usuario_email'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(6); return false;">(?)</a> <label for="max_descargas"><?php echo PFN___('Xmax_descargas_mes'); ?></label></th>
							<td><input type="text" id="max_descargas" name="max_descargas" value="<?php echo $max_descargas; ?>" class="text" tabindex="60" /> <?php echo PFN___('Xen_megas'); ?></td>
						</tr>
						<tr id="tr_axuda6" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_usuario_max_descargas'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(7); return false;">(?)</a> <label for="actual_descargas"><?php echo PFN___('descargado_mes'); ?></label></th>
							<td><input type="text" id="actual_descargas" name="actual_descargas" value="<?php echo $actual_descargas; ?>" class="text" tabindex="70" /> <?php echo PFN___('Xen_megas'); ?></td>
						</tr>
						<tr id="tr_axuda7" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_usuario_actual_descargas'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(11); return false;">(?)</a> <label for="cambiar_datos"><?php echo PFN___('Xcambiar_datos'); ?></label></th>
							<td>
								<select id="cambiar_datos" name="cambiar_datos" tabindex="75">
									<option value="1" <?php echo $PFN_usuarios->get('cambiar_datos')==1?'selected="selected"':''; ?>>ON</option>
									<option value="0" <?php echo $PFN_usuarios->get('cambiar_datos')==0?'selected="selected"':''; ?>>OFF</option>
								</select>
							</td>
						</tr>
						<tr id="tr_axuda11" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_cambiar_datos'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(8); return false;">(?)</a> <label for="id_grupo"><?php echo PFN___('Xgrupo'); ?>*</label></th>
							<td>
								<select id="id_grupo" name="id_grupo" tabindex="80">
									<?php foreach ($Dgrupos as $k => $v) { ?>
									<option value="<?php echo $k; ?>" <?php echo ($PFN_usuarios->get('id_grupo') == $k)?'selected="selected"':''; ?>><?php echo $v; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr id="tr_axuda8" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_usuario_grupo'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(9); return false;">(?)</a> <label for="admin"><?php echo PFN___('Xadministrador'); ?></label></th>
							<td>
								<select id="admin" name="admin" tabindex="90">
									<option value="1" <?php echo $PFN_usuarios->get('admin')==1?'selected="selected"':''; ?>>ON</option>
									<option value="0" <?php echo $PFN_usuarios->get('admin')==0?'selected="selected"':''; ?>>OFF</option>
								</select>
							</td>
						</tr>
						<tr id="tr_axuda9" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_usuario_administrador'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(10); return false;">(?)</a> <label for="estado"><?php echo PFN___('Xestado'); ?></label></th>
							<td>
								<select id="estado" name="estado" tabindex="100">
									<option value="0" <?php echo (intval($PFN_usuarios->get('estado')) == 0)?'selected="selected"':''; ?>>OFF</option>
									<option value="1" <?php echo (intval($PFN_usuarios->get('estado')) == 1)?'selected="selected"':''; ?>>ON</option>
									<option value="2" <?php echo (intval($PFN_usuarios->get('estado')) == 2)?'selected="selected"':''; ?>>LOCKED</option>
								</select>
							</td>
						</tr>
						<tr id="tr_axuda10" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_usuario_estado'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(15); return false;">(?)</a> <label for="login_usuario"><?php echo PFN___('Xmodo_acceso'); ?></label></th>
							<td>
								<input type="checkbox" id="login_usuario" name="login_usuario" value="1" tabindex="102" <?php echo (intval($PFN_usuarios->get('login_usuario')) == 1)?'checked="checked"':''; ?> />
								<label for="login_usuario" style="margin-right: 20px;"><?php echo PFN___('Xcon_usuario_contrasinal'); ?></label>
								<input type="checkbox" id="login_certificado" name="login_certificado" value="1" tabindex="104" <?php echo (intval($PFN_usuarios->get('login_certificado')) == 1)?'checked="checked"':''; ?> />
								<label for="login_certificado"><?php echo PFN___('Xcon_certificado'); ?></label>
							</td>
						</tr>
						<tr id="tr_axuda15" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_usuario_modo_acceso'); ?></td>
						</tr>
					</table>
			
					<br /><br />
			
					<h2><?php echo PFN___('Xraices_relacionadas'); ?></h2>
			
					<table class="tabla_normal" summary="">
						<?php
						if (empty($id)) {
							$PFN_usuarios->init('raices');
						} else {
							$PFN_usuarios->init('raices_usuario', $id);
						}
						
						for ($cont=3; $PFN_usuarios->mais() || $cont%3 != 0; $PFN_usuarios->seguinte()) {
							$id = $PFN_usuarios->get('id');
							$relacion = $PFN_usuarios->get('relacion');
						
							if ($cont == 3) {
								echo '<tr>';
								$cont = 0;
							}
						
							echo '<td>';
						
							if (empty($id)) {
								echo '&nbsp;';
							} else {
								echo '<input type="checkbox" id="Fraices_'.$id.'" name="Fraices[]" value="'.$id.'" '.($relacion?'checked="checked"':'').' class="checkbox" /> '
									.'<label for="Fraices_'.$id.'">'.$PFN_usuarios->get('nome').'</label>';
							}
						
							echo '</td>';
							$cont++;
						
							if ($cont == 3) {
								echo '</tr>';
							}
						}
						?>
					</table>
			
					<br />
			
					<div style="width: 100%; text-align: center;">
						<?php if (!empty($id)) { ?>
						<input type="reset" value=" <?php echo PFN___('eliminar'); ?> " class="boton" style="margin-right: 40px;" onclick="eliminar();" tabindex="300" />
						<?php } ?>
						<input type="reset" value=" <?php echo PFN___('voltar'); ?> " class="boton" style="margin-right: 40px;" onclick="enlace('index.php');" tabindex="310" />
						<input type="submit" value="<?php echo PFN___('aceptar'); ?>" class="boton" tabindex="320" />
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>

<script src="<?php echo $relativo; ?>js/base64.js" type="text/javascript"></script>
<script type="text/javascript"><!--

function eliminar () {
	<?php if ($id == $sPFN['usuario']['id']) { ?>
	alert(HtmlDecode('<?php echo addslashes(PFN___('Xerros_13')); ?>'));
	<?php } else { ?>
	if (confirm(HtmlDecode('<?php echo addslashes(PFN___('Xeliminar_usuario')); ?>'))) {
		enlace('eliminar.php?id=<?php echo $id; ?>&amp;<?php echo PFN_get_url(false); ?>');
	}
	<?php } ?>
}

//--></script>
