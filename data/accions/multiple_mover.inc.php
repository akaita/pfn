<?php
/****************************************************************************
* data/accions/multiple_mover.inc.php
*
* Realiza la visualización o acción de mover multiples ficheros y directorios
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

$multiple_escollidos = (array)$PFN_vars->post('multiple_escollidos');
$estado_accion = '';
$cnt_erros = 0;
$adv = '';

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

if ($PFN_conf->g('columnas','multiple')
&& $PFN_vars->post('executa')
&& (count($multiple_escollidos) > 0)) {
	if (!empty($dir)) {
		@set_time_limit($PFN_conf->g('tempo_maximo'));
		@ini_set('memory_limit', $PFN_conf->g('memoria_maxima'));

		include_once ($PFN_paths['include'].'class_extra.php');
		include_once ($PFN_paths['include'].'class_inc.php');
		include_once ($PFN_paths['include'].'class_indexador.php');

		$PFN_indexador = new PFN_Indexador($PFN_conf);
		$PFN_inc = new PFN_INC($PFN_conf);
		$PFN_extra->accions($PFN_accions);

		foreach ($multiple_escollidos as $v) {
			$erro = false;
			$cal = $PFN_accions->nome_correcto($v);
			$orixinal = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/')
				.'/'.$cal;
			$destino = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($PFN_vars->post('escollido').'/')
				.'/'.$cal;

			if (!file_exists($orixinal)) {
				$erro = true;
				$estado = 9;
			}

			if (strstr($destino, $orixinal)) {
				$erro = true;
				$estado = 8;
			}

			if (!$erro && $PFN_accions->e_dir($orixinal)) {
				$PFN_accions->mover($orixinal, $destino);
				$estado = $PFN_accions->estado_num('multiple_mover');

				if ($PFN_accions->estado('multiple_mover')) {
					if (is_dir(PFN_get_path_extra($orixinal))) {
						$PFN_extra->mover($orixinal, $destino, true);
					}

					$i_destino = $PFN_accions->path_correcto($PFN_vars->post('escollido').'/');
					$PFN_indexador->mover("$dir/", "$i_destino/", "$cal/");
				} elseif (($estado == 6) && ($PFN_conf->g('raiz','peso_maximo') > 0)) {
					$erro = true;
					$peso_este = $PFN_accions->get_tamano("$orixinal/", true);
					$peso_este += $PFN_conf->g('raiz', 'peso_actual');

					$PFN_conf->p($peso_este, 'raiz', 'peso_actual');

					$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
				} else {
					$erro = true;
				}
			} elseif (!$erro) {
				$PFN_accions->mover($orixinal, $destino);
				$estado = $PFN_accions->estado_num('multiple_mover');

				if ($PFN_accions->estado('multiple_mover')) {
					if (is_file($PFN_inc->nome_inc($orixinal))) {
						$PFN_extra->mover($PFN_inc->nome_inc($orixinal), $PFN_inc->nome_inc($destino), false);
					}

					if (is_file($PFN_imaxes->nome_pequena($orixinal))) {
						$PFN_extra->mover($PFN_imaxes->nome_pequena($orixinal), $PFN_imaxes->nome_pequena($destino), false);
					}

					$i_destino = $PFN_accions->path_correcto($PFN_vars->post('escollido').'/');
					$PFN_indexador->mover("$dir/", "$i_destino/", $cal);
				} elseif (($estado == 6) && ($PFN_conf->g('raiz','peso_maximo') > 0)) {
					$erro = true;
					$peso_este = PFN_espacio_disco($orixinal, true);
					$peso_este += $PFN_conf->g('raiz', 'peso_actual');

					$PFN_conf->p($peso_este, 'raiz', 'peso_actual');

					$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
				} else {
					$erro = true;
				}
			}

			if ($erro) {
				$estado_accion .= PFN___('estado_multiple_mover_'.intval($estado)).' '.$cal.'<br />';
				$cnt_erros++;
			}
		}
	}

	if ($cnt_erros == 0) {
		$estado_accion = PFN___('estado_multiple_mover_1');
	} elseif ($cnt_erros != count($multiple_escollidos)) {
		$estado_accion .= PFN___('estado_multiple_mover_7');
	}

	include ($PFN_paths['web'].'navega.inc.php');
} elseif ($PFN_conf->g('columnas','multiple') && count($multiple_escollidos) > 0) {
	foreach ($multiple_escollidos as $k => $v) {
		$arquivo = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/')
			.'/'.$PFN_accions->nome_correcto($v);

		if (!file_exists($arquivo)) {
			$adv .= PFN___('estado_multiple_mover_7').' '.$PFN_accions->nome_correcto($v).'<br />';
			unset($multiple_escollidos[$k]);
		}
	}

	if (count($multiple_escollidos) > 0) {
		include_once ($PFN_paths['include'].'class_arbore.php');
		$PFN_arbore = new PFN_Arbore($PFN_conf);

		$PFN_arbore->imaxes($PFN_imaxes);
		$PFN_arbore->pon_radio('escollido');
		$PFN_arbore->pon_enlaces(false);

		$adv .= PFN___('estado_multiple_mover_2');

		$PFN_arbore->carga_arbore($PFN_conf->g('raiz','path'), "./", false);

		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'multiple_mover.inc.php');
	} else {
		include ($PFN_paths['web'].'navega.inc.php');
	}
} else {
	include ($PFN_paths['web'].'navega.inc.php');
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
