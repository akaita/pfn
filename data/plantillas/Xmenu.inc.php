<?php
/****************************************************************************
* data/plantillas/Xmenu.inc.php
*
* plantilla para la visualizaci�n de la pantalla inicial de administraci�n
*

PHPfileNavigator versi�n 2.2.0

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net/

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
t�rminos de la Licencia P�blica General de GNU seg�n es publicada por la Free
Software Foundation, bien de la versi�n 2 de dicha Licencia o bien (seg�n su
elecci�n) de cualquier versi�n posterior. 

Este programa se distribuye con la esperanza de que sea �til, pero SIN NINGUNA
GARANT�A, incluso sin la garant�a MERCANTIL impl�cita o sin garantizar la
CONVENIENCIA PARA UN PROP�SITO PARTICULAR. V�ase la Licencia P�blica General de
GNU para m�s detalles. 

Deber�a haber recibido una copia de la Licencia P�blica General junto con este
programa. Si no ha sido as�, escriba a la Free Software Foundation, Inc., en
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
