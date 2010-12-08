<?php
/****************************************************************************
* instalar/plantillas/cab.inc.php
*
* Plantilla madre para la instalacion
*******************************************************************************/

defined('OK') or die();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $PFN_conf->g('idioma'); ?>">
<head>
<title><?php echo PFN___('PFN'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $basicas['charset']; ?>" />
<meta name="keywords" content="<?php echo PFN___('PFN'); ?>" />
<meta name="description" content="PHPfileNavigator: Administrador de ficheros y directorios via web." />
<meta name="author" content="Lito, phpfilenavigator@litoweb.net" />
<meta name="version" content="<?php echo $PFN_version; ?>" />
<link rel="SHORTCUT ICON" href="<?php echo $relativo; ?>favicon.ico" />
<link rel="stylesheet" href="<?php echo $relativo.$PFN_conf->g('estilo'); ?>estilos.css" type="text/css" />
<link rel="stylesheet" href="instalar.css" type="text/css" />
<script type="text/javascript" src="<?php echo $relativo; ?>js/scripts.js"></script>
</head>
<body>
<div id="corpo">
	<h1 id="logo_i"><img src="imx/logo.png" alt="PHPfileNavigator Logo" /></h1>

	<div id="menu_esquerda">
		<ul>
			<li<?php echo ($paso > 0)?' class="menu_marcado"':''; ?>>1. <span><?php echo PFN___('i_presentacion'); ?></span></li>
			<li<?php echo ($paso > 1)?' class="menu_marcado"':''; ?>>2. <span><?php echo PFN___('i_directorios'); ?></span></li>
			<li<?php echo ($paso > 2)?' class="menu_marcado"':''; ?>>3. <span><?php echo PFN___('i_comprobacion'); ?></span></li>
			<?php if (empty($form['tipo']) || ($form['tipo'] == 'instalar')) { ?>
			<li<?php echo ($paso > 3)?' class="menu_marcado"':''; ?>>4. <span><?php echo PFN___('i_datos'); ?></span></li>
			<?php } else { ?>
			<li class="tachado">4. <span><?php echo PFN___('i_datos'); ?></span></li>
			<?php } ?>
			<li<?php echo ($paso > 4)?' class="menu_marcado"':''; ?>>5. <span><?php echo PFN___('i_instalar'); ?></span></li>
			<li<?php echo ($paso > 5)?' class="menu_marcado"':''; ?>>6. <span><?php echo PFN___('i_remate'); ?></span></li>
		</ul>
	</div>

	<div id="contido">
