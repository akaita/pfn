<?php
/****************************************************************************
* data/include/borra_cache.php
*
* Borra la cache y realiza un expires de la página
*******************************************************************************/

defined('OK') or die();

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // siempre modificado
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false); // HTTP/1.1
header("Pragma: no-cache"); // HTTP/1.0
?>
