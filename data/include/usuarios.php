<?php
/****************************************************************************
* data/include/usuarios.php
*
* Controla el acceso en cada petición
*******************************************************************************/

defined('OK') or die();

function envia_erro ($erro) {
	global $PFN_vars, $PFN_conf, $PFN_paths, $relativo;

	if ($PFN_conf->g('envio_alertas')) {
		$m = 'Alerta por intento de acceso al servidor '.$PFN_vars->server('SERVER_NAME')
			."\nEn la URL ".$PFN_vars->server('PHP_SELF')
			."\nA las ".date('Y-m-d H:i')
			."\nDesde la IP ".$PFN_vars->ip()
			."\n\n".PFN___('alertas_sesion_'.$erro);

		ob_start();
		echo "\n\nDatos de GET:\n";
		var_dump($PFN_vars->get(''));

		echo "\n\nDatos de POST:\n";
		var_dump($PFN_vars->post(''));

		echo "\n\nDatos de SESSION:\n";
		var_dump($PFN_vars->session(''));

		$m .= ob_get_contents();

		ob_end_clean();

		include_once ($PFN_paths['include'].'phpmailer/class.phpmailer.php');

		$mail = new PHPMailer();

		$mail->From = 'no-reply@'.getenv('SERVER_NAME');
		$mail->FromName = 'System Administrator';
		$mail->Subject = 'Alerta de seguridad en '.$PFN_vars->server('SERVER_NAME');
		$mail->Body = $m;

		$mail->AddAddress($PFN_conf->g('email'));

		$mail->Send();
	}

	$PFN_conf->inicial('default');

	@session_start();

	$sPFN = '';
	session_register('sPFN');
	session_unregister('sPFN');
	
	$url = preg_replace('/[\?&]erro=[^&]*/', '', $PFN_conf->g('saida'));
	$url = 'index.php'?"$relativo$url":$url;
	$url .= (strstr($url, '?')?'&':'?');

	if ($PFN_conf->g('manter_session')) {
		$url .= session_name().'='.session_id().'&';
	} else {
		@session_unset();
		@session_destroy();
	}

	session_write_close();

//	$url = str_replace('?&', '?', $url.'&erro='.base64_encode($erro));
	$url = str_replace('?&', '?', $url.'&erro=MQ%3D%3D');

	Header('Location: '.$url);
	exit;
}

unset($erro);

$tmp_sPFN = trim($PFN_vars->get('sPFN'));
$tmp_sPFN .= trim($PFN_vars->post('sPFN'));

if (!empty($tmp_sPFN)) {
	$PFN_usuarios->garda_rexistro('colar', 0);
	envia_erro(1);
}

session_start();

$sPFN = $PFN_vars->session('sPFN');

if (!is_array($sPFN) || !count($sPFN)) {
	$PFN_usuarios->garda_rexistro('vacios', 0);
	envia_erro(2);
}

$id = $PFN_vars->get('id');

if (empty($id)) {
	unset($id);
}

if (empty($id)
&& empty($sPFN['raiz']['id'])
&& basename($PFN_vars->server('PHP_SELF')) != 'menu.php') {
	session_write_close();

	Header('Location: '.$relativo.'menu.php?'.session_name().'='.session_id());
	exit;
} elseif (!empty($id) && strstr(getenv('REQUEST_URI'), 'navega.php')) {
	$sPFN['raiz']['id'] = $id;

	session_register('sPFN');

	$PFN_vars->session('sPFN', $sPFN);
}

if (!$PFN_usuarios->init('session')) {
	$PFN_usuarios->garda_rexistro('session', 0);
	envia_erro(3);
}

$PFN_conf->p($sPFN['raiz']['id'],'raiz','id');
$PFN_conf->p($sPFN['raiz']['unica'],'raiz','unica');
$PFN_conf->p($PFN_usuarios->get('nome'),'raiz','nome');
$PFN_conf->p($PFN_usuarios->get('path'),'raiz','path');
$PFN_conf->p($PFN_usuarios->get('web'),'raiz','web');
$PFN_conf->p($PFN_usuarios->get('host'),'raiz','host');
$PFN_conf->p($PFN_usuarios->get('conf'),'raiz','conf');
$PFN_conf->p($PFN_usuarios->get('mantemento'),'raiz','mantemento');
$PFN_conf->p($PFN_usuarios->get('peso_maximo'),'raiz','peso_maximo');
$PFN_conf->p($PFN_usuarios->get('peso_actual'),'raiz','peso_actual');

foreach ($sPFN['usuario'] as $k => $v) {
	$PFN_conf->p($v, 'usuario', $k);
}
?>
