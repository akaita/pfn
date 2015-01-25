<?php
/****************************************************************************
* data/plantillas/contrasinal.inc.php
*
* plantilla para la visualización de la pantalla de recuperación de
* contraseña
*******************************************************************************/

defined('OK') or die();
?>

<h1 id="benvido"><span><?php echo PFN___('novo_contrasinal'); ?></span></h1>

<div class="aviso" style="width: 230px; text-align: center; margin-left: 250px;"><?php echo $txt_erro; ?></div>

<?php if ($ok !== 1) { ?>
<div id="login">
	<form action="contrasinal.php" method="post" id="formulario">
		<fieldset>
			<input type="hidden" name="executa" value="true" />

			<p>
				<label for="recuperar_usuario"><?php echo PFN___('usuario'); ?>:</label>
				<br /><input type="text" id="recuperar_usuario" name="recuperar_usuario" class="formulario" />
			</p>

			<p>
				<label for="recuperar_email"><?php echo PFN___('correo'); ?>:</label>
				<br /><input type="text" id="recuperar_email" name="recuperar_email" class="formulario" />
			</p>

			<p><input type="submit" name="Submit" value=" <?php echo PFN___('enviar'); ?> " class="boton" /></p>
		</fieldset>
	</form>

	<script type="text/javascript"><!--

	document.getElementById('recuperar_usuario').focus();

	//--></script>
</div>
<?php } ?>

<div id="login_mais_opcions">
	<a href="index.php"><?php echo PFN___('voltar'); ?></a>
</div>
