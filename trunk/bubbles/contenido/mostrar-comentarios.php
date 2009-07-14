<?php
// presentación en pantalla:
echo $entidad->comentario->ult_filas_afectadas . ' comentarios:<br />';
$i = 0;
while ($i < $entidad->comentario->ult_filas_afectadas) {
		echo $entidad->comentario->com_id_comentario[$i] . ' -- ';
		echo $entidad->comentario->com_desde_usuario[$i] . ' -- ';
		echo $entidad->comentario->com_para_usuario[$i] . ' -- ';
		echo $entidad->comentario->com_id_desde[$i] . ' -- ';
		echo $entidad->comentario->com_id_para[$i] . ' -- ';
		echo $entidad->comentario->com_fecha[$i] . ' -- ';
		echo $entidad->comentario->com_detalle[$i] . ' -- ';
		echo $entidad->comentario->com_status[$i] . ' -- ';
		echo '<br />';
		$i ++;				
	}
?>