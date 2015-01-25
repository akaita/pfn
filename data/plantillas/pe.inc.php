<?php
/****************************************************************************
* data/plantillas/pe.inc.php
*
* plantilla para la visualizaci�n del pie de p�gina
*******************************************************************************/

defined('OK') or die();

if (is_object($PFN_clases)) {
	$PFN_clases->desconectar();
}
?>
	<div id="pe_separador"></div>
</div>
<div id="pe">
	<?php if ($PFN_conf->g('usuario','descargas_maximo') || $PFN_conf->g('raiz','peso_maximo')) { ?>
	<table id="pe_utiles" summary="">
		<tr>
			<?php if ($PFN_conf->g('raiz','peso_maximo') > 0) { ?>
			<td>
				&nbsp;<?php echo PFN___('peso_restante').': <strong>'.PFN_peso($PFN_conf->g('raiz','peso_maximo') - $PFN_conf->g('raiz','peso_actual')); ?></strong>
				<?php
				$libre = intval((($PFN_conf->g('raiz','peso_maximo') - $PFN_conf->g('raiz','peso_actual')) / $PFN_conf->g('raiz','peso_maximo')) * 100);
				$cor_libre = ($libre > 50)?'0C0':(($libre > 25)?'FC6':(($libre > 10)?'F60':'F00'));
				?>
				<br /><div style="border: 1px solid #000; width: <?php echo $libre; ?>%; background-color: #<?php echo $cor_libre; ?>; font-weight: bold;"><?php echo $libre; ?>%</div>
			</td>
			<?php } if ($PFN_conf->g('usuario','descargas_maximo') > 0) { ?>
			<td>
				&nbsp;<?php echo PFN___('descargas_restante').': <strong>'.PFN_peso($PFN_conf->g('usuario','descargas_maximo') - $PFN_conf->g('usuario','descargas_actual')); ?></strong>
				<?php
				$libre = intval((($PFN_conf->g('usuario','descargas_maximo') - $PFN_conf->g('usuario','descargas_actual')) / $PFN_conf->g('usuario','descargas_maximo')) * 100);
				$cor_libre = ($libre > 50)?'0C0':(($libre > 25)?'FC6':(($libre > 10)?'F60':'F00'));
				?>
				<br /><div style="border: 1px solid #000; width: <?php echo $libre; ?>%; background-color: #<?php echo $cor_libre; ?>; font-weight: bold;"><?php echo $libre; ?>%</div>
			</td>
		<?php } ?>
		</tr>
	</table>
	<?php } else { ?>
	<table id="pe_utiles" summary=""><tr><td style="border: 0;">&nbsp;</td></tr></table>
	<?php } ?>
	<div id="pe_texto"><a href="http://www.phpfilenavigator.com/" onclick="window.open(this.href, '_blank'); return false"><?php echo PFN___('PFN').'</a> - '.PFN___('tempo_execucion').': '.$PFN_tempo->total().' '.PFN___('segundos'); ?></div>
</div>
<!--

Tempos de execucion:

<?php echo $PFN_tempo->dump(); ?>

//-->
</body>
</html>
