<?php
/****************************************************************************
* xestion/configuracions/eliminar.inc.php
*
* Elimina un fichero de configuración y sus relaciones en la base de datos
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

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

PFN_quita_url_SERVER('id');

session_write_close();

$ok = 0;
$erros = array();

$id = $PFN_vars->get('id');
$existe = $PFN_usuarios->init('configuracion', $id);
$nome_arq = $PFN_paths['conf'].$PFN_niveles->nome_correcto($PFN_usuarios->get('conf').'.inc.php');

if (!$existe) {
	$erros[] = 18;
} elseif ($PFN_usuarios->get('vale') != 1) {
	$erros[] = 25;
} elseif ($PFN_usuarios->init('configuracion_raices', $id)) {
	$erros[] = 26;
} elseif ($PFN_usuarios->init('configuracion_grupos', $id)) {
	$erros[] = 27;
}

if (count($erros) == 0) {
	$PFN_usuarios->accion('conf_eliminar', $id);
	@unlink($nome_arq);
}

$ok = count($erros)?false:4;

if ($ok) {
	Header('Location: index.php?'.PFN_cambia_url(array('id', 'ok'), array(false, $ok), false, true));
} else {
	Header('Location: resumo.php?'.PFN_cambia_url(array('id', 'erros'), array($id, implode(',', $erros)), false, true));
}

exit;
?>
