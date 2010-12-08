<?php
/****************************************************************************
* data/include/basicweb.php
*
* Realiza los includes basicos para el correcto funcionamiento de todas las
* secciones
*******************************************************************************/

defined('OK') or die();

include_once ($PFN_paths['include'].'class_tempo.php');

if ($borra_cache) {
	//include_once ($PFN_paths['include'].'borra_cache.php');
}

include_once ($PFN_paths['include'].'funcions.php');
include_once ($PFN_paths['include'].'class_conf.php');
include_once ($PFN_paths['include'].'class_vars.php');
include_once ($PFN_paths['include'].'mysql.php');
include_once ($PFN_paths['include'].'clases.php');
include_once ($PFN_paths['include'].'class_sesion.php');
include_once ($PFN_paths['include'].'class_usuarios.php');
include_once ($PFN_paths['include'].'usuarios.php');
include_once ($PFN_paths['include'].'class_niveles.php');
include_once ($PFN_paths['include'].'prepara.php');
include_once ($PFN_paths['include'].'mantemento.php');
?>
