<style type="text/css">
		.toggler { width: 500px; height: 200px; }
		#effect { margin-top: 110px; margin-left: 180px; width: 240px; height: 135px; padding: 0.4em; position: relative; }
		#effect h3 { margin: 0; padding: 0.4em; text-align: center; }
		.ui-effects-transfer { border: 2px dotted gray; } 
</style>

<script type="text/javascript">
	$(function() {
		var selectedEffect = "pulsate";
		var options = {times: 10};
		//run the effect
		$("#effect").toggle(selectedEffect,options,3000);
	});
</script>

<div class="toggler">
	<div id="effect" class="ui-widget-content ui-corner-all">
		<h3 class="ui-widget-header ui-corner-all">Apartado en Construcción</h3>
		<p>
			En breve podra disponer de su contenido.
		</p>
	</div>
</div>