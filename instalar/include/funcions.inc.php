<?php
/*******************************************************************************
* instalar/include/funcions.inc.php
*
* Funciones básicas y comunes para la instalación
*******************************************************************************/

defined('OK') or die();

function PFN_mover_inc ($dir) {
	global $PFN_paths;

	$od = @opendir($dir);

	while ($cada = @readdir($od)) {
		if ($cada == '.' || $cada == '..') {
			continue;
		}

		if (is_dir($dir.$cada)) {
			PFN_mover_inc($dir.$cada.'/');
		} elseif (preg_match('/^\..*(jpg|png|gif|jpeg)$/i', $cada)
		|| preg_match('/^\..*\.INC$/', $cada)) {
			PFN_crea_directorio_recursivo($PFN_paths['extra'].$dir);

			if (preg_match('/^\..*(jpg|png|gif|jpeg)$/i', $cada)) {
				$destino = $PFN_paths['extra'].$dir.'/'.substr($cada, 1);
			} elseif (preg_match('/^\..*\.INC$/', $cada)) {
				$destino = $PFN_paths['extra'].$dir.'/'.substr($cada, 1, -4).'.php';
			} else {
				$destino = $PFN_paths['extra'].$dir.'/'.$cada;
			}

			if (@copy($dir.$cada, $destino)) {
				@unlink($dir.$cada);
			}
		}
	}

	@closedir($od);
}
?>
