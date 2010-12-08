<?php
/****************************************************************************
* xestion/grupos/editar.inc.php
*
* Comprobaciones antes de modificar o añadir un grupo
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$Fconfs = array();
$cnt_usuarios = 0;

$PFN_usuarios->init('configuracions');

for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
	if ($PFN_usuarios->get('vale') == 1) {
		$Fconfs[$PFN_usuarios->get('id')] = $PFN_usuarios->get('conf');
	}
}

$PFN_usuarios->init('grupo', $id);
?>
