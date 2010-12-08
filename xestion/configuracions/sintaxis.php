<?php
/****************************************************************************
* xestion/configuracions/sintaxis.php
*
* Carga la pantalla para la visualización para comprobación de la sintaxis de un
* fichero de configuración
*******************************************************************************/

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

PFN_quita_url_SERVER('id');

session_write_close();

$id = $PFN_vars->get('id');

$erros = array();
$existe = $PFN_usuarios->init('configuracion', $id);
$nome_arq = $PFN_paths['conf'].$PFN_niveles->nome_correcto($PFN_usuarios->get('conf').'.inc.php');

if (!$existe || !is_file($nome_arq)) {
	$erros[] = 18;
}

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');

$PFN_tempo->rexistra('precodigo');

include_once ($PFN_paths['include'].'class_arquivos.php');
$PFN_arquivos = new PFN_Arquivos($PFN_conf);

include ($PFN_paths['plantillas'].'Xconfiguracion_sintaxis.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
