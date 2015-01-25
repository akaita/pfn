<?php
/*******************************************************************************
* instalar/plantillas/actualizar_200-201.inc.php
*
* Plantilla para el resultado de actualizar desde 2.0.0 a 2.0.1
*******************************************************************************/

defined('OK') or die();
?>

<br /><h3><?php echo PFN___('i_actualizar_200-201'); ?></h3>

<?php if (in_array('mysql_200-201', $feito)) {?>
	<?php if ($erros['mysql_200-201']) { ?>
		<div class="capa_erro">
			<strong><?php echo PFN___('i_consultas_mysql'); ?></strong><br />
			<?php echo PFN___('i_consultas_erro'); ?>
			<br />
			<?php foreach ($erros_q['mysql_200-201'] as $v) { ?>
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
