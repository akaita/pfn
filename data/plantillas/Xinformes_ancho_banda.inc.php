<?php
/****************************************************************************
* data/plantillas/Xinformes_ancho_banda.inc.php
*
* plantilla para la visualización del informe sobre el ancho de banda usado
* por los usuarios
*******************************************************************************/

defined('OK') && defined('XESTION') or die();
?>
				<strong><?php echo PFN___('Xdesc_ancho_banda'); ?></strong><br /><br />
					<div style="text-align: center;">
					<select name="ab_mes" id="ab_mes">
						<?php
						foreach (array(1,2,3,4,5,6,7,8,9,10,11,12) as $num) {
							echo '<option value="'.$num.'" '.(($num == $ab_mes)?'selected="selected"':'').'>'.PFN___('meses_'.sprintf('%02d', $num)).'</option>';
						}
						?>
					</select>
					<select name="ab_ano" id="ab_ano" style="margin-left: 10px;">
						<?php for ($i = date('Y'); $i >= (date('Y') - 2); $i--) { ?>
						<option value="<?php echo $i; ?>"<?php echo ($i == $ab_ano)?' selected="selected"':''; ?>><?php echo $i; ?></option>
						<?php } ?>
					</select>
					</div>
