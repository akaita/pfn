<?php
/****************************************************************************
* xestion/configuracions/gdar.php
*
* Guarda el resultado de la edici�n de un fichero de configuraci�n
*

PHPfileNavigator versi�n 2.2.0

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net/

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
t�rminos de la Licencia P�blica General de GNU seg�n es publicada por la Free
Software Foundation, bien de la versi�n 2 de dicha Licencia o bien (seg�n su
elecci�n) de cualquier versi�n posterior. 

Este programa se distribuye con la esperanza de que sea �til, pero SIN NINGUNA
GARANT�A, incluso sin la garant�a MERCANTIL impl�cita o sin garantizar la
CONVENIENCIA PARA UN PROP�SITO PARTICULAR. V�ase la Licencia P�blica General de
GNU para m�s detalles. 

Deber�a haber recibido una copia de la Licencia P�blica General junto con este
programa. Si no ha sido as�, escriba a la Free Software Foundation, Inc., en
675 Mass Ave, Cambridge, MA 02139, EEUU. 
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
