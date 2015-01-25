<?php
/****************************************************************************
* data/xestion/Xopcions.inc.php
*
* Carga lo necesario para la visualización del menú superior de opciones en la
* administración
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$quita_url = PFN_quita_url('id', false);

$Xopcions = array(
	'm_comezo' => $relativo.'navega.php?'.PFN_cambia_url('dir','./',false),
	'm_admin' => $relativo.'xestion/?'.$quita_url,
	'm_actualizar' => PFN_get_url(),
	'Xm_crear_raiz' => $relativo.'xestion/raices/editar.php?'.$quita_url,
	'Xm_crear_usuario' => $relativo.'xestion/usuarios/editar.php?'.$quita_url,
	'Xm_crear_grupo' => $relativo.'xestion/grupos/editar.php?'.$quita_url,
	'Xm_importar_csv' => $relativo.'xestion/csv/index.php?'.$quita_url,
	'Xm_varios' => $relativo.'xestion/varios/index.php?'.$quita_url,
	'Xm_informes' => $relativo.'xestion/informes/index.php?'.$quita_url,
	'Xm_traduccion' => $relativo.'xestion/traduccion/index.php?'.$quita_url,
	'm_sair' => $relativo.'sair.php?'.$quita_url,
);

include ($PFN_paths['plantillas'].'Xopcions.inc.php');
?>
