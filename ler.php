<?php
/****************************************************************************
* ler.php
*
* Lee el contenido de un fichero y devuelve el valor en binario
*

PHPfileNavigator versión 2.4.0

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
