<?php
// presentación en pantalla:
echo $aviso->postulacion->ult_filas_afectadas . ' postulaciones:<br />';
$i = 0;
while ($i < $aviso->postulacion->ult_filas_afectadas) {
		echo $aviso->postulacion->pos_id_postulacion[$i] . ' -- ';
		echo $aviso->postulacion->pos_id_usuario[$i] . ' -- ';
		echo $aviso->postulacion->pos_id_aviso[$i] . ' -- ';
		echo $aviso->postulacion->pos_fecha[$i] . ' -- ';
		echo $aviso->postulacion->pos_objetivo_laboral[$i] . ' -- ';
		echo '<br />';
		$i ++;				
	}
?>