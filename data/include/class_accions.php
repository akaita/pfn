<?php
/*******************************************************************************
* data/include/class_accions.php
*
* Realiza las acciones básicas (mover, copiar, eliminar, renombrar, enlazar,
* crear_directorio, upload)
*

PHPfileNavigator versión 2.3.0

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net/

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
términos de la Licencia Pública General de GNU según es publicada por la Free
Software Foundation, bien de la versión 2 de dicha Licencia o bien (según su
elección) de cualquier versión posterior. 

Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA
GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la
CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de
GNU para más detalles. 

Debería haber recibido una copia de la Licencia Pública General junto con este
programa. Si no ha sido así, escriba a la Free Software Foundation, Inc., en
675 Mass Ave, Cambridge, MA 02139, EEUU. 
*******************************************************************************/

defined('OK') or die();

/**
* class PFN_Accions extends Niveles
*
* clase que realiza la mayoría de las acciones con fichero
* o directorios
*/
class PFN_Accions extends PFN_Niveles {
	var $vars;
	var $conf;
	var $clases;
	var $arquivos;
	var $paths;
	var $indexador;
	var $ksi;
	var $estado = array();
	var $firmados = array();
	var $rexistro = true;

	/**
	* function PFN_Accions (object $PFN_conf)
	*
	* recibe el objecto con los parametros de configuración
	*/
	function PFN_Accions (&$PFN_conf) {
		global $PFN_vars, $PFN_clases, $PFN_paths;

		$this->conf = &$PFN_conf;
		$this->vars = &$PFN_vars;
		$this->clases = &$PFN_clases;
		$this->paths = &$PFN_paths;
	}

	/**
	* function arquivos (object $PFN_arquivos)
	*
	* recibe el objeto con las acciones concretas para archivos
	*/
	function arquivos (&$PFN_arquivos) {
		$this->arquivos = &$PFN_arquivos;
	}

	/**
	* function indexador (object $PFN_indexador)
	*
	* recibe el objecto con las acciones concretas para el indexador
	*/
	function indexador (&$PFN_indexador) {
		$this->indexador = &$PFN_indexador;
	}

	/**
	* function ksi (object $PFN_KSI)
	*
	* recibe el objecto con las acciones concretas para seguridad
	*/
	function ksi (&$PFN_KSI) {
		$this->ksi = &$PFN_KSI;
	}

	/**
	* function estado (string $cal)
	*
	* devuelve el estado de la acción pedida
	*
	* return boolean
	*/
	function estado ($cal) {
		return ($this->estado[$cal]==1);
	}

	/**
	* function estado_num (string $cal)
	*
	* devulve el numero de estado de la acción pedida
	*
	* return integer
	*/
	function estado_num ($cal) {
		return $this->estado[$cal];
	}

	/**
	* function rexistro (boolean $modo)
	*
	* Activa o anula el registro de log para las acciones
	*/
	function rexistro ($modo) {
		$this->rexistro = $modo;
	}

	/**
	* function crear_dir (string $donde, string $nome)
	*
	* crea un directorio en $donde con nombre $nome
	*
	* return integer
	*/
	function crear_dir ($donde, $nome) {
		$completo = $this->path_correcto($donde.'/'.$nome);

		// Anula si el nombre está vacio
		if (empty($nome)) {
			return false;
		}

		// Anula si el directorio ya existe
		if ($this->e_dir($completo)) {
			$this->estado['crear_dir'] = 2;
			return 2;
		}

		// Anula si se supera el límite de peso para esta raíz
		if ($this->conf->g('raiz','peso_maximo') > 0
		&& $this->conf->g('raiz','peso_actual') >= $this->conf->g('raiz','peso_maximo')) {
			return 5;
		}

		if (is_writable($donde)) {
			if ($this->filtrar($nome)) {
				$this->estado['crear_dir'] = @mkdir($completo, 0755);

				if ($this->estado['crear_dir']) {
					$this->log_accion('crear_dir', $completo);
				}

				return $this->estado['crear_dir']?1:0;
			// Anula si no se permite ese nombre
			} else {
				$this->estado['crear_dir'] = 4;
				return 4;
			}
		// Anula si el directorio destino no tiene permisos de escritura
		} else {
			$this->estado['crear_dir'] = 3;
			return 3;
		}
	}

