<?php
// presentación en pantalla:
echo $busqueda->aviso->ult_filas_afectadas . ' avisos:<br />';
$i = 0;
while ($i < $busqueda->aviso->ult_filas_afectadas) {
		echo $busqueda->aviso->av_id_aviso[$i] . ' -- ';
		echo $busqueda->aviso->av_id_empresa[$i] . ' -- ';
		echo $busqueda->aviso->av_fecha[$i] . ' -- ';
		echo $busqueda->aviso->av_titulo[$i] . ' -- ';
		echo $busqueda->aviso->av_horarios[$i] . ' -- ';
		echo $busqueda->aviso->av_pago[$i] . ' -- ';
		echo $busqueda->aviso->av_detalle[$i] . ' -- ';
		echo $busqueda->aviso->av_puesto[$i] . ' -- ';
		echo $busqueda->aviso->av_status[$i] . ' -- ';
		echo $busqueda->aviso->av_id_usuario_asignado[$i] . ' -- ';
		echo '<br />';
		$i ++;				
	}
?>