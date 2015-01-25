<?php
/****************************************************************************
* xestion/doazon.php
*
* Carga la pantalla para donación
*******************************************************************************/

$relativo = '../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

PFN_quita_url_SERVER(array('id_raiz','id_usuario','id_grupo','id_conf','opc','erros','ok'));

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

$doar = PFN___('Xdoar');
$doar_paypal = PFN___('Xdoar_paypal');
$doar_tarxeta = PFN___('Xdoar_tarxeta');

include ($PFN_paths['plantillas'].'Xdoazon.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
