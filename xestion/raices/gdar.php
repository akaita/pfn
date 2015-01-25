<?php
/****************************************************************************
* xestion/raices/gdar.php
*
* Guarda las modificaciónes de datos de una raíz y su relación con los usuarios
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

$query = '';
$erros = array();
$ok = 0;

$id = intval($PFN_vars->post('id'));
$nome = addslashes(trim($PFN_vars->post('nome')));
$path = $PFN_niveles->path_correcto($PFN_vars->post('path')).'/';
$web = $PFN_niveles->path_correcto($PFN_vars->post('web')).'/';
$web = ($web == './')?'/':$web;
$host = str_replace('http://','',addslashes(trim($PFN_vars->post('host'))));
$peso_maximo = addslashes(trim($PFN_vars->post('peso_maximo')));
$peso_maximo = empty($peso_maximo)?0:$peso_maximo;
$unidades = addslashes(trim($PFN_vars->post('unidades')));
$estado = intval($PFN_vars->post('estado'));

$revisar_peso_actual = trim($PFN_vars->post('revisar_peso_actual'));
$borrar_inc = trim($PFN_vars->post('borrar_inc'));
$borrar_imx = trim($PFN_vars->post('borrar_imx'));

$Fusuarios = (array)$PFN_vars->post('Fusuarios');
$Fgrupos = (array)$PFN_vars->post('Fgrupos');
$Fconfs = (array)$PFN_vars->post('Fconfs');

if (empty($nome) || empty($path) || empty($web) || empty($host)) {
	$erros[] = 1;
} elseif (($id == $sPFN['raiz']['id']) && ($estado == 0)) {
	$erros[] = 3;
} elseif (($sPFN['raiz']['id'] == $id)
&& !@in_array($sPFN['usuario']['id'], $Fusuarios[$sPFN['usuario']['id_grupo']])) {
	$erros[] = 7;
} elseif (!@is_dir($path)) {
	$erros[] = 31;
} elseif (!preg_match('/^[0-9\.,]+$/', $peso_maximo)) {
	$erros[] = 36;
} else {
	if (($peso_maximo > 0) && (($id == 0) || $revisar_peso_actual)) {
		$peso_actual = $PFN_niveles->get_tamano($path);
	}

	if (empty($id)) {
		$query = 'INSERT INTO '.$PFN_usuarios->tabla('raices')
			.' SET nome = "'.$nome.'"'
			.', path = "'.$path.'"'
			.', web = "'.$web.'"'
			.', host = "'.$host.'"'
			.', estado = "'.$estado.'"'
			.', peso_maximo = "'.($peso_maximo*(($unidades == 'MB')?1024*1024:1024*1024*1024)).'"'
			.', peso_actual = "'.intval($peso_actual).'";';
	} else {
		$query = 'UPDATE '.$PFN_usuarios->tabla('raices')
			.' SET nome = "'.$nome.'"'
			.', path = "'.$path.'"'
			.', web = "'.$web.'"'
			.', host = "'.$host.'"'
			.', estado = "'.$estado.'"'
			.($revisar_peso_actual?(', peso_actual = "'.intval($peso_actual).'"'):'')
			.', peso_maximo = "'.($peso_maximo*(($unidades == 'MB')?1024*1024:1024*1024*1024)).'"'
			.' WHERE id = "'.$id.'"'
			.' LIMIT 1;';
	}

	if ($PFN_usuarios->actualizar($query) == -1) {
		$erros[] = 2;
	}
}

if (!count($erros)) {
	$id = empty($id)?$PFN_usuarios->id_ultimo():$id;

	$query = 'DELETE FROM '.$PFN_usuarios->tabla('r_u')
		.' WHERE id_raiz="'.$id.'";';
	$PFN_usuarios->actualizar($query);

	if (is_array($Fusuarios) && count($Fusuarios)) {
		$query = 'INSERT INTO '.$PFN_usuarios->tabla('r_u')
			.' (id_raiz,id_usuario) VALUES ';

		foreach ($Fusuarios as $v) {
			if (is_array($v)) {
				foreach ($v as $v2) {
					$query .= '("'.$id.'","'.intval($v2).'"),';
				}
			} else {
				$query .= '("'.$id.'","'.intval($v).'"),';
			}
		}

		$PFN_clases->actualizar(substr($query,0,-1).';');
	}

	if (is_array($Fgrupos) && count($Fgrupos)) {
		$query = 'REPLACE INTO '.$PFN_usuarios->tabla('r_g_c')
			.' (id_raiz,id_grupo,id_conf) VALUES ';

		foreach ($Fgrupos as $k => $v) {
			$query .= '("'.$id.'","'.intval($v).'","'.intval($Fconfs[$k]).'"),';
		}

		$PFN_clases->actualizar(substr($query,0,-1).';');
	}

	$info_raiz = $PFN_paths['info'].'raiz'.$id;

	if (!is_dir($info_raiz)) {
		@mkdir($info_raiz, 0755);
	}

	if ($borrar_inc || $borrar_imx) {
		include_once ($PFN_paths['include'].'class_extra.php');

		$PFN_extra->vacia_path($path, $borrar_inc, $borrar_imx);
	}

	$ok = (count($erros) > 0)?0:1;
}

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['xestion'].'raices/editar.inc.php');
include ($PFN_paths['plantillas'].'Xraiz.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
