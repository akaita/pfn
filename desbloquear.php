<?php
/****************************************************************************
* reactivar.php
*
* Activa un usuario que ha sido bloqueado por excesivos intentos de acceso
* fallidos
*

PHPfileNavigator versión 2.3.4

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
session_unset('sPFN');
session_write_close();

include ('paths.php');
include_once ($PFN_paths['include'].'class_tempo.php');
include_once ($PFN_paths['include'].'funcions.php');
include_once ($PFN_paths['include'].'class_conf.php');
include_once ($PFN_paths['include'].'class_vars.php');

$PFN_conf->carga();

$PFN_tempo->rexistra('precodigo');

$ok = false;

if (($PFN_vars->post('desbloquear_usuario') != '')
&& ($PFN_vars->post('desbloquear_email') != '')) {
	include_once ($PFN_paths['include'].'mysql.php');
	include_once ($PFN_paths['include'].'clases.php');
	include_once ($PFN_paths['include'].'class_encriptar.php');
	include_once ($PFN_paths['include'].'class_usuarios.php');

	$PFN_usuarios->vars($PFN_vars);

	$ok = $PFN_usuarios->correo_desbloqueo();

	if ($ok === 1) {
		$txt_erro = PFN___('avisos_desbloquear_usuario_1');
	} else {
		$txt_erro = PFN___('avisos_desbloquear_usuario_'.$ok);
	}
} else {
	$txt_erro = PFN___('txt_desbloquear_usuario');
}

$PFN_tempo->rexistra('preplantillas');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['plantillas'].'desbloquear.inc.php');
include ($PFN_paths['plantillas'].'pe.inc.php');
?>
