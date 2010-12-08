<?php
/****************************************************************************
* data/plantillas/enlazar.inc.php
*
* plantilla para la visualización de la acción de enlazar
*******************************************************************************/

defined('OK') && defined('ACCION') or die();
?>
<table border="0" cellpadding="0" cellspacing="5" width="95%" summary="">
	<tr>
		<td align="left">
			<b><span class="n14"><?php echo PFN___('accion'); ?> &raquo; </span>
			<span class="r14"><?php echo PFN___('link_$que); ?></span></b>
		</td>
	</tr>
</table>

<form action="accion.php?<?php echo PFN_cambia_url('accion','link',false); ?>" method="post" onsubmit="return submitonce();">
<input type="hidden" name="executa" value="true">
<input type="hidden" name="cal" value="<?php echo $cal; ?>">
<b><span class="r14"><?php echo PFN___('$msx); ?></span><br /><br />
<span class="ao14"><?php echo $a_web; ?></span></b><br /><br />
<table border="0" cellpadding="0" cellspacing="0" summary="">
	<tr>
		<td class="n12"><?php echo $PFN_arbore->arbore_txt; ?></td>
	</tr>
</table>
<br /><input type="reset" value=" <?php echo PFN___('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');">
<img src="<?php echo $PFN_conf->g('estilo'); ?>imx/0.png" border="0" alt=" " height="1" width="40">
<input type="submit" value=" <?php echo PFN___('aceptar'); ?> " class="boton">
</form>
