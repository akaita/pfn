<?php
/*******************************************************************************
* instalar/include/paso_1.inc.php
*
* Primer paso de la instalación
*******************************************************************************/

defined('OK') or die();

$erros = false;
$idiomas_valen = array();

foreach ($PFN_conf->gettext->translations() as $k => $v) {
	if (strstr($k, 'lista_idiomas_')) {
		$idioma = str_replace('lista_idiomas_', '', $k);

		if (is_file($PFN_paths['idiomas'].$idioma.'/base.mo')) {
			$idiomas_valen[$idioma] = $v;
		}
	}
}

if (empty($form['tipo'])) {
	if (($basicas['version'] == 0) || ($basicas['version'] == $PFN_version)) {
		$form['tipo'] = 'instalar';
	} else {
		$form['tipo'] = 'actualizar';
	}
}

if (!is_file($PFN_paths['conf'].'default.inc.php')) {
	$erros = true;
}

include ($PFN_paths['instalar'].'plantillas/paso_1.inc.php');
?>
