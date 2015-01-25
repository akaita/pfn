<?php
/*******************************************************************************
* data/include/class_encriptar.php
*
* Permite encriptar y desencriptar cadenas de texto
*******************************************************************************/

defined('OK') or die();

/**
* class PFN_Encriptar
*
* Clase que maneja el sistema de encriptacion de cadenas de texto
*/
class PFN_Encriptar {
	var $clave;

	/**
	* function PFN_Encriptar (void)
	*
	* Inicializa la carga de la clave privada
	*/
	function PFN_Encriptar () {
		global $PFN_conf;

		$this->clave = $PFN_conf->g('clave');
	}

	/**
	* function keyED (string $cad)
	*
	* Genera una clave para la cadena recibida 
	*
	* return string
	*/
	function keyED ($cad) {
		$lonx_clave = strlen($this->clave);
		$lonx_cad = strlen($cad);
		$cnt = 0;
		$resultado = '';

		for ($i=0; $i < $lonx_cad; $i++) {
			$cnt = ($cnt == $lonx_clave)?0:$cnt;
			$resultado .= substr($cad, $i, 1) ^ substr($this->clave, $cnt, 1);
			$cnt++;
		} 

		return $resultado;
	} 

	/**
	* function encripta (string $cad)
	*
	* Encripta una cadena de texto $cad y devuelve el resultado
	*
	* return string
	*/
	function encripta ($cad) {
		if (function_exists('mcrypt_encrypt')) {
			return trim(str_replace('/', '|', base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->clave, $cad, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))));
		}

		srand((double)microtime()*1000000);
		$aleatorio = md5(rand(0,32000));
		$lonx_clave = strlen($this->clave);
		$lonx_cad = strlen($cad);
		$cnt = 0;
		$resultado = '';

		for ($i=0; $i < $lonx_cad; $i++){
			$cnt = ($cnt == $lonx_clave)?0:$cnt;
			$resultado .= substr($aleatorio, $cnt, 1).(substr($cad, $i, 1) ^ substr($aleatorio, $cnt, 1));
			$cnt++;
		} 

		return base64_encode($this->keyED($resultado));
	} 
	
	/**
	* function desencripta (string $cad)
	*
	* Desencripta una cadena de texto $cad y devuelve el resultado
	*
	* return string
	*/
	function desencripta ($cad) {
		if (function_exists('mcrypt_encrypt')) {
			return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->clave, base64_decode(str_replace(array('|', ' '), array('/', '+'), $cad)), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
		}

		$cad = $this->keyED(base64_decode($cad));
		$lonx_cad = strlen($cad);
		$resultado = '';

		for ($i=0; $i < $lonx_cad; $i++){
			$md5 = substr($cad ,$i, 1);
			$i++;
			$resultado .= (substr($cad, $i, 1) ^ $md5);
		}

		return $resultado;
	}
}

$PFN_encriptar = &new PFN_Encriptar();
?>
