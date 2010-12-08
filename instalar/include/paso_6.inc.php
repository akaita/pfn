<?php
/*******************************************************************************
* instalar/include/paso_6.inc.php
*
* Sexto paso de la instalación
*******************************************************************************/

defined('OK') or die();

$doar = PFN___('i_doar');
$doar_paypal = PFN___('i_doar_paypal');
$doar_tarxeta = PFN___('i_doar_tarxeta');

if (is_file($PFN_paths['tmp'].'instalar.lock')) {
	@unlink($PFN_paths['tmp'].'instalar.lock');
} elseif (is_file($PFN_paths['web'].'tmp/instalar.lock')) {
	@unlink($PFN_paths['web'].'tmp/instalar.lock');
}

include ($PFN_paths['instalar'].'plantillas/paso_6.inc.php');
?>
