<?php
/*******************************************************************************
* instalar/plantillas/actualizar_220-230.inc.php
*
* Plantilla para el resultado de actualizar desde 2.2.0 a 2.3.0
*******************************************************************************/

defined('OK') or die();
?>

<br /><h3><?php echo PFN___('i_actualizar_220-230'); ?></h3>

<?php if (in_array('mysql_220-230', $feito)) {?>
	<?php if ($erros['mysql_220-230']) { ?>
		<div class="capa_erro">
			<strong><?php echo PFN___('i_consultas_mysql'); ?></strong><br />
			<?php echo PFN___('i_consultas_erro'); ?>
			<br />
			<?php foreach ($erros_q['mysql_220-230'] as $v) { ?>
				<div class="aviso">
					<?php echo PFN___('i_consulta'); ?>:
					<br /><?php echo $v['consulta']; ?>
					<br /><br /><?php echo PFN___('i_erro'); ?>:
					<br /><?php echo $v['erro']; ?>
				</div>
			<?php } ?>
		</div>
	<?php } else { ?>
	<div class="capa_ok">
		<strong><?php echo PFN___('i_consultas_mysql'); ?></strong><br />
		<?php echo PFN___('i_consultas_ok'); ?>
	</div>
	<?php } ?>
<?php } ?>

<?php if (in_array('dirs_220-230', $feito)) {?>
<div class="capa_ok">
	<strong><?php echo PFN___('i_creacion_directorios'); ?></strong><br />
	<?php echo PFN___('i_crear_directorios_ok'); ?>
</div>
<?php } ?>

<?php if (in_array('inc_220-230', $feito)) {?>
<div class="capa_ok">
	<strong><?php echo PFN___('i_arq_inc'); ?></strong><br />
	<?php echo PFN___('i_arq_inc_ok'); ?>
</div>
<?php } ?>
