<?php
/****************************************************************************
* activar_desbloqueo.php
*
* Activa de nuevo un usuario bloqueado
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
$sPFN = '';

session_start();
session_register('sPFN');
session_unset('sPFN');
session_write_close();

include ('paths.php');
include_once ($PFN_paths['include'].'class_tempo.php');
include_once ($PFN_paths['include'].'funcions.php');
include_once ($PFN_paths['include'].'class_conf.php');
include_once ($PFN_paths['include'].'class_vars.php');

$ok = 1;

$PFN_tempo->rexistra('precodigo');

$clave = trim(urldecode(getenv('QUERY_STRING')));

include ($PFN_paths['plantillas'].'cab.inc.php');

if (empty($clave)) {
	$txt_erro = PFN___('avisos_desbloquear_usuario_6');

	include ($PFN_paths['plantillas'].'desbloquear.inc.php');
} else {
	include_once ($PFN_paths['include'].'class_encriptar.php');

	$clave = $PFN_encriptar->desencripta($clave);

	list($time, $id) = explode('|', $clave);

	$time = intval($time);
	$id = intval($id);

	if (($time == 0) || ($id == 0)) {
		$txt_erro = PFN___('avisos_desbloquear_usuario_6');

		include ($PFN_paths['plantillas'].'desbloquear.inc.php');
	} else if (strtotime('-24 hours') > $time) {
		$txt_erro = PFN___('avisos_desbloquear_usuario_7');

		include ($PFN_paths['plantillas'].'desbloquear.inc.php');
	} else {
		include_once ($PFN_paths['include'].'mysql.php');
		include_once ($PFN_paths['include'].'clases.php');
		include_once ($PFN_paths['include'].'class_usuarios.php');

		$PFN_usuarios->init('usuario', $id);

		if ($PFN_usuarios->filas() == 0) {
			$txt_erro = PFN___('avisos_desbloquear_usuario_6');

			include ($PFN_paths['plantillas'].'desbloquear.inc.php');
		} else if (intval($PFN_usuarios->get('estado')) !== 2) {
			$txt_erro = PFN___('avisos_desbloquear_usuario_4');

			include ($PFN_paths['plantillas'].'desbloquear.inc.php');
		} else {
			$PFN_usuarios->usuario = $PFN_usuarios->get('usuario');

			$PFN_usuarios->desbloquear_usuario($id);

			$PFN_usuarios->garda_rexistro('desbloqueo',1);

			$txt_erro = PFN___('avisos_desbloquear_usuario_8');

			include ($PFN_paths['plantillas'].'desbloquear.inc.php');
		}
	}
}

$PFN_tempo->rexistra('preplantillas');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
