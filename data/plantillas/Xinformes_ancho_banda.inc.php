<?php
/****************************************************************************
* data/plantillas/Xinformes_ancho_banda.inc.php
*
* plantilla para la visualización del informe sobre el ancho de banda usado
* por los usuarios
*

PHPfileNavigator versión 2.1.0

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net/

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
términos de la Licencia Pública General de GNU según es publicada por la Free
Software Foundation, bien de la versión 2 de dicha Licencia o bien (según su
elección) de cualquier versión posterior. 

Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA
GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la
CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de
GNU para más detalles. 

Debería haber recibido una copia de la Licencia Pública General junto con este
programa. Si no ha sido así, escriba a la Free Software Foundation, Inc., en
675 Mass Ave, Cambridge, MA 02139, EEUU. 
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