	/**
	* function upload (string $nome, string $orixen, string $destino)
	*
	* sube un fichero local ($orixen) con el nombre correcto ($nome)
	* al directorio remoto ($destino)
	*
	* return integer
	*/
	function upload ($nome, $orixen, $destino) {
		// Anula si el directorio destino no tiene permisos de escritura
		if (!is_writable($destino.'/')) {
			$this->estado['subir_arq'] = 4;
			return 4;
		}

		// Anula si no se permite ese nombre
		if (!$this->filtrar($nome)) {
			$this->estado['subir_arq'] = 2;
			return 2;
		}

		// Anula si el fichero ya existe
		if (file_exists($destino.'/'.$nome)) {
			$this->estado['subir_arq'] = 3;
			return 3;
		}

		$this->estado['subir_arq'] = @move_uploaded_file($orixen, $destino.'/'.$nome);

		if ($this->estado['subir_arq']) {
			$this->arquivos->permisos($destino.'/'.$nome, 0644);
			$this->log_accion('subir_arq', $destino.'/'.$nome);
		}

		return $this->estado['subir_arq']?1:0;
	}

	/**
	* function eliminar (string $cal)
	*
	* elimina un directorio o fichero ($cal)
	*
	* return integer
	*/
	function eliminar ($cal) {
		// Anula si no existe lo que se pide para eliminar
		if (!file_exists($cal)) {
			$this->estado['eliminar_dir'] = 4;
			$this->estado['eliminar_arq'] = 4;
			$this->estado['multiple_eliminar'] = 4;
			return 4;
		}

		if ($this->e_dir($cal)) {
			// Si es directorio elimina de forma recursiva
			$this->estado['multiple_eliminar'] = $this->estado['eliminar_dir'] = $this->eliminar_recursivo($cal);

			if ($this->estado['eliminar_dir']) {
				$this->log_accion('eliminar_dir', $cal);
			}

			return $this->estado['eliminar_dir']?1:0;
		} else {
			$this->estado['multiple_eliminar'] = $this->estado['eliminar_arq'] = @unlink($cal);

			if ($this->estado['eliminar_arq']) {
				$this->log_accion('eliminar_arq', $cal);
			}

			return $this->estado['eliminar_arq']?1:0;
		}
	}

	/**
	* function eliminar_recursivo (string $cal)
	*
	* elimina un directorio de forma recursiva
	*
	* return integer
	*/
	function eliminar_recursivo ($cal) {
		$contido = &$this->carga_contido($cal, true, true);

		foreach ($contido['nome'] as $v) {
			if ($this->e_dir("$cal/$v")) {
				$this->eliminar_recursivo("$cal/$v");
			} else {
				@unlink("$cal/$v");
			}
		}

		return @rmdir($cal);
	}

