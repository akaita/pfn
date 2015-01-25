<?php
/****************************************************************************
* instalar/plantillas/pe.inc.php
*
* plantilla para la visualización del pie de página del instalador
*******************************************************************************/

defined('OK') or die();
?>
	</div>
	<br class="nada" />
</div>
<!--

Tempos de execucion:

<?php echo $PFN_tempo->dump(); ?>

//-->
<div id="pe_i">
	<div id="pe_texto"><a href="http://pfn.sourceforge.net/" onclick="window.open(this.href, '_blank'); return false"><?php echo PFN___('PFN').'</a> - '.PFN___('tempo_execucion').': '.$PFN_tempo->total().' '.PFN___('segundos'); ?></div>
</div>
</body>
</html>
