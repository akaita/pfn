<?php
/*******************************************************************************
* data/include/funcions.php
*
* Funciones para diversos tratamientos de datos y texto
*

PHPfileNavigator versión 2.3.2

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
* function PFN_query_array (void)
*
* devuelve la cadena de QUERY_STRING convertida
* en un array multidimensional
*
* return array
*/
function PFN_query_array () {
	global $PFN_vars;
	parse_str($PFN_vars->server('QUERY_STRING'),$a);
	return $a;
}

/**
* function PFN_query_str (array $params, string $sep)
*
* recibe un array multidimensional y lo transforma en
* una cadena para pasar como QUERY_STRING, con los elementos
* separados por $sep
*
* return string
*/
function PFN_query_str ($params, $sep="&amp;") {
	 foreach ($params as $key => $value) {
		$str .= (strlen($str) < 1) ? '' : $sep;
		$str .= $key.'='.rawurlencode($value);
	}

	return $str;
}

/**
* function PFN_get_url (boolean $php, boolean header)
*
* devuelve la url actual.
* si el parámetro $php es true, la cadena incluye
* al principio el valor de PHP_SELF
* para llamadas desde la funcion Header('Location: ...'); se debe
* pasar a true el parametro $header
*
* return string
*/
function PFN_get_url ($php=true, $header=false) {
	global $PFN_vars;
	$cad = $php?($PFN_vars->server('PHP_SELF').'?'):'';
	$q = PFN_query_array();
	return $cad.PFN_query_str($q,$header?'&':'&amp;');
}

/**
* function PFN_cambia_url (mixed $orixen, mixed $destino, boolean $php, boolean header)
*
* realiza un cambio en alguna de las variables pasadas por
* QUERY_STRING, en caso de no existir la variable a cambiar,
* la crea.
* el cambio no será permanente ya que la próxima vez que se pida
* el mismo campo, devolve su valor inicial.
* el cambio puede ser multiple si los valores de $orixen y $destino
* son un array
* si el parámetro $php es true, la cadena incluye
* al principio el valor de PHP_SELF
* para llamadas desde la funcion Header('Location: ...'); se debe
* pasar a true el parametro $header
*
* return string
*/
function PFN_cambia_url ($orixen, $destino, $php=true, $header=false) {
	global $PFN_vars;
	$cad = $php?($PFN_vars->server('PHP_SELF').'?'):'';
	$url = PFN_query_array();

	if (is_array($orixen)) {
		foreach ($orixen as $k => $v) {
			if (empty($destino[$k])) {
				unset($url[$v]);
			} else {
				$url[$v] = $destino[$k];
			} 
		}
	} else {
		if (empty($destino)) {
			unset($url[$orixen]);
		} else {
			$url[$orixen] = $destino;
		} 
	}

	return $cad.PFN_query_str($url,$header?'&':'&amp;');
}

/**
* function PFN_cambia_outra_url (string $url, mixed $orixen, mixed $destino, boolean $header=false)
*
* realiza un cambio en una URL distinta a la actual
*
* return string
*/
function PFN_cambia_outra_url ($url, $orixen, $destino, $header=false) {
	$q = array();
	list($php, $query) = explode('?', $url);
	strlen($query)?parse_str($query, $q):'';

	if (is_array($orixen)) {
		foreach ($orixen as $k => $v) {
			if (empty($destino[$k])) {
				unset($q[$v]);
			} else {
				$q[$v] = $destino[$k];
			}
		}
	} else {
		if (empty($destino)) {
			unset($q[$orixen]);
		} else {
			$q[$orixen] = $destino;
		} 
	}

	$acum = '';
	$partes = explode('/', $php);

	if (preg_match('/^[a-z]{3,5}:$/i', $partes[0], $http)) {
		$http = $http[0].'/';
		array_shift($partes);
	} else {
		$http = '';
	}

	foreach ($partes as $v) {
		if (!empty($v) && $v != '.') {
			$acum .= '/'.rawurlencode($v);
		}
	}

	$q = PFN_query_str($q, ($header?'&':'&amp;'));

	return $http.$acum.(empty($q)?'':('?'.$q));
}

