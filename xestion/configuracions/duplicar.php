<?php
/****************************************************************************
* xestion/configuracions/duplicar.php
*
* Duplica un fichero de configuraci�n
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

PFN_quita_url_SERVER(array('id','novo'));

session_write_close();

$erros = array();
$ok = 0;

$id = $PFN_vars->get('id');

$existe = $PFN_usuarios->init('configuracion', $id);
$PFN_conf_orix = $PFN_usuarios->get('conf');
$vale = $PFN_usuarios->get('vale');
$nome_orix = $PFN_paths['conf'].$PFN_niveles->nome_correcto($PFN_conf_orix.'.inc.php');

$PFN_conf->p(false, 'logs', 'accions');
$PFN_conf->p(true, 'nome_riguroso');

$PFN_conf_copia = str_replace('.inc.php', '', $PFN_niveles->nome_correcto($PFN_vars->get('novo')));
$PFN_conf_copia= trim(str_replace('.php', '', $PFN_conf_copia));
$nome_copia = $PFN_paths['conf'].$PFN_niveles->nome_correcto($PFN_conf_copia.'.inc.php');

if (!$existe || !is_file($nome_orix)) {
	$erros[] = 18;
} elseif (empty($PFN_conf_copia)) {
	$erros[] = 20;
} elseif (is_file($nome_copia)) {
	$erros[] = 21;
} elseif ($PFN_usuarios->init('configuracion_nome', $PFN_conf_copia)) {
	$erros[] = 22;
} else {
	if ($novo_id = $PFN_usuarios->accion('conf_crear', $PFN_conf_copia)) {
		include_once ($PFN_paths['include'].'class_accions.php');

		$PFN_accions = new PFN_Accions($PFN_conf);
		$estado = $PFN_accions->copiar($nome_orix, $nome_copia);

		if ($PFN_accions->estado('copiar_arq')) {
			$id = $novo_id;
			$PFN_vars->get('id', $id);
		} else {
			$PFN_usuarios->accion('conf_eliminar', $novo_id);
			$erros[] = 24;
		}
	} else {
		$erros[] = 23;
	}
}

$ok = count($erros)?false:3;

Header('Location: resumo.php?'.PFN_cambia_url(array('id', 'ok', 'erros'), array($id, $ok, implode(',', $erros)), false, true));
exit;
?>
