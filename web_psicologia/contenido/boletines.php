<!--Modulo Boletines -->
<script src="scripts/md5.js" type="text/javascript"></script>
<script src="scripts/jcap.js" type="text/javascript"></script>
<p id="titpag">
	Boletines
</p>
<div id="conten">
	<div id="sefora">
		<table style="width: 98%; height: 420px; border-collapse: collapse; margin-top: 5px; margin-left: 10px;">
			<tbody><tr>
				<td style="width: 50%; height: 355px;">
					<p class="titul">Últimos Boletines</p>
					<ul>
						<li style="list-style: none outside none; width: 85%; background-color: rgb(204, 204, 204); padding-left: 5px; color: rgb(255, 255, 255);">2010</li>					
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_1007.htm">Julio/Agosto</a></li>	
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_1006.htm">Junio</a></li>	
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_1005.htm">Mayo</a></li>							
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_1004.htm">Abril</a></li>							
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_1003.htm">Marzo</a></li>	
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_1002.htm">Febrero</a></li>												
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_1001.htm">Enero</a></li>
						<br>													
						<li style="list-style: none outside none; width: 85%; background-color: rgb(204, 204, 204); padding-left: 5px; color: rgb(255, 255, 255);">2009</li>
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_0912.htm">Diciembre</a></li>						
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_0911.htm">Noviembre</a></li>								
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_0910.htm">Octubre</a></li>							
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_0909.htm">Septiembre</a></li>							
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_0907.htm">Julio/Agosto</a></li>							
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_0906.htm">Junio</a></li>						
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_0905.htm">Mayo</a></li>						
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_0904.htm">Abril</a></li>
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_0903.htm">Marzo</a></li>														
						<li style="margin-left: 30px;"><a target="_blank" href="docs/bltn_0902.htm">Febrero</a></li>						
					</ul>
				</td>
				<td style="padding-left: 10px; padding-right: 10px; width: 50%; border: 1px solid rgb(187, 187, 187);">
					<p style="text-align: center; background-color: rgb(221, 221, 221);">Formulario de suscripción</p>
					<form onsubmit="return jcap();" method="post" action="mail_snd.php" id="sigForm" name="sigForm">
						<input type="hidden" value="BOLE" name="refe">
						<input type="hidden" value="none" name="apel">
						<input type="hidden" value="none" name="gene">						
						<input type="hidden" value="none" name="fnac">
						<input type="hidden" value="none" name="locl">
						<input type="hidden" value="none" name="prov">
						<input type="hidden" value="none" name="obsv">						
						<table style="width: 100%; margin: 0pt auto; border-collapse: separate; border-spacing: 5px;">
							<tbody><tr><td style="height: 15px;"><div id="messval"></div></td></tr>
							<tr><td>Nombre</td></tr>
							<tr>
								<td class="resf"><input type="text" value="" name="nomb" style="width: 100%;"></td>
							</tr>
							<tr><td style="height: 5px;"></td></tr>									
							<tr><td>Correo electrónico</td></tr>
							<tr>								
								<td class="resf"><input type="text" value="" name="mail" style="width: 100%;"></td>
							</tr>
							<tr><td style="height: 5px;"></td></tr>
							<tr><td>Código de validación</td></tr>							
							<tr>								
								<td style="text-align: center;"><script type="text/javascript">sjcap();</script><img height="30" width="120" alt="" src="cimg/57.jpg">&nbsp;&nbsp;<input type="text" size="15" class="" name="uword" id="uword" style="vertical-align: top;"></td>
							</tr>
							<tr><td style="height: 5px;"></td></tr>
							<tr>
								<td style="text-align: right;"><input type="reset" value="Borrar" class="bot01">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Suscribir" onclick="return xalForm(this.form);" class="bot01"></td>
							</tr>
							<tr><td style="height: 20px; vertical-align: bottom;"><hr></td></tr>	
							<tr><td style="font-size: 80%;" class="tstim">El Boletín tiene una emisión mensual, coincidiendo con la mitad de cada mes. La forma para causar baja en este servicio se detalla en cada boletín.<br>Para una correcta recepción del boletín y para evitar los controles anti-spam, se recomienda incluir como <span style="font-style: italic;">'remitentes seguros'</span> los mensajes procedentes de <span style="text-decoration: underline;">asesorvital.es</span></td></tr>								
						</tbody></table>
					</form>
				</td>
			</tr>
		</tbody></table>
	</div>
</div>
<script type="text/javascript">
	//-------------------------------------------------------------------
	// Verifica campo por campo la validez de un formulario
	//-------------------------------------------------------------------
	function xalForm(formu)
	{

		rsul = true;
		$("#messval").text('');

		rsul = ValEmpty(formu.nomb,"Faltan datos en Nombre");
		rsul = ValEmpty(formu.mail,"Faltan datos en Correo electr"+ char(123) +"ico");
		rsul = ValEmail(formu.mail,"Correo electronico NO es correcto");
        rsul = ValCaptc("Codigo de validacion Incorrecto");
		return rsul;
	}
</script>
<!--Fin del Modulo Boletines -->