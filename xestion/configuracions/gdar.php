<?php
/****************************************************************************
* xestion/configuracions/gdar.php
*
* Guarda el resultado de la edici�n de un fichero de configuraci�n
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

$id = $PFN_vars->post('id');

$erros = array();
$existe = $PFN_usuarios->init('configuracion', $id);
$nome_arq = $PFN_paths['conf'].$PFN_niveles->nome_correcto($PFN_usuarios->get('conf').'.inc.php');

if (!$existe || !is_file($nome_arq)) {
	$erros[] = 18;
} elseif (!is_writable($nome_arq)) {
	$erros[] = 19;
}

$test = '';
$alertas = array();
$estado_accion = '';

include_once ($PFN_paths['include'].'class_arquivos.php');
$PFN_arquivos = new PFN_Arquivos($PFN_conf);

$texto = trim($PFN_vars->post('texto'));

if ((count($erros) == 0) && $PFN_vars->post('executa')) {
	$alertas = $PFN_arquivos->comprobar_sintaxis($texto);

	if (empty($alertas)) {
		$estado = $PFN_arquivos->abre_escribe($nome_arq, $texto);
		$estado_accion = PFN___('estado_editar_'.intval($estado));
		$ok = 5;
	} else {
		$erros[] = 28;
	}
}

if (count($erros) == 0) {
	Header('Location: resumo.php?'.PFN_cambia_url(array('id', 'ok'), array($id, $ok), false, true));
	exit;
}

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['plantillas'].'Xconfiguracion_editar.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
