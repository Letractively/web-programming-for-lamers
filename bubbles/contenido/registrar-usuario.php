<script type="text/javascript">
$(document).ready(function(){
	$("#registrarForm").validate({
		//errorElement: "em",								//TAG que sera agregado en caso de cotejar un ERROR.
		success: function(label) {						//En caso de SUCCESS del INPUT adhiere la class="success" a <label /> y asi
			//label.text("ok!").addClass("success");	//obtenemos el circulito azul.
			label.addClass("success");
		},
		rules: {										//REGLAS para validar el FORM
			fuNombres: "required",
			fuApellidos: "required",
			fuAlias: {
				required: true,
				minlength: 2,
				remote: {
					url: "includes/consulta_segura.php",
					type: "GET",
					data: {id : "<?php echo $_SESSION['id_consulta'] ?>"}
					}
			},
			fuContrasenia: {
				required: true,
				minlength: 5
			},
			fuVerificarContrasenia: {
				required: true,
				minlength: 5,
				equalTo: "#fuContrasenia"
			},
			fuPreguntaSecreta: {
				required: true
			},
			fuRespuestaSecreta: {
				required: true
			},
			fuEmail: {
				required: true,
				email: true
			},
			fuSexo: {
				required: true
			},
			fuPaisResidencia: {
				required: true
			},
			fuProfesion1: {
				required: true
			},
			fuNivelProfesion: {
				required: true
			},
			fuSeguridad: {
				required: true,
				remote: "includes/validar_capcha.php"
			},
			fuAceptoTerminos: "required",
			fuNacimiento: {
				required: true,
				date: true,
				rangelength: [10, 10]
			}
		},
		messages: {										//Cambia los MENSAJES de VALIDACION, o los anula, dependiendo de lo que se ponga
			fuNombres: ' ',//"Introduzca un Nombre",
			fuApellidos: ' ',//"Intrudosca un Apellido",
			fuAlias: {
				required: ' ',//"Introduzca un Alias (Usuario)",
				minlength: ' ',//"Su Alias debe tener al menos dos letras",
				remote: ' '//"Este Alias ya esta en uso, escoja otro"
			},
			fuContrasenia: {
				required: ' ',//"Introduzca una Contraseña",
				minlength: ' '//"Su contraseña debe tener por lo menos 5 caracteres"
			},
			fuVerificarContrasenia: {
				required: ' ',//"Introduzca una Contraseña",
				minlength: ' ',//"Su contraseña debe tener por lo menos 5 caracteres",
				equalTo: ' '//"Su contraseña no coincide con la anterior"
			},
			fuPreguntaSecreta: ' ',
			fuRespuestaSecreta: ' ',
			fuSeguridad: ' ',//"El texto introducido es invalido",
			fuEmail: ' ',//"Introduzca una dirección de correo válida",
			fuSexo: ' ',
			fuPaisResidencia: ' ',
			fuProfesion1: ' ',
			fuNivelProfesion: ' ',
			fuAceptoTerminos: ' ',//"Por favor, acepte nuestros Terminos y Condiciones",
			fuNacimiento: ' '//"Ingrese una fecha válida de naciniemto (Ej: 25/11/1991)"
		},
		onkeyup: false		//EVITA QUE LOS DATOS SE COTEJEN AL SOLTAR CADA LETRA!!! IMPRESCINDIBLE, evita trafico AJAX!
	});
	
	// propose username by combining first- and lastname
	$("#fuAlias").focus(function() {
		var firstname = $("#fuNombres").val();
		var lastname = $("#fuApellidos").val();
		if(firstname && lastname && !this.value) {
			this.value = firstname + "_" + lastname;
		}
	});
	
	// check if confirm password is still valid after password changed
	$("#fuContrasenia").blur(function() {
		$("#fuVerificarContrasenia").valid();
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

<div class="borde-reg-usuario">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="registro" id="registrarForm">
		<div class="superior-reg-usuario">
			<div class="usuario">
				<p><strong>*Usuario</strong></p>
				<p><input type="text" name="fuAlias" id="fuAlias" /></p>
			</div>
			<div class="contrasenia">
				<p><strong>*Contraseña</strong></p>
				<p><input type="password" name="fuContrasenia" id="fuContrasenia" /></p>
			</div>
			<div class="repetir-contrasenia">
				<p><strong>*Repetir Contraseña</strong></p>
				<p><input type="password" name="fuVerificarContrasenia" id="fuVerificarContrasenia" /></p>
			</div>
			<div class="pregunta-secreta">
				<p><strong>*Pregunta Secreta</strong></p>
				<p><input type="text" name="fuPreguntaSecreta" id="fuPreguntaSecreta" /></p>
			</div>
			<div class="respuesta">
				<p><strong>*Respuesta</strong></p>
				<p><input type="text" name="fuRespuestaSecreta" id="fuRespuestaSecreta" /></p>
			</div>
		</div>
		<div class="interior-reg-usuario">
			<table class="tabla-registro-2">
			<tbody>
			<tr>
				<th>*Nombre</th><th>Apellido</th><th>*Fecha de Nac.</th>
			</tr>
			<tr>
				<td><input type="text" name="fuNombres" id="fuNombres" /></td>
				<td><input type="text" name="fuApellidos" id="fuApellidos" /></td>
				<td><input type="text" name="fuNacimiento" id="fuNacimiento" /></td>
			</tr>
			<tr>
				<th></th><th></th><th>DD / MM / AAAA</th>
			</tr>
			</tbody>
			</table>
			<div class="linea-1"></div>
			
			<table class="tabla-registro-3">
			<tbody>
			<tr>
				<th>Empresa</th><th>*E-mail</th><th>*Sexo</th><th>*Pais</th>
			</tr>
			<tr>
				<td><input type="text" name="fuEmpresa" id="fuEmpresa" /></td>
				<td><input type="text" name="fuEmail" id="fuEmail" /></td>
				<td><select name="fuSexo" id="fuSexo" >
					<option value=""></option>
					<option value="Masculino">Masculino</option>
					<option value="Femenino">Femenino</option>
					</select></td>
				<td><input type="text" name="fuPaisResidencia" id="fuPaisResidencia" /></td>
			</tr>
			</tbody>
			</table>
			<div class="linea-1"></div>			
			<table class="tabla-registro-4">
			<tbody>
			<tr>
				<th>*Profesion</th><th>Profesion 2</th><th>Profesion 3</th><th>*Nivel</th>
			</tr>
			<tr>
				<td><select name="fuProfesion1" id="fuProfesion1" >
					<option value=""></option>
					<option value="Diseñador">Diseñador</option>
					<option value="Desarrollador">Desarrollador</option>
					<option value="Programador">Programador</option>
					</select>
				</td>
				<td><select name="fuProfesion2" id="fuProfesion2" >
					<option value=""></option>
					<option value="Diseñador">Diseñador</option>
					<option value="Desarrollador">Desarrollador</option>
					<option value="Programador">Programador</option>
					</select>
				</td>
				<td><select name="fuProfesion3" id="fuProfesion3" >
					<option value=""></option>
					<option value="Diseñador">Diseñador</option>
					<option value="Desarrollador">Desarrollador</option>
					<option value="Programador">Programador</option>
					</select>
				</td>
				<td>
					<select name="fuNivelProfesion" id="fuNivelProfesion">
					<option value=""></option>
					<option value="Trainee">Trainee</option>
					<option value="Ssr">Ssr</option>
					<option value="Sr">Sr</option>
					</select>
				</td>
			</tr>
			</tbody>
			</table>
			
			<!--<tr>
				<td colspan="2"><input type="submit" class="boton1" name="submit" value="Ingresar" /></td>
			</tr>-->
			</div>
		<div class="inferior-reg-usuario">
				<p><input type="checkbox" name="fuDeseaNews" id="fuDeseaNews" value="Si" />Deseo suscribirme a la lista de correo de Newsletters y eventos</p>
				<p><input type="checkbox" name="fuDeseaLaborales" id="fuDeseaLaborales" value="Si" />Deseo suscribirme a la lista de correo de Ofertas laborales</p>
				<p><input type="checkbox" name="fuDeseaProfesionales" id="fuDeseaProfesionales" value="Si" />Deseo suscribirme a la lista de Capacitaciones y cursos para profesionales</p>
				<p><input type="checkbox" name="fuAceptoTerminos" id="fuAceptoTerminos" value="Si" />Acepto los Terminos y Condiciones de Bubbles</p>
				<p><img src="includes/genera_img.php" id="fuGeneraImg" />Ingrese el texto de la imagen:<input type="text" name="fuSeguridad" id="fuSeguridad" /></p>
				<input type="hidden" name="fuStatus" value="" id="fuStatus" />
				<p class="al-medio"><input type="submit" value="Enviar" name="paso1" /></p>
		</div>
	</form>
</div>

<!--
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="registro" id="registrarForm">
<p>Usuario</p>
<input type="text" name="fuAlias" id="fuAlias" />
<p>Contraseña</p>
<input type="password" name="fuContrasenia" id="fuContrasenia" />
<p>Repetir Contraseña</p>
<input type="password" name="fuVerificarContrasenia" id="fuVerificarContrasenia" />
<p>Pregunta Secreta</p>
<input type="text" name="fuPreguntaSecreta" id="fuPreguntaSecreta" />
<p>Respuesta Secreta</p>
<input type="text" name="fuRespuestaSecreta" id="fuRespuestaSecreta" />
<p>Nombres</p>
<input type="text" name="fuNombres" id="fuNombres" />
<p>Apellidos</p>
<input type="text" name="fuApellidos" id="fuApellidos" />
<p>Fecha de Nacimiento</p>
<input type="text" name="fuNacimiento" id="fuNacimiento" />
<p>Empresa</p>
<input type="text" name="fuEmpresa" id="fuEmpresa" />
<p>dirección de e-mail</p>
<input type="text" name="fuEmail" id="fuEmail" />
<p>Sexo</p>
<select name="fuSexo" id="fuSexo" >
<option value=""></option>
<option value="Masculino">Masculino</option>
<option value="Femenino">Femenino</option>
</select>
<p>Pais de Residencia</p>
<input type="text" name="fuPaisResidencia" id="fuPaisResidencia" />
<p>Profesión</p>
<select name="fuProfesion1" id="fuProfesion1" >
<option value=""></option>
<option value="Diseñador">Diseñador</option>
<option value="Desarrollador">Desarrollador</option>
<option value="Programador">Programador</option>
</select>
<p>Profesión 2</p>
<select name="fuProfesion2" id="fuProfesion2" >
<option value=""></option>
<option value="Diseñador">Diseñador</option>
<option value="Desarrollador">Desarrollador</option>
<option value="Programador">Programador</option>
</select>
<p>Profesión 3</p>
<select name="fuProfesion3" id="fuProfesion3">
<option value=""></option>
<option value="Diseñador">Diseñador</option>
<option value="Desarrollador">Desarrollador</option>
<option value="Programador">Programador</option>
</select>
<p>Nivel</p>
<select name="fuNivelProfesion" id="fuNivelProfesion">
<option value=""></option>
<option value="Trainee">Trainee</option>
<option value="Ssr">Ssr</option>
<option value="Sr">Sr</option>
</select>
<p><input type="checkbox" name="fuDeseaNews" id="fuDeseaNews" value="Si" />Deseo suscribirme a la lista de correo de Newsletters y eventos</p>
<p><input type="checkbox" name="fuDeseaLaborales" id="fuDeseaLaborales" value="Si" />Deseo suscribirme a la lista de correo de Ofertas laborales</p>
<p><input type="checkbox" name="fuDeseaProfesionales" id="fuDeseaProfesionales" value="Si" />Deseo suscribirme a la lista de Capacitaciones y cursos para profesionales</p>
<p><input type="checkbox" name="fuAceptoTerminos" id="fuAceptoTerminos" value="Si" />Acepto los Terminos y Condiciones de Bubbles</p>


<p><img src="includes/genera_img.php" id="fuGeneraImg" /></p>
<p>Ingrese el texto visto en la imagen superior</p>
<input type="text" name="fuSeguridad" id="fuSeguridad" />
<input type="hidden" name="fuStatus" value="" id="fuStatus" />

<p><input type="submit" value="Enviar" name="paso1" /></p>
</form>-->