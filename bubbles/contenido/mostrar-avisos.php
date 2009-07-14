<?php
// presentación en pantalla:
echo $empresa->aviso->ult_filas_afectadas . ' avisos:<br />';
$i = 0;
while ($i < $empresa->aviso->ult_filas_afectadas) {
		echo $empresa->aviso->av_id_aviso[$i] . ' -- ';
		echo $empresa->aviso->av_id_empresa[$i] . ' -- ';
		echo $empresa->aviso->av_fecha[$i] . ' -- ';
		echo $empresa->aviso->av_titulo[$i] . ' -- ';
		echo $empresa->aviso->av_horarios[$i] . ' -- ';
		echo $empresa->aviso->av_pago[$i] . ' -- ';
		echo $empresa->aviso->av_detalle[$i] . ' -- ';
		echo $empresa->aviso->av_puesto[$i] . ' -- ';
		echo $empresa->aviso->av_status[$i] . ' -- ';
		echo $empresa->aviso->av_id_usuario_asignado[$i] . ' -- ';
		echo '<br />';
		$i ++;				
	}
?>