<?php
/****************************************************************************
* xestion/configuracions/index.inc.php
*
* Carga los datos y relaciones de un fichero de configuración
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

if ($PFN_vars->get('erros') != '') {
	$erros = explode(',', $PFN_vars->get('erros'));
} else {
	$erros = array();
}

$editar = $eliminar = $existe_arq = false;
$ok = ($PFN_vars->get('ok') == '')?false:intval($PFN_vars->get('ok'));

$existe = $PFN_usuarios->init('configuracion', $id);
$nome = $PFN_usuarios->get('conf');
$vale = $PFN_usuarios->get('vale');
$nome_arq = $PFN_paths['conf'].$PFN_niveles->nome_correcto($nome.'.inc.php');

if ($existe) {
	$eliminar = true;

	if (is_file($nome_arq)) {
		$existe_arq = true;
		$stat = stat($nome_arq);

		if (is_writable($nome_arq)) {
			$editar = true;
		} else {
			$erros[] = 19;
		}
	} else {
		$erros[] = 18;
	}
} else {
	$erros[] = 18;
	$stat = array();
}
?>
