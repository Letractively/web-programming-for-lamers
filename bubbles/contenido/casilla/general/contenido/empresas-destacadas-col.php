<?php
$empresa_destacada = new empresa();
$empresa_destacada->traerColEmpresasDestacadas(0, 4);
echo $empresa_destacada->ultimo_error;
?>

<div class="empresas-destacadas-col">
	<div class="cabecera">
	</div>
	<div class="superior">
	</div>
	<div class="contenido">
	<?php
		$i=0;
		for($i==0; $i<4 && $i<$usuario_destacado->ult_filas_afectadas; $i++){
			include('contenido/casilla/general/contenido/una-empresa-destacada-col.php');
		}
	?>
	</div>
	<div class="inferior">
	</div>	
</div>