	/**
	* function copiar (string $orixe, string $destino)
	*
	* copia un directorio o archivo $orixe en $destino
	*
	* return integer
	*/
	function copiar ($orixe, $destino) {
		$dir_destino = $this->dir_destino($destino);

		// Anula si no existe el directorio destino
		if (!$this->e_dir($dir_destino)) {
			$this->estado['copiar_dir'] = 4;
			$this->estado['copiar_arq'] = 4;
			$this->estado['multiple_copiar'] = 4;
			return 4;
		}

		// Anula si el directorio destino no tiene permisos de escritura
		if (!is_writable($dir_destino)) {
			$this->estado['copiar_dir'] = 5;
			$this->estado['copiar_arq'] = 5;
			$this->estado['multiple_copiar'] = 5;
			return 5;
		}

		if ($this->e_dir($orixe)) {
			// Anula si ya existe un directorio con el mismo nombre en el destino
			if ($this->e_dir($destino)) {
				$this->estado['copiar_dir'] = 6;
				$this->estado['multiple_copiar'] = 3;
				return 6;
			}

			$this->estado['multiple_copiar'] = $this->estado['copiar_dir'] = $this->copia_recursiva($orixe, $destino);

			if ($this->estado['copiar_dir']) {
				$this->log_accion('copiar_dir', $orixe, $destino);
			}

			return $this->estado['copiar_dir']?1:0;
		} elseif (is_file($orixe)) {
			// Anula si ya existe un archivo con el mismo nombre en el destino
			if (file_exists($destino)) {
				$this->estado['copiar_arq'] = 3;
				$this->estado['multiple_copiar'] = 3;
				return 3;
			}


			$this->estado['multiple_copiar'] = $this->estado['copiar_arq'] = @copy($orixe, $destino);

			if ($this->estado['copiar_arq']) {
				$this->log_accion('copiar_arq', $orixe, $destino);
			}

			return $this->estado['copiar_arq']?1:0;
		}
	}

	/**
	* function copia_recursiva (string $orixe, string $destino)
	*
	* copia un directorio de forma recursiva
	*
	* return integer
	*/
	function copia_recursiva ($orixe, $destino) {
		if (!is_dir($destino)) {
			if (!@mkdir($destino, 0755)) {
				return false;
			}
		}

		// Obtiene el contenido del directorio $orixe
		$contido = &$this->carga_contido($orixe);

		foreach ($contido['nome'] as $v) {
			if ($this->e_dir("$orixe/$v")) {
				$this->copia_recursiva("$orixe/$v", "$destino/$v");
			} else {
				if (!@copy("$orixe/$v", "$destino/$v")) {
					return false;
				}
			}
		}

		return true;
	}

	/**
	* function renomear (string $antes, string $agora)
	*
	* renombra un directorio o archivo $antes en $agora
	*
	* return integer
	*/
	function renomear ($antes, $agora) {
		if ($this->e_dir($antes)) {
			// Anula si ya existe un directorio con ese nombre
			if ($this->e_dir($agora)) {
				$this->estado['renomear'] = 2;
				return 2;
			}
		} else {
			// Anula si ya existe un fichero con ese nombre
			if (file_exists($agora)) {
				$this->estado['renomear'] = 3;
				return 3;
			}
		}

		if (!$this->filtrar(basename($agora))) {
			$this->estado['renomear'] = 4;
			return 4;
		}

		$this->estado['renomear'] = @rename($antes, $agora);

		if ($this->estado['renomear']) {
			$this->log_accion('renomear', $antes, $agora);
		}

		return $this->estado['renomear']?1:0;
	}

	/**
	* function mover (string $orixe, string $destino)
	*
	* mueve un directorio o fichero $orixe para $destino
	*
	* return integer
	*/
	function mover ($orixe, $destino) {
		$dir_destino = $this->dir_destino($destino);

		// Anula si no existe el destino
		if (!$this->e_dir($dir_destino)) {
			$this->estado['mover_dir'] = 4;
			$this->estado['mover_arq'] = 4;
			$this->estado['multiple_mover'] = 4;
			return 4;
		}

		// Anula si el directorio destino no tiene permisos de escritura
		if (!is_writable($dir_destino)) {
			$this->estado['mover_dir'] = 5;
			$this->estado['mover_arq'] = 5;
			$this->estado['multiple_mover'] = 5;
			return 5;
		}

		if ($this->e_dir($orixe)) {
			// Anula si ya existe un directorio con ese nombre en el destino
			if ($this->e_dir($destino)) {
				$this->estado['mover_dir'] = 6;
				$this->estado['multiple_mover'] = 3;
				return 6;
			}

			// Copia el directorio en el destino
			$this->estado['multiple_mover'] = $this->estado['mover_dir'] = $this->copia_recursiva($orixe, $destino);

			if ($this->estado('mover_dir')) {
				// Si fue todo correcto, elimina el origen
				$this->eliminar_recursivo($orixe);
				$this->log_accion('mover_dir', $orixe, $destino);
			}

			return $this->estado['mover_dir'];
		} elseif (is_file($orixe)) {
			// Anula si ya existe un fichero con ese nombre en el destino
			if (is_file($destino)) {
				$this->estado['mover_arq'] = 3;
				$this->estado['multiple_mover'] = 3;
				return 3;
			}

			$this->estado['multiple_mover'] = $this->estado['mover_arq'] = copy($orixe, $destino);

			if ($this->estado('mover_arq')) {
				if (!@unlink($orixe)) {
					$this->estado['mover_arq'] = 6;
					$this->estado['multiple_mover'] = 6;
				}

				$this->log_accion('mover_arq', $orixe, $destino);
			}

			return $this->estado['mover_arq']?1:0;
		}
	}

