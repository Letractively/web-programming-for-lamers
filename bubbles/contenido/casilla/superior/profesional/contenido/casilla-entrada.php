<?php
////////////////////////////////////////////////////////////////////////////
// instancio un objeto "mensaje" y luego llamo a mis mensajes....
////////////////////////////////////////////////////////////////////////////
$mensajes_propietario = new mensaje();
if(isset($_SESSION['id_usuario'])){
	$para_entidad = 'PROFESIONAL';
	$id_para = $_SESSION['id_usuario'];
}
elseif(isset($_SESSION['id_empresa'])){
	$para_entidad = 'EMPRESA';
	$id_para = $_SESSION['id_empresa'];
}
$mensajes_propietario->traerMensajes($id_para, $para_entidad);
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
		<?php
		////////////////////////////////////////////////////////////////////////////
		// BUCLE que presenta mensaje por renglón en "bandeja de entrada"
		////////////////////////////////////////////////////////////////////////////
		$i=0;
		while ($i < $mensajes_propietario->ult_filas_afectadas) {
				//Preparo los textos....
				if(($mensajes_propietario->men_desde_entidad[$i] == 'PROFESIONAL') &&
					(usuario::id2alias($mensajes_propietario->men_id_desde[$i]) != -1)){
					$de = usuario::id2alias($mensajes_propietario->men_id_desde[$i]);
				}
				elseif(($mensajes_propietario->men_desde_entidad[$i] == 'EMPRESA') &&
					(empresa::id2aliasUsuario($mensajes_propietario->men_id_desde[$i]) != -1)){
					$de = empresa::id2aliasUsuario($mensajes_propietario->men_id_desde[$i]);
				}
				else{
					echo 'error al levantar los mensajes!';
				}
				$fecha = myquery::cambiaFaNormal($mensajes_propietario->men_fecha[$i]);
				
				//Imprimo cada buble con formato HTML:
				echo '<tr><td class="usuario"><p class="parrafo4">' . $de . '</p></td><td class="asunto"><p class="parrafo4">' . $mensajes_propietario->men_titulo[$i] . '</p></td><td class="fecha"><p class="parrafo4">' . $fecha . '</p></td></tr>';
				$i ++;
				}
		/////////////////////////////////////////////////////////////////////////////
		?>
		</table>
	</div>
	<div class="recorrer-mensajes">
	</div>
</div>