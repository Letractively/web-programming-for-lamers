<?php
///////////////////////////////////////////////////////////////////////////////
// Verifico y preparo el PORT de un mensaje privado, luego lo meto en la DB....
///////////////////////////////////////////////////////////////////////////////
$mensaje_enviado = NULL;	//Inicializo el flag de mensaje enviado
if (isset($_POST['emMensajeEnviado'])){
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
	
	if((isset($_POST['emEntidad'])) && (isset($_POST['emPara']))){
		$mensaje_post->para_entidad = strtoupper($_POST['emEntidad']);
		if(($mensaje_post->para_entidad == 'PROFESIONAL') && (usuario::alias2id($_POST['emPara']) > 0)){
			$mensaje_post->id_para = usuario::alias2id($_POST['emPara']);
		}
		elseif(($mensaje_post->para_entidad == 'EMPRESA') && (empresa::aliasUsuario2id($_POST['emPara']) > 0)){
			$mensaje_post->id_para = empresa::aliasUsuario2id($_POST['emPara']);
		}
		else{
			$mensaje_enviado = 'NO_VALIDO';
		}
	}
	else{
		$mensaje_enviado = 'NO_VALIDO';
	}
	
	if(isset($_POST['emContenido'])){
		$mensaje_post->detalle = addslashes($_POST['emContenido']);
	}
	else{
		$mensaje_enviado = 'NO_VALIDO';
	}
	
	$mensaje_post->status = 'NO_LEIDO';
	if(isset($_POST['emAsunto'])){
		$mensaje_post->titulo = $_POST['emAsunto'];
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
				<td><input type="text" class="emPara" name="emPara" id="emPara" /></td>
				<th><p>que es:</p></th>
				<td><select class="emEntidad" name="emEntidad" id="emEntidad" />
					<option value=""></option>
					<option value="profesional">profesional</option>
					<option value="empresa">empresa</option>
					</select></td>
			</tr>
			<tr>
				<th><p>Asunto:</p></th>
				<td colspan="4"><input type="text" class="emAsunto" name="emAsunto" id="emAsunto" /></td>
			</tr>
		</table>
	</div>
<!--<div class="mce-escribir">
	</div>	-->
	<div class="contenido-escribir">
		<textarea id="emContenido" name="emContenido" rows="15" cols="80">
		</textarea>
	</div>
	<div class="enviar-escribir">
		<table>
			<tr>
				<td>
					<?php
					if($mensaje_enviado == 'ENVIO_EXITOSO'){
						include('contenido/casilla/superior/empresa/mensajes/mensaje-enviado-exitoso.php');
					}
					if($mensaje_enviado == 'NO_VALIDO'){
						include('contenido/casilla/superior/empresa/mensajes/mensaje-enviado-erroneo.php');
					}
					?>
				</td>
				<td>
				</td>
				<td>
				</td>
				<td>
					<input type="hidden" name="emMensajeEnviado" value="emMensajeEnviado" />
					<input type="submit" class="boton3" name="Enviar" value="Enviar" />
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>