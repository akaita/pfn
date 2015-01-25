<?php
/****************************************************************************
* xestion/grupos/gdar.php
*
* Guarda las modificaciónes de datos de un grupo
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

$id = intval($PFN_vars->post('id'));
$nome = addslashes(trim($PFN_vars->post('nome')));
$id_conf = intval($PFN_vars->post('id_conf'));
$estado = intval($PFN_vars->post('estado'));

$query = '';
$erros = array();
$ok = 0;

if (empty($nome) || empty($id_conf)) {
	$erros[] = 1;
} elseif (($id == $sPFN['usuario']['id_grupo']) && ($estado == 0)) {
	$erros[] = 14;
} elseif ($PFN_usuarios->init('existe_grupo', $nome, $id)) {
	$erros[] = 15;
} else {
	if (empty($id)) {
		$query = 'INSERT INTO '.$PFN_usuarios->tabla('grupos')
			.' SET nome = "'.$nome.'"'
			.', id_conf = "'.$id_conf.'"'
			.', estado = "'.$estado.'";';
	} else {
		$query = 'UPDATE '.$PFN_usuarios->tabla('grupos')
			.' SET nome = "'.$nome.'"'
			.', id_conf = "'.$id_conf.'"'
			.', estado = "'.$estado.'"'
			.' WHERE id = "'.$id.'"'
			.' LIMIT 1;';
	}

	if ($PFN_usuarios->actualizar($query) == -1) {
		$erros[] = 2;
	}
}

if (!count($erros)) {
	if (empty($id)) {
		$id = $PFN_usuarios->id_ultimo();

		$PFN_usuarios->init('raices');

		$query = 'INSERT INTO '.$PFN_usuarios->tabla('r_g_c')
			.' (id_raiz,id_grupo,id_conf) VALUES ';

		for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
			$query .= '("'.$PFN_usuarios->get('id').'","'.$id.'","'.$id_conf.'"),';
		}

		$PFN_usuarios->actualizar(substr($query,0,-1).';');
	} elseif ($PFN_vars->post('revisar_relacions_raices') == 'true') {
		$query = 'UPDATE '.$PFN_usuarios->tabla('r_g_c')
			.' SET id_conf = "'.$id_conf.'"'
			.' WHERE id_grupo = "'.$id.'";';

		$PFN_usuarios->actualizar($query);
	}

	$ok = 1;
}	

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['xestion'].'grupos/editar.inc.php');
include ($PFN_paths['plantillas'].'Xgrupo.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
