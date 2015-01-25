<?php
/****************************************************************************
* preferencias.inc.php
*
* Carga lo necesario para la visualización de la pantalla de preferencias
* de usuario
*******************************************************************************/

defined('OK') or die();

$txt_erro = $txt_estado = '';

if ($PFN_conf->g('usuario','cambiar_datos')) {
	$ok = $PFN_usuarios->init('w:usuario');

	if ($ok != 1) {
		$txt_erro = 'usuario_inexistente';
	}
} else {
	$txt_erro = 'sen_permiso';
}

if (empty($txt_erro) && ($PFN_vars->post('executa') == 'true')) {
	$nome = trim($PFN_vars->post('preferencias_nome'));
	$email = trim($PFN_vars->post('preferencias_email'));
	$contrasinal = trim($PFN_vars->post('preferencias_contrasinal'));
	$contrasinal_rep = trim($PFN_vars->post('preferencias_contrasinal_rep'));

	if (empty($nome)) {
		$txt_estado = PFN___('estado_preferencias_2');
	} elseif (strlen($contrasinal) > 0) {
		if (!preg_match('/^[a-z0-9]{8,}$/im', $contrasinal)) {
			$txt_estado = PFN___('estado_preferencias_3');
		} elseif ($contrasinal != $contrasinal_rep) {
			$txt_estado = PFN___('estado_preferencias_4');
		}
	}

	if (empty($txt_estado)) {
		$datos = array(
			'nome' => $nome,
			'email' => $email,
			'contrasinal' => (empty($contrasinal)?'':md5($contrasinal))
		);

		$ok = $PFN_usuarios->cambiar_preferencias($datos);

		if ($ok == -1) {
			$txt_estado = PFN___('estado_preferencias_0');
		} else {
			if (!empty($contrasinal)) {
				$sPFN['usuario']['contrasinal'] = $datos['contrasinal'];
				session_register('sPFN');

				$PFN_vars->session('sPFN', $sPFN);
			}

			if (empty($txt_estado)) {
				$txt_estado = PFN___('estado_preferencias_1');
			}
		}
	}

	$PFN_usuarios->init('w:usuario');
}

session_write_close();
?>
