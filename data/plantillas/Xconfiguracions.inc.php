<?php
/****************************************************************************
* data/plantillas/Xconfiguracions.inc.php
*
* plantilla para la visualización de la pantalla inicial de administracion
* de configuracions
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
	<div class="bloque_info"><h1><?php echo PFN___('xestion').' &raquo; '.PFN___('Xadmin_configuracions'); ?></h1></div>
	<div class="bloque_info">

		<ul id="tabs">
			<li id="tab_li1"><a href="../raices/" id="tab_a1"><?php echo PFN___('Xraices'); ?></a></li>
			<li id="tab_li2"><a href="../usuarios/" id="tab_a2"><?php echo PFN___('Xusuarios'); ?></a></li>
			<li id="tab_li3"><a href="../grupos/" id="tab_a3"><?php echo PFN___('Xgrupos'); ?></a></li>
			<li id="tab_li4"><a href="../configuracions/" id="tab_a4" class="activo"><?php echo PFN___('Xconfiguracions'); ?></a></li>
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

			<table class="Xmenu" summary="">
				<tr>
					<th class="centro"><?php echo PFN___('id'); ?></th>
					<th><?php echo PFN___('Xconf'); ?></th>
					<th class="centro"><?php echo PFN___('Xdetalle'); ?></th>
					<th class="centro"><?php echo PFN___('editar'); ?></th>
				</tr>
				<?php
				for ($configuracions = array(), $i = 0; $PFN_usuarios->mais(); $PFN_usuarios->seguinte(), $i++) {
					$on = (($i % 2) == 0)?'1':'0';
					$id = $PFN_usuarios->get('id');
					$configuracions[] = $PFN_usuarios->get('conf').'.inc.php';
				?>
				<tr class="trarq<?php echo $on; ?>">
					<td class="centro"><a href="resumo.php?<?php echo PFN_cambia_url('id', $id, false); ?>"><?php echo $id; ?></a></td>
					<td>
						<a href="resumo.php?<?php echo PFN_cambia_url('id', $id, false); ?>"><?php echo $PFN_usuarios->get('conf'); ?></a>
					</td>
					<td class="centro">
						<a href="ver.php?<?php echo PFN_cambia_url('id', $id, false); ?>"><?php echo PFN___('Xdetalle'); ?></a>
					</td>
					<td class="centro">
						<?php if (is_writable($PFN_paths['conf'].$PFN_usuarios->get('conf').'.inc.php')) { ?>
						<a href="editar.php?<?php echo PFN_cambia_url('id', $id, false); ?>"><?php echo PFN___('editar'); ?></a>
						<?php } else { ?>
						&nbsp;
						<?php } ?>
					</td>
				</tr>
				<?php } ?>
			</table>

			<br /><h2><?php echo PFN___('Xedicion_directa'); ?></h2><br />

			<table class="Xmenu" summary="">
				<?php
				$i = 0;
				$inis = $PFN_niveles->get_contido($PFN_paths['conf']);

				foreach ($inis['arq']['nome'] as $v) {
					if (!preg_match('/\.(ini|php)/', $v) || in_array($v, $configuracions)) {
						continue;
					}
				?>
				<tr class="trarq<?php echo (($i % 2) == 0)?'1':'0'; ?>">
					<td>&nbsp;</td>
					<td><a href="seguridade/index.php?id=<?php echo urlencode(base64_encode($v)); ?>"><?php echo $v; ?></a></td>
					<td class="centro"><a href="seguridade/index.php?id=<?php echo urlencode(base64_encode($v)); ?>"><?php echo PFN___('Xdetalle'); ?></a></td>
					<td class="centro">
						<?php if (is_writable($PFN_paths['conf'].$v)) { ?>
						<a href="seguridade/editar.php?id=<?php echo urlencode(base64_encode($v)); ?>"><?php echo PFN___('editar'); ?></a>
						<?php } else { ?>
						&nbsp;
						<?php } ?>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>
