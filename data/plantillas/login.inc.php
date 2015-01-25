<?php
/****************************************************************************
* data/plantillas/login.inc.php
*
* plantilla para la visualización de la pantalla de login
*******************************************************************************/

defined('OK') or die();
?>

<h1 id="benvido"><span><?php echo PFN___('benvido'); ?></span></h1>

<?php if ($erro > 0) { ?>
<div class="aviso" style="width: 230px; text-align: center; margin-left: 250px;"><?php echo $txt_erro; ?></div>
<?php } ?>

<div id="login">
	<form action="comprobar.php" method="post" id="formulario">
		<fieldset>
			<p>
				<label for="login_usuario"><?php echo PFN___('usuario'); ?>:</label>
				<br /><input type="text" id="login_usuario" name="login_usuario" class="formulario" />
			</p>
			<p>
				<label for="login_contrasinal"><?php echo PFN___('contrasinal'); ?>:</label>
				<br /><input type="password" id="login_contrasinal" name="login_contrasinal" class="formulario" />
			</p>
			<p><input type="submit" name="Submit" value=" <?php echo PFN___('enviar'); ?> " class="boton" /></p>
		</fieldset>
	</form>

	<script type="text/javascript"><!--

	document.getElementById('login_usuario').focus();

	//--></script>
</div>

<div id="login_mais_opcions">
	<a href="#" onclick="$('#login_mais_opcions ul').slideToggle('slow'); return false;"><?php echo PFN___('mais_opcions'); ?> &raquo;</a>

	<ul>
		<li><a href="contrasinal.php"><?php echo PFN___('contrasinal_olvidada'); ?></a></li>
		<li><a href="desbloquear.php"><?php echo PFN___('desbloquear_usuario'); ?></a></li>
		<?php if ($_SERVER['HTTPS'] == 'on') { ?><li><a href="ssl/dnie.php"><?php echo PFN___('acceder_con_certificado'); ?></a></li><?php } ?>
	</ul>
</div>
