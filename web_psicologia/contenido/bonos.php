<!--Modulo de Bonos Descuento -->
<p id="titpag">
	Bonos
</p>
<div id="conten">
	<table class="bonotab">
		<tbody><tr>
			<td class="bonocab">
				<p class="bonotit">Modalidad <b>A Distancia</b></p>
				<div class="bonotxt">
					<div class="bononum">»&nbsp;10 sesiones<span style="font-size: 10px;">&nbsp;[Ref:AD10]</span></div><div class="bonopri">550 €</div><br>
					<p onclick="goCart(this.id);" id="AD10" class="bonobot">Solicitar este bono ¡ AHORA !</p>
				</div>
				<div class="bonotxt">
					<div class="bononum">»&nbsp;15 sesiones<span style="font-size: 10px;">&nbsp;[Ref:AD15]</span></div><div class="bonopri">800 €</div><br>
					<p onclick="goCart(this.id);" id="AD15" class="bonobot">Solicitar este bono ¡ AHORA !</p>
				</div>
			</td>
			<td style="width: 50px;"></td>
			<td class="bonocab">
				<p class="bonotit">Modalidad <b>Presencial</b></p>
				<div class="bonotxt">
					<div class="bononum">»&nbsp;10 sesiones<span style="font-size: 10px;">&nbsp;[Ref:PR10]</span></div><div class="bonopri">800 €</div><br>
					<p onclick="goCart(this.id);" id="PR10" class="bonobot">Solicitar este bono ¡ AHORA !</p>
				</div>
				<div class="bonotxt">
					<div class="bononum">»&nbsp;15 sesiones<span style="font-size: 10px;">&nbsp;[Ref:PR15]</span></div><div class="bonopri">1.200 €</div><br>
					<p onclick="goCart(this.id);" id="PR15" class="bonobot">Solicitar este bono ¡ AHORA !</p>
				</div>
			</td>
		</tr>
	</tbody></table>
	<div class="bonomsg">
		Los bonos de sesiones ponen a tu disposición unas tarifas más ajustadas sobre la base de la continuidad en el <span class="boldi">PCP</span>.
		Estos bonos deben ser utilizados solo por una única persona, y no existe la posibilidad de traspasarlos a otras personas <span style="font-size: 75%; color: rgb(187, 187, 187);">(excepto en un caso - ver normas en el enlace inferior)</span>.
		<p style="text-align: right; font-size: 95%;">[ Si quieres saber más sobre el funcionamiento de los bonos y sus condiciones de utilización&nbsp;<a target="_blank" href="index.php?itemid=73">Pulsa aqui</a>&nbsp;&nbsp;]</p>
	</div>
</div>
<script type="text/javascript">
	function goCart(bid)
	{
		setCookie("Bonoid", bid, caduca);
		document.location.href='index.php?itemid=66';
	}
</script>
<!--Fin del Modulo de Bonos Descuento -->