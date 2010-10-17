<?php
/****************************************************************************
* data/plantillas/Xconfiguracion_resumo.inc.php
*
* plantilla para la visualización de los datos y relaciones de un fichero de 
* configuración
*

PHPfileNavigator versión 2.2.0

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
	<div class="bloque_info"><h1><?php echo PFN___('xestion').' &raquo; '.PFN___('Xconf_ver'); ?></h1></div>
	<div class="bloque_info">

		<ul id="tabs">
			<li id="tab_li1"><a href="../raices/" id="tab_a1"><?php echo PFN___('Xraices'); ?></a></li>
			<li id="tab_li2"><a href="../usuarios/" id="tab_a2"><?php echo PFN___('Xusuarios'); ?></a></li>
			<li id="tab_li3"><a href="../grupos/" id="tab_a3"><?php echo PFN___('Xgrupos'); ?></a></li>
			<li id="tab_li4"><a href="../configuracions/" id="tab_a4" class="activo"><?php echo PFN___('Xconfiguracions'); ?></a></li>
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
			<br />
			<?php } ?>

			<table class="tabla_normal" summary="">
				<tr>
					<td valign="top" style="text-align: center;">
						<img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>ico/php.png" alt="PHP" />

						<br /><strong><?php echo $nome; ?></strong>
						<br /><br />

						<table class="tabla_info" summary="">
							<tr>
								<th><?php echo PFN___('id'); ?></th>
								<td><strong><?php echo $PFN_usuarios->get('id'); ?></strong></td>
							</tr>
							<tr>
								<th><?php echo PFN___('peso'); ?>:&nbsp;</th>
								<td><strong>&nbsp;<?php echo PFN_peso(PFN_espacio_disco($stat['size'])); ?></strong></td>
							</tr>
							<tr>
								<th><?php echo PFN___('Xpeso_exacto'); ?>:&nbsp;</th>
								<td><strong>&nbsp;<?php echo PFN_espacio_disco($stat['size'], true); ?> Bytes</strong></td>
							</tr>
							<tr>
								<th><?php echo PFN___('Xmodificado'); ?>:&nbsp;</th>
								<td><strong>&nbsp;<?php echo date($PFN_conf->g('data'), $stat['mtime']); ?></strong></td>
							</tr>
							<tr>
								<th><?php echo PFN___('Xuid'); ?>:&nbsp;</th>
								<td><strong>&nbsp;<?php echo $stat['uid']; ?></strong></td>
							</tr>
							<tr>
								<th><?php echo PFN___('Xgid'); ?>:&nbsp;</th>
								<td><strong>&nbsp;<?php echo $stat['gid']; ?></strong></td>
							</tr>
						</table>
	
						<script type="text/javascript"><!--
	
						<?php if ($eliminar && $vale) { ?>
						function eliminar () {
							if (confirm(HtmlDecode('<?php echo addslashes(PFN___('Xeliminar_conf')); ?>'))) {
								enlace('eliminar.php?<?php echo PFN_cambia_url('id', $id, false); ?>');
							}
						}
						<?php } if ($vale) { ?>
						function duplicar () {
							nome = prompt(HtmlDecode('<?php echo addslashes(PFN___('Xnovo_nome')); ?>'));
	
							if (nome != '' && nome != null) {
								enlace('duplicar.php?novo='+nome+'&amp;<?php echo PFN_cambia_url('id', $id, false); ?>');
							}
						}
						<?php } ?>
	
						//--></script>
						<br />
						<?php if ($existe_arq) { ?>
						<input type="button" value=" <?php echo PFN___('ver_contido'); ?> " class="boton" onclick="enlace('ver.php?<?php echo PFN_cambia_url('id', $id, false); ?>');" /><br /><br />
						<input type="button" value=" <?php echo PFN___('Xcomprobar_sintaxis'); ?> " class="boton" onclick="window.open('sintaxis.php?<?php echo PFN_cambia_url('id', $id, false); ?>', 'Sintaxis', 'width=480,height=400,toolbar=no,fullscreen=no,location=no,directories=no,status=no,menubar=no,resizable=yes');" /><br /><br />
						<?php if ($editar) { ?>
						<input type="button" value=" <?php echo PFN___('editar'); ?> " class="boton" onclick="enlace('editar.php?<?php echo PFN_cambia_url('id', $id, false); ?>');" /><br /><br />
						<?php } if ($vale) { ?>
						<input type="button" value=" <?php echo PFN___('Xduplicar'); ?> " class="boton" onclick="duplicar();" /><br /><br />
						<?php } } if ($eliminar && $vale) { ?>
						<input type="button" value=" <?php echo PFN___('eliminar'); ?> " class="boton" onclick="eliminar();" /><br /><br />
						<?php } ?>
					</td>
					<td valign="top">
					<?php if ($PFN_usuarios->init('configuracion_grupos', $id)) { ?>
						<strong><?php echo PFN___('Xgrupos_relacionados'); ?>: </strong>
						<hr noshade="noshade" />
						<?php for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) { ?>
						<a href="../grupos/editar.php?<?php echo PFN_cambia_url('id', $PFN_usuarios->get('id'), false); ?>" class="ao12"><?php echo $PFN_usuarios->get('nome'); ?></a><br />
						<?php } ?>
						<br />
					<?php } ?>
					<?php if ($PFN_usuarios->init('configuracion_raices', $id)) { ?>
						<strong><?php echo PFN___('Xraices_relacionadas'); ?>: </strong>
						<hr noshade="noshade" />
						<?php for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) { ?>
						<a href="../raices/editar.php?<?php echo PFN_cambia_url('id', $PFN_usuarios->get('id_raiz'), false); ?>" class="ao12"><?php echo $PFN_usuarios->get('raiz'); ?> (<?php echo $PFN_usuarios->get('grupo'); ?>)</a><br />
						<?php } ?>
						<br />
					<?php } ?>
				</tr>
			</table>
			<br /><input type="reset" value=" <?php echo PFN___('voltar'); ?> " class="boton" onclick="enlace('index.php');" /><br />
		</div>
	</div>
</div>
