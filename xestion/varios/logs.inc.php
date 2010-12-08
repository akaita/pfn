<?php
/****************************************************************************
* xestion/varios/logs.inc.php
*
* Elimina los ficheros de registros seleccionados
*******************************************************************************/

$ok = false;
$log_mysql = $PFN_vars->post('log_mysql');
$logs_accions = $PFN_vars->post('logs_accions');

if ($log_mysql && is_file($PFN_paths['logs'].$PFN_conf->g('logs','mysql'))) {
	@unlink($PFN_paths['logs'].$PFN_conf->g('logs','mysql'));
	$ok = true;
}

if ($logs_accions) {
	foreach ($logs_accions as $v) {
		if (is_file($PFN_paths['info'].'raiz'.intval($v).'/'.$PFN_conf->g('logs','accions'))) {
			@unlink($PFN_paths['info'].'raiz'.intval($v).'/'.$PFN_conf->g('logs','accions'));
			$ok = true;
		}
	}
}
?>
