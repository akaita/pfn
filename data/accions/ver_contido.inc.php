<?php
/****************************************************************************
* data/accions/ver_contido.inc.php
*
* Visualiza el contenido de un fichero de texto
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

if ($PFN_niveles->filtrar($cal) && is_file($arquivo)) {
	$PFN_accions->arquivos($PFN_arquivos);

	$tamano = PFN_espacio_disco($arquivo, true);
	$estado = $PFN_accions->log_ancho_banda($tamano);

	if ($estado === true) {
		$ext = explode('.', $arquivo);
		$ext = strtolower(end($ext));
		$e_php = (($ext == 'php') || ($ext == 'php3') || ($ext == 'phtml'));

		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'info_cab.inc.php');
		include ($PFN_paths['plantillas'].'ver_contido.inc.php');
	} elseif ($estado === -1) {
		$estado_accion = PFN___('estado_descargar_3');
		include ($PFN_paths['web'].'navega.inc.php');
	} else {
		$estado_accion = PFN___('estado_descargar_2');
		include ($PFN_paths['web'].'navega.inc.php');
	}
} else {
	include ($PFN_paths['web'].'navega.inc.php');
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
