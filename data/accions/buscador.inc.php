<?php
/****************************************************************************
* data/accions/buscador.inc.php
*
* Realiza la visualización da accion de buscar
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

$PFN_tempo->rexistra('preplantillas');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['plantillas'].'posicion.inc.php');

if ($PFN_vars->post('executa')
	&& $PFN_vars->post('palabra_buscar') != ''
	&& is_array($PFN_vars->post('campos_buscar'))
) {
	include_once ($PFN_paths['include'].'class_indexador.php');
	$PFN_indexador = new PFN_Indexador($PFN_conf);

	$cada = '';
	$resultados = $PFN_indexador->buscar(
		"$dir/",
		$PFN_vars->post('palabra_buscar'),
		$PFN_vars->post('campos_buscar'),
		$PFN_vars->post('donde_buscar')
	);

	if (count($resultados)) {
		foreach ($resultados as $k => $v) {
			$cada = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($v['directorio'])
				.'/'.$v['arquivo'];

			if (!file_exists($cada)) {
				$PFN_indexador->eliminar($PFN_accions->path_correcto($v['directorio']).'/', $v['arquivo']);
				unset($resultados[$k]);
			}
		}

		include_once ($PFN_paths['include'].'class_inc.php');

		$PFN_inc = new PFN_INC($PFN_conf);
		$PFN_arquivos->niveles($PFN_niveles);
	}

	include ($PFN_paths['plantillas'].'buscador_formulario.inc.php');
	include ($PFN_paths['plantillas'].'buscador_resultados.inc.php');
} else {
	include ($PFN_paths['plantillas'].'buscador_formulario.inc.php');
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
