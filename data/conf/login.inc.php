<?php
/****************************************************************************
* data/conf/login.inc.php
*
* Contiene las variables de configuraci�n para el acceso al PHPfileNavigator
*******************************************************************************/

defined('OK') or die();

/* Carga la configuracion para acceso */
/* Load default login configuration */
return array(
	// Nombre del campo usuario / User field name
	'login:usuario' => 'login_usuario',

	// Nombre del campo de contrase�a / Password field name
	'login:contrasinal' => 'login_contrasinal',

	// Si la contrase�a se recibe ya encriptada o si debemos encriptarla antes
	// de realizar la comprobaci�n de login
	// If the password it's encripted or if pfn must crypted after check user
	// true = it's encripted | false = pfn must crypt
	'login:encriptada' => false,

	// Metodo para obtener los datos / Method to obtain data
	// post | get | session | server
	'login:metodo' => 'post'
);
?>
