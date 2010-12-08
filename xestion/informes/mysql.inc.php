<?php
/****************************************************************************
* xestion/informes/mysql.inc.php
*
* Prepara los datos para mostrar el informe de errores de MySQL
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$my_buscar = trim($PFN_vars->post('my_buscar'));
$my_lineas = intval($PFN_vars->post('my_lineas'));
$my_lineas = ($my_lineas < 1 || $my_lineas > 500)?50:$my_lineas;

if ($PFN_conf->g('logs','mysql') && is_file($PFN_paths['logs'].$PFN_conf->g('logs','mysql'))) {
	include_once ($PFN_paths['logs'].$PFN_conf->g('logs','mysql'));

	if (count($log)) {
		rsort($log);

		$busca = empty($my_buscar)?array():explode(' ', $my_buscar);

		foreach ($log as $k => $v) {
			$borrar = false;

			foreach ($busca as $v2) {
				$borrar = !stristr($v, $v2);

				if ($borrar) {
					break;
				}
			}

			if ($borrar) {
				unset($log[$k]);
				continue;
			}

			preg_match_all("/^\[([^\]]+)\] \[([^\]]+)\] \[([^\]]+)\] \[([^\]]+)\] \[([^\]]+)\]$/", $v, $partes);

			$txt .= '<table class="tabla_informes" summary="">'
				.'<tr><th style="text-align: right;">'.PFN___('Xcol_data').':&nbsp;</th>'
					.'<td>'.$partes[1][0].'</td></tr>'
				.'<tr><th style="text-align: right;">'.PFN___('Xcol_arquivo').':&nbsp;</th>'
					.'<td>'.(substr($partes[2][0], strlen($PFN_paths['web']))).'</td></tr>'
				.'<tr><th style="text-align: right;">'.PFN___('Xcol_linha').':&nbsp;</th>'
					.'<td>'.$partes[3][0].'</td></tr>'
				.'<tr><th style="text-align: right;">'.PFN___('Xcol_consulta').':&nbsp;</th>'
					.'<td>'.stripslashes($partes[4][0]).'</td></tr>'
				.'<tr><th style="text-align: right;">'.PFN___('Xcol_erro').':&nbsp;</th>'
					.'<td>'.stripslashes($partes[5][0]).'</td></tr>'
				.'</table><br />';

			if ($i++ && $i > $my_lineas) {
				break;
			}
		}
	} else {
		$erros[] = 29;
	}
} else {
	$erros[] = 29;
}
?>
