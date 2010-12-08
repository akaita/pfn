<?php
/****************************************************************************
* crea_imaxe.php
*
* Visualizar una imágen según los parámetros recibidos
*******************************************************************************/

include ('paths.php');
include_once ($PFN_paths['include'].'basicweb.php');

session_write_close();

include_once ($PFN_paths['include'].'class_arquivos.php');
include_once ($PFN_paths['include'].'class_imaxes.php');
include_once ($PFN_paths['include'].'class_accions.php');
include_once ($PFN_paths['include']."class_arquivos.php");

$PFN_arquivos = new PFN_Arquivos($PFN_conf);
$PFN_imaxes = new PFN_Imaxes($PFN_conf);
$PFN_accions = new PFN_Accions($PFN_conf);
$PFN_arquivos = new PFN_Arquivos($PFN_conf);

$PFN_imaxes->arquivos($PFN_arquivos);
$PFN_accions->arquivos($PFN_arquivos);

$imaxe = $PFN_conf->g('raiz','path').$PFN_niveles->path_correcto($dir.'/'.$PFN_vars->get('cal'));
$imaxe = ($PFN_vars->get('peq') == 1)?$PFN_imaxes->nome_pequena($imaxe):$imaxe;

$tamano = PFN_espacio_disco($imaxe, true);

if ($PFN_accions->log_ancho_banda($tamano)) {
	echo $PFN_imaxes->volcar_imaxe($imaxe, $PFN_vars->get('ancho'), $PFN_vars->get('alto'));
}

exit;
?>
