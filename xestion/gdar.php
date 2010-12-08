<?php
/****************************************************************************
* xestion/gdar.php
*
* Guarda los cambios realizados en el estado de las raices o usuarios
*******************************************************************************/

$relativo = '../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

$antes = $PFN_vars->post('antes');
$estado = $PFN_vars->post('estado');
$accion = $PFN_vars->post('accion');
$opc = $PFN_vars->post('opc');
$erros = array();

if ($accion == 'raices' || $accion == 'usuarios' || $accion == 'grupos') {
	if (is_array($antes)) {
		foreach ($antes as $k => $v) {
			$k = intval($k);

			if ($v != $estado[$k]) {
				if ($estado[$k] == 0) {
					if (($accion == 'raices') && ($sPFN['raiz']['id'] == $k)) {
						$erros[] = 3;
						continue;
					} elseif (($accion == 'usuarios') && ($sPFN['usuario']['id'] == $k)) {
						$erros[] = 10;
						continue;
					} elseif (($accion == 'grupos') && ($sPFN['usuario']['id_grupo'] == $k)) {
						$erros[] = 14;
						continue;
					}
				}
			}

			$PFN_usuarios->accion('estado', $accion, $estado[$k], $k);
		}
	}
}

$ok = (count($erros) > 0)?0:1;

Header('Location: '.PFN_cambia_outra_url($PFN_vars->server('HTTP_REFERER'), array('erros','ok','opc'), array(implode(',', $erros), $ok, $opc), true));
exit;
?>
