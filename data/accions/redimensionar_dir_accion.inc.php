<?php
/****************************************************************************
* data/accions/redimensionar_dir_accion.inc.php
*
* Crea una copia reducida para cada imágen de una carpeta
*******************************************************************************/

defined('OK') && defined('ACCION') or die();

$txt = '';
$mais = 0;
$valen = array();
$sobreescribir = $PFN_vars->get('sobreescribir');
$previsualizar = $PFN_vars->get('previsualizar');
$destino = $PFN_conf->g('raiz','path').$PFN_niveles->path_correcto($dir);
$imx_path = $PFN_niveles->path_correcto($destino.'/'.$cal);
$pos = intval($PFN_vars->get('pos'));

if ($PFN_vars->get('executa') && !empty($cal) && ($pos > -1)) {
	@set_time_limit($PFN_conf->g('tempo_maximo'));
	@ini_set('memory_limit', $PFN_conf->g('memoria_maxima'));

	include_once ($PFN_paths['include']."class_imaxes.php");
	include_once ($PFN_paths['include']."class_arquivos.php");

	$PFN_imaxes = new PFN_Imaxes($PFN_conf);
	$PFN_arquivos = new PFN_Arquivos($PFN_conf);

	$PFN_conf->p(1500,'paxinar');
	$contido = $PFN_niveles->get_contido($imx_path,'nome','asc',true);

	foreach ($contido['arq']['nome'] as $v) {
		if ($PFN_imaxes->e_imaxe($imx_path.'/'.$v)) {
			$valen[] = $v;
		}
	}

	$imaxe = $imx_path.'/'.$valen[$pos];
	$url_imaxe = $dir.'/'.$cal.'/'.$valen[$pos];

	if (empty($imaxe)) {
		$txt .= PFN___('estado_redimensionar_dir_2').' <strong>'.$url_imaxe.'</strong><br />';
	}

	$txt .= $previsualizar?'<span class="mini">':('('.($pos+1).'/'.count($valen).') ');

	if ($sobreescribir || !is_file($PFN_imaxes->nome_pequena($imaxe))) {
		$PFN_imaxes->reducir($imaxe);

		if ($previsualizar) {
			$txt .= '<img src="'.$PFN_imaxes->sello($url_imaxe,false).'" />';
		} else {
			$txt .= PFN___('estado_redimensionar_dir_1').'<strong>'.$url_imaxe.'</strong><br />';
		}
	} else {
		if ($previsualizar) {
			$txt .= '<img src="'.$PFN_imaxes->sello($url_imaxe,false).'" />';
		} else {
			$txt .= PFN___('estado_redimensionar_dir_4').'<strong>'.$url_imaxe.'</strong><br />';
		}
	}

	$txt .= $previsualizar?('<br />'.($pos+1).'/'.count($valen).'</span>'):'';

	if (!empty($valen[$pos+1])) {
		$mais = $pos+1;
	}
} else {
	$txt .= PFN___('estado_redimensionar_dir_3').'<br />';
}

if ($previsualizar && ($pos % 4) == 0) {
	$txt .= '<br class="nada" />';
}

if ($mais > 0) {
	$txt .= '|new ajax('.$mais.', {update: $("resultado_ajax")});';
} else {
	$txt .= '|activa_botons();';
}

echo $txt;

exit;
?>
