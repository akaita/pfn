<?php
/****************************************************************************
* ler.php
*
* Lee el contenido de un fichero y devuelve el valor en binario
*

PHPfileNavigator versi�n 2.4.0

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

include ('paths.php');
include ($PFN_paths['include'].'basicweb.php');

session_write_close();

$cal = $PFN_niveles->nome_correcto($PFN_vars->get('cal'));
$arquivo = str_replace(array('/./','/'),'/', $PFN_conf->g('raiz','path').$dir.'/'.$cal);

if ((!$PFN_niveles->filtrar($cal) && $cal != '.') || (!is_file($arquivo))) {
	header('HTTP/1.0 404 Not Found');
	exit;
} else {
	echo file_get_contents($arquivo);
}
?>
