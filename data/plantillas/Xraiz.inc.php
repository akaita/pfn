<?php
/****************************************************************************
* data/plantillas/Xraiz.inc.php
*
* plantilla para la visualización de la pantalla de modificación de una raíz
* y su relación con los usuarios
*

PHPfileNavigator versión 2.3.0

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
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('xestion').' &raquo; '.PFN___('Xmodi_raiz'); ?></h1></div>
	<div class="bloque_info">

		<ul id="tabs">
			<li id="tab_li1"><a href="../raices/" id="tab_a1" class="activo"><?php echo PFN___('Xraices'); ?></a></li>
			<li id="tab_li2"><a href="../usuarios/" id="tab_a2"><?php echo PFN___('Xusuarios'); ?></a></li>
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
	
			<form action="gdar.php?<?php echo PFN_get_url(false); ?>" method="post" onsubmit="return submitonce();">
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
							<td colspan="2"><?php echo PFN___('Xaxuda_raiz_nome'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(2); return false;">(?)</a> <label for="path"><?php echo PFN___('Xpath'); ?>*</label></th>
							<td><input type="text" id="path" name="path" value="<?php echo $PFN_usuarios->get('path'); ?>" class="text" tabindex="20" /></td>
						</tr>
						<tr id="tr_axuda2" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_raiz_path'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(3); return false;">(?)</a> <label for="web"><?php echo PFN___('Xraiz_web'); ?>*</label></th>
							<td><input type="text" id="web" name="web" value="<?php echo $PFN_usuarios->get('web'); ?>" class="text" tabindex="30" /></td>
						</tr>
						<tr id="tr_axuda3" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_raiz_web'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(4); return false;">(?)</a> <label for="host"><?php echo PFN___('Xhost'); ?>*</label></th>
							<td><input type="text" id="host" name="host" value="<?php echo $PFN_usuarios->get('host'); ?>" class="text" tabindex="40" /></td>
						</tr>
						<tr id="tr_axuda4" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_raiz_host'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(5); return false;">(?)</a> <label for="peso_maximo"><?php echo PFN___('Xpeso_max'); ?></label></th>
							<td>
								<input type="text" id="peso_maximo" name="peso_maximo" value="<?php echo $peso_maximo; ?>" class="text" tabindex="50" />
								<select id="unidades" name="unidades" onchange="return cambia_peso(this.value);" tabindex="60">
									<option value="MB">MBytes</option>
									<option value="GB">GBytes</option>
								</select>
							</td>
						</tr>
						<tr id="tr_axuda5" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_raiz_peso_max'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(7); return false;">(?)</a> <?php echo PFN___('Xpeso_actual'); ?></th>
							<td><input type="text" id="peso_actual" value="<?php echo ($peso_maximo > 0)?PFN_peso($peso_actual):PFN___('Xpeso_actual_off'); ?>" class="text" readonly="readonly" /></td>
						</tr>
						<tr id="tr_axuda7" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_raiz_peso_actual'); ?></td>
						</tr>
						<?php if (($id > 0) && ($peso_maximo > 0)) { ?>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(10); return false;">(?)</a> <label for="revisar_peso_actual"><?php echo PFN___('Xrevisar_peso_actual'); ?></label></th>
							<td><input type="checkbox" id="revisar_peso_actual" name="revisar_peso_actual" value="true" tabindex="65" class="checkbox" /></td>
						</tr>
						<tr id="tr_axuda10" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_revisar_peso_actual'); ?></td>
						</tr>
						<?php } ?>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(6); return false;">(?)</a> <label for="estado"><?php echo PFN___('Xestado'); ?></label></th>
							<td>
								<select id="estado" name="estado" tabindex="70">
									<option value="1" <?php echo $PFN_usuarios->get('estado')==1?'selected="selected"':''; ?>>ON</option>
									<option value="0" <?php echo $PFN_usuarios->get('estado')==0?'selected="selected"':''; ?>>OFF</option>
								</select>
							</td>
						</tr>
						<?php if ($id > 0) { ?>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(8); return false;">(?)</a> <label for="borrar_inc"><?php echo PFN___('Xborrar_inc'); ?></label></th>
							<td><input type="checkbox" id="borrar_inc" name="borrar_inc" value="true" tabindex="73" class="checkbox" /></td>
						</tr>
						<tr id="tr_axuda8" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_borrar_inc'); ?></td>
						</tr>
						<tr>
							<th><a href="#" onclick="Xamosa_axuda(9); return false;">(?)</a> <label for="borrar_imx"><?php echo PFN___('Xborrar_imx'); ?></label></th>
							<td><input type="checkbox" id="borrar_imx" name="borrar_imx" value="true" tabindex="73" class="checkbox" /></td>
						</tr>
						<tr id="tr_axuda9" style="display: none;">
							<td colspan="2"><?php echo PFN___('Xaxuda_borrar_imx'); ?></td>
						</tr>
						<?php } ?>
					</table>
			
					<br />
			
					<?php foreach ($Dgrupos as $kg => $vg) { ?>
					<table class="tabla_info" summary="">
						<tr>
							<th>
								<input type="hidden" name="Fgrupos[]" value="<?php echo $kg; ?>" />
								<strong><?php echo PFN___('Xgrupo'); ?>:</strong> <?php echo $vg['nome']; ?>
								&nbsp;&nbsp;|&nbsp;&nbsp;
								<strong><label for="Fconfs_<?php echo $kg; ?>"><?php echo PFN___('Xconfiguracion'); ?>:</label></strong>
								<select id="Fconfs_<?php echo $kg; ?>" name="Fconfs[]">
									<?php foreach ($Dconfs as $kc => $vc) { ?>
									<option value="<?php echo $kc; ?>" <?php echo ($kc == $vg['id_conf'])?'selected="selected"':''; ?>><?php echo $vc; ?></option>
									<?php } ?>
								</select>
								&nbsp;&nbsp;|&nbsp;&nbsp;
								<input type="checkbox" id="marca_desmarca_<?php echo $kg; ?>" name="marca_desmarca_<?php echo $kg; ?>" onclick="marca_desmarca('<?php echo $kg; ?>');" class="checkbox" />
								<strong><label for="marca_desmarca_<?php echo $kg; ?>"><?php echo PFN___('Xmarca_desmarca'); ?></label></strong>
							</th>
						</tr>
					</table>
					<table class="tabla_normal" summary="">
						<?php
						$cont = 3;
			
						foreach ((array)$vg['usuarios'] as $ku => $vu) {
							if ($cont == 3) {
								echo '<tr>';
								$cont = 0;
							}
			
							echo '<td>';
			
							if (!empty($ku)) {
								echo '<input type="checkbox" id="Fusuarios_'.$kg.'_'.$ku.'" name="Fusuarios['.$kg.']['.$ku.']" value="'.$ku.'" '.($vu[1]?'checked="checked"':'').' class="checkbox" /> <label for="Fusuarios_'.$kg.'_'.$ku.'">'.$vu[0].'</label>';
							} else {
								echo '&nbsp;';
							}
			
							echo '</td>';
							$cont++;
			
							if ($cont == 3) {
								echo '</tr>';
							}
						}
			
						if ($cont != 3) {
							for ($i = $cont; $i < 3; $i++) {
								echo '<td>&nbsp;</td>';
							}
			
							echo '</tr>';
						}
						?>
					</table>
			
					<br />
					<?php } ?>
			
					<div style="width: 100%; text-align: center;">
						<?php if (!empty($id)) { ?>
						<input type="reset" value=" <?php echo PFN___('eliminar'); ?> " class="boton" style="margin-right: 40px;" onclick="eliminar();" tabindex="80" />
						<?php } ?>
						<input type="reset" value=" <?php echo PFN___('voltar'); ?> " class="boton" style="margin-right: 40px;" onclick="enlace('index.php');" tabindex="90" />
						<input type="submit" value="<?php echo PFN___('aceptar'); ?>" class="boton" tabindex="100" /><br />
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
	
<script type="text/javascript"><!--

function eliminar () {
	<?php if ($id == $sPFN['raiz']['id']) { ?>
	alert(HtmlDecode('<?php echo addslashes(PFN___('Xerros_5')); ?>'));
	<?php } else { ?>
	if (confirm(HtmlDecode('<?php echo addslashes(PFN___('Xeliminar_raiz')); ?>'))) {
		enlace('eliminar.php?id=<?php echo $id; ?>&amp;<?php echo PFN_get_url(false); ?>');
	}
	<?php } ?>
}

v_peso = '<?php echo $peso_maximo; ?>';

function cambia_peso (opc) {
	if (opc == "MB") {
		document.getElementById('peso_maximo').value = Math.round(parseFloat(v_peso/1024/1024)*100)/100;
	} else if (opc == "GB") {
		document.getElementById('peso_maximo').value = Math.round(parseFloat(v_peso/1024/1024/1024)*100)/100;
	}
}

function marca_desmarca (id) {
	ahora = document.getElementById('marca_desmarca_'+id);

	for (i=0; i<document.forms.length; i++) {
		for (b=0; b<document.forms[i].length; b++) {
			tmpobj = document.forms[i].elements[b];

			if (tmpobj.name && tmpobj.name.indexOf('Fusuarios['+id+']') == 0) {;
				tmpobj.checked = ahora.checked;
			}
		}
	}
}

cambia_peso('MB');

//--></script>
