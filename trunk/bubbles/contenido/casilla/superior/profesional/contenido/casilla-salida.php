<?php
if($visitante_es != 'usuario_administrador'){rebotar('no_administrador');}
////////////////////////////////////////////////////////////////////////////
// instancio un objeto "mensaje" y luego llamo a mis mensajes....
////////////////////////////////////////////////////////////////////////////
$mensajes_propietario = new mensaje();
if(isset($_SESSION['id_usuario'])){
	$desde_entidad = 'PROFESIONAL';
	$id_desde = $visitado->id_usuario;
	$mensajes_propietario->traerMensajesEnviados($id_desde, $desde_entidad);
}
elseif(isset($_SESSION['id_empresa'])){
	echo 'Esta casilla NO le pertenece a Ud!';
}

////////////////////////////////////////////////////////////////////////////
?>

<div class="contenido-mensajes">
	<div class="cabecera-escribir">
		<table>
		<tr>
			<td>
				<img src="imagenes/icono-bandeja-entrada.png"/>
			</td>
			<td>
			<a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=mensajes&botonera_superior=nuevo_mensaje&contenido_superior=casilla_entrada">
				<p class="parrafo4">Buzón de Entrada</p>
			</a>
			</td>
			<td>
				<img src="imagenes/icono-mensajes-enviados.png"/>
			</td>
			<td>
			<a class="parrafo4" href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=nuevo_mensaje&botonera_superior=nuevo_mensaje&contenido_superior=casilla_salida">
				<p class="parrafo4">Elementos Enviados</p>
			</a>
			</td>
		</tr>
		</table>
	</div>
	<div class="titulos-mensajes">
	</div>
	<div class="lista-mensajes">
		<table>
			<tr>
				<td class="usuario">
					<p class="parrafo4"><strong> De </strong></p>
				</td>
				<td class="asunto">
					<p class="parrafo4"><strong> Asunto </strong></p>
				</td>
				<td class="fecha">
				<p class="parrafo4"><strong> Fecha </strong></p>
				</td>
			</tr>
		<?php
		////////////////////////////////////////////////////////////////////////////
		// BUCLE que presenta mensaje por renglón en "bandeja de entrada"
		////////////////////////////////////////////////////////////////////////////
		$i=0;
		while ($i < $mensajes_propietario->ult_filas_afectadas) {
			//Preparo los textos....
			$de = mensaje::traerRemitente($mensajes_propietario->men_desde_entidad[$i], $mensajes_propietario->men_id_desde[$i]);
				$fecha = myquery::cambiaFaNormal($mensajes_propietario->men_fecha[$i]);
				
				//Imprimo cada buble con formato HTML:
				$url_dinamica = "u-galeria.php?entidad_visitada=" . $_GET['entidad_visitada'] . 
					"&solapa_superior=mensajes&botonera_superior=abrir_mensaje&contenido_superior=abrir_mensaje&id_mensaje=" . 
					$mensajes_propietario->men_id_mensaje[$i];
				
				echo '<tr><td class="usuario"><p class="parrafo4">' . $de . '</p></td><td class="asunto"><p class="parrafo4"><a href="' . $url_dinamica .'">' . $mensajes_propietario->men_titulo[$i] . '</a></p></td><td class="fecha"><p class="parrafo4">' . $fecha . '</p></td></tr>';
				$i ++;
				}
		/////////////////////////////////////////////////////////////////////////////
		?>
		</table>
	</div>
	<div class="recorrer-mensajes">
	</div>
</div>