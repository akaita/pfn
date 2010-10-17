<?php
/****************************************************************************
* data/plantillas/arbore.inc.php
*
* plantilla para la visualización del árbol de directorios
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

defined("OK") or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo PFN___('accion').' &raquo; '.PFN___('arbore'); ?></h1></div>
	<div class="bloque_info" style="float: right;">
		<?php if ($PFN_vars->get('completo')) { ?>
			<a href="<?php echo PFN_quita_url('completo'); ?>"><?php echo PFN___('so_directorios'); ?></a>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			[<?php echo PFN___('arbore_completo'); ?>]
		<?php } else { ?>
			[<?php echo PFN___('so_directorios'); ?>]
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="<?php echo PFN_cambia_url('completo','true'); ?>"><?php echo PFN___('arbore_completo'); ?></a>
		<?php } ?>
	</div>

	<div class="bloque_info">
		<?php echo $PFN_arbore->cnt('dir').' '.PFN___('dirs'); ?>
		<?php if ($PFN_vars->get('completo')) { ?>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<?php echo $PFN_arbore->cnt('arq').' '.PFN___('arqs'); ?>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<?php echo PFN___('peso').' '.PFN_peso($PFN_arbore->cnt('peso')); ?>
		<?php } ?>
	</div>

	<div class="bloque_info"><?php echo $PFN_arbore->arbore_txt; ?></div>
</div>
