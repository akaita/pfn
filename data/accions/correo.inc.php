<?php
/****************************************************************************
* data/accions/correo.inc.php
*
* Realiza la visualización o acción de enviar un fichero por correo
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$para = $titulo = $mensaxe = $estado_accion = '';
$erro = false;

$PFN_accions->arquivos($PFN_arquivos);

$tamano = PFN_espacio_disco($arquivo, true);
$estado = $PFN_accions->log_ancho_banda($tamano, true);

if ($estado !== true) {
	$estado = 9;
	$estado_accion = PFN___('estado_correo_'.$estado);
} elseif ($tamano > $PFN_conf->g('limite_correo')) {
	$estado = 10;
	$estado_accion = PFN___('estado_correo_'.$estado, PFN_peso($PFN_conf->g('limite_correo')));
}

if (($estado === true) && $PFN_vars->post('executa')) {
	$estado = 1;
	$para = trim($PFN_vars->post('para'));
	$titulo = trim($PFN_vars->post('titulo'));
	$mensaxe = trim($PFN_vars->post('mensaxe'));
	$cada_correo = array();

	if (empty($para)) {
		$estado = 4;
		$estado_accion = PFN___('estado_correo_'.$estado).'<br />';
	} if (empty($titulo)) {
		$estado = 2;
		$estado_accion .= PFN___('estado_correo_'.$estado).'<br />';
	} if (empty($mensaxe)) {
		$estado = 3;
		$estado_accion .= PFN___('estado_correo_'.$estado).'<br />';
	}

	if (preg_match('/[,;]/', $para)) {
		$cada_correo = split('[,;]', $para);

		foreach ($cada_correo as $k => $v) {
			$v = trim($v);

			if (empty($v)) {
				unset($cada_correo[$k]);
			}

			if (PFN_check_correo($v)) {
				$cada_correo[$k] = $v;
			} else {
				$estado = 5;
				$estado_accion .= PFN___('estado_correo_'.$estado).$v.'<br />';

				unset($cada_correo[$k]);
			}
		}

		if (count($cada_correo) == 0) {
			$estado = 6;
			$estado_accion .= PFN___('estado_correo_'.$estado).'<br />';
		}
	} elseif (PFN_check_correo($para)) {
		$cada_correo = array($para);
	} else {
		$estado = 5;
		$estado_accion .= PFN___('estado_correo_'.$estado).$para.'<br />';
	}

	if ($estado === 1) {
		$PFN_usuarios->init('usuario', $PFN_conf->g('usuario','id'));

		include_once ($PFN_paths['include'].'phpmailer/class.phpmailer.php');

		$mail = new PHPMailer();

		$mail->From = $PFN_usuarios->get('email');
		$mail->FromName = $PFN_usuarios->get('nome');
		$mail->Subject = $titulo;
		$mail->Body = $mensaxe;

		foreach ($cada_correo as $correo) {
			$mail->AddBCC($correo);
		}

		if (!$mail->AddAttachment($arquivo, str_replace(' ', '_', $cal))) {
			$estado = 7;
			$estado_accion .= PFN___('estado_correo_'.$estado);
		}

		if ($estado === 1) {
			$estado = $mail->Send();
			$estado_accion .= PFN___('estado_correo_'.$estado);
		}

		if ($estado === 1) {
			$PFN_accions->log_ancho_banda($tamano);
			$PFN_accions->log_accion('enviar_correo', $arquivo, $PFN_conf->g('raiz','path').implode(', ',$cada_correo));

			include ($PFN_paths['web'].'navega.inc.php');
		} else {
			include ($PFN_paths['plantillas'].'posicion.inc.php');
			include ($PFN_paths['plantillas'].'info_cab.inc.php');
			include ($PFN_paths['plantillas'].'correo.inc.php');
		}
	} else {
		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'info_cab.inc.php');
		include ($PFN_paths['plantillas'].'correo.inc.php');
	}
} else {
	if (is_file($arquivo)) {
		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'info_cab.inc.php');
		include ($PFN_paths['plantillas'].'correo.inc.php');
	} else {
		include ($PFN_paths['web'].'navega.inc.php');
	}
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
