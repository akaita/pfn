<?php
/****************************************************************************
* ler.php
*
* Lee el contenido de un fichero y devuelve el valor en binario
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
