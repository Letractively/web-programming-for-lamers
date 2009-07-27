<script type="text/javascript">
$(document).ready(function(){
	$("#registrarForm").validate({
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
			fePiso: "required",
			feOficina: "required",
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
				required: '',
				minlength: '',
				remote: ''
			},
			feContraseniaUsuario: {
				required: '',
				minlength: ''
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
				equalTo: ''
			},
			feSeguridad: '',
			feEmailUsuario: '',
			feAceptoTerminos: '!!',
			feNacimientousuario: '',
			feRazonSocial: '',
			feCalle: '',
			feAltura: '',
			fePiso: '',
			feOficina: '',
			feNacimientoUsuario: '',
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

<style type="text/css">
#registrarForm label.error {
	margin-left: 10px;
	width: auto;
	display: inline;
	color: #FF0000;
}
</style>

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
	<div class="superior-form2">
	</div>
	<div class="form2-reg-empresa">
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
			<div class="linea-1">
			</div>
			
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
			<div class="linea-1">
			</div>			
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

	</div>
	<div class="inferior-form2">
	</div>
	<div class="form3-reg-empresa">
		<p><input type="checkbox" name="fuDeseaNews" id="fuDeseaNews" value="Si" />Deseo suscribirme a la lista de correo de Newsletters y eventos</p>
		<p><input type="checkbox" name="fuDeseaLaborales" id="fuDeseaLaborales" value="Si" />Deseo suscribirme a la lista de correo de Ofertas laborales</p>
		<p><input type="checkbox" name="fuDeseaProfesionales" id="fuDeseaProfesionales" value="Si" />Deseo suscribirme a la lista de Capacitaciones y cursos para profesionales</p>
		<p><input type="checkbox" name="fuAceptoTerminos" id="fuAceptoTerminos" value="Si" />Acepto los Terminos y Condiciones de Bubbles</p>
		<p><img src="includes/genera_img.php" id="fuGeneraImg" />Ingrese el texto de la imagen:<input type="text" name="fuSeguridad" id="fuSeguridad" /></p>
		<input type="hidden" name="fuStatus" value="" id="fuStatus" />
		<input type="hidden" name="paso1" value="paso1" />
	</div>
	<div class="contenedor-advertencias">
		<p>(contenedor-advertencias)</p>
	</div>
	<div class="enviar-reg">
		<p class="al-medio"><input type="submit" value="Enviar" name="paso1" /></p>
	</div>
	</form>
	<div class="inferior-reg-empresa">
	</div>
</div>


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
<select name="fePuestoUsuario" id="fePuestoUsuario" >
<option value=""></option>
<option value="Trainee">Trainee</option>
<option value="Ssr">Ssr</option>
<option value="Sr">Sr</option>
</select>
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
</form>