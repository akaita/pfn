<?php
/*******************************************************************************
* data/include/class_rexistros.php
*
* Realiza el control de los registros
*******************************************************************************/

defined('OK') or die();

/**
* class PFN_Rexistros extends Clases
*
* clase de control de registros
*/
class PFN_Rexistros extends PFN_Clases {
	var $vars;
	var $conf;
	var $tablas;
	var $FILE = __FILE__;
	var $correxir = array(true,true,true);

	/**
	* function PFN_Rexistros (void)
	*
	* carga el objecto $PFN_vars para obtener variables externas
	* y carga el nombre de las tablas
	*/
	function PFN_Rexistros (&$PFN_conf) {
		global $PFN_vars;

		$this->conf = &$PFN_conf;
		$this->vars = &$PFN_vars;

		$this->tablas['rexistros'] = $PFN_conf->g('db','prefixo').'rexistros';
		$this->tablas['raices'] = $PFN_conf->g('db','prefixo').'raices';
	}

	/**
	* function vars (object &$PFN_vars)
	*
	* Carga el objeto manejador de variables
	*/
	function vars (&$PFN_vars) {
		$this->vars = &$PFN_vars;
	}

	/**
	* function init (string $modo, string $args = array())
	*
	* genera y ejecuta las consulta para la comprobación de rexistros
	*
	* return integer
	*/
	function init ($modo, $args = array()) {
		switch ($modo) {
			case 'listado':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT '.$this->tablas['rexistros'].'.*'
					.', '.$this->tablas['raices'].'.nome'
					.', FROM_UNIXTIME(data) as data'
					.' FROM '.$this->tablas['rexistros']
					.', '.$this->tablas['raices']
					.' WHERE accion IN ("'.implode('","', $args['accions']).'")'
					.(($args['id_raiz'] > 0)?(' AND id_raiz = "'.intval($args['id_raiz']).'"'):'')
					.(($args['id_usuario'] > 0)?(' AND id_usuario = "'.intval($args['id_usuario']).'"'):'')
					.(($args['data_inicio'] > 0)?(' AND data >= "'.intval($args['data_inicio']).'"'):'')
					.(($args['data_fin'] > 0)?(' AND data <= "'.intval($args['data_fin']).'"'):'')
					.' AND '.$this->tablas['raices'].'.id = '.$this->tablas['rexistros'].'.id_raiz'
					.' ORDER BY id DESC'
					.' LIMIT 0, '.intval($args['lineas']).';';
				break;
			default:
				die($modo.': Modo no v&aacute;lido en ('.__FUNCTION__.') '.__CLASS__);
				break;
		}

		$this->lock($this->tablas, 'READ');
		$this->serializa();
		$this->unlock();

		return $this->filas();
	}

	/**
	* function alta (string $accion, string $orixe, string $destino = '')
	*
	* guarda registro de cada una de las acciones realizadas por los usuarios
	* con ficheros o directorios
	*
	* return boolean
	*/
	function alta ($accion, $orixe, $destino = '') {
		if ($this->conf->g('logs','accions') == false) {
			return true;
		}

		$raiz = $this->conf->g('raiz','path');
		$orixe = addslashes(trim(strstr($orixe, $raiz)?substr($orixe, strlen($raiz)):$orixe));
		$destino = addslashes(trim(strstr($destino, $raiz)?substr($destino, strlen($raiz)):$destino));

		$sUsuario = $this->vars->session(array('sPFN','usuario'));

		$this->LINE = __LINE__+1;
		$this->query = 'INSERT INTO '.$this->tablas['rexistros']
			.' SET id_raiz = "'.intval($this->conf->g('raiz','id')).'"'
			.', id_usuario = "'.intval($sUsuario['id']).'"'
			.', usuario = "'.addslashes(trim($sUsuario['usuario'])).'"'
			.', accion = "'.addslashes(trim($accion)).'"'
			.', orixe = "'.$orixe.'"'
			.', destino = "'.$destino.'"'
			.', data = UNIX_TIMESTAMP()'
			.', ip = "'.$this->vars->ip().'";';

		$this->lock($this->tablas['rexistros']);
		$ok = $this->actualizar($this->query);
		$this->unlock();

		return $ok;
	}
}

$PFN_rexistros = new PFN_Rexistros($PFN_conf);
?>
