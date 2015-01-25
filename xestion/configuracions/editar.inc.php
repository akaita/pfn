<?php
/****************************************************************************
* xestion/configuracions/editar.inc.php
*
* Carga el fichero a editar
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$erros = array();
$ok = 0;

$existe = $PFN_usuarios->init('configuracion', $id);
$nome_arq = $PFN_paths['conf'].$PFN_niveles->nome_correcto($PFN_usuarios->get('conf').'.inc.php');

if (!$existe || !is_file($nome_arq)) {
	$erros[] = 18;
} elseif (!is_writable($nome_arq)) {
	$erros[] = 19;
}

include_once ($PFN_paths['include'].'class_arquivos.php');
$PFN_arquivos = new PFN_Arquivos($PFN_conf);

$texto = empty($texto)?$PFN_arquivos->get_contido($nome_arq):$texto;
$tmp_texto = htmlentities($texto, ENT_NOQUOTES, $PFN_conf->g('charset'));

if (empty($tmp_texto)) {
	$texto = htmlentities($texto, ENT_NOQUOTES);
} else {
	$texto = $tmp_texto;
}
?>
