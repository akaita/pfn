<?php
/****************************************************************************
* xestion/grupos/index.php
*
* Carga la pantalla menú de administración de grupos
*

PHPfileNavigator versión 2.3.0

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net/

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
términos de la Licencia Pública General de GNU según es publicada por la Free
Software Foundation, bien de la versión 2 de dicha Licencia o bien (según su
elección) de cualquier versión posterior. 

Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA
GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la
CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de
GNU para más detalles. 

Debería haber recibido una copia de la Licencia Pública General junto con este
programa. Si no ha sido así, escriba a la Free Software Foundation, Inc., en
675 Mass Ave, Cambridge, MA 02139, EEUU. 
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

PFN_quita_url_SERVER(array('id','paxina','paxinar','buscar','erros','ok'));

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

$erros = array();
$ok = false;

if (strlen($PFN_vars->get('erros'))) {
	$erros = explode(',', $PFN_vars->get('erros'));
}

if (intval($PFN_vars->get('ok'))) {
	$ok = intval($PFN_vars->get('ok'));
}

if ($PFN_vars->post('accion') == 'gardar') {
	$antes = $PFN_vars->post('antes');
	$estado = $PFN_vars->post('estado');

	if (is_array($antes)) {
		foreach ($antes as $k => $v) {
			$k = intval($k);

			if ($v != $estado[$k]) {
				if (($estado[$k] == 0) && ($sPFN['usuario']['id_grupo'] == $k)) {
					$erros[] = 10;
				} else {
					$PFN_usuarios->accion('estado', 'grupos', $estado[$k], $k);
				}
			}
		}

		$ok = count($erros)?false:11;
	}
}

$buscar = trim($PFN_vars->get('buscar'));

$PFN_usuarios->init('grupos_total', $buscar);

$total = $PFN_usuarios->get('total');

$paxinar = intval($PFN_vars->get('paxinar'));
$paxinar = (($paxinar < 1) || ($paxinar > $total))?50:$paxinar;

$paxina = intval($PFN_vars->get('paxina'));
$paxina = (($paxina < 0) || ($paxina > $total))?0:$paxina;

$PFN_usuarios->init('grupos_pax', $paxina, $paxinar, $buscar);

include ($PFN_paths['plantillas'].'Xgrupos.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
