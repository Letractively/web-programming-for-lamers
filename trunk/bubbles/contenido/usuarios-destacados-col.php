<?php
$usuario_destacado = new usuario();
$usuario_destacado->traerColUsuariosDestacados(0, 4);
echo $usuario_destacado->ultimo_error;
?>

<div class="usuarios-destacados-col">
	<div class="cabecera">
	</div>
	<div class="superior">
	</div>
	<div class="contenido">
	<?php
		$i=0;
		for($i==0; $i<4 && $i<$usuario_destacado->ult_filas_afectadas; $i++){
			include('contenido/casilla/general/contenido/un-usuario-destacado.php');
		}
	?>
	</div>
	<div class="inferior">
	</div>	
</div>