<?php
///////////////////////////////////////////////////////////////////////////////
// Control y seguridad del visitante....
///////////////////////////////////////////////////////////////////////////////
if($visitante_es == 'no_identificado'){rebotar('no_identificado');}

$value_umPara = '';
$selected_umEntidad_profesional = '';
$selected_umEntidad_empresa = '';
$value_umAsunto = '';
//$value_umContenido = '';

///////////////////////////////////////////////////////////////////////////////
// PRIMERA VUELTA DE POSTs:
// Preparo los contenidos de los inputs, dependiendo si el mensaje es RE:
// de _visitante logueado, etc.... En caso de mensaje nuevo se dejan en
// blanco.
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////
//Para dejar un mensaje privado...
if(strstr($visitante_es,'_visitante')){
	$value_umPara = 'value="' . $visitado->alias . '"';
	$selected_umEntidad_profesional = 'selected="selected"';
}
///////////////////////////////////
//Para responder un mensaje visto en mi casilla...
if(isset($_POST['umResponder']) && (isset($_POST['id_mensaje_anterior']))){
	$mensaje_responder = new mensaje();
	$mensaje_responder->traerMensaje($_POST['id_mensaje_anterior']);
	echo $mensaje_responder->ultimo_error;
	$value_umPara = 'value="' . (mensaje::traerRemitente($mensaje_responder->desde_entidad, $mensaje_responder->id_desde)) . '"';
	//Elijo a la entidad que le voy a responder:
	if($mensaje_responder->desde_entidad == 'PROFESIONAL'){
		$selected_umEntidad_profesional = 'selected="selected"';
	}elseif($mensaje_responder->desde_entidad == 'EMPRESA'){
		$selected_umEntidad_empresa = 'selected="selected"';
	}
	$value_umAsunto = 'value="Re: ' . $mensaje_responder->titulo . '"';
	//$value_umContenido = 'value="respuesta"'; Hay que meterlo en una casilla creada por la inicializacion del MCE que NO esta presente en el script.
}

///////////////////////////////////
//Para ELIMINAR un mensaje visto en mi casilla...
if(isset($_POST['umEliminar']) && (isset($_POST['id_mensaje_anterior']))){
	$mensaje_eliminar = new mensaje();
	$mensaje_eliminar->borrarMensaje($_POST['id_mensaje_anterior']);
	echo $mensaje_eliminar->ultimo_error;
}

///////////////////////////////////////////////////////////////////////////////
// SEGUNDA VUELTA DE POSTs:
// Verifico y preparo el POST de un mensaje privado, luego lo meto en la DB....
///////////////////////////////////////////////////////////////////////////////
$mensaje_enviado = NULL;	//Inicializo el flag de mensaje enviado
if (isset($_POST['umMensajeEnviado'])){
	$mensaje_enviado = 'ENVIO_EXITOSO';	//Valor inicial una vez posteado el mensaje, se alterará ante cualquier error..
	
	//Cotejo UNO a UNO los Parametros escenciales para crear un mensaje.....
	$mensaje_post = new mensaje();
	if(isset($_SESSION['id_usuario'])){
		$mensaje_post->desde_entidad = 'PROFESIONAL';
		$mensaje_post->id_desde = $_SESSION['id_usuario'];
	}
	elseif(isset($_SESSION['id_empresa'])){
		$mensaje_post->desde_entidad = 'EMPRESA';
		$mensaje_post->id_desde = $_SESSION['id_empresa'];
	}
	else{
		$mensaje_enviado = 'NO_VALIDO';
	}
	
	if((isset($_POST['umEntidad'])) && (isset($_POST['umPara']))){
		$mensaje_post->para_entidad = strtoupper($_POST['umEntidad']);
		if(($mensaje_post->para_entidad == 'PROFESIONAL') && (usuario::alias2id($_POST['umPara']) > 0)){
			$mensaje_post->id_para = usuario::alias2id($_POST['umPara']);
		}
		elseif(($mensaje_post->para_entidad == 'EMPRESA') && (empresa::aliasUsuario2id($_POST['umPara']) > 0)){
			$mensaje_post->id_para = empresa::aliasUsuario2id($_POST['umPara']);
		}
		else{
			$mensaje_enviado = 'NO_VALIDO';
		}
	}
	else{
		$mensaje_enviado = 'NO_VALIDO';
	}
	
	if(isset($_POST['umContenido'])){
		$mensaje_post->detalle = addslashes($_POST['umContenido']);
	}
	else{
		$mensaje_enviado = 'NO_VALIDO';
	}
	
	$mensaje_post->status = 'NO_LEIDO';
	if(isset($_POST['umAsunto'])){
		$mensaje_post->titulo = $_POST['umAsunto'];
	}
	else{
		$mensaje_enviado = 'NO_VALIDO';
	}

	$mensaje_post->id_respuesta_a = 0;
	
	//Finalmente envio el mensaje a la DB:
	if(($mensaje_post->guardarMensaje()) == -1){
		$mensaje_enviado = 'NO_VALIDO';
	}
}
//////////////////////////////////////////////////////////////////////////
?>

<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		theme_advanced_buttons1 : "bold, italic, underline, forecolor, backcolor, justifyleft, justifycenter, justifyright, link, unlink, bullist, numlist, undo, redo",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_toolbar_location : "top"
	});
</script>

<div class="contenido-mensajes">
	<div class="cabecera-escribir">
		<table>
		<tr>
			<td>
				<img src="imagenes/icono-bandeja-entrada.png"/>
			</td>
			<td>
				<p class="parrafo4">Buzón de Entrada</p>
			</td>
			<td>
				<img src="imagenes/icono-mensajes-enviados.png"/>
			</td>
			<td>
				<p class="parrafo4">Elementos Enviados</p>
			</td>
		</tr>
		</table>
	</div>
	<form id="myform" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<div class="datos-escribir">
		<table>
			<tr>
				<th><p>Para:</p></th>
				<td><input type="text" class="umPara" name="umPara" id="umPara" <?php echo $value_umPara ?>/></td>
				<th><p>que es:</p></th>
				<td><select class="umEntidad" name="umEntidad" id="umEntidad" />
					<option value=""></option>
					<option value="profesional" <?php echo $selected_umEntidad_profesional ?>>profesional</option>
					<option value="empresa" <?php echo $selected_umEntidad_empresa ?>>empresa</option>
					</select></td>
			</tr>
			<tr>
				<th><p>Asunto:</p></th>
				<td colspan="4"><input type="text" class="umAsunto" name="umAsunto" id="umAsunto" <?php echo $value_umAsunto ?>/></td>
			</tr>
		</table>
	</div>
<!--<div class="mce-escribir">
	</div>	-->
	<div class="contenido-escribir">
		<textarea id="umContenido" name="umContenido" rows="15" cols="80" >
		</textarea>
	</div>
	<div class="enviar-escribir">
		<table>
			<tr>
				<td>
					<?php
					if($mensaje_enviado == 'ENVIO_EXITOSO'){
						include('contenido/casilla/superior/profesional/mensajes/mensaje-enviado-exitoso.php');
					}
					if($mensaje_enviado == 'NO_VALIDO'){
						include('contenido/casilla/superior/profesional/mensajes/mensaje-enviado-erroneo.php');
					}
					?>
				</td>
				<td>
				</td>
				<td>
				</td>
				<td>
					<input type="hidden" name="umMensajeEnviado" value="umMensajeEnviado" />
					<input type="submit" class="boton3" name="Enviar" value="Enviar" />
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>