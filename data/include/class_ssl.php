<?php
/****************************************************************************
* data/include/class_ssl.php
*
* Ejecuta los comandos que realizan las acciones de seguridad
*******************************************************************************/

defined('OK') or die();

/**
* class PFN_SSL
*
* Permite ejecutar los comandos de acciones de seguridad
*/
class PFN_SSL {
	function getDNIe ($texto) {
		// Obtenemos en DNI para formatos estandar
		if (preg_match('#/serialNumber=([0-9a-z]+)#i', $texto, $dni)) {
			return array(1, $dni[1]);
		// Obtenemos en NIF/CIF para certificado FMNT
		} else if (preg_match('#(NIF|CIF) ([a-z]?[0-9]{8}[a-z]?)#i', $texto, $dni)) {
			return array(0, $dni[2]);
		} else {
			return array(0, false);
		}
	}
	
	function checkDNIe () {
		$so = strtoupper(substr(PHP_OS, 0, 3));

		if ($so == 'WIN') {
			return false;
		}

		if (!$_SERVER['SSL_CLIENT_CERT_CHAIN_0'] || !$_SERVER['SSL_CLIENT_CERT']) {
			return false;
		}
	
		global $paths;

		$tmp = $paths['tmp'].md5(microtime()).rand(0, 10000);
	
		file_put_contents($tmp.'cert_i.pem', $_SERVER['SSL_CLIENT_CERT_CHAIN_0']);
		file_put_contents($tmp.'cert_c.pem', $_SERVER['SSL_CLIENT_CERT']);
	
		// Buscamos el OCSP en el cual validaremos nuestro certificado
		$ocsp = shell_exec('openssl x509 -in '.$tmp.'cert_c.pem -text -noout | grep ocsp | cut -d ":" -f2-');
		$ocsp = empty($ocsp)?'http://ocsp.dnie.es':$ocsp;
	
		$output = shell_exec('openssl ocsp -issuer '.$tmp.'cert_i.pem -cert '.$tmp.'cert_c.pem -url '.$ocsp);
	
		unlink($tmp.'cert_i.pem');
		unlink($tmp.'cert_c.pem');
	
		$output = preg_split('/[\r\n]/', $output);
		$output = preg_split('/: /', $output[0]);
	
		return ($output[1] == 'good');
	}
}

$PFN_SSL = new PFN_SSL();
?>
