<?php
/*******************************************************************************
* instalar/include/actualizar_230-233.inc.php
*
* Ejectula la acción de actualización desde la versión entre 2.3.0 y 2.3.3
*******************************************************************************/

defined('OK') or die();

if (count($erros) == 0) {
	$arq_mysql = $PFN_paths['instalar'].'mysql/actualizar_230-233.sql';
	$consultas = @fread(@fopen($arq_mysql, 'r'), @filesize($arq_mysql));
	$consultas = str_replace('EXISTS ', 'EXISTS '.$basicas['db']['prefixo'], $consultas);
	$consultas = str_replace('ALTER IGNORE TABLE ', 'ALTER IGNORE TABLE '.$basicas['db']['prefixo'], $consultas);
	$consultas = explode(';', $consultas);

	foreach ((array)$consultas as $q) {
		$q = preg_replace("/''([0-9-]*)''/", "'\\1'", trim($q)); 

		if (empty($q)) {
			continue;
		}

		if (!@mysql_query($q, $con)) {
			$erros['mysql_230-233'] = 17;
			$erros_q['mysql_230-233'][] = array(
				'consulta' => $q,
				'erro' => mysql_error($con)
			);
		}
	}

	$paso_feito[] = '230-233';
	array_push($feito, 'mysql_230-233');
}
?>
