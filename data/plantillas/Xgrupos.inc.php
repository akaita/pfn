<?php
/****************************************************************************
* data/plantillas/Xgrupos.inc.php
*
* plantilla para la visualización de la pantalla inicial de administracion
* de grupos
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('xestion').' &raquo; '.PFN___('Xadmin_grupos'); ?></h1></div>
	<div class="bloque_info">

		<ul id="tabs">
			<li id="tab_li1"><a href="../raices/" id="tab_a1"><?php echo PFN___('Xraices'); ?></a></li>
			<li id="tab_li2"><a href="../usuarios/" id="tab_a2"><?php echo PFN___('Xusuarios'); ?></a></li>
			<li id="tab_li3"><a href="../grupos/" id="tab_a3" class="activo"><?php echo PFN___('Xgrupos'); ?></a></li>
			<li id="tab_li4"><a href="../configuracions/" id="tab_a4"><?php echo PFN___('Xconfiguracions'); ?></a></li>
		</ul>

		<div class="capa_tab"> 
			<?php if ($erros || $ok) { ?>
			<div class="aviso">
				<?php
				if ($erros) {
					foreach ($erros as $v) {
						echo PFN___('Xerros_'.intval($v)).'<br />';
					}
				} else {
					echo PFN___('Xok_'.$ok);
				}
				?>
			</div>
			<?php } ?>

			<form action="<?php echo PFN_cambia_url(array('buscar','paxina','paxinar'), array($buscar, $paxina, $paxinar)); ?>" method="post" onsubmit="return submitonce();">
				<fieldset>
					<input type="hidden" name="accion" value="gardar" />

					<div class="con_borde">
						<label for="paxinar1"><?php echo PFN___('Xamosar'); ?>:</label>
						<select name="paxinar" id="paxinar1" class="d40" onchange="enlace('?paxinar='+this.value);">
							<?php
							for ($i = 50; $i < $total; $i += 50) {
								echo '<option value="'.$i.'" '.(($i == $paxinar)?'selected="selected"':'').'>'.$i.'</option>';
							}

							echo '<option value="'.$total.'" '.(($paxinar == $total)?'selected="selected"':'').'>'.$total.'</option>';
							?>
						</select>

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<label for="paxina1"><?php echo PFN___('Xpaxina'); ?>:</label>
						<select name="paxina" id="paxina1" onchange="enlace('?paxinar='+$('#paxinar1').val()+'&amp;paxina='+this.value);">
							<?php
							for ($i = 0; $i <= $total; $i += $paxinar) {
								$selected = ($i == $paxina)?'selected="selected"':'';
								$fin = (($i + $paxinar) >= $total)?$total:($i + $paxinar);
							?>
							<option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo ($i + 1).' - '.$fin; ?></option>
							<?php } ?>
						</select>

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<label for="buscar1"><?php echo PFN___('Xbuscar'); ?>:</label>
						<input type="text" name="buscar" id="buscar1" value="<?php echo $buscar; ?>" />
					</div>

					<table class="Xmenu" summary="">
						<tr>
							<th class="centro"><?php echo PFN___('id'); ?></th>
							<th><?php echo PFN___('Xnome'); ?></th>
							<th class="centro"><?php echo PFN___('Xestado'); ?></th>
						</tr>
						<?php
						for ($i = 0; $PFN_usuarios->mais(); $PFN_usuarios->seguinte(), $i++) {
							$on = (($i % 2) == 0)?'1':'0';
							$id = $PFN_usuarios->get('id');
						?>
						<tr class="trarq<?php echo $on; ?>">
							<td class="centro"><a href="editar.php?<?php echo PFN_cambia_url('id', $id, false); ?>"><?php echo $id; ?></a></td>
							<td>
								<input type="hidden" name="antes[<?php echo $id; ?>]" value="<?php echo $PFN_usuarios->get('estado'); ?>" />
								<a href="editar.php?<?php echo PFN_cambia_url('id', $id, false); ?>"><?php echo $PFN_usuarios->get('nome'); ?></a>
							</td>
							<td class="centro">
								<select id="estado_3_<?php echo $id; ?>" name="estado[<?php echo $id; ?>]">
									<option value="1" <?php echo $PFN_usuarios->get('estado')==1?'selected="selected"':''; ?>>ON</option>
									<option value="0" <?php echo $PFN_usuarios->get('estado')==0?'selected="selected"':''; ?>>OFF</option>
								</select>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td colspan="4" class="centro"><br /><input type="submit" value="<?php echo PFN___('Xcambiar'); ?>" class="boton" /></td>
						</tr>
					</table>

					<div class="con_borde">
						<label for="paxinar2"><?php echo PFN___('Xamosar'); ?>:</label>
						<select name="paxinar" id="paxinar2" class="d40" onchange="enlace('<?php echo PFN_get_url(); ?>&amp;paxinar='+this.value);">
							<?php
							for ($i = 50; $i < $total; $i += 50) {
								echo '<option value="'.$i.'" '.(($i == $paxinar)?'selected="selected"':'').'>'.$i.'</option>';
							}

							echo '<option value="'.$total.'" '.(($paxinar == $total)?'selected="selected"':'').'>'.$total.'</option>';
							?>
						</select>

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<label for="paxina2"><?php echo PFN___('Xpaxina'); ?>:</label>
						<select name="paxina" id="paxina2" onchange="enlace('<?php echo PFN_get_url(); ?>&amp;paxinar='+$('#paxinar2').val()+'&amp;paxina='+this.value);">
							<?php
							for ($i = 0; $i <= $total; $i += $paxinar) {
								$selected = ($i == $paxina)?'selected="selected"':'';
								$fin = (($i + $paxinar) >= $total)?$total:($i + $paxinar);
							?>
							<option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo ($i + 1).' - '.$fin; ?></option>
							<?php } ?>
						</select>

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<label for="buscar1"><?php echo PFN___('Xbuscar'); ?>:</label>
						<input type="text" name="buscar" id="buscar1" value="<?php echo $buscar; ?>" />
					</div>

				</fieldset>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
$('input[name=buscar]').keypress(function (e) {
	if (e.keyCode == 13) {
		if ($(this).val() == '') {
			location.href = '?';
		} else {
			location.href = '?buscar='+$(this).val();
		}

		return false;
	}
});
</script>
