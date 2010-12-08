<?php
/****************************************************************************
* xestion/raices/editar.inc.php
*
* Comprobaciones antes de modificar o añadir una raiz
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$Dgrupos = $Dconfs = array();

if (!is_writable($PFN_paths['info'])) {
	$erro[] = 'Xinfonon_writable';
}

if (empty($id)) {
	$PFN_usuarios->init('grupos_configuracions_usuarios');
} else {
	$PFN_usuarios->init('grupos_configuracions_usuarios_raiz', $id);
}

for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
	$Dgrupos[$PFN_usuarios->get('id_grupo')]['nome'] = $PFN_usuarios->get('grupo');
	$Dgrupos[$PFN_usuarios->get('id_grupo')]['id_conf'] = $PFN_usuarios->get('id_conf');
	$Dgrupos[$PFN_usuarios->get('id_grupo')]['usuarios'][$PFN_usuarios->get('id_usuario')] = array($PFN_usuarios->get('usuario'), $PFN_usuarios->get('relacion'));
}

$PFN_usuarios->init('configuracions_valen');

for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
	$Dconfs[$PFN_usuarios->get('id')] = $PFN_usuarios->get('conf');
}

$PFN_usuarios->init('raiz', $id);

$peso_maximo = $PFN_usuarios->get('peso_maximo');
$peso_actual = $PFN_usuarios->get('peso_actual');
?>
