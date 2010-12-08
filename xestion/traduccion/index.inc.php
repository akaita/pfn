<?php
/****************************************************************************
* xestion/traduccion/index.inc.php
*
* Prepara los datos para ser mostrados y ejecutados
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$executa = intval($PFN_vars->post('executa'));
$erros_descargar = $erros_subir = array();
$idiomas_existen = $idiomas_valen = array();
$ok = 0;
$txt = '';

foreach ($PFN_conf->gettext->translations() as $k => $v) {
	if (strstr($k, 'lista_idiomas_')) {
		$idioma = str_replace('lista_idiomas_', '', $k);
		$idiomas_valen[$idioma] = $v;

		if (is_file($PFN_paths['idiomas'].$idioma.'/base.mo')) {
			$idiomas_existen[$idioma] = $v;
		}
	}
}

$idioma = '';

asort($idiomas_valen);
asort($idiomas_existen);

if ($executa === 1) {
	if ($PFN_vars->post('descargar_orixinal') || $PFN_vars->post('descargar_personalizado')) {
		$idioma = $PFN_vars->post('idioma_descargar');

		if (!$idioma) {
			$erros_descargar[] = PFN___('Xerros_64');
			return false;
		}

		if ($PFN_vars->post('descargar_orixinal')) {
			$arquivo = $PFN_paths['idiomas'].$idioma.'/base.po';
		} else {
			$arquivo = $PFN_paths['idiomas'].$idioma.'/custom.po';
		}

		if (!is_file($arquivo)) {
			$erros_descargar[] = PFN___('Xerros_34');
			return false;
		}

		header('Pragma: private');
		header('Expires: 0');
		header('Cache-control: private, must-revalidate');
		header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		header('Content-Type: application/force-download; charset='.$PFN_conf->g('charset'));
		header('Content-Transfer-Encoding: binary');
		header('Content-Disposition: attachment; filename="'.$idioma.'.po"');
		header('Content-Length: '.filesize($arquivo));

		echo file_get_contents($arquivo);

		exit;
	} else if ($PFN_vars->post('subir')) {
		$idioma = $PFN_vars->post('idioma_subir');

		if (!$idioma) {
			$erros_subir[] = PFN___('Xerros_64');
			return false;
		}

		$arquivo = $PFN_paths['idiomas'].$idioma.'/custom.';
		$arquivo_po = $PFN_vars->files('arquivo_po');
		$arquivo_mo = $PFN_vars->files('arquivo_mo');

		if (empty($arquivo_po['tmp_name']) || ($arquivo_po['size'] == 0) || empty($arquivo_mo['tmp_name']) || ($arquivo_mo['size'] == 0)) {
			$erros_subir[] = PFN___('Xerros_63');
			return false;
		}

		if (
			(!is_dir($PFN_paths['idiomas'].$idioma) && !is_writable($PFN_paths['idiomas']))
			|| (is_dir($PFN_paths['idiomas'].$idioma) && !is_writable($PFN_paths['idiomas'].$idioma))
			|| (is_file($arquivo.'po') && !is_writable($arquivo.'po'))
			|| (is_file($arquivo.'mo') && !is_writable($arquivo.'mo'))
		) {
			$erros_subir[] = PFN___('Xerros_33');
			return false;
		}

		if (!is_dir(($PFN_paths['idiomas'].$idioma))) {
			if (!@mkdir($PFN_paths['idiomas'].$idioma, 0755)) {
				$erros_subir[] = PFN___('Xerros_33');
				return false;
			}
		}

		if (!@move_uploaded_file($arquivo_po['tmp_name'], $arquivo.'po')) {
			$erros_subir[] = PFN___('Xerros_33');
			return false;
		}

		if (!@move_uploaded_file($arquivo_mo['tmp_name'], $arquivo.'mo')) {
			$erros_subir[] = PFN___('Xerros_33');
			return false;
		}

		$ok = true;
	}
}
?>
