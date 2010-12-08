<?php
/****************************************************************************
* xestion/varios/index.inc.php
*
* Prepara los datos para ser mostrados y ejecutados
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$executa = $PFN_vars->post('executa');
$erros = array();
$txt = '';

$PFN_usuarios->init('raices');

for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
	$raices[$PFN_usuarios->get('id')] = $PFN_usuarios->get('nome');
}

switch ($executa) {
	case 'indexador':
	case 'logs':
		include_once ($PFN_paths['xestion'].'varios/'.$executa.'.inc.php');
		break;
}
?>
