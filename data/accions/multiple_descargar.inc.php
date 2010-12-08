<?php
/****************************************************************************
* data/accions/multiple_descargar.inc.php
*
* Realiza la visualización o acción de descargar multiples ficheros y
* directorios
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

PFN_quita_url_SERVER('nome_comprimido');

$nome_comprimido = $PFN_vars->get('nome_comprimido');
$multiple_escollidos = (array)$PFN_vars->post('multiple_escollidos');
$erro = false;

if ($PFN_conf->g('columnas','multiple')
&& ($PFN_conf->g('zlib') == true)
&& (count($multiple_escollidos) > 0)
&& !empty($nome_comprimido)
&& !empty($dir)) {
	@set_time_limit($PFN_conf->g('tempo_maximo'));
	@ini_set('memory_limit', $PFN_conf->g('memoria_maxima'));

	include_once ($PFN_paths['include'].'class_easyzip.php');
	$EasyZIP->pon_dirbase($PFN_conf->g('raiz','path')
		.$PFN_accions->path_correcto($dir.'/')
		.'/'.$multiple_escollidos[0]);

	foreach ($multiple_escollidos as $v) {
		$erro = false;
		$cal = $PFN_accions->nome_correcto($v);
		$arquivo = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/').'/'.$cal;

		if (!file_exists($arquivo)) {
			$erro = true;
		}

		if (!$erro && $PFN_accions->e_dir($arquivo)) {
			$EasyZIP->addDir($arquivo);
		} elseif (!$erro) {
			$EasyZIP->addFile($arquivo);
		}
	}

	$contido = &$EasyZIP->zipFile();

	include_once ($PFN_paths['include'].'class_arquivos.php');
	include_once ($PFN_paths['include'].'class_inc.php');

	$PFN_arquivos = new PFN_Arquivos($PFN_conf);
	$PFN_inc = new PFN_INC($PFN_conf);

	$PFN_inc->arquivos($PFN_arquivos);
	$PFN_inc->carga_datos($arquivo);
	$PFN_accions->arquivos($PFN_arquivos);

	$tamano = strlen($contido);

	$estado = $PFN_accions->log_ancho_banda($tamano);

	if ($estado === true) {
		$nome_comprimido = str_replace(array(' ','"'),'_', strstr($nome_comprimido, '.zip')?$nome_comprimido:($nome_comprimido.'.zip'));

		header('Pragma: private');
		header('Expires: 0');
		header('Cache-control: private, must-revalidate');
		header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		header('Content-Type: application/force-download');
		header('Content-Transfer-Encoding: binary');
		header('Content-Disposition: attachment; filename="'.$nome_comprimido.'"');
		header('Content-Length: '.$tamano);

		echo $contido;

		foreach ($EasyZIP->get_filelist() as $v) {
			$PFN_accions->log_accion('descargar', $v, $nome_comprimido);
		}

		exit;
	} elseif ($estado === -1) {
		$erro = true;
		$estado_accion = PFN___('estado_descargar_3');
	} else {
		$erro = true;
		$estado_accion = PFN___('estado_descargar_2');
	}

	unset($contido);
} else {
	$erro = true;
}

if ($erro) {
	include ($PFN_paths['plantillas'].'cab.inc.php');
	include ($PFN_paths['web'].'opcions.inc.php');

	$PFN_tempo->rexistra('precodigo');

	include ($PFN_paths['web'].'navega.inc.php');

	$PFN_tempo->rexistra('postcodigo');

	include ($PFN_paths['plantillas'].'pe.inc.php');
}
?>
