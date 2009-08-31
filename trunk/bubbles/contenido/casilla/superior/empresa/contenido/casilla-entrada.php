<?php
if($visitante_es != 'empresa_administrador'){rebotar('no_administrador');}
////////////////////////////////////////////////////////////////////////////
// instancio un objeto "mensaje" y luego llamo a mis mensajes....
////////////////////////////////////////////////////////////////////////////
$mensajes_propietario = new mensaje();
if(isset($_SESSION['id_usuario'])){
	echo 'Esta casilla NO le pertenece a Ud!';
}
elseif(isset($_SESSION['id_empresa'])){
	$para_entidad = 'EMPRESA';
	$id_para = $visitado->id_empresa;
	$mensajes_propietario->traerMensajes($id_para, $para_entidad);
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
				$url_dinamica = "e-galeria.php?entidad_visitada=" . $_GET['entidad_visitada'] . 
					"&solapa_superior=mensajes&botonera_superior=abrir_mensaje&contenido_superior=abrir_mensaje&id_mensaje=" . 
					$mensajes_propietario->men_id_mensaje[$i];
				
				echo '<tr><td class="usuario"><p class="parrafo4">' . $de . '</p></td><td class="asunto"><p class="parrafo4"><a href="' . $url_dinamica .'">' . myquery::cambiaTaNormal($mensajes_propietario->men_titulo[$i]) . '</a></p></td><td class="fecha"><p class="parrafo4">' . $fecha . '</p></td></tr>';
				$i ++;
				}
		/////////////////////////////////////////////////////////////////////////////
		?>
		</table>
	</div>
	<div class="recorrer-mensajes">
	</div>
</div>