<?php
/****************************************************************************
* data/plantillas/ver_contido.inc.php
*
* plantilla para la visualización del contenido de un fichero
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>
		<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('ver_contido'); ?></h1></div>
		<div class="bloque_info">
			<pre><?php echo PFN_textoArquivo2pantalla($PFN_arquivos->get_contido($arquivo), $e_php, true); ?></pre>
		</div>
	</div>
</div>
