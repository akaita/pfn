<?php
/****************************************************************************
* data/plantillas/Xopcions.inc.php
*
* plantilla para la visualización del menú superior de opciones en la
* zona de administrador
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
<div id="menu_principal">
	<div id="escolle_ancho"><a href="#" onclick="return marca_ancho_corpo(true);" title="<?php echo PFN___('maximizar_corpo'); ?>"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/ancho_corpo.png" alt="<?php echo PFN___('maximizar_corpo'); ?>" /></a></div>

	<h1 id="logo"><a href="<?php echo $relativo; ?>navega.php?<?php echo PFN_quita_url('dir',false); ?>"><span>&nbsp;</span><?php echo PFN___('PFN'); ?></a></h1>

	<ul id="menu1">
		<li><a href="<?php echo $Xopcions['m_comezo']; ?>"><?php echo PFN___('comezo'); ?></a></li>
		<li class="admin"><a href="<?php echo $Xopcions['m_admin']; ?>"><?php echo PFN___('zona_admin'); ?></a></li>
		<li><a href="<?php echo $Xopcions['m_sair']; ?>"><?php echo PFN___('sair'); ?></a></li>
	</ul>

	<br class="nada" />

	<ul id="menu2">
		<li><a href="<?php echo $Xopcions['Xm_crear_raiz']; ?>" onmouseover="amosa('menu_txt_crear_raiz');" onmouseout="oculta('menu_txt_crear_raiz');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/crear_raiz.png" alt="<?php echo PFN___('Xm_crear_raiz'); ?>" /></a></li>
		<li><a href="<?php echo $Xopcions['Xm_crear_usuario']; ?>" onmouseover="amosa('menu_txt_crear_usuario');" onmouseout="oculta('menu_txt_crear_usuario');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/crear_usuario.png" alt="<?php echo PFN___('Xm_crear_usuario'); ?>" /></a></li>
		<li><a href="<?php echo $Xopcions['Xm_crear_grupo']; ?>" onmouseover="amosa('menu_txt_crear_grupo');" onmouseout="oculta('menu_txt_crear_grupo');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/crear_grupo.png" alt="<?php echo PFN___('Xm_crear_grupo'); ?>" /></a></li>
		<li><a href="<?php echo $Xopcions['Xm_importar_csv']; ?>" onmouseover="amosa('menu_txt_importar_csv');" onmouseout="oculta('menu_txt_importar_csv');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/importar_csv.png" alt="<?php echo PFN___('Xm_importar_csv'); ?>" /></a></li>
		<li><a href="<?php echo $Xopcions['Xm_informes']; ?>" onmouseover="amosa('menu_txt_informes');" onmouseout="oculta('menu_txt_informes');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/informes.png" alt="<?php echo PFN___('Xm_informes'); ?>" /></a></li>
		<li><a href="<?php echo $Xopcions['Xm_varios']; ?>" onmouseover="amosa('menu_txt_varios');" onmouseout="oculta('menu_txt_varios');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/varios.png" alt="<?php echo PFN___('Xm_varios'); ?>" /></a></li>
		<li><a href="<?php echo $Xopcions['Xm_traduccion']; ?>" onmouseover="amosa('menu_txt_traduccion');" onmouseout="oculta('menu_txt_traduccion');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/traduccion.png" alt="<?php echo PFN___('Xm_traduccion'); ?>" /></a></li>
		<li id="menu_texto">
			<span id="menu_txt_crear_raiz" style="display: none;"><?php echo PFN___('Xm_crear_raiz'); ?></span>
			<span id="menu_txt_crear_usuario" style="display: none;"><?php echo PFN___('Xm_crear_usuario'); ?></span>
			<span id="menu_txt_crear_grupo" style="display: none;"><?php echo PFN___('Xm_crear_grupo'); ?></span>
			<span id="menu_txt_importar_csv" style="display: none;"><?php echo PFN___('Xm_importar_csv'); ?></span>
			<span id="menu_txt_informes" style="display: none;"><?php echo PFN___('Xm_informes'); ?></span>
			<span id="menu_txt_varios" style="display: none;"><?php echo PFN___('Xm_varios'); ?></span>
			<span id="menu_txt_traduccion" style="display: none;"><?php echo PFN___('Xm_traduccion'); ?></span>
		</li>
	</ul>
</div>

<br class="nada" />
