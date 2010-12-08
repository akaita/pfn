<?php
/****************************************************************************
* data/accions/eliminar.inc.php
*
* Realiza la visualización o acción de eliminar un fichero o directorio
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

$erro = false;

if ($PFN_vars->post('executa') || !$PFN_conf->g('confirmar_eliminar')) {
	if (!empty($cal) && !empty($dir)) {
		include_once ($PFN_paths['include'].'class_extra.php');
		include_once ($PFN_paths['include'].'class_inc.php');
		include_once ($PFN_paths['include'].'class_indexador.php');

		$PFN_indexador = new PFN_Indexador($PFN_conf);
		$PFN_inc = new PFN_INC($PFN_conf);
		$PFN_extra->accions($PFN_accions);

		if ($tipo == 'dir') {
			$peso_este = 0;

			if ($PFN_conf->g('raiz','peso_maximo') > 0) {
				$peso_este = $PFN_accions->get_tamano("$arquivo/", true);
			}

			$PFN_accions->eliminar($arquivo);
			$estado = $PFN_accions->estado_num('eliminar_dir');
			$estado_accion = PFN___('estado_eliminar_dir_'.intval($estado));

			if ($PFN_accions->estado('eliminar_dir')) {
				if (is_dir(PFN_get_path_extra($arquivo))) {
					if ($PFN_conf->g('raiz','peso_maximo') > 0) {
						$peso_este += $PFN_accions->get_tamano(PFN_get_path_extra("$arquivo/"), true);
					}

					$PFN_extra->eliminar($arquivo, true);
				}

				$PFN_indexador->eliminar("$dir/", "$cal/");
			} elseif ($PFN_conf->g('raiz','peso_maximo') > 0) {
				clearstatcache();

				$peso_este = $PFN_accions->get_tamano("$arquivo/", true);
				$peso_este += $PFN_accions->get_tamano(PFN_get_path_extra("$arquivo/"), true);
			}

			if ($PFN_conf->g('raiz','peso_maximo') > 0) {
				$peso_este = $PFN_conf->g('raiz', 'peso_actual') - $peso_este;

				$peso_este = ($peso_este < 0)?0:$peso_este;
				$PFN_conf->p($peso_este, 'raiz', 'peso_actual');
				$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
			}
		} else {
			if ($PFN_conf->g('raiz','peso_maximo') > 0) {
				$peso_este = PFN_espacio_disco($arquivo, true);
			}

			$PFN_accions->eliminar($arquivo);
			$estado = $PFN_accions->estado_num('eliminar_arq');
			$estado_accion = PFN___('estado_eliminar_arq_'.intval($estado));

			if ($PFN_accions->estado('eliminar_arq')) {
				if (is_file($PFN_inc->nome_inc($arquivo))) {
					if ($PFN_conf->g('raiz','peso_maximo') > 0) {
						$peso_este += PFN_espacio_disco($PFN_inc->nome_inc($arquivo), true);
					}

					$PFN_extra->eliminar($PFN_inc->nome_inc($arquivo), false);
				}

				if (is_file($PFN_imaxes->nome_pequena($arquivo))) {
					if ($PFN_conf->g('raiz','peso_maximo') > 0) {
						$peso_este += PFN_espacio_disco($PFN_imaxes->nome_pequena($arquivo), true);
					}

					$PFN_extra->eliminar($PFN_imaxes->nome_pequena($arquivo), false);
				}

				$PFN_indexador->eliminar("$dir/", $cal);

				if ($PFN_conf->g('raiz','peso_maximo') > 0) {
					$peso_este = $PFN_conf->g('raiz', 'peso_actual') - $peso_este;

					$peso_este = ($peso_este < 0)?0:$peso_este;
					$PFN_conf->p($peso_este, 'raiz', 'peso_actual');
					$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
				}
			}
		}
	}

	include ($PFN_paths['web'].'navega.inc.php');
} else {
	if (file_exists($arquivo)) {
		if ($tipo == 'dir') {
			$contido = $PFN_accions->get_contido($arquivo);
	
			if (count($contido['dir']['nome']) || count($contido['arq']['nome'])) {
				include_once ($PFN_paths['include'].'class_arbore.php');
				$PFN_arbore = new PFN_Arbore($PFN_conf);

				$PFN_arbore->imaxes($PFN_imaxes);
				$PFN_arbore->carga_arbore("$arquivo/", "$dir/$cal/", true);

				$adv = PFN___('estado_eliminar_dir_3');
			} else {
				$adv = PFN___('estado_eliminar_dir_2');
			}
	
			include ($PFN_paths['plantillas'].'posicion.inc.php');
			include ($PFN_paths['plantillas'].'info_cab.inc.php');
			include ($PFN_paths['plantillas'].'eliminar_dir.inc.php');
		} else {
			include ($PFN_paths['plantillas'].'posicion.inc.php');
			include ($PFN_paths['plantillas'].'info_cab.inc.php');
			include ($PFN_paths['plantillas'].'eliminar_arq.inc.php');
		}
	} else {
		include ($PFN_paths['web'].'navega.inc.php');
	}
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
