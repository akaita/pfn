<?php
/****************************************************************************
* data/plantillas/menu.inc.php
*
* plantilla para la visualizaci�n del menu de selecci�n de ra�z
*******************************************************************************/

defined('OK') or die();
?>
<h1 id="cab_menu"><span><?php echo PFN___('PFN'); ?></span></h1>

<div id="menu_raices">
	<?php echo PFN___('listado_menu'); ?>
	<ul>
	<?php
	for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
		$ultima = $PFN_usuarios->get('id');
		echo '<li><a href="navega.php?'.PFN_cambia_url('id', $PFN_usuarios->get('id'),	false).'">'.$PFN_usuarios->get('nome').'</a></li>';
	}
	?>
	</ul>
</div>
<div id="pe_menu"><a href="sair.php?id=<?php echo $ultima; ?>&amp;<?php echo PFN_get_url(false); ?>"><?php echo PFN___('sair'); ?></a></div>
