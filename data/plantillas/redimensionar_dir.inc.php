<?php
/****************************************************************************
* data/plantillas/redimensionar_dir.inc.php
*
* plantilla para la visualización de la acción de redimensionar todas las
* imágenes de un directorio
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>
		<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('redimensionar'); ?></h1></div>
		<div class="aviso">
			<?php if ($vale) { ?>

			<script type="text/javascript" src="<?php echo $relativo; ?>js/prototype.lite.js"></script>
			<script type="text/javascript" src="<?php echo $relativo; ?>js/ajax.js"></script>
			<script type="text/javascript"><!--

			function activa_botons () {
				document.getElementById('btn_submit').disabled = false;
				document.getElementById('btn_reset').disabled = false;
			}

			function procesa_imaxes () {
				submitonce();

				document.getElementById('resultado_ajax').innerHTML = '';

				AJAX_url = 'accion.php?<?php
					echo PFN_cambia_url(
						array('accion','dir','cal'),
						array('redimensionar_dir_accion',$dir,$cal)
						,false,true);
					?>&executa=true'
					+'&sobreescribir='+(document.getElementById('sobreescribir').checked?1:'')
					+'&previsualizar='+(document.getElementById('previsualizar').checked?1:'')
					+'&pos=';

				new ajax(0, {update: $('resultado_ajax')});

				document.getElementById('resultado_ajax').innerHTML += '<br class="nada" />';

				return false;
			}

			//--></script>

			<p><?php echo PFN___('redimensionar_dir_txt'); ?></p>
			<form id="formulario" action="accion.php?<?php echo PFN_cambia_url('accion','redimensionar_dir',false); ?>" method="post" onsubmit="return procesa_imaxes();">
			<fieldset>

			<br /><input type="checkbox" name="sobreescribir" id="sobreescribir" value="si" />
			&nbsp;&nbsp;<label for="sobreescribir"><?php echo PFN___('sobreescribir_reducidas'); ?></label>

			<br /><input type="checkbox" name="previsualizar" id="previsualizar" value="si" />
			&nbsp;&nbsp;<label for="previsualizar"><?php echo PFN___('amosar_previsualizacions'); ?></label>

			<br /><br />

			<input type="reset" value=" <?php echo PFN___('cancelar'); ?> " class="boton" id="btn_reset" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" />
			<input type="submit" value=" <?php echo PFN___('aceptar'); ?> " class="boton" id="btn_submit" style="margin-left: 40px;" />
			</fieldset>
			</form>
			<?php } else { ?>
			<?php echo PFN___('estado_redimensionar_dir_0'); ?>
			<?php } ?>
		</div>

		<div id="resultado_ajax"><br class="nada" /></div>
	</div>
</div>
