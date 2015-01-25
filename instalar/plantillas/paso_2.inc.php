<?php
/*******************************************************************************
* instalar/plantillas/paso_2.inc.php
*
* Plantilla para el segundo paso de la instalación
*******************************************************************************/

defined('OK') or die();
?>
<form action="index.php" method="post">
<fieldset>
<input type="hidden" id="paso" name="paso" value="3" />
<input type="hidden" name="idioma" value="<?php echo $form['idioma']; ?>" />
<input type="hidden" name="aviso_instalacion" value="<?php echo $form['aviso_instalacion']; ?>" />
<input type="hidden" name="tipo" value="<?php echo $form['tipo']; ?>" />
<input type="hidden" name="zlib" value="<?php echo $form['zlib']; ?>" />
<input type="hidden" name="gd2" value="<?php echo $form['gd2']; ?>" />
<input type="hidden" name="charset" value="<?php echo $form['charset']; ?>" />
<input type="hidden" name="db_servidor" value="<?php echo $form['db_servidor']; ?>" />
<input type="hidden" name="db_nome" value="<?php echo $form['db_nome']; ?>" />
<input type="hidden" name="db_usuario" value="<?php echo $form['db_usuario']; ?>" />
<input type="hidden" name="db_prefixo" value="<?php echo $form['db_prefixo']; ?>" />
<input type="hidden" name="ad_nome" value="<?php echo addslashes($form['ad_nome']); ?>" />
<input type="hidden" name="ad_usuario" value="<?php echo $form['ad_usuario']; ?>" />
<input type="hidden" name="ad_correo" value="<?php echo $form['ad_correo']; ?>" />
<input type="hidden" name="ra_nome" value="<?php echo addslashes($form['ra_nome']); ?>" />
<input type="hidden" name="ra_path" value="<?php echo $form['ra_path']; ?>" />
<input type="hidden" name="ra_web" value="<?php echo $form['ra_web']; ?>" />
<input type="hidden" name="ra_dominio" value="<?php echo $form['ra_dominio']; ?>" />

<h2><?php echo PFN___('i_directorios'); ?></h2>

<br /><?php echo PFN___('i_intro_directorios'); ?><br /><br />

<div class="capa_<?php echo ($comprobar[0] == 1)?'ok':'erro'; ?>">
	<strong>data/servidor/</strong><br />
	<?php echo PFN___(($comprobar[0] == 1)?'i_path_ok':'i_path_erro'); ?>
</div>

<div class="capa_<?php echo ($comprobar[1] == 1)?'ok':'erro'; ?>">
	<strong>data/conf/</strong><br />
	<?php echo PFN___(($comprobar[1] == 1)?'i_path_ok':'i_path_erro'); ?>
</div>

<?php if ($basicas['version'] > 0) { ?>
<div class="capa_<?php echo ($comprobar[2] == 1)?'ok':'erro'; ?>">
	<strong>data/conf/basicas.inc.php</strong><br />
	<?php echo PFN___(($comprobar[2] == 1)?'i_arq_ok':'i_arq_erro'); ?>
</div>
<?php } ?>

<br />

<?php if ($erros) { ?>
<script type="text/javascript"><!--

document.getElementById('paso').value = 2;

//--></script>
<input type="submit" value="<?php echo PFN___('i_recargar'); ?>" class="dereita" />
<?php } else { ?>
<input type="submit" value="<?php echo PFN___('continuar_paso_3'); ?>" class="dereita" />
<?php } ?>
</fieldset>
</form>

<form action="index.php" method="post">
<fieldset>
<input type="hidden" name="paso" value="1" />
<input type="hidden" name="idioma" value="<?php echo $form['idioma']; ?>" />
<input type="hidden" name="aviso_instalacion" value="<?php echo $form['aviso_instalacion']; ?>" />
<input type="hidden" name="tipo" value="<?php echo $form['tipo']; ?>" />
<input type="hidden" name="zlib" value="<?php echo $form['zlib']; ?>" />
<input type="hidden" name="gd2" value="<?php echo $form['gd2']; ?>" />
<input type="hidden" name="charset" value="<?php echo $form['charset']; ?>" />
<input type="hidden" name="db_servidor" value="<?php echo $form['db_servidor']; ?>" />
<input type="hidden" name="db_nome" value="<?php echo $form['db_nome']; ?>" />
<input type="hidden" name="db_usuario" value="<?php echo $form['db_usuario']; ?>" />
<input type="hidden" name="db_prefixo" value="<?php echo $form['db_prefixo']; ?>" />
<input type="hidden" name="ad_nome" value="<?php echo addslashes($form['ad_nome']); ?>" />
<input type="hidden" name="ad_usuario" value="<?php echo $form['ad_usuario']; ?>" />
<input type="hidden" name="ad_correo" value="<?php echo $form['ad_correo']; ?>" />
<input type="hidden" name="ra_nome" value="<?php echo addslashes($form['ra_nome']); ?>" />
<input type="hidden" name="ra_path" value="<?php echo $form['ra_path']; ?>" />
<input type="hidden" name="ra_web" value="<?php echo $form['ra_web']; ?>" />
<input type="hidden" name="ra_dominio" value="<?php echo $form['ra_dominio']; ?>" />
<input type="submit" value="<?php echo PFN___('voltar_paso_1'); ?>" class="esquerda" />
</fieldset>
</form>