	/**
	* function enlace (string $orixe, string $destino)
	*
	* OJO, SOLO FUNCIONA EN UNIX/LINUX
	*
	* enlaza un directorio o fichero $orixe para $destino
	*
	* return integer
	*/
	function enlace ($orixe, $destino) {
		$dir_destino = $this->dir_destino($destino);

		// Anula si no existe el destino
		if (!$this->e_dir($dir_destino)) {
			$this->estado['enlazar_dir'] = 2;
			$this->estado['enlazar_arq'] = 4;
			return 4;
		}

		// Anula si el directorio destino no tiene permisos de escritura
		if (!is_writable($dir_destino)) {
			$this->estado['enlazar_dir'] = 3;
			$this->estado['enlazar_arq'] = 5;
			return 5;
		}

		if ($this->e_dir($orixe)) {
			// Anula si ya existe un directorio con ese nombre en el destino
			if ($this->e_dir($destino)) {
				$this->estado['enlazar_dir'] = 4;
				return 6;
			}

			$this->estado['enlazar_dir'] = @link($orixe, $destino);
			return $this->estado['enlazar_dir'];
		} else {
			// Anula si ya existe un fichero con ese nombre en el destino
			if (file_exists($destino)) {
				$this->estado['enlazar_arq'] = 3;
				return 3;
			}

			$this->estado['enlazar_arq'] = @link($orixe, $destino);

			if ($this->estado['enlazar_arq']) {
				$this->log_accion('enlazar_arq', $orixe, $destino);
			}

			return $this->estado['enlazar_arq']?1:0;
		}
	}

	/**
	* function editar (string $cal, string $texto)
	*
	* actualiza el contenido de un fichero de texto $cal con el
	* nuevo contenido $texto
	*
	* return integer
	*/
	function editar ($cal, $texto) {
		if (!$this->filtrar(basename($cal))) {
			$this->estado['editar'] = 4;
			return 4;
		}

		if (!is_file($cal)) {
			$this->estado['editar'] = 3;
			return 3;
		}

		if (!is_writable($cal)) {
			$this->estado['editar'] = 2;
			return 2;
		}

		$texto = PFN_intro_normal($texto);

		$this->estado['editar'] = $this->arquivos->abre_escribe($cal, $texto);

		if ($this->estado['editar']) {
			$this->log_accion('editar', $cal);
		}

		return $this->estado['editar']?1:0;
	}

