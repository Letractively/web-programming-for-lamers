<?php
$contenido_superior_solapa_mensajes = 'casilla_entrada';
$leyenda_solapa_mensaje = 'Mensajes';
if(strstr($visitante_es,'_visitante')){
$contenido_superior_solapa_mensajes = 'nuevo_mensaje';
$leyenda_solapa_mensaje = 'Dejar msj.';
}
?>

<script language="javascript" type="text/javascript">
//$(document).ready(function() {
//	$("#usPortfolio").click(function (){
//		$("#usPortfolio").load("index.php");
//	});
//});

//function cargarPortfolio(){
//		$(".contenedor-botones-mensajes").load('contenido/casilla/superior/profesional/botones/ver-portfolio.php');
//		$(".contenido-portfolio").load('contenido/casilla/superior/profesional/contenido/ver-portfolio.php');
//	};

</script>

	<div class="borde-solapas">
		<div class="solapa">
				<!-- onclick="cargarPortfolio(); return(false);" -->
			<a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=portfolio&botonera_superior=ver_portfolio&contenido_superior=ver_portfolio">
				<img src="imagenes/icono-portfolio.png" style="position: absolute; margin-top: 15px; margin-left: 20px; border: 0;" />
			</a>
			<p class="parrafo3" style="position: absolute; margin-top: 60px; margin-left: 20px; border: 0;">Portfolio</p>
		</div>
		<div class="solapa">
			<a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=mensajes&botonera_superior=nuevo_mensaje&contenido_superior=<?php echo $contenido_superior_solapa_mensajes ?>">
				<img src="imagenes/icono-mensajes.png" style="position: absolute; margin-top: 15px; margin-left: 20px; border: 0;" />
			</a>
			<p class="parrafo3" style="position: absolute; margin-top: 60px; margin-left: 20px; border: 0;"><?php echo $leyenda_solapa_mensaje; ?></p>
		</div>
		<div class="solapa">
		
		</div>
		<div class="solapa solapa2">
		
		</div>
	</div>