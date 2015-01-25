<?php
/*******************************************************************************
* instalar/mysql/actualizar_220-230.php
*
* Consultas necesarias para la actualizacion desde 2.0.0 a 2.3.0
*******************************************************************************/

defined('OK') or die();

return array(
	10 => 'REPLACE '.$basicas['db']['prefixo'].'bloqueo_ip'
		.' SET ip = "0.0.0.0";',
);
?>
