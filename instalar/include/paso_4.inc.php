<?php
/*******************************************************************************
* instalar/include/paso_4.inc.php
*
* Cuarto paso de la instalación
*******************************************************************************/

defined('OK') or die();

$erros = array();

$form['db_servidor'] = empty($form['db_servidor'])?'localhost':$form['db_servidor'];
$form['db_prefixo'] = empty($form['db_prefixo'])?'pfn_':$form['db_prefixo'];

$form['ra_path'] = empty($form['ra_path'])?($PFN_vars->server('DOCUMENT_ROOT').'/'):$form['ra_path'];
$form['ra_web'] = empty($form['ra_web'])?'/':$form['ra_web'];
$form['ra_dominio'] = empty($form['ra_dominio'])?$PFN_vars->server('SERVER_NAME'):$form['ra_dominio'];

include ($PFN_paths['instalar'].'plantillas/paso_4.inc.php');
?>
