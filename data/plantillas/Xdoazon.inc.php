<?php
/****************************************************************************
* data/plantillas/Xdoazon.inc.php
*
* plantilla para la visualización de la pantalla de donaciones
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('xestion').' &raquo; '.PFN___('Xm_doazon'); ?></h1></div>
	<div class="bloque_info">
		<div id="resumo_dir">
			<?php echo PFN___('Xm_doazon_texto'); ?>
			<br /><br />

			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=10&amp;type=0" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/paypal.png" alt="[<?php echo $doar_paypal; ?> $10]" /><br /><?php echo $doar; ?> $10</a>
			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=20&amp;type=0" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/paypal.png" alt="[<?php echo $doar_paypal; ?> $20]" /><br /><?php echo $doar; ?> $20</a>
			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=30&amp;type=0" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/paypal.png" alt="[<?php echo $doar_paypal; ?> $30]" /><br /><?php echo $doar; ?> $30</a>
			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=50&amp;type=0" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/paypal.png" alt="[<?php echo $doar_paypal; ?> $50]" /><br /><?php echo $doar; ?> $50</a>
			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=100&amp;type=0" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/paypal.png" alt="[<?php echo $doar_paypal; ?> $100]" /><br /><?php echo $doar; ?> $100</a>
			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=150&amp;type=0" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/paypal.png" alt="[<?php echo $doar_paypal; ?> $150]" /><br /><?php echo $doar; ?> $150</a>
			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=200&amp;type=0" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/paypal.png" alt="[<?php echo $doar_paypal; ?> $200]" /><br /><?php echo $doar; ?> $200</a>

			<br class="nada" />

			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=10&amp;type=1" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/tarxeta_credito.png" alt="[<?php echo $doar_tarxeta; ?> $10]" /><br /><?php echo $doar; ?> $10</a>
			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=20&amp;type=1" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/tarxeta_credito.png" alt="[<?php echo $doar_tarxeta; ?> $20]" /><br /><?php echo $doar; ?> $20</a>
			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=30&amp;type=1" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/tarxeta_credito.png" alt="[<?php echo $doar_tarxeta; ?> $30]" /><br /><?php echo $doar; ?> $30</a>
			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=50&amp;type=1" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/tarxeta_credito.png" alt="[<?php echo $doar_tarxeta; ?> $50]" /><br /><?php echo $doar; ?> $50</a>
			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=100&amp;type=1" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/tarxeta_credito.png" alt="[<?php echo $doar_tarxeta; ?> $100]" /><br /><?php echo $doar; ?> $100</a>
			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=150&amp;type=1" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/tarxeta_credito.png" alt="[<?php echo $doar_tarxeta; ?> $150]" /><br /><?php echo $doar; ?> $150</a>
			<a href="https://sourceforge.net/donate/index.php?group_id=142312&amp;amt=200&amp;type=1" onclick="window.open(this.href); return false" class="subcontido" style="text-align: center"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/tarxeta_credito.png" alt="[<?php echo $doar_tarxeta; ?> $200]" /><br /><?php echo $doar; ?> $200</a>
			<br class="nada" />
		</div>
	</div>
</div>
