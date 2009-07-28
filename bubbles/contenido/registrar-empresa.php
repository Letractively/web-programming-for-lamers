<script type="text/javascript">
$(document).ready(function(){
	$("#registrarForm").validate({
		errorLabelContainer: $(".registrar-empresa .contenedor-advertencias"),	//DIV Contenedor de errores de REGISTRO}
		wrapper: 'li',										//TAG separador entre ERROR y ERROR. Aqui se utiliza como lista y retorno de carro.
		//errorElement: "em",								//TAG que sera agregado en caso de cotejar un ERROR.
		success: function(label) {						//En caso de SUCCESS del INPUT adhiere la class="success" a <label /> y asi
			//label.text("ok!").addClass("success");	//obtenemos el circulito azul.
			label.addClass("success");
		},
		rules: {
			feAliasUsuario: {
				required: true,
				minlength: 2,
				remote: {
					url: "includes/consulta_segura.php",
					type: "GET",
					data: {id : "<?php echo $_SESSION['id_consulta'] ?>"},
					}
			},
			feContraseniaUsuario: {
				required: true,
				minlength: 5
			},
			feVerificarContraseniaUsuario: {
				required: true,
				minlength: 5,
				equalTo: "#feContraseniaUsuario"
			},
			fePreguntaSecretaUsuario: {
				required: true
			},
			feRespuestaSecretaUsuario: {
				required: true
			},
			feEmailUsuario: {
				required: true,
				email: true
			},
			feEmailUsuario: {
				required: true,
				email: true
			},
			feSexoUsuario: "required",
			feNacimientoUsuario: {
				required: true,
				date: true,
				rangelength: [10, 10]
			},
			fePuestoUsuario: "required",
			fePrefijoUsuario: "required",
			feTelUsuario: {
				required: true,
				rangelength: [3, 18],
				number: true
			},
			feRazonSocial: "required",
			feCalle: "required",
			feAltura: {
				required: true,
				rangelength: [1, 18],
				number: true
			},
			fePais: "required",
			feCiudad: "required",
			feSeguridad: {
				required: true,
				remote: "includes/validar_capcha.php"
			},
			feAceptoTerminos: "required"
		},
		messages: {
			feAliasUsuario: {
				required: '* Debe introducir su Usuario',
				minlength: '* Su Usuario no puede tener menos de 2 caracteres',
				remote: '* Su Usuario ya se encuentra registrado, por favor escoja otro'
			},
			feContraseniaUsuario: {
				required: '* Debe introducir una contraseña',
				minlength: '* Su contraseña debe tener por lo menos 6 caracteres'
			},
			fePreguntaSecretaUsuario: {
				required: ''
			},
			feRespuestaSecretaUsuario: {
				required: ''
			},
			feVerificarContraseniaUsuario: {
				required: '',
				minlength: '',
				equalTo: '* Sus Contraseñas introducidas no coinciden'
			},
			feSeguridad: '* El texto copiado de la Imagen es incorrecto',
			feEmailUsuario: '',
			feAceptoTerminos: '* Debe Aceptar nuestros TERMINOS y CONDICIONES',
			feNacimientousuario: '',
			feRazonSocial: '',
			feCalle: '',
			feAltura: '',
			feNacimientoUsuario: '* Su Fecha de Nac. tiene un formato incorrecto (un ejemplo correcto seria: 24/11/2001)',
			feEmailUsuario: '',
			feSexoUsuario: '',
			fePais: '',
			feCiudad: '',
			fePuestoUsuario: '',
			fePrefijoUsuario: '',
			feTelUsuario: ''
			},
		onkeyup: false		//EVITA QUE LOS DATOS SE COTEJEN AL SOLTAR CADA LETRA!!! IMPRESCINDIBLE, evita trafico AJAX!
	});
	
	// propose username by combining first- and lastname
//	$("#feAliasUsuario").focus(function() {
//		var firstname = $("#feNombres").val();
//		var lastname = $("#feApellidos").val();
//		if(firstname && lastname && !this.value) {
//			this.value = firstname + "_" + lastname;
//		}
//	});
	
	// check if confirm password is still valid after password changed
	$("#feContraseniaUsuario").blur(function() {
		$("#feVerificarContraseniaUsuario").valid();
	});
	
//	//code to hide topic selection, disable for demo
//	var newsletter = $("#newsletter");
//	// newsletter topics are optional, hide at first
//	var inital = newsletter.is(":checked");
//	var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
//	var topicInputs = topics.find("input").attr("disabled", !inital);
//	// show when newsletter is checked
//	newsletter.click(function() {
//		topics[this.checked ? "removeClass" : "addClass"]("gray");
//		topicInputs.attr("disabled", !this.checked);
//	});
});
</script>


