<?php
/****************************************************************************
* xestion/csv/index.inc.php
*
* Prepara los datos para ser mostrados y ejecutados
*******************************************************************************/

defined('OK') && defined('XESTION') or die();

$executa = intval($PFN_vars->post('executa'));
$erros = $novos = array();
$ok = 0;
$txt = '';

if ($executa === 1) {
	$arquivo = $PFN_vars->files('arquivo');

	if (empty($arquivo['tmp_name']) || ($arquivo['size'] == 0)) {
		$erros[] = PFN___('Xerros_43');
		return false;
	}

	$boton = $PFN_vars->post('procesar')?'procesar':'probar';

	$PFN_usuarios->init('raices');

	for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
		$raices[$PFN_usuarios->get('id')] = array(
			'path' => $PFN_usuarios->get('path'),
			'web' => $PFN_usuarios->get('web'),
			'host' => $PFN_usuarios->get('host')
		);
	}

	$PFN_usuarios->init('usuarios');

	for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
		$usuarios[strtolower($PFN_usuarios->get('usuario'))] = true;
	}

	$PFN_usuarios->init('grupos');

	for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
		$grupos[$PFN_usuarios->get('id')] = $PFN_usuarios->get('id_conf');
	}

	$separador = $PFN_vars->post('separador');
	$separador = ($separador == ';')?';':',';
	$linhas = file($arquivo['tmp_name'], FILE_TEXT | FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

	foreach ($linhas as $num => $cada) {
		$num++;
		$datos = explode($separador, $cada);

		if (count($datos) != 14) {
			$erros[] = sprintf(PFN___('Xerros_44'), $num, $cada);
			continue;
		}

		foreach ($datos as $k => $v) {
			$datos[$k] = addslashes(trim($v));
		}

		/*
		* Campos:
		0	=> nombre
		1	=> usuario
		2	=> contrasinal
		3	=> identificador_acceso
		4	=> email
		5	=> maximo_descargas
		6	=> cambiar_datos
		7	=> id_grupo
		8	=> estado
		9	=> acceso_contrasinal
		10 => acceso_certificado
		11 => nova_raiz
		12 => peso_maximo
		13 => id_raiz_base
		*/

		if (empty($datos[0]) || empty($datos[1]) || empty($datos[2]) || empty($datos[7]) || empty($datos[13])) {
			$erros[] = sprintf(PFN___('Xerros_45'), $num, $cada);
			continue;
		}

		if (isset($usuarios[strtolower($datos[1])])) {
			$erros[] = sprintf(PFN___('Xerros_46'), $num, $datos[1], $cada);
			continue;
		} else if (!preg_match('/^[\w_\.-]+$/', $datos[1])) {
			$erros[] = sprintf(PFN___('Xerros_55'), $num, $datos[1], $cada);
			continue;
		} else if (strlen($datos[1]) < 4) {
			$erros[] = sprintf(PFN___('Xerros_59'), $num, $datos[1], $cada);
			continue;
		}

		if (!isset($raices[$datos[13]])) {
			$erros[] = sprintf(PFN___('Xerros_47'), $num, $datos[13], $cada);
			continue;
		}

		if (!isset($grupos[$datos[7]])) {
			$erros[] = sprintf(PFN___('Xerros_48'), $num, $datos[7], $cada);
			continue;
		}

		if (isset($novos[strtolower($datos[1])])) {
			$erros[] = sprintf(PFN___('Xerros_56'), $num, $datos[1], $cada);
			continue;
		}

		$novos[strtolower($datos[1])] = true;

		if ($boton == 'probar') {
			$ok++;

			continue;
		}

		$query = 'INSERT INTO '.$PFN_usuarios->tabla('usuarios')
			.' SET nome = "'.utf8_encode($datos[0]).'"'
			.', usuario = "'.$datos[1].'"'
			.', id_control = "'.str_replace(array('-', ' '), '', $datos[3]).'"'
			.', contrasinal = "'.md5($datos[2]).'"'
			.', email = "'.$datos[4].'"'
			.', id_grupo = "'.intval($datos[7]).'"'
			.', estado = "'.intval($datos[8]).'"'
			.', admin = "0"'
			.', cambiar_datos = "'.intval($datos[6]).'"'
			.', login_usuario = "'.intval($datos[9]).'"'
			.', login_certificado = "'.intval($datos[10]).'"'
			.', descargas_maximo = "'.(intval($datos[5])*1024*1024).'";';

		if ($PFN_usuarios->actualizar($query) == -1) {
			$erros[] = sprintf(PFN___('Xerros_49'), $num, $datos[0], $datos[1], $cada);
			continue;
		}

		$id_usuario = $PFN_usuarios->id_ultimo();

		if (intval($datos[11]) == 1) {
			$query = 'INSERT INTO '.$PFN_usuarios->tabla('raices')
				.' SET nome = "'.utf8_encode($datos[0]).'"'
				.', path = "'.$raices[$datos[13]]['path'].$datos[1].'/"'
				.', web = "'.$raices[$datos[13]]['web'].$datos[1].'/"'
				.', host = "'.$raices[$datos[13]]['host'].'"'
				.', estado = "1"'
				.', peso_maximo = "'.(intval($datos[12])*1024*1024).'"'
				.', peso_actual = "0"'
				.', base = "0";';

			if ($PFN_usuarios->actualizar($query) == -1) {
				$erros[] = sprintf(PFN___('Xerros_50'), $num, $datos[0], $datos[1], $cada);
				continue;
			}

			$id_raiz = $PFN_usuarios->id_ultimo();

			if (!is_dir($raices[$datos[13]]['path'].$datos[1]) && !@mkdir($raices[$datos[13]]['path'].$datos[1])) {
				$query = 'DELETE FROM '.$PFN_usuarios->tabla('raices')
					.' WHERE id = "'.$id_raiz.'"'
					.' LIMIT 1;';

				$PFN_usuarios->actualizar($query);

				$query = 'DELETE FROM '.$PFN_usuarios->tabla('usuarios')
					.' WHERE id = "'.$id_usuario.'"'
					.' LIMIT 1;';

				$PFN_usuarios->actualizar($query);

				$erros[] = sprintf(PFN___('Xerros_51'), $num, $datos[0], $datos[1], $cada);
				continue;
			}
		} else {
			$id_raiz = intval($datos[13]);
		}

		if (!is_dir($PFN_paths['info'].'usuario'.$id_usuario)) {
			@mkdir($PFN_paths['info'].'usuario'.$id_usuario, 0755);
		}

		if (!is_dir($PFN_paths['info'].'raiz'.$id_raiz)) {
			@mkdir($PFN_paths['info'].'raiz'.$id_raiz, 0755);
		}

		$query = 'INSERT IGNORE INTO '.$PFN_usuarios->tabla('r_u')
			.' SET id_raiz = "'.$id_raiz.'"'
			.', id_usuario = "'.$id_usuario.'";';

		if ($PFN_usuarios->actualizar($query) == -1) {
			$erros[] = sprintf(PFN___('Xerros_52'), $num, $datos[0], $datos[1], $cada);
			continue;
		}

		$query = 'INSERT IGNORE INTO '.$PFN_usuarios->tabla('r_g_c')
			.' SET id_raiz = "'.$id_raiz.'"'
			.', id_grupo = "'.intval($datos[7]).'"'
			.', id_conf = "'.intval($grupos[$datos[7]]).'";';

		$PFN_usuarios->actualizar($query);

		$ok++;
	}
}
?>