	/**
	* function subir_url (string $url, string $donde, string $nome)
	*
	* carga una url $url en el directorio actual $donde creando un fichero
	* de nombre $nome
	*
	* return integer
	*/
	function subir_url ($url, $donde, $nome) {
		if (!$this->filtrar($nome)) {
			$this->estado['subir_url'] = 8;
			return 8;
		}

		if (file_exists($donde.'/'.$nome)) {
			$this->estado['subir_url'] = 2;
			return 2;
		}

		if (!is_writable($donde)) {
			$this->estado['subir_url'] = 3;
			return 3;
		}

		set_time_limit(0);

		if ($fp = @fopen($url,'r')) {
			$fp2 = @fopen($donde.'/'.$nome,'w'); 

			if (!$fp2) {
				return 0;
			}

			$mq = get_magic_quotes_runtime();

			set_magic_quotes_runtime(0);

			while(!feof($fp) && (connection_status() == 0)) { 
				fwrite($fp2,fread($fp,1024*512)); 
			}

			set_magic_quotes_runtime($mq);

			fclose($fp); 
			fclose($fp2);

			$this->estado['subir_url'] = 1;
			$this->log_accion('subir_url', $donde.'/'.$nome);

			return $this->estado['subir_url'];
		} else {
			$this->estado['subir_url'] = 0;
			return 0;
		}
	}

	/**
	* function log_accion (string $accion, string $orixe, string $destino)
	*
	* Registra todas las acciones realizadas con los ficheros y directorios
	*/
	function log_accion ($accion, $orixe, $destino='') {
		if (!$this->rexistro || ($this->conf->g('logs','accions') == false)) {
			return true;
		}

		global $PFN_conf, $PFN_rexistros;

		if (!is_object($PFN_rexistros)) {
			include_once ($this->paths['include'].'class_rexistros.php');
		}

		return $PFN_rexistros->alta($accion, $orixe, $destino);
	}

	/**
	* function log_ancho_banda (integer $tamano, boolean $test)
	*
	* Registra todas las descargas para guardar un registro de
	* consumo de ancho de banda. Devuelve si el máximo permitido
	* para el usuario ha sido superado.
	* Si test esta a true, solo devuelve si esta permitido o
	* no acceder a ese fichero, pero no registra su peso
	*
	* return boolean
	*/
	function log_ancho_banda ($tamano, $test=false) {
		$actual = $this->conf->g('info_usuario').'/descargas.'.(date('Ym')).'.php';
		$tamano += $this->conf->g('usuario', 'descargas_actual');

		if ($this->conf->g('usuario', 'descargas_maximo') <= 0) {
			return true;
		} elseif ($tamano > $this->conf->g('usuario', 'descargas_maximo')) {
			return false;
		} elseif ($test) {
			return true;
		}

		if ($this->arquivos->abre_escribe($actual, "<?php return $tamano; ?>")) {
			$this->conf->p($tamano, 'usuario', 'descargas_actual');
		} else {
			return -1;
		}

		return true;
	}

	/**
	* function permisos (string $arquivo, integer $permisos)
	*
	* Asigna permisos a un fichero o directorio
	*/
	function permisos ($arquivo, $permisos) {
		if (!$this->filtrar(basename($arquivo)) || !file_exists($arquivo)) {
			$this->estado['multiple_permisos'] = $this->estado['permisos'] = 2;
			return 2;
		}

		$this->estado['multiple_permisos'] = $this->estado['permisos'] = @chmod($arquivo, octdec('0'.$permisos));

		return $this->estado['permisos']?1:0;
	}

	/**
	* function novo_arq (string $cal, string $destino, string $texto, string $sobreescribir)
	*
	* crea un fichero con el contenido recibido
	*
	* return integer
	*/
	function novo_arq ($cal, $destino, $texto, $sobreescribir) {
		if (empty($cal)) {
			$this->estado['novo_arq'] = 5;
			return 5;
		}

		if (!$this->filtrar($cal)) {
			$this->estado['novo_arq'] = 3;
			return 3;
		}

		if (!is_dir($destino) || !is_writable($destino)) {
			$this->estado['novo_arq'] = 4;
			return 4;
		}

		$arq = $destino.'/'.$cal;

		if (is_file($arq) && empty($sobreescribir)) {
			$this->estado['novo_arq'] = 2;
			return 2;
		}

		$texto = PFN_intro_normal($texto);

		$this->estado['novo_arq'] = $this->arquivos->abre_escribe($arq, $texto);

		if ($this->estado['novo_arq']) {
			$this->arquivos->permisos($arq, 0644);
			$this->log_accion('novo_arq', $arq);
		}

		return $this->estado['novo_arq']?1:0;
	}

