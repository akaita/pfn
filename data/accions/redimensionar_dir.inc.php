<?php
/****************************************************************************
* data/accions/redimensionar_dir.inc.php
*
* Realiza la visualización o acción de crear un thumbnail de todas las
* imágenes de un directorio
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

$PFN_tempo->rexistra('precodigo');

$vale = false;
$destino = $PFN_conf->g('raiz','path').$PFN_niveles->path_correcto($dir);
$imx_path = $PFN_niveles->path_correcto($destino.'/'.$cal);

$contido = $PFN_niveles->get_contido($imx_path,'nome','asc',true);

foreach ($contido['arq']['nome'] as $v) {
	if ($PFN_imaxes->e_imaxe($imx_path.'/'.$v)) {
		$vale = true;
		break;
	}
}

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');
include ($PFN_paths['plantillas'].'posicion.inc.php');
include ($PFN_paths['plantillas'].'info_cab.inc.php');
include ($PFN_paths['plantillas'].'redimensionar_dir.inc.php');
include ($PFN_paths['plantillas'].'pe.inc.php');
?>