<div class="registrar-empresa">
	<div class="superior-reg-empresa">
		<div class="cabeza-munieco">
		</div>
		<div class="solapa-empresa">
		</div>
		<div class="solapa-profesional">
		</div>
	</div>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="registro" id="registrarForm">
	<div class="superior-form1">
	</div>
	<div class="form1-reg-empresa">
		<div class="usuario">
			<p><strong>*Usuario</strong></p>
			<p><input type="text" name="feAliasUsuario" id="feAliasUsuario" /></p>
		</div>
		<div class="contrasenia">
			<p><strong>*Contraseña</strong></p>
			<p><input type="password" name="feContraseniaUsuario" id="feContraseniaUsuario" /></p>
		</div>
		<div class="repetir-contrasenia">
			<p><strong>*Repetir Contraseña</strong></p>
			<p><input type="password" name="feVerificarContraseniaUsuario" id="feVerificarContraseniausuario" /></p>
		</div>
		<div class="pregunta-secreta">
			<p><strong>*Pregunta Secreta</strong></p>
			<p><input type="text" name="fePreguntaSecretaUsuario" id="fePreguntaSecretaUsuario" /></p>
		</div>
		<div class="respuesta">
			<p><strong>*Respuesta</strong></p>
			<p><input type="text" name="feRespuestaSecretaUsuario" id="feRespuestaSecretaUsuario" /></p>
		</div>
	</div>
	<div class="superior-form2">
	</div>
	<div class="form2-reg-empresa">
			<table class="tabla-registro-2">
			<tbody>
			<tr>
				<th>*Empresa</th><th>*Domicilio Legal</th><th>*Num.</th><th>Piso</th><th>Dpto.</th>
			</tr>
			<tr>
				<td><input type="text" name="feRazonSocial" id="feRazonSocial" /></td>
				<td><input type="text" name="feCalle" id="feCalle" /></td>
				<td><input type="text" name="feAltura" id="feAltura" /></td>
				<td><input type="text" name="fePiso" id="fePiso" /></td>
				<td><input type="text" name="feOficina" id="feOficina" /></td>
			</tr>
			</tbody>
			</table>
			<div class="linea-1">
			</div>
			
			<table class="tabla-registro-3">
			<tbody>
			<tr>
				<th>*Fecha de Nac.</th><th>*E-mail</th><th>*Sexo</th><th>*Pais</th>
			</tr>
			<tr>
				<td><input type="text" name="feNacimientoUsuario" id="feNacimientoUsuario" /></td>
				<td><input type="text" name="feEmailUsuario" id="feEmailUsuario" /></td>
				<td><select name="feSexoUsuario" id="feSexoUsuario">
					<option value=""></option>
					<option value="Masculino">Masculino</option>
					<option value="Femenino">Femenino</option>
					</select></td>
				<td><input type="text" name="fePais" id="fePais" /></td>
			</tr>
			<tr>
				<th>DD / MM / AAAA</th><th></th><th></th><th></th>
			</tr>
			</tbody>
			</table>
			<div class="linea-1">
			</div>			
			<table class="tabla-registro-4">
			<tbody>
			<tr>
				<th>*Ciudad</th><th></th><th>*Cod. Area</th><th>*Tel Particular</th>
			</tr>
			<tr>
				<td><input type="text" name="feCiudad" id="feCiudad" /></td>
				<td><input type="hidden" name="fePuestoUsuario" id="fePuestoUsuario" value="OBSOLETO"></td>
				<td><input type="text" name="fePrefijoUsuario" id="fePrefijoUsuario" /></td>
				<td><input type="text" name="feTelUsuario" id="feTelUsuario" /></td>
			</tr>
			</tbody>
			</table>

	</div>
	<div class="inferior-form2">
	</div>
	<div class="form3-reg-empresa">
		<p><input type="checkbox" name="feDeseaNews" id="feDeseaNews" value="Si" />Deseo suscribirme a la lista de correo de Newsletters y eventos</p>
		<p><input type="checkbox" name="feDeseaLaborales" id="feDeseaLaborales" value="Si" />Deseo suscribirme a la lista de correo de Ofertas laborales</p>
		<p><input type="checkbox" name="feDeseaProfesionales" id="feDeseaProfesionales" value="Si" />Deseo suscribirme a la lista de Capacitaciones y cursos para profesionales</p>
		<p><input type="checkbox" name="feAceptoTerminos" id="feAceptoTerminos" value="Si" />Acepto los Terminos y Condiciones de Bubbles</p>
		<p><img src="includes/genera_img.php" id="feGeneraImg" />Ingrese el texto de la imagen:<input type="text" name="feSeguridad" id="feSeguridad" /></p>
		<input type="hidden" name="feStatus" value="" id="feStatus" />
		<input type="hidden" name="paso1" value="paso1" />
	</div>
	<div class="contenedor-advertencias">
	</div>
	<div class="enviar-reg">
		<p class="al-medio"><input type="submit" value="Enviar" name="paso1" /></p>
	</div>
	</form>
	<div class="inferior-reg-empresa">
	</div>
