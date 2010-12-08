<?php
/****************************************************************************
* comprobar.php
*
* Control de login que redirije para el menú o vuelve al index
*******************************************************************************/

include ('paths.php');
include_once ($PFN_paths['include'].'borra_cache.php');
include_once ($PFN_paths['include'].'funcions.php');
include_once ($PFN_paths['include'].'class_conf.php');
include_once ($PFN_paths['include'].'class_vars.php');
include_once ($PFN_paths['include'].'mysql.php');
include_once ($PFN_paths['include'].'clases.php');
include_once ($PFN_paths['include'].'class_usuarios.php');
include_once ($PFN_paths['include'].'class_sesion.php');

$PFN_conf->carga();

$PFN_sesion->encriptar(false,true);

$PFN_conf->inicial('login');
$PFN_usuarios->vars($PFN_vars);

$erro = false;
$sPFN = array();
$usuario = $PFN_usuarios->login('usuario');
$contrasinal = $PFN_usuarios->login('contrasinal');

$PFN_usuarios->init('intentos', $usuario);

if ($PFN_vars->ip() == $PFN_usuarios->get('ip')) {
	$erro = 3;
} else if (intval($PFN_usuarios->get('estado')) === 0) {
	if ($PFN_usuarios->get('donde') == 'bloqueado') {
		$PFN_usuarios->usuario = $PFN_usuarios->corrixe($usuario);
		$PFN_usuarios->garda_rexistro('bloqueado',0);
		$PFN_usuarios->bloquear_usuario($usuario);

		$erro = 2;
	} else {
		$intentos = 0;

		for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
			if ((intval($PFN_usuarios->get('estado')) === 0) && ($PFN_usuarios->get('donde') == 'login')) {
				$intentos++;
			}
		}

		if ($intentos >= $PFN_usuarios->intentos_errados) {
			$PFN_usuarios->usuario = $PFN_usuarios->corrixe($usuario);
			$PFN_usuarios->garda_rexistro('bloqueado',0);
			$PFN_usuarios->bloquear_usuario($usuario);

			$erro = 2;
		}
	}
}

if (!$erro) {
	$PFN_usuarios->init('login', $usuario, $contrasinal);

	if ($PFN_usuarios->filas() == 0) {
		$erro = 1;
	} else if (intval($PFN_usuarios->get('estado')) === 2) {
		$erro = 4;
	} else if (intval($PFN_usuarios->get('estado')) === 0) {
		$erro = 5;
	} else if (intval($PFN_usuarios->get('estado')) === 1) {
		$sPFN['usuario'] = array(
			'id' => $PFN_usuarios->get('id'),
			'nome' => $PFN_usuarios->get('nome'),
			'usuario' => $usuario,
			'contrasinal' => $contrasinal,
			'admin' => $PFN_usuarios->get('admin'),
			'id_grupo' => $PFN_usuarios->get('id_grupo'),
			'conf_defecto' => $PFN_usuarios->get('conf_defecto'),
			'mantemento' => $PFN_usuarios->get('mantemento'),
			'descargas_maximo' => $PFN_usuarios->get('descargas_maximo'),
			'cambiar_datos' => $PFN_usuarios->get('cambiar_datos'),
		);

		if (!$PFN_usuarios->sesion_iniciada) {
			session_start();
		}

		session_register('sPFN');

		$PFN_vars->session('sPFN', $sPFN);

		$PFN_sesion->escribir(session_id(), ('sPFN|'.serialize($sPFN)));

		session_write_close();

		$PFN_usuarios->garda_rexistro('login',1);

		Header('Location: menu.php?'.session_name().'='.session_id());
		exit;
	} else {
		$erro = 1;
	}
}

if ($erro != 2) {
	$PFN_usuarios->usuario = $PFN_usuarios->corrixe($usuario);
	$PFN_usuarios->garda_rexistro('login',0);
}

$url = preg_replace('/[\?&]erro=[^&]*/', '', $PFN_vars->server('HTTP_REFERER'));

if (empty($url)) {
	$url = 'index.php?erro='.urlencode(base64_encode(1));
} else {
	$url .= (strstr($url, '?')?'&':'?').'erro='.urlencode(base64_encode($erro));
}

Header('Location: '.$url);
exit;
?>
