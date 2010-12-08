<?php
/****************************************************************************
* data/plantillas/editar.inc.php
*
* plantilla para la edición de un fichero
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>
		<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('editar'); ?></h1></div>
		<div style="width: 100%; text-align: center;">
			<script type="text/javascript"><!--

			function cubre_texto2 () {
				document.getElementById('texto2').value = document.getElementById('texto').value;
				return submitonce();
			}

			//--></script>

			<form id="form_tamano" action="accion.php?<?php echo PFN_cambia_url(array('accion','cal'),array('editar',$cal),false); ?>" method="post" onsubmit="return cubre_texto2();">
			<fieldset>
			<label for="ancho"><?php echo PFN___('tamano'); ?>:</label>
			<input type="text" id="ancho" name="ancho" value="<?php echo $editar_ancho; ?>" style="width: 50px;" />
			&nbsp;x&nbsp;
			<input type="text" id="alto" name="alto" value="<?php echo $editar_alto; ?>" style="width: 50px;" />
			&nbsp;&nbsp;
			<input type="submit" name="cambiar_tamano" value="<?php echo PFN___('enviar'); ?>" />
			<input type="hidden" name="texto2" id="texto2" value="" />
			</fieldset>
			</form>
			<form id="form_datos" action="accion.php?<?php echo PFN_cambia_url('accion','editar',false); ?>" method="post" onsubmit="return submitonce();">
			<fieldset>
			<input type="hidden" name="executa" value="true" />
			<input type="hidden" name="cal" value="<?php echo $cal; ?>" />
			<br />
			<textarea id="texto" name="texto" style="width: <?php echo $editar_ancho; ?>px; height: <?php echo $editar_alto; ?>px"><?php echo $texto; ?></textarea>
			<p><br />
			<input type="reset" value=" <?php echo PFN___('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" />
			<input type="submit" value=" <?php echo PFN___('aceptar'); ?> " class="boton" style="margin-left: 40px;" />
			</p>
			</fieldset>
			</form>
		</div>
	</div>
</div>
