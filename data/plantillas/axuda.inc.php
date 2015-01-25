<?php
/****************************************************************************
* data/plantillas/axuda.inc.php
*
* plantilla para la visualización de la ayuda
*******************************************************************************/

defined('OK') or die();
?>

<div class="bloque_info">
	<br /><h1><?php echo PFN___('h1_quero_facer'); ?></h1><br />
	<div style="margin-left: 10px;">
		<a href="#" onclick="amosa_axuda('quero_crear_dir'); return false;"><?php echo PFN___('tit_crear_dir'); ?></a>
		<div id="quero_crear_dir" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_crear_dir', $PFN_conf->g('estilo')); ?></div>
		<br /><a href="#" onclick="amosa_axuda('quero_subir_arq'); return false;"><?php echo PFN___('tit_subir_arq'); ?></a>
		<div id="quero_subir_arq" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_subir_arq', $PFN_conf->g('estilo')); ?></div>
		<br /><a href="#" onclick="amosa_axuda('quero_subir_url'); return false;"><?php echo PFN___('tit_subir_url'); ?></a>
		<div id="quero_subir_url" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_subir_url', $PFN_conf->g('estilo')); ?></div>
		<br /><a href="#" onclick="amosa_axuda('quero_miniaturas'); return false;"><?php echo PFN___('tit_miniaturas'); ?></a>
		<div id="quero_miniaturas" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_miniaturas', $PFN_conf->g('estilo')); ?></div>
		<br /><a href="#" onclick="amosa_axuda('quero_arbore'); return false;"><?php echo PFN___('tit_arbore'); ?></a>
		<div id="quero_arbore" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_arbore', $PFN_conf->g('estilo')); ?></div>
		<br /><a href="#" onclick="amosa_axuda('quero_buscar'); return false;"><?php echo PFN___('tit_buscar'); ?></a>
		<div id="quero_buscar" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_buscar'); ?></div>
		<br /><a href="#" onclick="amosa_axuda('quero_accions'); return false;"><?php echo PFN___('tit_accions'); ?></a>
		<div id="quero_accions" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_accions'); ?></div>
		<br /><a href="#" onclick="amosa_axuda('quero_accions_multiple'); return false;"><?php echo PFN___('tit_accions_multiple'); ?></a>
		<div id="quero_accions_multiple" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_accions_multiple'); ?></div>
	</div>

	<br /><h1><?php echo PFN___('h1_problemas'); ?></h1><br />
	<div style="margin-left: 10px;">
		<a href="#" onclick="amosa_axuda('problema_subir_arq'); return false;"><?php echo PFN___('tit_problema_subir_arq'); ?></a>
		<div id="problema_subir_arq" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_problema_subir_arq'); ?></div>
		<br /><a href="#" onclick="amosa_axuda('problema_crear_dir'); return false;"><?php echo PFN___('tit_problema_crear_dir'); ?></a>
		<div id="problema_crear_dir" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_problema_crear_dir'); ?></div>
		<br /><a href="#" onclick="amosa_axuda('problema_buscador'); return false;"><?php echo PFN___('tit_problema_buscador'); ?></a>
		<div id="problema_buscador" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_problema_buscador'); ?></div>
		<br /><a href="#" onclick="amosa_axuda('problema_miniaturas'); return false;"><?php echo PFN___('tit_problema_miniaturas'); ?></a>
		<div id="problema_miniaturas" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_problema_miniaturas', $PFN_conf->g('estilo')); ?></div>
		<br /><a href="#" onclick="amosa_axuda('problema_paxinar'); return false;"><?php echo PFN___('tit_problema_paxinar'); ?></a>
		<div id="problema_paxinar" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_problema_paxinar', $PFN_conf->g('paxinar')); ?></div>
		<br /><a href="#" onclick="amosa_axuda('problema_sesion'); return false;"><?php echo PFN___('tit_problema_sesion'); ?></a>
		<div id="problema_sesion" style="background-color: #EEE; display: none; padding: 5px;"><?php echo PFN___('txt_problema_sesion'); ?></div>
	</div>

	<br /><h1><?php echo PFN___('h1_accions'); ?></h1><br />
	<div style="margin-left: 10px;">
		<table class="tabla_info" summary="">
			<?php if ($PFN_conf->g('permisos','info')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/info.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_info'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','copiar')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/copiar.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_copiar'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','mover')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/mover.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_mover'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','renomear')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/renomear.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_renomear'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','eliminar')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/eliminar.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_eliminar'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','permisos')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/permisos.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_permisos'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','descargar')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/descargar.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_descargar'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','descargar') && $PFN_conf->g('permisos','comprimir')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/comprimir.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_comprimir'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','redimensionar')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/redimensionar.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_redimensionar'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','extraer')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/extraer.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_extraer'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','ver_contido')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/ver_contido.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_ver_contido'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','editar')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/editar.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_editar'); ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>

	<?php if ($PFN_conf->g('columnas','multiple')) { ?>
	<br /><h1><?php echo PFN___('h1_accions_multiple'); ?></h1><br />
	<div style="margin-left: 10px;">
		<table class="tabla_info" summary="">
			<?php if ($PFN_conf->g('permisos','multiple_copiar')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/copiar.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_multiple_copiar'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','multiple_mover')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/mover.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_multiple_mover'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','multiple_eliminar')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/eliminar.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_multiple_eliminar'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','multiple_permisos')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/permisos.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_multiple_permisos'); ?></td>
			</tr>
			<?php } if ($PFN_conf->g('permisos','multiple_descargar') && $PFN_conf->g('permisos','comprimir')) { ?>
			<tr>
				<th><div style="width: 22px; height: 17px; background: url('<?php echo $PFN_conf->g('estilo'); ?>imx/comprimir.png') 50% -19px no-repeat; margin: 3px;"></div></th>
				<td><?php echo PFN___('txt_multiple_comprimir'); ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	<?php } ?>
</div>
<br />
