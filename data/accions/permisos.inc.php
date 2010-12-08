<?php
/****************************************************************************
* data/accions/permisos.inc.php
*
* Realiza la visualización o acción de cambiar los permisos a un fichero
* o directorio
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

if ($PFN_vars->post('executa')) {
	if (!empty($cal) && !empty($dir)) {
		$perimisos = 0;

		foreach (array('p400','p200','p100','p040','p020','p010','p004','p002','p001') as $v) {
			$permisos += $PFN_vars->post($v);
		}

		$PFN_accions->permisos($arquivo, $permisos);
		$estado = $PFN_accions->estado_num('permisos');
		$estado_accion = PFN___('estado_permisos_'.intval($estado));
	}

	include ($PFN_paths['web'].'navega.inc.php');
} else {
	$actuales = fileperms($arquivo);

	include ($PFN_paths['plantillas'].'posicion.inc.php');
	include ($PFN_paths['plantillas'].'info_cab.inc.php');
	include ($PFN_paths['plantillas'].'permisos.inc.php');
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