</div>


<!--
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="registro" id="registrarForm">
<p>*Usuario</p>
<input type="text" name="feAliasUsuario" id="feAliasUsuario" />
<p>*Contraseña</p>
<input type="password" name="feContraseniaUsuario" id="feContraseniaUsuario" />
<p>*Repetir Contraseña</p>
<input type="password" name="feVerificarContraseniaUsuario" id="feVerificarContraseniaUsuario" />
<p>*Pregunta secreta</p>
<input type="text" name="fePreguntaSecretaUsuario" id="fePreguntaSecretaUsuario" />
<p>*Respuesta</p>
<input type="text" name="feRespuestaSecretaUsuario" id="feRespuestaSecretaUsuario" />
<p>*Empresa</p>
<input type="text" name="feRazonSocial" id="feRazonSocial" />
<p>*Domicilio legal</p>
<input type="text" name="feCalle" id="feCalle" />
<p>*Número</p>
<input type="text" name="feAltura" id="feAltura" />
<p>*Piso</p>
<input type="text" name="fePiso" id="fePiso" />
<p>*Oficina</p>
<input type="text" name="feOficina" id="feOficina" />
<p>*Fecha de Nac.</p>
<input type="text" name="feNacimientoUsuario" id="feNacimientoUsuario" />
<p>*E-mail</p>
<input type="text" name="feEmailUsuario" id="feEmailUsuario" />
<p>*Sexo</p>
<select name="feSexoUsuario" id="feSexoUsuario">
<option value=""></option>
<option value="Masculino">Masculino</option>
<option value="Femenino">Femenino</option>
</select>
<p>*País</p>
<input type="text" name="fePais" id="fePais" />
<p>*Ciudad</p>
<input type="text" name="feCiudad" id="feCiudad" />
<p>*Cargo</p>
<input type="hidden" name="fePuestoUsuario" id="fePuestoUsuario" value="OBSOLETO">
<p>*Cod. Area</p>
<input type="text" name="fePrefijoUsuario" id="fePrefijoUsuario" />
<p>*Tel. Particular</p>
<input type="text" name="feTelUsuario" id="feTelUsuario" />
<p><input type="checkbox" name="feDeseaNews" id="feDeseaNews" />Deseo suscribirme a la lista de correo de Newsletters y eventos</p>
<p><input type="checkbox" name="feDeseaLaborales" id="feDeseaLaborales" />Deseo suscribirme a la lista de correo de Ofertas Laborales</p>
<p><input type="checkbox" name="feDeseaProfesionales" id="feDeseaProfesionales" />Deseo suscribirme a la lista de Capacitaciones y cursos para profesionales</p>
<p><input type="checkbox" name="feAceptoTerminos" id="feAceptoTerminos" />Acepto los Terminos y Condiciones de Bubbles:</p>
<p><img src="includes/genera_img.php" id="feGeneraImg" /></p>
<p>Ingrese el texto visto en la imagen superior:<input type="text" name="feSeguridad" id="feSeguridad" /></p>


<input type="hidden" name="feStatus" value="" id="feStatus" />
<input type="submit" value="Enviar" name="paso1" />
</form> -->