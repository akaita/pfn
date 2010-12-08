<?php
/****************************************************************************
* data/plantillas/preferencias.inc.php
*
* plantilla para la visualización de la acción de editar las preferencias
* del usuario
*******************************************************************************/

defined('OK') or die();
?>

<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('preferencias_usuario'); ?></h1></div>
	<div class="bloque_info">
		<?php if ($txt_erro) { ?>
			<div class="aviso"><?php echo $txt_erro; ?></div>
		<?php } else { ?>
		<?php if ($txt_estado) { ?>
			<div class="aviso"><?php echo $txt_estado; ?></div>
		<?php } ?>

		<form action="preferencias.php?<?php echo PFN_get_url(false); ?>" method="post" id="formulario" enctype="multipart/form-data" onsubmit="return validar_campos();">
		<fieldset>
		<input type="hidden" name="executa" value="true" />

		<table class="tabla_info" summary="">
			<tr>
				<th><label for="preferencias_nome"><?php echo PFN___('nome'); ?>:</label></th>
				<td><input type="text" name="preferencias_nome" id="preferencias_nome" class="text" value="<?php echo $PFN_usuarios->get('nome'); ?>" /></td>
			</tr>
			<tr>
				<th><label for="preferencias_email"><?php echo PFN___('correo'); ?>:</label></th>
				<td><input type="text" name="preferencias_email" id="preferencias_email" class="text" value="<?php echo $PFN_usuarios->get('email'); ?>" /></td>
			</tr>
			<tr>
				<th><label for="preferencias_contrasinal"><?php echo PFN___('contrasinal'); ?>:</label></th>
				<td><input type="password" name="preferencias_contrasinal" id="preferencias_contrasinal" class="text" value="" /></td>
			</tr>
			<tr>
				<th><label for="preferencias_contrasinal_rep"><?php echo PFN___('contrasinal_rep'); ?>:</label></th>
				<td><input type="password" name="preferencias_contrasinal_rep" id="preferencias_contrasinal_rep" class="text" /></td>
			</tr>
		</table>

		<br /><div class="centro">
			<input type="reset" value=" <?php echo PFN___('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" tabindex="130" />
			<input type="submit" value=" <?php echo PFN___('aceptar'); ?> " class="boton" style="margin-left: 40px;" tabindex="140" />
		</div>

		</fieldset>
		</form>
		<?php } ?>
	</div>
</div>