	/**
	* function get_firmados (void)
	*
	* Devuelve el listado de ficheros firmados
	*
	* return array
	*/
	function get_firmados () {
		return $this->firmados;
	}

	/**
	* function firmar (string $dir, string $path, array $datos)
	*
	* Inicializa el proceso de firma de documentos
	*
	* return string
	*/
	function firmar ($dir, $path, $datos) {
		$this->firmados = array();

		$log = $this->firma_recursiva($dir, $path, $datos);

		return $log;
	}
	/**
	* function firma_recursiva (string $dir, string $path, array $datos)
	*
	* Realiza la firma de documentos de manera recursiva
	*
	* return string
	*/
	function firma_recursiva ($dir, $path, $datos) {
		if (!is_dir($path)) {
			return 0;
		} else if (!is_writable($path)) {
			$log .= '<br />[ERROR] '.$dir.': '.$this->conf->t('estado.firmar_lotes', 6).'<br /><br />';

			return $log;
		}

		if (!preg_match('#/$#', $path)) {
			$path .= '/';
		}

		$contido = &$this->carga_contido($path);

		foreach ($contido['nome'] as $v) {
			$arquivo = $path.$v;

			if ($this->e_dir($arquivo)) {
				$log .= $this->firma_recursiva($dir.'/'.$v, $arquivo, $datos);
			} else if (!$datos['firmar'] || (($datos['repetir'] == false) && preg_match('/\.firm/i', $arquivo))) {
				$this->firmados[] = $arquivo;

				continue;
			} else {
				$erro = 0;

				if (($datos['pdf'] == 1) && preg_match('/\.pdf$/i', $v)) {
					if (is_writable($arquivo)) {
						$pdf = true;

						$resultado = $this->ksi->Interfaz_ESecureDLL(array(
							'accion' => 0,
							'pdf' => $arquivo,
							'cer' => $datos['cer'],
							'cpw' => $datos['cpw'],
							'aut' => '',
							'raz' => '',
							'con' => '',
							'dir' => '',
							'ppw' => '',
							'cif' => 0,
							'ctf' => 0
						));
					} else {
						$erro = 1;
					}
				} else {
					$pdf = false;

					$resultado = $this->ksi->Interfaz_ESecureDLL(array(
						'accion' => '7',
						'inf' => $arquivo,
						'out' => ($arquivo.'.firm'),
						'ind' => '',
						'cer' => $datos['cer'],
						'cpw' => $datos['cpw'],
						'sep' => ''
					));
				}

				if ($erro === 1) {
					$log .= '<br />[ERROR] '.$arquivo.': '.$this->conf->t('estado.firmar_lotes', 7).'<br /><br />';
					continue;
				}

				if ($resultado === 0) {
					$log .= '[OK] '.$arquivo.'<br />';

					if ($pdf) {
						if ($datos['manter']) {
							$despois = $arquivo;
						} else {
							$despois = preg_replace('/\.pdf$/i', '.firm.pdf', $arquivo);

							rename($arquivo, $despois);
						}

						$this->log_accion('firmar', $arquivo, $despois);

						$this->firmados[] = $despois;

						if (is_object($this->indexador) && !$datos['manter']) {
							$this->indexador->renomear($dir.'/', $v, preg_replace('/\.pdf$/i', '.firm.pdf', $v));
						}
					} else {
						$this->log_accion('firmar', $arquivo, $arquivo.'.firm');

						$this->firmados[] = $arquivo.'.firm';

						if (is_object($this->indexador)) {
							$this->indexador->alta_modificacion($dir.'/', $v, $v.'.firm', '');
						}
					}
				} else {
					$log .= '<br />[ERROR] '.$this->conf->t('estado.firmar_lotes', 5).' [Error: '.$resultado.']<br /><br />';
				}
			}
		}

		return $log;
	}
}
?>
