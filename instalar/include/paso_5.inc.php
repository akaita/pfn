<?php
/*******************************************************************************
* instalar/include/paso_5.inc.php
*
* Quinto paso de la instalación
*******************************************************************************/

defined('OK') or die();

$erros = array(); 

@set_time_limit(180);
@ini_set('memory_limit', -1);

if ($form['tipo'] == 'instalar') {
	include ($PFN_paths['instalar'].'include/instalar.inc.php');

	if (count($erros) > 0) {
		include ($PFN_paths['instalar'].'plantillas/paso_4.inc.php');
	} else {
		include ($PFN_paths['instalar'].'plantillas/instalar.inc.php');
	}
} else {
	include ($PFN_paths['instalar'].'include/actualizar.inc.php');
}

if ((count($erros) == 0) && $form['aviso_instalacion'] == 'true') {
	if ($form['tipo'] == 'instalar') {
		$msx_tit = 'Aviso de nova instalacion '.$PFN_version;
		$msx_txt = 'Version: '.$PFN_version
			."\n\n".'Host de instalacion: '.$form['ra_dominio']
			."\n\n".'Servidor: '.getenv('SERVER_NAME')
			."\n\n".'Correo: '.$form['ad_correo'];
		$msx_email = $form['ad_correo'];
	} else {
		$msx_tit = 'Aviso actualizacion de '.$basicas['version'].' a '.$PFN_version;
		$msx_txt = 'Version anterior: '.$basicas['version']
			."\n\n".'Version instalada: '.$PFN_version
			."\n\n".'Servidor: '.getenv('SERVER_NAME')
			."\n\n".'Correo: '.$basicas['email'];
		$msx_email = $basicas['email'];
	}

	@mail('phpfilenavigator@litoweb.net', $msx_tit, $msx_txt, 'FROM: '.$msx_email);
}
?>
