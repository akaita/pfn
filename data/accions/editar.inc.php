<?php
/****************************************************************************
* data/accions/editar.inc.php
*
* Carga lo necesario para la visualizaci�n de la pantalla de edici�n del
* contenido de un fichero
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

$PFN_tempo->rexistra('preplantillas');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

if ($PFN_vars->post('executa')) {
	$PFN_accions->arquivos($PFN_arquivos);

	$PFN_accions->editar($arquivo, $PFN_vars->post('texto'));
	$estado = $PFN_accions->estado_num('editar');
	$estado_accion = PFN___('estado_editar_'.intval($estado));

	include ($PFN_paths['web'].'navega.inc.php');
} else {
	if (is_file($arquivo)) {
		$PFN_accions->arquivos($PFN_arquivos);

		$tamano = PFN_espacio_disco($arquivo, true);
		$estado = $PFN_accions->log_ancho_banda($tamano);

		if ($estado === true) {
			$editar_ancho = intval($PFN_vars->post('ancho'));
			$editar_alto = intval($PFN_vars->post('alto'));

			$editar_ancho = ($editar_ancho == 0)?650:$editar_ancho;
			$editar_alto = ($editar_alto == 0)?400:$editar_alto;

			$texto2 = $PFN_vars->post('texto2');
			$texto = htmlentities((empty($texto2)?$PFN_arquivos->get_contido($arquivo):$texto2), ENT_NOQUOTES, $PFN_conf->g('charset'));

			unset($texto2);

			include ($PFN_paths['plantillas'].'posicion.inc.php');
			include ($PFN_paths['plantillas'].'info_cab.inc.php');
			include ($PFN_paths['plantillas'].'editar.inc.php');
		} elseif ($estado === -1) {
			$estado_accion = PFN___('estado_descargar_3');
			include ($PFN_paths['web'].'navega.inc.php');
		} else {
			$estado_accion = PFN___('estado_descargar_2');
			include ($PFN_paths['web'].'navega.inc.php');
		}
	} else {
		$estado_accion = PFN___('estado_editar_3');
		include ($PFN_paths['web'].'navega.inc.php');
	}
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
