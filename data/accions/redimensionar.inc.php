<?php
/****************************************************************************
* data/accions/redimensionar.inc.php
*
* Realiza la visualización o acción de crear un thumbnail de una imagen
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

include ($PFN_paths['plantillas'].'cab.inc.php');

$PFN_tempo->rexistra('precodigo');

$destino = $PFN_conf->g('raiz','path').$PFN_niveles->path_correcto($dir);
$imx_path = $PFN_niveles->path_correcto($destino.'/'.$cal);
$ucal = rawurlencode($cal);
$mais = $PFN_vars->get('mais_0');
$fin = false;
$estado_accion = '';
$estado = true;

if ($PFN_vars->get('executa')) {
	@set_time_limit($PFN_conf->g('tempo_maximo'));
	@ini_set('memory_limit', $PFN_conf->g('memoria_maxima'));

	if ($PFN_vars->get('modo') == 'recortar') {
		$PFN_imaxes->recortar($imx_path, $PFN_vars->get('posX'), $PFN_vars->get('posY'), $PFN_vars->get('ancho'), $PFN_vars->get('alto'));
	} else {
		$PFN_imaxes->reducir($imx_path);
	}

	if (empty($mais)) {
		$fin = true;
	} else {
		$PFN_vars->get('cal', $mais);
		$PFN_vars->get('mais_0', '');

		for ($i = 0, $cnt = 0; $i < $PFN_conf->g('inc','limite'); $i++) {
			if ($PFN_vars->get("mais_$i") != '') {
				$PFN_vars->get("mais_$cnt", $PFN_vars->get("mais_$i"));
				$PFN_vars->get("mais_$i", '');
				$cnt++;
			}
		}

		$imx_path = $PFN_niveles->path_correcto($destino.'/'.$PFN_vars->get('cal'));
	}
}

if ($PFN_vars->post('eliminar_peq')) {
	@unlink($PFN_imaxes->nome_pequena($imx_path));
	$estado_accion = PFN___('estado_redimensionar_2');
	$fin = true;
}

if (!$fin && $PFN_conf->g('imaxes','pequena') && ($datos = $PFN_imaxes->e_imaxe($imx_path))) {
	$PFN_accions->arquivos($PFN_arquivos);

	$tamano = PFN_espacio_disco($imx_path, true);
	$estado = $PFN_accions->log_ancho_banda($tamano, true);

	if ($estado === true) {
		$hai_pequena = is_file($PFN_imaxes->nome_pequena($imx_path));

		include ($PFN_paths['plantillas'].'redimensionar.inc.php');
	} else {
		$fin = true;
	}
}

if ($fin) {
	if (!$estado_accion) {
		if ($estado === true) {
			$estado_accion = PFN___('estado_redimensionar_1');
		} elseif ($estado === -1) {
			$estado_accion = PFN___('estado_descargar_3');
		} else {
			$estado_accion = PFN___('estado_descargar_2');
		}
	}

	include ($PFN_paths['web'].'opcions.inc.php');
	include ($PFN_paths['web'].'navega.inc.php');
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