/**
* function PFN_quita_url (mixed $orixen, boolean $php, boolean header)
*
* elimina una variable y su valor de QUERY_STRING,
* que no será permanente ya que la próxima vez que se pida
* el mismo valor, existirá.
* si el $orixen es un array, eliminará todos los elementos
* incluidos en el mismo.
* si el parámetro $php es true, la cadena incluye
* al principio el valor de PHP_SELF
* para llamadas desde la funcion Header('Location: ...'); se debe
* pasar a true el parametro $header
*
* return string
*/
function PFN_quita_url ($orixen, $php=true, $header=false) {
	global $PFN_vars;

	$cad = $php?($PFN_vars->server('PHP_SELF').'?'):'';
	$url = PFN_query_array();

	if (is_array($orixen)) {
		foreach ($orixen as $k => $v) {
			unset($url[$v]);
		}
	} else {
		unset($url[$orixen]);
	}

	return $cad.PFN_query_str($url, $header?'&':'&amp;');
}

/**
* function PFN_quita_url_SERVER (mixed $orixen, boolean $php)
*
* elimina una variable y su valor de QUERY_STRING permanentemente.
* si el $orixen es un array, eliminará todos los elementos
* incluidos en el mismo.
* si el parametro $php es true, la cadena incluye
* al principio el valor de PHP_SELF
*
* return string
*/
function PFN_quita_url_SERVER ($orixen, $php=true) {
	global $PFN_vars;
	$cad = $php?($PFN_vars->server('PHP_SELF').'?'):'';
	$url = PFN_query_array();

	if (is_array($orixen)) {
		foreach ($orixen as $k => $v) {
			unset($url[$v]);
		}
	} else {
		unset($url[$orixen]);
	}

	$PFN_vars->server('QUERY_STRING',PFN_query_str($url,'&'));
	return $cad.$PFN_vars->server('QUERY_STRING');
}

/**
* function PFN_get_valor_url (string $cal)
*
* devuelve el valor de la variable $cal
* almacenada en QUERY_STRING
*
* return string
*/
function PFN_get_valor_url ($cal) {
	$q = PFN_query_array();
	return $q[$cal];
}

/**
* function PFN_peso (integer $peso)
*
* formatea el tamaño de un fichero que recibe
* en bytes, para devolverlo en formato legible
*
* return string
*/
function PFN_peso ($peso) {
	if($peso == 0) return '0 B';
	else if ($peso <= 1024) return $peso.' B';
	else if ($peso <= (1024*1024)) return sprintf('%d KB',(int)($peso/1024));
	else if ($peso <= (1024*1024*1024)) return sprintf('%.2f MB',($peso/(1024*1024)));
	else return sprintf('%.2f Gb',($peso/(1024*1024*1024)));
}

/**
* function PFN_permisos (integer $perms)
*
* Formatea los permisos de un fichero o directorio
* para visualizalos en formato legible
*
* return string
*/
function PFN_permisos ($perms) {
	global $PFN_conf;

	if ($PFN_conf->g('permisos_num')) {
		return substr(sprintf('%o', $perms), -3);
	}

	if (($perms & 0xC000) == 0xC000) {
		 $info = 's'; // Socket
	} elseif (($perms & 0xA000) == 0xA000) {
		 $info = 'l'; // Symbolic Link
	} elseif (($perms & 0x8000) == 0x8000) {
		 $info = '-'; // Regular
	} elseif (($perms & 0x6000) == 0x6000) {
		 $info = 'b'; // Block special
	} elseif (($perms & 0x4000) == 0x4000) {
		 $info = 'd'; // Directory
	} elseif (($perms & 0x2000) == 0x2000) {
		 $info = 'c'; // Character special
	} elseif (($perms & 0x1000) == 0x1000) {
		 $info = 'p'; // FIFO pipe
	}

	// Owner
	$info .= (($perms & 0x0100) ? 'r' : '-');
	$info .= (($perms & 0x0080) ? 'w' : '-');
	$info .= (($perms & 0x0040) ?
		(($perms & 0x0800) ? 's' : 'x' ) :
		(($perms & 0x0800) ? 'S' : '-'));
	
	// Group
	$info .= (($perms & 0x0020) ? 'r' : '-');
	$info .= (($perms & 0x0010) ? 'w' : '-');
	$info .= (($perms & 0x0008) ?
		(($perms & 0x0400) ? 's' : 'x' ) :
		(($perms & 0x0400) ? 'S' : '-'));
	
	// World
	$info .= (($perms & 0x0004) ? 'r' : '-');
	$info .= (($perms & 0x0002) ? 'w' : '-');
	$info .= (($perms & 0x0001) ?
		(($perms & 0x0200) ? 't' : 'x' ) :
		(($perms & 0x0200) ? 'T' : '-'));
	
	return $info;
}

