<?php
if ($_SERVER['HTTPS'] != 'on') {
	header('Location: https://'.getenv('SERVER_NAME').getenv('REQUEST_URI'));
	exit;
}

include ('../paths.php');
include_once ($PFN_paths['include'].'borra_cache.php');
include_once ($PFN_paths['include'].'funcions.php');
include_once ($PFN_paths['include'].'class_conf.php');
include_once ($PFN_paths['include'].'class_ssl.php');

$PFN_conf->textos('web');

if ($_SERVER['SSL_CLIENT_VERIFY'] == 'SUCCESS') {
	list ($dnie, $dni) = $PFN_SSL->getDNIe($_SERVER['SSL_CLIENT_S_DN']);

	if (!$dni || ($dnie && !$PFN_SSL->checkDNIe())) {
		// Usuario con DNIe no operativo o valor de DNI no encontrado
		echo '<script type="text/javascript" src="../js/html_decoder.js"></script>';
		echo '<script type="text/javascript">';
		echo 'alert(HtmlDecode("'.$PFN_conf->t('acceso_certificado', '5').'"));';
		echo 'location.href = "../";';
		echo '</script>';

		exit;
	}

	include_once ($PFN_paths['include'].'class_vars.php');
	include_once ($PFN_paths['include'].'mysql.php');
	include_once ($PFN_paths['include'].'clases.php');
	include_once ($PFN_paths['include'].'class_usuarios.php');
	include_once ($PFN_paths['include'].'class_sesion.php');

	$PFN_sesion->encriptar(false,true);

	$PFN_usuarios->init('intentos_id_control', $dni);

	if ($PFN_vars->ip() == $PFN_usuarios->get('ip')) {
		echo '<script type="text/javascript" src="../js/html_decoder.js"></script>';
		echo '<script type="text/javascript">';
		echo 'alert(HtmlDecode("'.$PFN_conf->t('acceso_certificado', '1').'"));';
		echo 'location.href = "../";';
		echo '</script>';

		exit;
	} else if (intval($PFN_usuarios->get('estado')) === 0) {
		if ($PFN_usuarios->get('donde') == 'bloqueado') {
			$PFN_usuarios->usuario = $PFN_usuarios->corrixe($dni);
			$PFN_usuarios->garda_rexistro('bloqueado', 0);
			$PFN_usuarios->bloquear_id_control($dni);

			echo '<script type="text/javascript" src="../js/html_decoder.js"></script>';
			echo '<script type="text/javascript">';
			echo 'alert(HtmlDecode("'.$PFN_conf->t('acceso_certificado', '2').'"));';
			echo 'location.href = "../";';
			echo '</script>';

			exit;
		} else {
			$intentos = 0;

			for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
				if ((intval($PFN_usuarios->get('estado')) === 0) && ($PFN_usuarios->get('donde') == 'login')) {
					$intentos++;
				}
			}

			if ($intentos >= $PFN_usuarios->intentos_errados) {
				$PFN_usuarios->usuario = $PFN_usuarios->corrixe($dni);
				$PFN_usuarios->garda_rexistro('bloqueado', 0);
				$PFN_usuarios->bloquear_id_control($dni);

				echo '<script type="text/javascript" src="../js/html_decoder.js"></script>';
				echo '<script type="text/javascript">';
				echo 'alert(HtmlDecode("'.$PFN_conf->t('acceso_certificado', '3').'"));';
				echo 'location.href = "../";';
				echo '</script>';

				exit;
			}
		}
	}

	$PFN_usuarios->init('login_id_control', $dni);

	if (intval($PFN_usuarios->get('estado')) === 1) {
		$sPFN = array();
		$sPFN['usuario'] = array(
			'id' => $PFN_usuarios->get('id'),
			'nome' => $PFN_usuarios->get('nome'),
			'usuario' => $PFN_usuarios->get('usuario'),
			'contrasinal' => $PFN_usuarios->get('contrasinal'),
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

		$PFN_usuarios->usuario = $sPFN['usuario']['usuario'];
		$PFN_usuarios->garda_rexistro('certificado',1);

		Header('Location: ../menu.php?'.session_name().'='.session_id());
		exit;
	} else {
		$PFN_usuarios->usuario = $PFN_usuarios->corrixe($dni);
		$PFN_usuarios->garda_rexistro('certificado',0);

		echo '<script type="text/javascript" src="../js/html_decoder.js"></script>';
		echo '<script type="text/javascript">';
		echo 'alert(HtmlDecode("'.$PFN_conf->t('acceso_certificado', '4').'"));';
		echo 'location.href = "../";';
		echo '</script>';

		exit;
	}
} else {
	echo '<script type="text/javascript" src="../js/html_decoder.js"></script>';
	echo '<script type="text/javascript">';
	echo 'alert(HtmlDecode("'.$PFN_conf->t('acceso_certificado', '6').'"));';
	echo 'location.href = "../";';
	echo '</script>';

	exit;
}
?>
