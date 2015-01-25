<?php
/****************************************************************************
* data/include/class_ftp.php
*
* Permite lanzar conexiones FTP
*******************************************************************************/

defined('OK') or die();

/**
* class PFN_FTP
*
* Permite abrir y realizar operacions en una conexion FTP
*/
class PFN_FTP {
	var $con;
	var $servidor;
	var $usuario;
	var $contrasinal;
	var $porto = 21;
	var $pasv = true;
	var $timeout = 10; // 10 segundos de timeout para cada peticion

	/**
	* function open (string $servidor, string $usuario, string $contrasinal)
	*
	* Abre unha conexion a un servidor FTP
	*
	* return boolean
	*/
	function open ($servidor, $usuario, $contrasinal) {
		$this->servidor = $servidor;
		$this->usuario = $usuario;
		$this->contrasinal = $contrasinal;

		return $this->connect();
	}

	/**
	* function connect (void)
	*
	* Realiza a conexion
	*
	* return boolean
	*/
	function connect () {
		$this->con = ftp_connect($this->servidor, $this->porto);

		if ($this->con) {
			$ok = ftp_login($this->con, $this->usuario, $this->contrasinal);

			ftp_pasv($this->con, $this->pasv);

			return $ok;
		} else {
			return false;
		}
	}

	/**
	* function close (void)
	*
	* pecha unha conexion aberta
	*/
	function close () {
		if ($this->con) {
			ftp_close($this->con);
		}
	}

	/**
	* function dir (string $dir)
	*
	* posicionase en un directorio
	*
	* return boolean
	*/
	function dir ($dir) {
		return ftp_chdir($dir);
	}

	/**
	* function content (string $dir)
	*
	* Devolve o contido de un directorio como array
	* asociativo
	*
	* return array
	*/
	function content ($dir) {
		$datos = array();
		$contido = ftp_rawlist($this->con, $dir);

		if (is_array($contido)) {
			$i = 0;

			foreach ($contido as $cada) {
				$este = preg_split('/[\s]+/', $cada, 9);

				$datos[$i]['perms'] = $este[0];
				$datos[$i]['number'] = $este[1];
				$datos[$i]['owner'] = $este[2];
				$datos[$i]['group'] = $este[3];
				$datos[$i]['size'] = $este[4];
				$datos[$i]['month'] = $este[5];
				$datos[$i]['day'] = $este[6];
				$datos[$i]['time'] = $este[7];
				$datos[$i]['name'] = str_replace('//', '', $este[8]);

				$i++;
			}
		}

		return $datos;
	}

	/**
	* function read (string $cal)
	*
	* Lee o contido de un arquivo no servidor FTP
	* e devolve o resultado
	*
	* return string
	*/
	function read ($cal, $mode = FTP_ASCII) {
		global $Web_paths;

		$cnt = 0;
		$contido = '';
		$arq = tempnam($Web_paths['tmp'], 'FTP_');

		chmod($arq, 0666);

		while (($contido == '') && ($cnt < 3)) {
			if (ftp_get($this->con, $arq, $cal, $mode)) {
				$contido = file_get_contents($arq);
			}

			if ($contido == '') {
				sleep(2);

				$cnt++;

				echo '<li>'.$cnt.' erros na descarga da nova</li>';

				$this->close();
				$this->connect();
			}
		}

		if (is_file($arq)) {
			unlink($arq);
		}

		return $contido;
	}

	/**
	* function get (string $orixe, string $destino, string $modo = FTP_BINARY)
	*
	* Obtiene un fichero de una conexion FTP abierta
	*
	* return boolean
	*/
	function get ($orixe, $destino, $modo = FTP_BINARY) {
		return ftp_get($this->con, $destino, $orixe, $modo);
	}

	/**
	* function delete (string $cal)
	*
	* Elimina un arquivo do servidor de FTP
	*/
	function delete ($cal) {
		return ftp_delete($this->con, $cal);
	}
}

$PFN_ftp = new PFN_FTP;
?>
