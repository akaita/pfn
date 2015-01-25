<?php
/****************************************************************************
* data/include/prepara.php
*
* Precarga y controla el valor de ciertas variables
*******************************************************************************/

defined('OK') or die();

PFN_quita_url_SERVER(array('id','accion','cal','lista','completo','executa','posX','posY','modo','ancho','alto','sobreescribir'));

$PFN_conf->carga();

$PFN_niveles = new PFN_Niveles($PFN_conf);

$dir = $PFN_niveles->path_correcto($PFN_vars->get('dir'));

$PFN_vars->get('dir',$dir);

$ver_imaxes = $PFN_vars->get('ver_imaxes');
$estado_accion = '';

$info_raiz = $PFN_paths['info'].'raiz'.$PFN_conf->g('raiz','id');
$info_raiz = $PFN_paths['info'].'raiz'.$PFN_conf->g('raiz','id');
$info_usuario = $PFN_paths['info'].'usuario'.$sPFN['usuario']['id'];

$PFN_conf->p($info_usuario, 'info_usuario');
$PFN_conf->p($info_raiz, 'info_raiz');

if (defined('MENU')) {
	$PFN_conf->p(0, 'raiz', 'peso_maximo');
	$PFN_conf->p(0, 'raiz', 'peso_actual');
}

if (is_file($info_usuario.'/descargas.'.(date('Ym')).'.php')) {
	$PFN_conf->p(include ($info_usuario.'/descargas.'.(date('Ym')).'.php'), 'usuario', 'descargas_actual');
}
?>
