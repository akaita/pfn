<?php
/****************************************************************************
* xestion/configuracions/ver.inc.php
*
* Carga el contenido de un fichero de configuración
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$editar = false;
$color = false;
$erros = array();

$id = $PFN_vars->get('id');

$existe = $PFN_usuarios->init('configuracion', $id);
$nome_arq = $PFN_paths['conf'].$PFN_niveles->nome_correcto($PFN_usuarios->get('conf').'.inc.php');

if ($existe && is_file($nome_arq)) {
	if (is_writable($nome_arq)) {
		$editar = true;
	}
} else {
	$erros[] = 18;
}

include_once ($PFN_paths['include'].'class_arquivos.php');
$PFN_arquivos = new PFN_Arquivos($PFN_conf);
?>