/**
* function PFN_check_nome (string $nome)
*
* formatea el nombre de un fichero o directorio
* antes de realizar un upload o de crear un directorio
*
* return string
*/
function PFN_check_nome ($nome) {
	global $PFN_conf;

	if ($PFN_conf->g('nome_riguroso')) {
		$busca = array (
			'á','é','í','ó','ú','à','è','ì','ò','ù',
			'â','ê','î','ô','û','ä','ë','ï','ö','ü',
			'Á','É','Í','Ó','Ú','À','È','Ì','Ò','Ù',
			'Â','Ê','Î','Ô','Û','Ä','Ë','Ï','Ö','Ü',
			'ñ','Ñ','ç','Ç');
		$cambia = array (
			'a','e','i','o','u','a','e','i','o','u',
			'a','e','i','o','u','a','e','i','o','u',
			'A','E','I','O','U','A','E','I','O','U',
			'A','E','I','O','U','A','E','I','O','U',
			'n','N','c','C');

		$nome = str_replace($busca, $cambia, trim($nome));
		$nome = preg_replace('/[^\w_\.-]/', '_', $nome);

		return preg_replace('/_+/', '_', $nome);
	} else {
		$busca = array ('?','/','\\',':','*','|','<','>','"');
		$cambia = array ('_','_','_','_','_','_','_','_','_');

		return preg_replace('/_+/', '_', str_replace($busca, $cambia, trim($nome)));
	}
}

/**
* function PFN_cambia_intros (string $cadena)
*
* cambia los intros de un texto por <br /> para guardarlo
* como información adicional
*
* return string
*/
function PFN_cambia_intros ($cadena) {
	return preg_replace("/(\r\n|\n|\r)/",'<br />', $cadena);
}

/**
* function PFN_intro_normal (string $cadena)
*
* cambia los saltos de variados por saltos con solo \n
*
* return string
*/
function PFN_intro_normal ($cadena) {
	return preg_replace("/(\r\n|\r)/","\n", $cadena);
}

/**
* function PFN_iniEtiquetas (string $d)
*
* cambia los < > de las etiquetas html por [[ ]] para evitar
* problemas con htmlentities en la conversión
*
* return string
*/
function PFN_iniEtiquetas ($d) {
	return @preg_replace('/\<(.*)[^>]\>/sU','[[\\1]]',$d);
}

/**
* function PFN_finEtiquetas (string $d)
*
* cambia los [[ ]] despues de procesar un texto html
* por los correctos < >
*
* return string
*/
function PFN_finEtiquetas ($d) {
	@preg_match_all('/\[\[(.*)[^\]\]]\]\]/U',$d,$lista);

	for($i=0; $i < count($lista[1]); $i++) {
		$v = $lista[1][$i];
		$v2 = preg_quote ($lista[0][$i]);
		$tmp = '<'.preg_replace('/&quot;/', '"', $v).'>';
		$d = preg_replace('|'.$v2.'|', $tmp, $d);
	}

	return $d;
}

/**
* function PFN_textoForm2interno (string $d)
*
* formatea un texto de un formulario para
* guardarlo como interno
*
* return string
*/
function PFN_textoForm2interno ($d) {
	$d = preg_replace('/[\\\]+/','\\',trim($d));
	$d = preg_replace('/[\\\]$/','',$d);
	$d = str_replace("\\'","'",$d);
	$d = str_replace("'","\\'",$d);
	return PFN_cambia_intros($d);
}

/**
* function PFN_textoInterno2Form (string $d)
*
* formatea un texto interno para colocarlo
* en un formulario
*
* return string
*/
function PFN_textoInterno2Form ($d) {
	global $PFN_conf;

	$d = preg_replace('/(<br>|<br \/>)/i', "\n", $d);
	return htmlentities($d, ENT_COMPAT, $PFN_conf->g('charset'));
}

