<?php
/****************************************************************************
* data/plantillas/Xmenu.inc.php
*
* plantilla para la visualización de la pantalla inicial de administración
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
	<div class="bloque_info"><h1><?php echo $PFN_conf->t('xestion').' &raquo; '.$PFN_conf->t('Xmenu_principal'); ?></h1></div>
	<div class="bloque_info">
		<ul id="tabs">
			<li id="tab_li1"><a href="raices/" id="tab_a1"><?php echo $PFN_conf->t('Xraices'); ?></a></li>
			<li id="tab_li2"><a href="usuarios/" id="tab_a2"><?php echo $PFN_conf->t('Xusuarios'); ?></a></li>
			<li id="tab_li3"><a href="grupos/" id="tab_a3"><?php echo $PFN_conf->t('Xgrupos'); ?></a></li>
			<li id="tab_li4"><a href="configuracions/" id="tab_a4"><?php echo $PFN_conf->t('Xconfiguracions'); ?></a></li>
		</ul>

		<div class="capa_tab"> 
			<br />
			<h2><?php echo $PFN_conf->t('Xinfo_raices'); ?></h2>

			<?php
				$PFN_usuarios->init('raices_total');

				echo $PFN_conf->t(array('Xinfo_raices_txt'), $PFN_usuarios->get('total'));
			?>

			<br /><br />
			<h2><?php echo $PFN_conf->t('Xinfo_usuarios'); ?></h2>

			<?php
				$PFN_usuarios->init('usuarios_total');

				echo $PFN_conf->t(array('Xinfo_usuarios_txt'), $PFN_usuarios->get('total'));
			?>

			<br /><br />
			<h2><?php echo $PFN_conf->t('Xinfo_grupos'); ?></h2>

			<?php
				$PFN_usuarios->init('grupos_total');

				echo $PFN_conf->t(array('Xinfo_grupos_txt'), $PFN_usuarios->get('total'));
			?>
		</div>
	</div>
</div>
