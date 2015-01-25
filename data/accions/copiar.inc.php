<?php
/****************************************************************************
* data/accions/copiar.inc.php
*
* Realiza la visualizaci�n o acci�n de copiar (ficheros o directorios)
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

$erro = false;

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

$erro = false;

if ($PFN_vars->post('executa')) {
	if (!empty($cal) && !empty($dir)) {
		include_once ($PFN_paths['include'].'class_extra.php');
		include_once ($PFN_paths['include'].'class_inc.php');
		include_once ($PFN_paths['include'].'class_indexador.php');

		$PFN_indexador = new PFN_Indexador($PFN_conf);
		$PFN_inc = new PFN_INC($PFN_conf);
		$PFN_extra->accions($PFN_accions);

		$orixinal = $arquivo;
		$destino = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($PFN_vars->post('escollido').'/')
			.'/'.$cal;

		if (strstr($destino, $orixinal)) {
			$estado_accion = PFN___('estado_copiar_dir_7');
			$erro = true;
		}

		if (!$erro && $tipo == 'dir') {
			if ($PFN_conf->g('raiz','peso_maximo') > 0) {
				if ($PFN_conf->g('raiz','peso_actual') >= $PFN_conf->g('raiz','peso_maximo')) {
					$estado_accion .= PFN___('estado_copiar_dir_8').'<br />';
					$erro = true;
				} else {
					$peso_este = $PFN_accions->get_tamano("$orixinal/", true);

					if (is_dir(PFN_get_path_extra($orixinal))) {
						$peso_este += $PFN_accions->get_tamano(PFN_get_path_extra("$orixinal/"), true);
					}

					if (($peso_este + $PFN_conf->g('raiz', 'peso_actual')) > $PFN_conf->g('raiz','peso_maximo')) {
						$estado_accion .= PFN___('estado_copiar_dir_8').'<br />';
						$erro = true;
					}
				}
			}

			if (!$erro) {
				$PFN_accions->copiar($orixinal, $destino);
				$estado = $PFN_accions->estado_num('copiar_dir');
				$estado_accion = PFN___('estado_copiar_dir_'.intval($estado));
			}

			if (!$erro && $PFN_accions->estado('copiar_dir')) {
				if (is_dir(PFN_get_path_extra($orixinal))) {
					$PFN_extra->copiar($orixinal, $destino);
				}

				$i_destino = $PFN_accions->path_correcto($PFN_vars->post('escollido').'/');
				$PFN_indexador->copiar("$dir/", "$i_destino/", "$cal/");

				if ($PFN_conf->g('raiz','peso_maximo') > 0) {
					$peso_este += $PFN_conf->g('raiz', 'peso_actual');

					$PFN_conf->p($peso_este, 'raiz', 'peso_actual');
					$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
				}
			}
		} elseif (!$erro) {
			if ($PFN_conf->g('raiz','peso_maximo') > 0) {
				$peso_este = PFN_espacio_disco($orixinal, true);

				if (is_file($PFN_inc->nome_inc($orixinal))) {
					$peso_este += PFN_espacio_disco($PFN_inc->nome_inc($orixinal), true);
				}

				if (is_file($PFN_imaxes->nome_pequena($orixinal))) {
					$peso_este += PFN_espacio_disco($PFN_imaxes->nome_pequena($orixinal), true);
				}

				if (($peso_este + $PFN_conf->g('raiz', 'peso_actual')) > $PFN_conf->g('raiz','peso_maximo')) {
					$estado_accion .= PFN___('estado_copiar_arq_6').'<br />';
					$erro = true;
				}
			}

			if (!$erro) {
				$PFN_accions->copiar($orixinal, $destino);
				$estado = $PFN_accions->estado_num('copiar_arq');
				$estado_accion = PFN___('estado_copiar_arq_'.intval($estado));
			}

			if ($PFN_accions->estado('copiar_arq')) {
				if (is_file($PFN_inc->nome_inc($orixinal))) {
					$PFN_extra->copiar($PFN_inc->nome_inc($orixinal), $PFN_inc->nome_inc($destino));
				}

				if (is_file($PFN_imaxes->nome_pequena($orixinal))) {
					$PFN_extra->copiar($PFN_imaxes->nome_pequena($orixinal), $PFN_imaxes->nome_pequena($destino));
				}

				$i_destino = $PFN_accions->path_correcto($PFN_vars->post('escollido').'/');
				$PFN_indexador->copiar("$dir/", "$i_destino/", $cal);

				if ($PFN_conf->g('raiz','peso_maximo') > 0) {
					$peso_este += $PFN_conf->g('raiz', 'peso_actual');

					$PFN_conf->p($peso_este, 'raiz', 'peso_actual');
					$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
				}
			}
		}
	}

	include ($PFN_paths['web'].'navega.inc.php');
} else {
	if (file_exists($arquivo)) {
		include_once ($PFN_paths['include'].'class_arbore.php');
		$PFN_arbore = new PFN_Arbore($PFN_conf);

		$PFN_arbore->imaxes($PFN_imaxes);
		$PFN_arbore->pon_radio('escollido');
		$PFN_arbore->pon_enlaces(false);

		if ($tipo == 'dir') {
			$contido = $PFN_accions->get_contido($arquivo);
			$PFN_arbore->pon_copia($arquivo);
	
			if (count($contido['dir']['nome']) || count($contido['arq']['nome'])) {
				$adv = PFN___('estado_copiar_dir_2');
			} else {
				$adv = PFN___('estado_copiar_dir_3');
			}
		} else {
			$adv = PFN___('estado_copiar_arq_2');
		}

		$PFN_arbore->carga_arbore($PFN_conf->g('raiz','path'), "./", false);

		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'info_cab.inc.php');
		include ($PFN_paths['plantillas'].'copiar.inc.php');
	} else {
		include ($PFN_paths['web'].'navega.inc.php');
	}
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