/**
* function PFN_quitaHtmlentities (string $d)
*
* Convierte un texto con entidades HTML a normal
*
* return string
*/
function PFN_quitaHtmlentities ($d) {
	$trans = get_html_translation_table(HTML_ENTITIES);
	$trans = array_flip($trans);
	$d = strtr($d, $trans);
	return preg_replace('/(<br>|<br \/>)/i',"\n", trim($d));
}

/**
* function PFN_textoArquivo2pantalla (string $d, boolean $php)
*
* formatea el contenido de un fichero para
* mostrarlo legible por pantalla, coloreado si es un fichero php
*
* return string
*/
function PFN_textoArquivo2pantalla ($d, $php=false) {
	$ini = '<span class="numera">';
	$fin = '&nbsp;</span>';
	$i = 1;

	if ($php) {
		ob_start();
		@highlight_string($d);
		$d = ob_get_contents();
		ob_end_clean();

		$d = split('(<br \/>|<br>)', $d);
		$d[0] = str_replace('<code>', '', $d[0]);
		$texto = '<code>';
		$total = strlen(count($d));

		foreach ($d as $v) {
			$d = str_replace('font color="','span style="color: ', $d);
			$d = str_replace('font"','span', $d);

			$texto .= $ini.str_repeat('&nbsp;', $total-strlen($i)).$i.':'.$fin.str_replace("\n", '', $v)."\n";
			$i++;
		}

		return $texto;
	} else {
		global $PFN_conf;

		$d = htmlentities($d, ENT_NOQUOTES, $PFN_conf->g('charset'));
		$d = split("(\r\n|\n|\r)", $d);
		$texto = '';
		$total = strlen(count($d));

		foreach ($d as $v) {
			$texto .= $ini.str_repeat('&nbsp;', $total-strlen($i)).$i.':'.$fin.str_replace("\n", '', $v)."\n";
			$i++;
		}

		return $texto;
	}
}

/**
* function PFN_listado_select (integer $total, integer $actual)
* $total: numero de elementos en un directorio
* $actual: posición actual en la paginación de un directorio
*
* crea un select para la paginación de los elementos contenidos en
* un directorio
*
* return string
*/
function PFN_listado_select ($total, $actual) {
	global $PFN_conf;

	$paxinar = $PFN_conf->g('paxinar');
	$cad = '<select id="lista"'
		.' onchange="enlace(\''.PFN_quita_url('lista').'&amp;lista=\'+this.value);"'
		.(($total > $paxinar)?' style="background: #D00; color: #FFF;"':'').'>';

	if ($total == 0) {
		$cad .= '<option value=""> --- </option>';
	} else {
		for ($i = 0; $i < $total; $i += $paxinar) {
			$select = ($i == $actual)?'selected="selected"':'';
			$fin = (($i + $paxinar) >= $total)?$total:($i + $paxinar);
			$cad .= "\n".'<option value="'.$i.'" '.$select.'>'.($i + 1).' - '.$fin.'</option>';
		}

		if ($total > $paxinar) {
			$select = ($actual == -1)?'selected="selected"':'';
			$cad .= "\n".'<option value="-1" '.$select.'>'.$PFN_conf->t('TODO').'</option>';
		}
	}

	return $cad."\n</select>";
}

/**
* function PFN_espacio_disco (string $arq, boolean $real)
*
* Devuelve el peso real de un fichero en disco, teniendo en cuenta que el tamaño
* mínimo de bloque son 4 kb, si $real es true devolvera el valor de filesize
*
* return integer
*/
function PFN_espacio_disco ($arq, $real=false) {
	global $PFN_conf;

	if (is_int($arq)) {
		$s = $arq;
	} else {
		$s = @filesize($arq);
	}

	if ($PFN_conf->g('peso_real') || $real) {
		return $s;
	}

	if ($s < 1) {
		return 0;
	} elseif ($s < 4096) {
		return 4096;
	}

	$r = ($s/4096);

	if (is_integer($r)) {
		return $s;
	} else {
		return ((intval($r)+1)*4096);
	}
}

