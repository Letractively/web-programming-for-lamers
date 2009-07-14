<script type="text/javascript">
$(document).ready(function(){
	$("#registrarForm").validate({
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
			feEmailUsuario: {
				required: true,
				email: true
			},
			feEmailUsuario: {
				required: true,
				email: true
			},
			feNacimientoUsuario: {
				required: true,
				date: true,
				rangelength: [10, 10]
			},
			fePuestoUsuario: "required",
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
				required: "Introduzca un Alias (Usuario)",
				minlength: "Su Alias debe tener al menos dos letras",
				remote: "Este Alias ya esta en uso, escoja otro"
			},
			feContraseniaUsuario: {
				required: "Introduzca una Contraseña",
				minlength: "Su contraseña debe tener por lo menos 5 caracteres"
			},
			feVerificarContraseniaUsuario: {
				required: "Introduzca una Contraseña",
				minlength: "Su contraseña debe tener por lo menos 5 caracteres",
				equalTo: "Su contraseña no coincide con la anterior"
			},
			feSeguridad: "El texto introducido es invalido",
			feEmailUsuario: "Introduzca una dirección de correo válida",
			feAceptoTerminos: "Por favor, acepte nuestros Terminos y Condiciones",
			feNacimientousuario: "Ingrese una fecha válida de naciniemto (Ej: 25/11/1991)"
			}
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

<style type="text/css">
#registrarForm label.error {
	margin-left: 10px;
	width: auto;
	display: inline;
	color: #FF0000;
}
</style>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="cmxform" id="registrarForm">
<p>Usuario</p>
<input type="text" name="feAliasUsuario" id="feAliasUsuario" />
<p>Contraseña</p>
<input type="password" name="feContraseniaUsuario" id="feContraseniaUsuario" />
<p>Repetir Contraseña</p>
<input type="password" name="feVerificarContraseniaUsuario" id="feVerificarContraseniaUsuario" />
<p>Pregunta secreta</p>
<input type="text" name="fePreguntaSecretaUsuario" id="fePreguntaSecretaUsuario" />
<p>Respuesta</p>
<input type="text" name="feRespuestaSecretaUsuario" id="feRespuestaSecretaUsuario" />
<p>Nombre o Razón Social</p>
<input type="text" name="feRazonSocial" id="feRazonSocial" />
<p>Domicilio legal</p>
<input type="text" name="feCalle" id="feCalle" />
<p>Número</p>
<input type="text" name="feAltura" id="feAltura" />
<p>Piso</p>
<input type="text" name="fePiso" id="fePiso" />
<p>Oficina</p>
<input type="text" name="feOficina" id="feOficina" />
<p>Fecha de Nacimiento</p>
<input type="text" name="feNacimientoUsuario" id="feNacimientoUsuario" />
<p>e-mail</p>
<input type="text" name="feEmailUsuario" id="feEmailUsuario" />
<p>Sexo</p>
<select name="feSexoUsuario" id="feSexoUsuario">
<option value=""></option>
<option value="Masculino">Masculino</option>
<option value="Femenino">Femenino</option>
</select>
<p>Pais</p>
<input type="text" name="fePais" id="fePais" />
<p>Ciudad</p>
<input type="text" name="feCiudad" id="feCiudad" />
<p>Cargo</p>
<select name="fePuestoUsuario" id="fePuestoUsuario" >
<option value=""></option>
<option value="Trainee">Trainee</option>
<option value="Ssr">Ssr</option>
<option value="Sr">Sr</option>
</select>
<p>Cod. Area</p>
<input type="text" name="fePrefijoUsuario" id="fePrefijoUsuario" />
<p>Tel. Particular</p>
<input type="text" name="feTelUsuario" id="feTelUsuario" />
<p><input type="checkbox" name="feDeseaNews" id="feDeseaNews" />Deseo suscribirme a la lista de correo de Newsletters y eventos</p>
<p><input type="checkbox" name="feDeseaLaborales" id="feDeseaLaborales" />Deseo suscribirme a la lista de correo de Ofertas Laborales</p>
<p><input type="checkbox" name="feDeseaProfesionales" id="feDeseaProfesionales" />Deseo suscribirme a la lista de Capacitaciones y cursos para profesionales</p>
<p><input type="checkbox" name="feAceptoTerminos" id="feAceptoTerminos" />Acepto los Terminos y Condiciones de Bubbles:</p>
<p><img src="includes/genera_img.php" id="feGeneraImg" /></p>
<p>Ingrese el texto visto en la imagen superior:<input type="text" name="feSeguridad" id="feSeguridad" /></p>


<input type="hidden" name="feStatus" value="" id="feStatus" />
<input type="submit" value="Enviar" name="paso1" />
</form>