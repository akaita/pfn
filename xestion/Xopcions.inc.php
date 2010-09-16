<?php
/****************************************************************************
* data/xestion/Xopcions.inc.php
*
* Carga lo necesario para la visualizaci�n del men� superior de opciones en la
* administraci�n
*

PHPfileNavigator versi�n 2.2.0

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net/

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
t�rminos de la Licencia P�blica General de GNU seg�n es publicada por la Free
Software Foundation, bien de la versi�n 2 de dicha Licencia o bien (seg�n su
elecci�n) de cualquier versi�n posterior. 

Este programa se distribuye con la esperanza de que sea �til, pero SIN NINGUNA
GARANT�A, incluso sin la garant�a MERCANTIL impl�cita o sin garantizar la
CONVENIENCIA PARA UN PROP�SITO PARTICULAR. V�ase la Licencia P�blica General de
GNU para m�s detalles. 

Deber�a haber recibido una copia de la Licencia P�blica General junto con este
programa. Si no ha sido as�, escriba a la Free Software Foundation, Inc., en
675 Mass Ave, Cambridge, MA 02139, EEUU. 
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$quita_url = PFN_quita_url('id', false);

$Xopcions = array(
	'm_comezo' => $relativo.'navega.php?'.PFN_cambia_url('dir','./',false),
	'm_admin' => $relativo.'xestion/?'.$quita_url,
	'm_actualizar' => PFN_get_url(),
	'Xm_crear_raiz' => $relativo.'xestion/raices/editar.php?'.$quita_url,
	'Xm_crear_usuario' => $relativo.'xestion/usuarios/editar.php?'.$quita_url,
	'Xm_crear_grupo' => $relativo.'xestion/grupos/editar.php?'.$quita_url,
	'Xm_varios' => $relativo.'xestion/varios/index.php?'.$quita_url,
	'Xm_informes' => $relativo.'xestion/informes/index.php?'.$quita_url,
	'Xm_traduccion' => $relativo.'xestion/traduccion/index.php?'.$quita_url,
	'm_sair' => $relativo.'sair.php?'.$quita_url,
);

include ($PFN_paths['plantillas'].'Xopcions.inc.php');
?>
