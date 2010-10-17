<?php
/****************************************************************************
* xestion/informes/acsesos.inc.php
*
* Prepara los datos para mostrar el informe sobre accesos
*

PHPfileNavigator versión 2.0.0

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

defined('OK') && defined('XESTION') or die();

$ae_buscar = trim($PFN_vars->post('ae_buscar'));
$ae_lineas = intval($PFN_vars->post('ae_lineas'));
$ae_lineas = ($ae_lineas < 1 || $ae_lineas > 500)?50:$ae_lineas;
$ae_data_inicio_d = intval($PFN_vars->post('ae_data_inicio_d'));
$ae_data_inicio_m = intval($PFN_vars->post('ae_data_inicio_m'));
$ae_data_inicio_y = intval($PFN_vars->post('ae_data_inicio_y'));
$ae_data_fin_d = intval($PFN_vars->post('ae_data_fin_d'));
$ae_data_fin_m = intval($PFN_vars->post('ae_data_fin_m'));
$ae_data_fin_y = intval($PFN_vars->post('ae_data_fin_y'));
$ae_amosar = is_array($PFN_vars->post('ae_amosar'))?$PFN_vars->post('ae_amosar'):array();
$ae_entradas = in_array('entradas', $ae_amosar);
$ae_certificado = in_array('certificado', $ae_amosar);
$ae_saidas = in_array('saidas', $ae_amosar);
$ae_erros = in_array('erros', $ae_amosar);
$ae_bloqueados = in_array('bloqueados', $ae_amosar);
$ae_sen_datos = in_array('sen_datos', $ae_amosar);

if (count($ae_amosar) == 0) {
	$ae_entradas = $ae_certificado = $ae_saidas = $ae_erros = $ae_sen_datos = $ae_bloqueados = true;
}

if (checkdate($ae_data_inicio_m, $ae_data_inicio_d, $ae_data_inicio_y)) {
	$ae_data_inicio = mktime(0, 0, 0, $ae_data_inicio_m, $ae_data_inicio_d, $ae_data_inicio_y);
} else {
	$ae_data_inicio_d = $ae_data_inicio_m = $ae_data_inicio_y = $ae_data_inicio = false;
}

if (checkdate($ae_data_fin_m, $ae_data_fin_d, $ae_data_fin_y)) {
	$ae_data_fin = mktime(23, 59, 59, $ae_data_fin_m, $ae_data_fin_d, $ae_data_fin_y);
} else {
	$ae_data_fin_d = $ae_data_fin_m = $ae_data_fin_y = $ae_data_fin = false;
}

$w = 'WHERE 1 = 1';
$w .= $ae_data_inicio?(' AND data >= "'.intval($ae_data_inicio).'"'):'';
$w .= $ae_data_fin?(' AND data <= "'.intval($ae_data_fin).'"'):'';
$w .= $ae_buscar?(' AND login LIKE "%'.addslashes($ae_buscar).'%"'):'';

if ($ae_entradas || $ae_certificado || $ae_saidas || $ae_erros || $ae_sen_datos) {
	$w .= ' AND (';
	$w .= $ae_entradas?(' (donde = "login" AND estado = 1) OR'):'';
	$w .= $ae_certificado?(' (donde = "certificado" AND estado = 1) OR'):'';
	$w .= $ae_saidas?(' donde = "sair" OR'):'';
	$w .= $ae_bloqueados?(' donde = "bloqueado" OR'):'';
	$w .= $ae_erros?(' ((donde = "login" || donde = "certificado") AND estado = 0) OR'):'';
	$w .= $ae_sen_datos?(' ((donde = "vacios" OR donde = "session") AND estado = 0) OR'):'';
	$w = substr($w, 0, -2).')';
}

$w .= ' ORDER BY data DESC';
$w .= ' LIMIT 0,'.intval($ae_lineas).';';

$txt = '<table class="tabla_informes" summary="">'
	.'<tr><th>'.PFN___('Xcol_data').'</th>'
	.'<th>'.PFN___('Xcol_login').'</th>'
	.'<th>'.PFN___('Xcol_ip').'</th>'
	.'<th>'.PFN___('Xcol_estado').'</th>'
	.'<th>'.PFN___('Xcol_donde').'</th>'
	.'<th>'.PFN___('Xcol_sesion').'</th></tr>';

for ($PFN_usuarios->informe($w); $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
	if ($PFN_usuarios->get('estado') == '1') {
		$class = 'tr_ok';
	} else {
		$class = 'tr_ko';
	}

	$txt .= '<tr class="'.$class.'"><td>'.date("Y/m/d H:i:s", $PFN_usuarios->get('data')).'</td>'
		.'<td>'.$PFN_usuarios->get('login').'</td>'
		.'<td>'.$PFN_usuarios->get('ip').'</td>'
		.'<td>'.$PFN_usuarios->get('estado').'</td>'
		.'<td>'.$PFN_usuarios->get('donde').'</td>'
		.'<td>'.$PFN_usuarios->get('session').'</td></tr>';
}

$txt .= '</table>';
?>
