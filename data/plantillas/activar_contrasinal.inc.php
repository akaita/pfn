<?php
/****************************************************************************
* data/plantillas/activar_contrasinal.inc.php
*
* plantilla para la visualización de la pantalla de activacion de la nueva
* contraseña
*******************************************************************************/

defined('OK') or die();
?>

<h1 id="benvido"><span><?php echo PFN___('novo_contrasinal'); ?></span></h1>

<div class="aviso" style="width: 230px; text-align: center; margin-left: 250px;"><?php echo $txt_erro; ?></div>

<?php if ($ok !== 1) { ?>
<div id="login">
	<form action="activar_contrasinal.php" method="post" id="formulario">
		<fieldset>
			<input type="hidden" name="executa" value="true" />

			<p>
				<label for="activar_usuario"><?php echo PFN___('usuario'); ?>:</label>
				<br /><input type="text" id="activar_usuario" name="activar_usuario" class="formulario" />
			</p>

			<p>
				<label for="activar_contrasinal"><?php echo PFN___('novo_contrasinal'); ?>:</label>
				<br /><input type="password" id="activar_contrasinal" name="activar_contrasinal" class="formulario" />
			</p>

			<p><input type="submit" name="Submit" value=" <?php echo PFN___('enviar'); ?> " class="boton" /></p>
		</fieldset>
	</form>

	<script type="text/javascript"><!--

	document.getElementById('activar_usuario').focus();

	//--></script>
</div>
<?php } ?>

<div id="login_mais_opcions">
	<a href="index.php"><?php echo PFN___('voltar'); ?></a>
</div>
