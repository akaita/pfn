<?php
/*******************************************************************************
* instalar/idiomas/idiomas.inc.php
*
* Devuelve un array con los idiomas disponibles
*******************************************************************************/

defined('OK') or die();

$idiomas = array();

is_dir($PFN_paths['idiomas'].'gl')?($idiomas['gl'] = 'Galego'):false;
is_dir($PFN_paths['idiomas'].'es')?($idiomas['es'] = 'Castellano'):false;
is_dir($PFN_paths['idiomas'].'en')?($idiomas['en'] = 'English'):false;
is_dir($PFN_paths['idiomas'].'it')?($idiomas['it'] = 'Italiano'):false;
is_dir($PFN_paths['idiomas'].'nl')?($idiomas['nl'] = 'Dutch'):false;
is_dir($PFN_paths['idiomas'].'fr')?($idiomas['fr'] = 'Français'):false;
is_dir($PFN_paths['idiomas'].'de')?($idiomas['de'] = 'Deutsch'):false;

return $idiomas;
?>
