<?php
/*******************************************************************************
* instalar/include/actualizar.inc.php
*
* Ejectula la acción de actualización desde la versión 2.0.0 o posterior
*

PHPfileNavigator versión 2.3.3

Copyright (C) 2004-2006 Lito <lito@eordes.com>

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

defined('OK') or die();

$erros = $erros_q = $paso_feito = $feito = array();

$existe = implode('',$basicas['db']);

if (strlen($existe) == 0) {
	$erros[] = 18;
} else {
	if ($con = @mysql_connect($basicas['db']['host'], $basicas['db']['usuario'], $basicas['db']['contrasinal'])) {
		if (!@mysql_select_db($basicas['db']['base_datos'], $con)) {
			$erros[] = 15;
		}
	} else {
		$erros[] = 16;
	}
}

if (count($erros) == 0) {
	if ($basicas['version'] < 201) {
		include_once ($PFN_paths['instalar'].'include/actualizar_200-201.inc.php');
	}

	if ($PFN_vars->post('ignorar') == 'true') {
		$erros = array();
	}

	if ($basicas['version'] < 220) {
		include_once ($PFN_paths['instalar'].'include/actualizar_201-220.inc.php');
	}

	if ($PFN_vars->post('ignorar') == 'true') {
		$erros = array();
	}

	if ($basicas['version'] < 230) {
		include_once ($PFN_paths['instalar'].'include/actualizar_220-230.inc.php');
	}

	if ($PFN_vars->post('ignorar') == 'true') {
		$erros = array();
	}

	if ($basicas['version'] < 233) {
		include_once ($PFN_paths['instalar'].'include/actualizar_230-233.inc.php');
	}

	if ($PFN_vars->post('ignorar') == 'true') {
		$erros = array();
	}

	if ($basicas['version'] < 240) {
		include_once ($PFN_paths['instalar'].'include/actualizar_233-240.inc.php');
	}

	if ($PFN_vars->post('ignorar') == 'true') {
		$erros = array();
	}

	$PFN_conf->inicial('default');

	if (count($erros) == 0) {
		include ($PFN_paths['instalar'].'include/basicas.inc.php');

		$novo_basicas = basicas(array(
			'version' => $PFN_version,
			'idioma' => $form['idioma'],
			'estilo' => 'estilos/pfn/',
			'email' => $basicas['email'],
			'gd2' => $form['gd2'],
			'zlib' => $form['zlib'],
			'charset' => $form['charset'],
			'envio_alertas' => $basicas['envio_alertas'],
			'db:host' => $basicas['db']['host'],
			'db:base_datos' => $basicas['db']['base_datos'],
			'db:usuario' => $basicas['db']['usuario'],
			'db:contrasinal' => $basicas['db']['contrasinal'],
			'db:prefixo' => $basicas['db']['prefixo'],
			'smtp:host' => $basicas['smtp']['host'],
			'smtp:user' => $basicas['smtp']['user'],
			'smtp:password' => $basicas['smtp']['password'],
			'smtp:port' => $basicas['smtp']['port'],
			'smtp:secure' => $basicas['smtp']['secure'],
			'smtp:auth' => $basicas['smtp']['auth'],
			'smtp:timeout' => $basicas['smtp']['timeout'],
			'smtp:debug' => $basicas['smtp']['debug']
		));

		$PFN_conf->inicial('basicas');

		if (is_file($PFN_paths['conf'].$basicas['clave'].'.lic')) {
			rename($PFN_paths['conf'].$basicas['clave'].'.lic', $PFN_paths['conf'].$novo_basicas['clave'].'.lic');
		} else if (is_file($PFN_paths['conf'].'licencia.lic')) {
			rename($PFN_paths['conf'].'licencia.lic', $PFN_paths['conf'].$novo_basicas['clave'].'.lic');
		}

		if (is_file($PFN_paths['conf'].$basicas['clave'].'.ini')) {
			rename($PFN_paths['conf'].$basicas['clave'].'.ini', $PFN_paths['conf'].$novo_basicas['clave'].'.ini');
		} else if (is_file($PFN_paths['conf'].'conf.ini')) {
			rename($PFN_paths['conf'].'conf.ini', $PFN_paths['conf'].$novo_basicas['clave'].'.ini');
		}

		if (is_file($PFN_paths['conf'].$basicas['clave'].'.conv')) {
			rename($PFN_paths['conf'].$basicas['clave'].'.conv', $PFN_paths['conf'].$novo_basicas['clave'].'.conv');
		} else if (is_file($PFN_paths['conf'].'control.conv')) {
			rename($PFN_paths['conf'].'control.conv', $PFN_paths['conf'].$novo_basicas['clave'].'.conv');
		}

		$feito[] = 'conf';
	}
}

if ($con) {
	@mysql_close($con);
}

include ($PFN_paths['instalar'].'plantillas/actualizar.inc.php');
?>
