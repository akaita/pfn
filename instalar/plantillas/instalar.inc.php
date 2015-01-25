<?php
/*******************************************************************************
* instalar/plantillas/instalar.inc.php
*
* Plantilla para el quinto paso de la instalación
*******************************************************************************/

defined('OK') or die();
?>
<h2><?php echo PFN___('i_instalar'); ?></h2>

<br /><?php echo PFN___('i_intro_instalar'); ?><br /><br />

<form action="index.php" method="post">
<fieldset>
<input type="hidden" name="paso" value="6" />

<div class="capa_ok">
	<strong><?php echo PFN___('i_conexion_mysql'); ?></strong><br />
	<?php echo PFN___('i_mysql_ok'); ?>
</div>

<div class="capa_ok">
	<strong><?php echo PFN___('i_consultas_mysql'); ?></strong><br />
	<?php echo PFN___('i_consultas_ok'); ?>
</div>

<div class="capa_ok">
	<strong><?php echo PFN___('i_creacion_directorios'); ?></strong><br />
	<?php echo PFN___('i_crear_directorios_ok'); ?>
</div>

<div class="capa_ok">
	<strong><?php echo PFN___('i_arq_configuracion'); ?></strong><br />
	<?php echo PFN___('i_arq_configuracion_ok'); ?>
</div>

<br />

<input type="submit" value="<?php echo PFN___('continuar_paso_6'); ?>" class="dereita" />
</fieldset>
</form>
