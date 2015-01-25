<?php
/****************************************************************************
* data/plantillas/Xmenu.inc.php
*
* plantilla para la visualización de la pantalla inicial de administración
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('xestion').' &raquo; '.PFN___('Xmenu_principal'); ?></h1></div>
	<div class="bloque_info">
		<ul id="tabs">
			<li id="tab_li1"><a href="raices/" id="tab_a1"><?php echo PFN___('Xraices'); ?></a></li>
			<li id="tab_li2"><a href="usuarios/" id="tab_a2"><?php echo PFN___('Xusuarios'); ?></a></li>
			<li id="tab_li3"><a href="grupos/" id="tab_a3"><?php echo PFN___('Xgrupos'); ?></a></li>
			<li id="tab_li4"><a href="configuracions/" id="tab_a4"><?php echo PFN___('Xconfiguracions'); ?></a></li>
		</ul>

		<div class="capa_tab"> 
			<br />
			<h2><?php echo PFN___('Xinfo_raices'); ?></h2>

			<?php
				$PFN_usuarios->init('raices_total');

				echo PFN___('Xinfo_raices_txt', $PFN_usuarios->get('total'));
			?>

			<br /><br />
			<h2><?php echo PFN___('Xinfo_usuarios'); ?></h2>

			<?php
				$PFN_usuarios->init('usuarios_total');

				echo PFN___('Xinfo_usuarios_txt', $PFN_usuarios->get('total'));
			?>

			<br /><br />
			<h2><?php echo PFN___('Xinfo_grupos'); ?></h2>

			<?php
				$PFN_usuarios->init('grupos_total');

				echo PFN___('Xinfo_grupos_txt', $PFN_usuarios->get('total'));
			?>
		</div>
	</div>
</div>