/**
* function PFN_stripslashes (mixed $txt)
*
* Devuleve una cadena formateada sin las barras invertidas
* según la configuración del servidor
*
* return mixed
*/
function PFN_stripslashes ($txt) {
	if (get_magic_quotes_gpc()) {
		return (is_array($txt) ? array_map('PFN_stripslashes', $txt) : stripslashes($txt));
	} else {
		return $txt;
	}
}

/**
* function PFN_check_correo (string $correo)
*
* Comprueba si una direccion de correo es valida
*
* return boolean
*/
function PFN_check_correo ($correo) {
	$regex = '/^[A-z0-9][\w.-]*@[A-z0-9][\w\-\.]+\.[A-z0-9]{2,6}$/';
	return preg_match($regex, $correo);
}

/**
* function PFN_crea_path_extra (string $cal)
*
* Crea el directorio para poder guardar ficheros de información adicional
* o las previsualizacion de las imágenes
*
* return boolean
*/
function PFN_crea_path_extra ($cal) {
	$path = is_dir($cal)?PFN_get_path_extra($cal):dirname(PFN_get_path_extra($cal));
	PFN_crea_directorio_recursivo($path);
}

/**
* function PFN_get_path_extra (string $cal)
*
* Devuelve el path en el que situa el directorio extra para un
* fichero o directorio
*
* return string
*/
function PFN_get_path_extra ($cal) {
	global $PFN_paths;

	if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
		return str_replace(array('//','/./'), array('/','/'), $PFN_paths['extra'].preg_replace('/^[^:]*:/', '', $cal));
	} else {
		return str_replace(array('//','/./'), array('/','/'), $PFN_paths['extra'].$cal);
	}
}

/**
* function PFN_crea_dir_recursivo ($dir)
*
* Crea un directorio recursivamente
*
* return boolean
*/
function PFN_crea_directorio_recursivo ($dir) {
	$mode = 0755;

	if (is_dir($dir) || @mkdir($dir, $mode)) {
		return true;
	}

	if (!PFN_crea_directorio_recursivo(dirname($dir))) {
		return false;
	}

	return @mkdir($dir, $mode);
}

/**
* function PFN_array_key_exists (string $clave, array $array)
*
* Busca un indice en un array de manera recursiva
*
* return boolean
*/
function PFN_array_key_exists ($clave, $array) {
	if (isset($array[$clave])) {
		return $array[$clave];
	}

	foreach ($array as $k => $v) {
		if (is_array($v) || is_object($v)) {
			if ($existe = PFN_array_key_exists($clave, $v)) {
				return $existe;
			}
    } else if ($k == $clave) {
			return $v;
		}
	}

	return false;
}

