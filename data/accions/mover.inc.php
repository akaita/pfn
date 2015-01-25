<?php
/****************************************************************************
* data/accions/mover.inc.php
*
* Realiza la visualizaci�n o acci�n de mover un fichero o directorio
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

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
			$estado_accion = PFN___('estado_mover_dir_7');
			$erro = true;
		}

		if (!$erro && $tipo == 'dir') {
			$PFN_accions->mover($orixinal, $destino);
			$estado = $PFN_accions->estado_num('mover_dir');
			$estado_accion = PFN___('estado_mover_dir_'.intval($estado));

			if ($PFN_accions->estado('mover_dir')) {
				if (is_dir(PFN_get_path_extra($orixinal))) {
					$PFN_extra->mover($orixinal, $destino, true);
				}

				$i_destino = $PFN_accions->path_correcto($PFN_vars->post('escollido').'/');
				$PFN_indexador->mover("$dir/", "$i_destino/", "$cal/");
			}
		} elseif (!$erro) {
			$PFN_accions->mover($orixinal,$destino);
			$estado = $PFN_accions->estado_num('mover_arq');
			$estado_accion = PFN___('estado_mover_arq_'.intval($estado));

			if ($PFN_accions->estado('mover_arq')) {
				if (is_file($PFN_inc->nome_inc($orixinal))) {
					$PFN_extra->mover($PFN_inc->nome_inc($orixinal), $PFN_inc->nome_inc($destino), false);
				}

				if (is_file($PFN_imaxes->nome_pequena($orixinal))) {
					$PFN_extra->mover($PFN_imaxes->nome_pequena($orixinal), $PFN_imaxes->nome_pequena($destino), false);
				}

				$i_destino = $PFN_accions->path_correcto($PFN_vars->post('escollido').'/');
				$PFN_indexador->mover("$dir/", "$i_destino/", $cal);
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

		if ($PFN_accions->e_dir($arquivo)) {
			$contido = $PFN_accions->get_contido($arquivo);
			$PFN_arbore->pon_copia($arquivo);
	
			if (count($contido['dir']['nome']) || count($contido['arq']['nome'])) {
				$adv = PFN___('estado_mover_dir_2');
			} else {
				$adv = PFN___('estado_mover_dir_3');
			}
		} else {
			$adv = PFN___('estado_mover_arq_2');
		}

		$PFN_arbore->carga_arbore($PFN_conf->g('raiz','path'), './', false);

		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'info_cab.inc.php');
		include ($PFN_paths['plantillas'].'mover.inc.php');
	} else {
		include ($PFN_paths['web'].'navega.inc.php');
	}
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
