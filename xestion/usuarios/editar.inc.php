<?php
/****************************************************************************
* xestion/usuarios/editar.inc.php
*
* Comprobaciones antes de modificar o añadir un usuario
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$Dgrupos = array();

$PFN_usuarios->init('grupos');

for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
	$Dgrupos[$PFN_usuarios->get('id')] = $PFN_usuarios->get('nome');
}

if (!is_writable($PFN_paths['info'])) {
	$erro[] = 'Xinfonon_writable';
}

$max_descargas = 0;
$actual_descargas = 0;

if ($id > 0) {
	$PFN_usuarios->init('usuario', $id);

	if ($PFN_usuarios->filas() === 1) {
		$info_usuario = $PFN_paths['info'].'usuario'.$id;

		$max_descargas = $PFN_usuarios->get('descargas_maximo') / 1024 / 1024;
		$actual = $info_usuario.'/descargas.'.(date('Ym')).'.php';

		if (is_file($actual)) {
			$actual_descargas = include ($actual);
			$actual_descargas = $actual_descargas / 1024 / 1024;
		}
	} else {
		$PFN_usuarios->vacia();
	}
} else {
	$PFN_usuarios->vacia();
}
?>
