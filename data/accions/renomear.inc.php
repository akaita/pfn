<?php
/****************************************************************************
* data/accions/renomar.inc.php
*
* Realiza la visualización o acción de renombrar un fichero o directorio
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

include_once ($PFN_paths['include'].'class_inc.php');
include_once ($PFN_paths['include'].'class_extra.php');

$PFN_extra->accions($PFN_accions);
$PFN_inc = new PFN_INC($PFN_conf);

$erro = false;

if ($PFN_vars->post('executa')) {
	if ($PFN_vars->post('novo_nome') != '' && !empty($dir) && !empty($cal)) {
		$antes = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/').'/'.$cal;
		$agora = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/')
			.'/'.$PFN_accions->nome_correcto($PFN_vars->post('novo_nome'));

		if (!preg_match('/\.[a-z0-9]+$/im', $agora) && is_file($antes)) {
			$partes = explode('.', $antes);
			$agora .= '.'.end($partes);
		}

		$PFN_accions->renomear($antes, $agora);
		$estado = $PFN_accions->estado_num('renomear');
		$estado_accion = PFN___('estado_renomear_'.intval($estado));

		if ($PFN_accions->estado('renomear')) {
			if ($tipo == 'dir') {
				if (is_dir(PFN_get_path_extra($antes))) {
					$PFN_extra->renomear($antes, $agora, true);
				}
			} else {
				if (is_file($PFN_inc->nome_inc($antes))) {
					$PFN_extra->renomear($PFN_inc->nome_inc($antes),$PFN_inc->nome_inc($agora), false);
				}

				if (is_file($PFN_imaxes->nome_pequena($antes))) {
					$PFN_extra->renomear($PFN_imaxes->nome_pequena($antes),$PFN_imaxes->nome_pequena($agora), false);
				}
			}

			if ($PFN_conf->g('inc','indexar')) {
				include_once ($PFN_paths['include'].'class_indexador.php');

				$i_antes = explode('/',$antes);
				$i_antes = $PFN_accions->nome_correcto(end($i_antes));
				$i_agora = explode('/',$agora);
				$i_agora = $PFN_accions->nome_correcto(end($i_agora));

				$PFN_indexador = new PFN_Indexador($PFN_conf);

				if ($PFN_accions->e_dir($agora)) {
					$PFN_indexador->renomear("$dir/", "$i_antes/", "$i_agora/");
				} else {
					$PFN_indexador->renomear("$dir/", $i_antes, $i_agora);
				}
			}
		}
	}

	include ($PFN_paths['web'].'navega.inc.php');
} else {
	if (file_exists($arquivo)) {
		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'info_cab.inc.php');
		include ($PFN_paths['plantillas'].'renomear.inc.php');
	} else {
		include ($PFN_paths['web'].'navega.inc.php');
	}
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
