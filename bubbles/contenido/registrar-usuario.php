<script type="text/javascript" src="jquery-fancybox/js/jquery.fancybox-1.2.1.js"></script>
<link rel="stylesheet" href="jquery-fancybox/fancybox.css" type="text/css" media="screen">
<script type="text/javascript">
$(document).ready(function(){
	//$("a.terminos").fancybox();	//No andan en IE
	$("#registrarForm").validate({
		errorLabelContainer: $(".borde-reg-usuario .contenedor-advertencias"),	//DIV Contenedor de errores de REGISTRO}
		wrapper: 'p',										//TAG separador entre ERROR y ERROR. Aqui se utiliza como lista y retorno de carro.
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
				required: '* Debe introducir su Usuario',
				minlength: '* Su Usuario no puede tener menos de 2 caracteres',
				remote: '* Su Usuario ya se encuentra registrado, por favor escoja otro'
			},
			fuContrasenia: {
				required: '* Debe introducir una contraseña',
				minlength: '* Su contraseña debe tener por lo menos 6 caracteres'
			},
			fuVerificarContrasenia: {
				required: '',
				minlength: '',
				equalTo: '* Sus Contraseñas introducidas no coinciden'
			},
			fuPreguntaSecreta: ' ',
			fuRespuestaSecreta: ' ',
			fuSeguridad: '* El texto copiado de la Imagen es incorrecto',
			fuEmail: ' ',//"Introduzca una dirección de correo válida",
			fuSexo: ' ',
			fuPaisResidencia: ' ',
			fuProfesion1: ' ',
			fuNivelProfesion: ' ',
			fuAceptoTerminos: '* Debe Aceptar nuestros TERMINOS y CONDICIONES',
			fuNacimiento: '* Su Fecha de Nac. tiene un formato incorrecto (un ejemplo correcto seria: 24/11/2001)'
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
	
	$("#fuAlias").blur(function() {
	if($("#fuAlias").val() != ''){
		var RegExPattern = /^[a-zA-Z0-9\-\S]{2,16}$/;
		var errorMessage = 'El Alias no admite caracteres especiales como & o <>, ni espacios en blanco.';
		if (($("#fuAlias").val().match(RegExPattern))) {
		} else {
			alert(errorMessage);
		}
	}
	});
	
	$("#fuContrasenia").blur(function() {
	if($("#fuContrasenia").val() != ''){
		var RegExPattern = /^[a-zA-Z0-9\-\S]{2,16}$/;
		var errorMessage = 'La Contraseña no admite caracteres especiales como & o <>, ni espacios en blanco.';
		if (($("#fuContrasenia").val().match(RegExPattern))) {
		} else {
			alert(errorMessage);
		}
	}
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
		<div style="margin-top: 30px;">
			<div class="usuario">
				<p><strong>*Usuario</strong></p>
				<p><input type="text" name="fuAlias" id="fuAlias" value="<?php echo $fiAlias; ?>"/></p>
			</div>
			<div class="contrasenia">
				<p><strong>*Contraseña</strong></p>
				<p><input type="password" name="fuContrasenia" id="fuContrasenia" value="<?php echo $fiContrasenia; ?>"/></p>
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
			<div class="linea-1">
			</div>
			
			<table class="tabla-registro-3">
			<tbody>
			<tr>
				<th>Empresa</th><th>*E-mail</th><th>*Sexo</th><th>*Pais</th>
			</tr>
			<tr>
				<td><input type="text" name="fuEmpresa" id="fuEmpresa" /></td>
				<td><input type="text" name="fuEmail" id="fuEmail" value="<?php echo $fiEmail; ?>"/></td>
				<td><select name="fuSexo" id="fuSexo" >
					<?php listar_options($OPCIONES_SEXO);?>
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
					<?php listar_options($OPCIONES_PROFESIONES);?>
					</select>
				</td>
				<td><select name="fuProfesion2" id="fuProfesion2" >
					<?php listar_options($OPCIONES_PROFESIONES);?>
					</select>
				</td>
				<td><select name="fuProfesion3" id="fuProfesion3" >
					<?php listar_options($OPCIONES_PROFESIONES);?>
					</select>
				</td>
				<td>
					<select name="fuNivelProfesion" id="fuNivelProfesion">
					<?php listar_options($OPCIONES_NIVEL_PROFESION);?>
					</select>
				</td>
			</tr>
			</tbody>
			</table>
		</div>
		<div class="inferior-reg-usuario">
				<p><input type="checkbox" name="fuDeseaNews" id="fuDeseaNews" value="Si" />Deseo suscribirme a la lista de correo de Newsletters y eventos</p>
				<p><input type="checkbox" name="fuDeseaLaborales" id="fuDeseaLaborales" value="Si" />Deseo suscribirme a la lista de correo de Ofertas laborales</p>
				<p><input type="checkbox" name="fuDeseaProfesionales" id="fuDeseaProfesionales" value="Si" />Deseo suscribirme a la lista de Capacitaciones y cursos para profesionales</p>
				<p><input type="checkbox" name="fuAceptoTerminos" id="fuAceptoTerminos" value="Si" />Acepto los <a class="terminos" href="<?php echo URL_BASE ?>terminos.html">Terminos y Condiciones</a> de Bubbles</p>
				<p><img src="includes/genera_img.php" id="fuGeneraImg" />Ingrese el texto de la imagen:<input type="text" name="fuSeguridad" id="fuSeguridad" /></p>
				<input type="hidden" name="fuStatus" value="" id="fuStatus" />
				<input type="hidden" name="paso1" value="paso1" />
		</div>
		<div style="clear: both;"></div>
		<div class="contenedor-advertencias">
		</div>
		<div class="enviar-reg">
			<p class="al-medio"><input type="submit" class="boton1" value="Enviar" name="paso1" /></p>
		</form>
		</div>
		<div style="clear: both;"></div>
		<div class="pie-reg-usuario">
		</div>
</div>