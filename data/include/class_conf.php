<?php
/****************************************************************************
* data/include/class_conf.php
*
* Procesa y devuelve los datos de los ficheros de configuraci�n (data/conf/)
*******************************************************************************/

defined('OK') or die();

include_once ($PFN_conf->paths['include'].'class_gettext.php');

/**
* class PFN_Conf
*
* clase que carga y devuelve los parametros de configuraci�n
* de conf/default.conf y carga los fichero auxiliares de idiomas
*/
class PFN_Conf {
	var $var = array();
	var $paths = array();
	var $txt = array();

	/**
	* function PFN_Conf (void)
	*
	* carga el email por defecto para contacto, y poder ser usardo en 
	* data/include/usuarios.php
	*/
	function PFN_Conf () {
		global $PFN_paths, $PFN_gettext;

		$this->paths = &$PFN_paths;
		$this->gettext = &$PFN_gettext;

		if (is_file($this->paths['conf'].'basicas.inc.php')) {
			$this->var = include_once ($this->paths['conf'].'basicas.inc.php');
		}
	}

	/**
	* function inicial (string $cal)
	*
	* Carga el fichero de configuraci�n por defecto
	*/

	function inicial ($cal='') {
		$cal = empty($cal)?$this->g('raiz','conf'):$cal;

		if (is_file($this->paths['conf'].$cal.'.inc.php')) {
			$mais = include_once ($this->paths['conf'].$cal.'.inc.php');
			$this->var = array_merge((array)$this->var, (array)$mais);
		}
	}

	/**
	* function carga (void)
	*
	* realiza la precarga del fichero de configuraci�n
	* y del fichero de idioma b�sico
	*/
	function carga () {
		$this->inicial();
		$this->textos('base');
		$this->textos('custom');
	}

	/**
	* function textos (string $texto)
	*
	* carga los textos del idioma
	*/
	function textos ($texto) {
		$arq = $this->paths['idiomas'].$this->g('idioma').'/'.$texto.'.mo';

		if (!is_file($arq)) {
			return false;
		}

		$this->gettext->load($arq);
	}

	/**
	* function p (string $v, string $p1, string $p2)
	* $v: valor que asignamos
	* $p1: indice 1 del array
	* $p2: indice 2 del array
	*
	* coloca un valor en el array de los valores de configuracion
	*/
	function p ($v, $p1, $p2='') {
		if (strlen($p2)) {
			$this->var[$p1][$p2] = $v;
		} else {
			$this->var[$p1] = $v;
		}
	}

	/**
	* function g (string $g1, string $g2)
	* $g1: indice 1 del array
	* $g2: indice 2 del array
	*
	* obtiene un valor del array con los valores de configuracion
	*
	* return string;
	*/
	function g ($g1, $g2='') {
		if (strlen($g2)) {
			return $this->var[$g1][$g2];
		} else {
			return $this->var[$g1];
		}
	}

	/**
	* function t (mixed $t1, mixed $t2)
	* $t1: indice 1 del array
	* $t2: indice 2 del array
	*
	* obtiene un texto relacionado con el indice $t1 y $t2
	*
	* return string
	*/
	function t ($t1, $t2 = null) {
		if (is_array($t1)) {
			$text = implode('_', $t1);
		} else if ($t2) {
			$text = $t1.'_'.$t2;
		} else {
			$text = $t1;
		}

		$text = $this->gettext->translate($text);

		if (is_null($t2) || is_string($t1)) {
			return $text;
		}

		return vsprintf($text, $t2);
	}
}

$PFN_conf = new PFN_Conf();
?>
