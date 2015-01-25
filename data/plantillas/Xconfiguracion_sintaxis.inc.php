<?php
/****************************************************************************
* data/plantillas/Xconfiguracion_sintaxis.inc.php
*
* plantilla para la visualización del checkeo de un fichero de configuración
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
<script type="text/javascript"><!--

document.write("<style>");
document.write("\n#corpo { width: 90%; }");
document.write("\n#pe { width: 90%; }");
document.write("<\/style>");

//--></script>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('xestion').' &raquo; '.PFN___('Xcomprobar_sintaxis'); ?></h1></div>
	<div class="bloque_info">
		<input type="button" value=" <?php echo PFN___('pechar'); ?> " class="boton" onclick="window.close();" />
		<br /><br />
		<div class="aviso" style="width: 400px;">
			<?php echo PFN___('Xintro_sintaxis'); ?>
			<hr style="border: 1px solid #F00; margin: 5px 0 5px 0;" />
			<?php
			if (count($erros) > 0) {
				foreach ($erros as $v) {
					echo PFN___('Xerros_'.$v);
				}
			} else {
				$alertas = $PFN_arquivos->comprobar_sintaxis($nome_arq, true);

				if (strlen($alertas)) { ?>
					<?php echo PFN___('Xcol_erro'); ?>:
					<br /><?php echo $alertas['erro']; ?>
					<hr style="border: 1px solid #F00; margin: 5px 0 5px 0;" />
					<?php echo PFN___('Xcol_linha'); ?>:
					<p style="color: #999;"><?php echo $alertas['linha-1']; ?></p>
					<h3 style="color: #333;"><?php echo $alertas['linha']; ?></h3>
					<p style="color: #999;"><?php echo $alertas['linha+1']; ?></p>
				<?php
				} else {
					echo PFN___('Xsintaxis_ok');
				}
			}
			?>
		</div>

		<br /><input type="button" value=" <?php echo PFN___('pechar'); ?> " class="boton" onclick="window.close();" />
	</div>
</div>
