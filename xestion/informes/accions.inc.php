<?php
/****************************************************************************
* xestion/informes/accions.inc.php
*
* Prepara los datos para mostrar el informe de acciones sobre ficheros y
* directorios
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$tmp_accions = array('copiar_arq','copiar_dir','mover_arq','mover_dir','eliminar_arq','eliminar_dir','crear_dir','subir_arq','subir_url','renomear','enlazar_arq','editar','extraer','enviar_correo','descargar','firmar','firmar_activex','firmar_java','verificar','cifrar','descifrar','cifrar_pwd','descifrar_pwd','detectar');

$ai_raiz = intval($PFN_vars->post('ai_raiz'));
$ai_usuario = intval($PFN_vars->post('ai_usuario'));
$ai_buscar = trim($PFN_vars->post('ai_buscar'));
$ai_lineas = intval($PFN_vars->post('ai_lineas'));
$ai_data_inicio_d = intval($PFN_vars->post('ai_data_inicio_d'));
$ai_data_inicio_m = intval($PFN_vars->post('ai_data_inicio_m'));
$ai_data_inicio_y = intval($PFN_vars->post('ai_data_inicio_y'));
$ai_data_fin_d = intval($PFN_vars->post('ai_data_fin_d'));
$ai_data_fin_m = intval($PFN_vars->post('ai_data_fin_m'));
$ai_data_fin_y = intval($PFN_vars->post('ai_data_fin_y'));
$ai_amosar = is_array($PFN_vars->post('ai_amosar'))?$PFN_vars->post('ai_amosar'):array();

if (count($ai_amosar) == 0) {
	$ai_lineas = 50;
	$ai_amosar = $tmp_accions;
} else {
	$ai_lineas = ($ai_lineas < 1)?50:$ai_lineas;
}

$valen_accions = array();

foreach ($tmp_accions as $v) {
	if (in_array($v, $ai_amosar)) {
		$valen_accions[] = $v;
		${'ai_'.$v} = true;
	}
}

$lineas = $ai_lineas;

if (checkdate($ai_data_inicio_m, $ai_data_inicio_d, $ai_data_inicio_y)) {
	$ai_data_inicio = mktime(0, 0, 0, $ai_data_inicio_m, $ai_data_inicio_d, $ai_data_inicio_y);
} else {
	$ai_data_inicio_d = $ai_data_inicio_m = $ai_data_inicio_y = $ai_data_inicio = false;
}

if (checkdate($ai_data_fin_m, $ai_data_fin_d, $ai_data_fin_y)) {
	$ai_data_fin = mktime(23, 59, 59, $ai_data_fin_m, $ai_data_fin_d, $ai_data_fin_y);
} else {
	$ai_data_fin_d = $ai_data_fin_m = $ai_data_fin_y = $ai_data_fin = false;
}

if ($PFN_conf->g('logs','accions')) {
	include_once ($PFN_paths['include'].'class_rexistros.php');

	$PFN_rexistros->init('listado', array(
		'id_raiz' => $ai_raiz,
		'id_usuario' => $ai_usuario,
		'accions' => $valen_accions,
		'lineas' => $ai_lineas,
		'data_inicio' => $ai_data_inicio,
		'data_fin' => $ai_data_fin
	));

	$txt = '<table class="tabla_informes" summary="">'
		.'<tr><th>'.PFN___('Xcol_data').'</th>'
		.(($ai_raiz == 0)?'<th>'.PFN___('Xcol_raiz').'</th>':'')
		.(($ai_usuario == 0)?'<th>'.PFN___('Xcol_usuario').'</th>':'')
		.'<th>'.PFN___('Xcol_accion').'</th>'
		.'<th>'.PFN___('Xcol_orixe').'</th>'
		.'<th>'.PFN___('Xcol_destino').'</th></tr>';

	if ($PFN_rexistros->filas() > 0) {
		for ($i = 0; $PFN_rexistros->mais(); $i++, $PFN_rexistros->seguinte()) {
			$txt .= '<tr'.((($i % 2) == 0)?' class="tr_par"':'').'><td>'.$PFN_rexistros->get('data').'</td>'
				.(($ai_raiz == 0)?
					('<td><a href="../raices/editar.php?'
					.PFN_cambia_url('id', $PFN_rexistros->get('id_raiz'), false)
					.'">'.$PFN_rexistros->get('nome').'</a></td>'):'')
				.(($ai_usuario == 0)?
					('<td><a href="../usuarios/editar.php?'
					.PFN_cambia_url('id', $PFN_rexistros->get('id_usuario'), false)
					.'">'.$PFN_rexistros->get('usuario').'</a></td>'):'')
				.'<td>'.PFN___('Xamosar_'.$PFN_rexistros->get('accion')).'</td>';

			if ($PFN_rexistros->get('orixe')) {
				$txt .= '<td><a href="../../navega.php?'
					.PFN_cambia_url(array('id', 'dir'), array($PFN_rexistros->get('id_raiz'), dirname($PFN_rexistros->get('orixe'))), false)
					.'">'.$PFN_rexistros->get('orixe').'</a></td>';
			} else {
				$txt .= '<td>&nbsp;</td>';
			}

			if ($PFN_rexistros->get('destino')) {
				$txt .= '<td><a href="../../navega.php?'
					.PFN_cambia_url(array('id', 'dir'), array($PFN_rexistros->get('id_raiz'), dirname($PFN_rexistros->get('destino'))), false)
					.'">'.$PFN_rexistros->get('destino').'</a></td>';
			} else {
				$txt .= '<td>&nbsp;</td>';
			}
		}
	}

	$txt .= '</table>';
} else {
	$erros[] = 30;
}
?>
