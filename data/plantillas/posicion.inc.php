<?php
/****************************************************************************
* data/plantillas/posicion.inc.php
*
* plantilla para la visualización de la posición actual en la navegación
*******************************************************************************/

defined('OK') or die();
?>
<div id="utilidades_superior">
	<div id="navegacion">
<?php
echo PFN___('estasen').'&nbsp;';

$acum = '';
$partes = explode('/', $dir);

foreach ($partes as $k => $v) {
	if (!empty($v)) {
		$acum .= "$v/";

		if ($v == '.') {
			echo ' <a href="navega.php?'.PFN_cambia_url('dir','.',false).'">'.PFN___('comezo').'</a> /';
		} else {
			echo ' <a href="navega.php?'.PFN_cambia_url('dir',substr($acum,0,-1),false).'">'.$v.'</a> /';
		}
	}
}
?>
	</div>
	<?php if (!empty($menu_opc['buscador'])) { ?>
	<script type="text/javascript"><!--

	function envia_busca (obx_form) {
		obx_palabra = obx_form.palabra_buscar.value;

		if (obx_palabra == "" || obx_palabra == "<?php echo PFN___('busca'); ?>") {
			return false;
		}

		return true;
	}

	//--></script>
	<div id="buscador">
		<form id="busca_simple" action="<?php echo $menu_opc['buscador']; ?>" method="post" onsubmit="return envia_busca(this);">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<input type="hidden" name="campos_buscar[]" value="nome" />
		<input type="hidden" name="donde_buscar" value="2" />
		<input type="text" name="palabra_buscar" id="palabra_buscar" value="<?php echo PFN___('busca'); ?>" onfocus="this.value='';" />
		<input type="image" name="submit" src="<?php echo $PFN_conf->g('estilo'); ?>imx/buscar.png" style="border: 0;" />
		</fieldset>
		</form>
	</div>
	<?php } ?>
</div>
<br class="nada" />
