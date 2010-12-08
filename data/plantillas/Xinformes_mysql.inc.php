<?php
/****************************************************************************
* data/plantillas/Xinformes_mysql.inc.php
*
* plantilla para la visualización del informe de errores de MySQL
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
				<strong><?php echo PFN___('Xdesc_mysql'); ?></strong><br /><br />
				<label for="my_lineas"><?php echo PFN___('Xamosar_lineas'); ?>:</label>
				<input type="text" name="my_lineas" id="my_lineas" value="<?php echo $my_lineas; ?>" size="5" /><br /><br />
				<label for="my_buscar"><?php echo PFN___('Xbuscar_texto'); ?>:</label>
				<input type="text" name="my_buscar" id="my_buscar" value="<?php echo $PFN_vars->post('my_buscar'); ?>" size="20" />
