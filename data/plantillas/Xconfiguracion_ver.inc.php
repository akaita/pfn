<?php
/****************************************************************************
* data/plantillas/Xconfiguracion_ver.inc.php
*
* plantilla para la visualización del contenido de un fichero de configuración
*

PHPfileNavigator versión 2.0.0

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
<script type="text/javascript"><!--

function eliminar () {
	if (confirm(HtmlDecode('<?php echo addslashes(PFN___('Xeliminar_conf')); ?>'))) {
		enlace('eliminar.php?<?php echo PFN_cambia_url('id', $id, false); ?>');
	}
}

//--></script>

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
			<input type="reset" value=" <?php echo PFN___('voltar'); ?> " class="boton" onclick="enlace('resumo.php?<?php echo PFN_cambia_url('id', $id, false); ?>');" />
			<?php if ($editar) { ?>
			<input type="button" value=" <?php echo PFN___('editar'); ?> " class="boton" style="margin-left: 40px;" onclick="enlace('editar.php?<?php echo PFN_cambia_url('id', $id, false); ?>');" />
			<?php if ($PFN_usuarios->get('vale')) { ?>
			<input type="button" value=" <?php echo PFN___('eliminar'); ?> " class="boton" style="margin-left: 40px;" onclick="eliminar();" />
			<?php } ?>
			<?php } ?>
			<br /><br />
	
			<div>
				<?php
				if (count($erros) > 0) {
					echo '<div class="aviso">'.PFN___('Xerros_'.$erros[0]).'</div>';
				} else {
					echo '<pre>'.PFN_textoArquivo2pantalla($PFN_arquivos->get_contido($nome_arq), true).'</pre>';
				}
				?>
			</div>
			<br /><input type="reset" value=" <?php echo PFN___('voltar'); ?> " class="boton" onclick="enlace('resumo.php?<?php echo PFN_cambia_url('id', $id, false); ?>');" />
			<?php if ($editar) { ?>
			<input type="button" value=" <?php echo PFN___('editar'); ?> " class="boton" style="margin-left: 40px;" onclick="enlace('editar.php?<?php echo PFN_cambia_url('id', $id, false); ?>');" />
			<?php if ($PFN_usuarios->get('vale')) { ?>
			<input type="button" value=" <?php echo PFN___('eliminar'); ?> " class="boton" style="margin-left: 40px;" onclick="eliminar();" />
			<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>
