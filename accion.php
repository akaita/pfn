<?php
/****************************************************************************
* accion.php
*
* Controla y ejecuta los permisos sobre la realización de una acción
*******************************************************************************/

include ('paths.php');

$borra_cache = is_array($_GET)?($_GET['accion'].$_POST['accion']):($HTTP_GET_VARS['accion'].$HTTP_POST_VARS['accion']);
$borra_cache = ($borra_cache != 'descargar');

include ($PFN_paths['include'].'basicweb.php');

session_write_close();

$PFN_tempo->rexistra('precarga');

$PFN_vars->server('PHP_SELF','navega.php');

$accion = $PFN_niveles->nome_correcto($PFN_vars->get('accion').$PFN_vars->post('accion'));

include_once ($PFN_paths['include'].'class_imaxes.php');
include_once ($PFN_paths['include'].'class_arquivos.php');

$PFN_imaxes = new PFN_Imaxes($PFN_conf);
$PFN_arquivos = new PFN_Arquivos($PFN_conf);

if (!empty($accion) && $PFN_conf->g('permisos',$accion)
&& is_file($PFN_paths['accions'].$accion.'.inc.php')) {
	define('ACCION', true);

	include_once ($PFN_paths['include'].'class_accions.php');
	$PFN_accions = new PFN_Accions($PFN_conf);

	$PFN_tempo->rexistra('precomprobacion');

	$cal = $arquivo = $ucal = $tipo = $enlace_abs = '';
	$e_imaxe = $redimensionar = $redimensionar_dir = $ver_contido = false;
	$editar = $extraer = $ver_comprimido = $descargar = $correo = false;
	$firmar = $cifrar = false;

	if (strstr($accion, 'multiple_')) {
		$multiple_escollidos = (array)$PFN_vars->post('multiple_escollidos');

		if (count($multiple_escollidos) == 0) {
			header('Location: navega.php?'.PFN_quita_url('accion', false, true));
			exit;
		}

		if (count($multiple_escollidos) == 1) {
			$accion = substr($accion, strlen('multiple_'));

			header('Location: accion.php?'.PFN_cambia_url(array('accion','cal'), array($accion, $multiple_escollidos[0]), false, true));
			exit;
		}
	}

	if (!in_array($accion, array('crear_dir','subir_arq','subir_url','multiple_copiar','multiple_mover','multiple_eliminar','multiple_permisos','multiple_descargar','multiple_correo','multiple_cifrar','multiple_firmar','multiple_ksi','buscador','novo_arq'))) {
		$cal = $PFN_vars->post('executa')?$PFN_vars->post('cal'):$PFN_vars->get('cal');
		$cal = $PFN_accions->nome_correcto($cal);
		$arquivo = str_replace(array('/./','/'),'/',$PFN_conf->g('raiz','path').$dir.'/'.$PFN_accions->path_correcto($cal));
		$ucal = rawurlencode($cal);
		$tipo = is_file($arquivo)?'arq':(is_dir($arquivo)?'dir':'');
		$fin = ($tipo == 'dir')?'/':'';
		$enlace_abs = $PFN_niveles->enlace($dir, $cal).$fin;

		$PFN_tempo->rexistra('pretipo');

		if (empty($tipo) || empty($cal) || (!$PFN_niveles->filtrar($cal) && $cal != '.')) {
			Header('Location: '.PFN_quita_url(array('cal','accion'), true, true));
			exit;
		} elseif ($tipo == 'arq') {
			$e_imaxe = $PFN_imaxes->e_imaxe($arquivo);
			$redimensionar = $e_imaxe && $PFN_conf->g('permisos','redimensionar');
			$ver_contido = !$e_imaxe && $PFN_arquivos->editable($cal) && $PFN_conf->g('permisos','ver_contido');
			$editar = !$e_imaxe && $PFN_arquivos->editable($cal) && $PFN_conf->g('permisos','editar');
			$extraer = !$e_imaxe && $PFN_arquivos->vale_extraer($arquivo);
			$ver_comprimido = !$e_imaxe && $PFN_arquivos->vale_extraer($arquivo, true);
			$descargar = $PFN_conf->g('permisos','descargar');
			$correo = $PFN_conf->g('permisos','correo');
			$firmar = $PFN_conf->g('permisos','multiple_firmar');
			$cifrar = $PFN_conf->g('permisos','multiple_cifrar');
		} else {
			$redimensionar_dir = $PFN_conf->g('permisos','redimensionar_dir');
		}
	}

	$PFN_tempo->rexistra('preaccion');

	include ($PFN_paths['accions'].$accion.'.inc.php');

	$PFN_tempo->rexistra('postaccion');
} else {
	$PFN_tempo->rexistra('preplantillas');

	include ($PFN_paths['plantillas'].'cab.inc.php');
	include ($PFN_paths['web'].'opcions.inc.php');

	$PFN_tempo->rexistra('precodigo');

	include ($PFN_paths['web'].'navega.inc.php');

	$PFN_tempo->rexistra('postcodigo');

	include ($PFN_paths['plantillas'].'pe.inc.php');
}
?>