/**
* xml2array() will convert the given XML text to an array in the XML structure.
* Link: http://www.bin-co.com/php/scripts/xml2array/
* Arguments :
*   $contents - The XML text
*   $get_attributes - 1 or 0. If this is 1 the function will get the attributes
*                     as well as the tag values - this results in a different
*                     array structure in the return value.
*   $priority - Can be 'tag' or 'attribute'. This will change the way the resulting
*               array sturcture. For 'tag', the tags are given more importance.
*
* Return: The parsed XML in an array form. Use print_r() to see the resulting array structure.
*
* Examples:
*   $array =  xml2array(file_get_contents('feed.xml'));
*   $array =  xml2array(file_get_contents('feed.xml', 1, 'attribute'));
*/
function xml2array ($contents, $get_attributes = 1, $priority = 'tag') {
	if (!$contents) {
		return array();
	}

	if (!function_exists('xml_parser_create')) {
		return 1;
	}

	//Get the XML parser of PHP - PHP must have this module for the parser to work
	$parser = xml_parser_create('');

	# http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss
	xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, 'UTF-8');
	xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
	xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
	xml_parse_into_struct($parser, trim($contents), $xml_values);
	xml_parser_free($parser);

	if (!$xml_values) {
		return 2;
	}

	//Initializations
	$xml_array = $parents = $opened_tags = $arr = array();
	$current = &$xml_array; //Refference

	//Go through the tags.
	//Multiple tags with same name will be turned into an array
	$repeated_tag_index = array();

	foreach ($xml_values as $data) {
		//Remove existing values, or there will be trouble
		unset($attributes, $value);

		//This command will extract these variables into the foreach scope
		// tag(string), type(string), level(int), attributes(array).
		//We could use the array by itself, but this cooler.
		extract($data);

		$result = $attributes_data = array();

		if (isset($value)) {
			if ($priority == 'tag') {
				$result = $value;
			} else {
				//Put the value in a assoc array if we are in the 'Attribute' mode
				$result['value'] = $value;
			}
		}

		//Set the attributes too.
		if (isset($attributes) and $get_attributes) {
			foreach ($attributes as $attr => $val) {
				if ($priority == 'tag') {
					$attributes_data[$attr] = $val;
				} else {
					//Set all the attributes in a array called 'attr'
					$result['attr'][$attr] = $val;
				}
			}
		}

		//See tag status and do the needed.
		//The starting of the tag '<tag>'
		if ($type == 'open') {
			$parent[$level-1] = &$current;

			//Insert New tag
			if (!is_array($current) || (!in_array($tag, array_keys($current)))) {
				$current[$tag] = $result;

				if ($attributes_data) {
					$current[$tag. '_attr'] = $attributes_data;
				}

				$repeated_tag_index[$tag.'_'.$level] = 1;
				$current = &$current[$tag];
			//There was another element with the same tag name
			} else {
				//If there is a 0th element it is already an array
				if (isset($current[$tag][0])) {
					$current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;
					$repeated_tag_index[$tag.'_'.$level]++;
				//This section will make the value an array if multiple tags with the same name appear together
				} else {
					//This will combine the existing item and the new item together to make an array
					$current[$tag] = array($current[$tag],$result);
					$repeated_tag_index[$tag.'_'.$level] = 2;
                    
					//The attribute of the last(0th) tag must be moved as well
					if (isset($current[$tag.'_attr'])) {
						$current[$tag]['0_attr'] = $current[$tag.'_attr'];
						unset($current[$tag.'_attr']);
					}
				}

				$last_item_index = $repeated_tag_index[$tag.'_'.$level]-1;
				$current = &$current[$tag][$last_item_index];
			}
		//Tags that ends in 1 line '<tag />'
		} elseif ($type == 'complete') {
			//See if the key is already taken.
			//New Key
			if (!isset($current[$tag])) {
				$current[$tag] = $result;
				$repeated_tag_index[$tag.'_'.$level] = 1;

				if ($priority == 'tag' && $attributes_data) {
					$current[$tag. '_attr'] = $attributes_data;
				}
			//If taken, put all things inside a list(array)
			} else {
				//If it is already an array...
				if (isset($current[$tag][0]) && is_array($current[$tag])) {
					// ...push the new element into that array.
					$current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;

					if ($priority == 'tag' && $get_attributes && $attributes_data) {
						$current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
					}

					$repeated_tag_index[$tag.'_'.$level]++;
				//If it is not an array...
				} else {
					//...Make it an array using using the existing value and the new value
					$current[$tag] = array($current[$tag],$result);
					$repeated_tag_index[$tag.'_'.$level] = 1;

					if ($priority == 'tag' && $get_attributes) {
						//The attribute of the last(0th) tag must be moved as well
						if (isset($current[$tag.'_attr'])) {
							$current[$tag]['0_attr'] = $current[$tag.'_attr'];
							unset($current[$tag.'_attr']);
						}

						if ($attributes_data) {
							$current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
						}
					}

					//0 and 1 index is already taken
					$repeated_tag_index[$tag.'_'.$level]++;
				}
			}
		//End of tag '</tag>'
		} elseif($type == 'close') {
			$current = &$parent[$level-1];
		}
	}

	return $xml_array;
}

if (!function_exists('sys_get_temp_dir')) {
	function sys_get_temp_dir () {
		if (!empty($_ENV['TMP'])) {
			return realpath($_ENV['TMP']);
		} else if (!empty($_ENV['TMPDIR'])) {
			return realpath( $_ENV['TMPDIR']);
		} else if (!empty($_ENV['TEMP'])) {
			return realpath( $_ENV['TEMP']);
		}
  }
}
?>
