<?php
		// presentación en pantalla:
		echo '<p>' . $usuarioCv->experiencia->ult_filas_afectadas . ' columnas afectadas</p><br />';
		$i = 0;
		while ($i < $usuarioCv->experiencia->ult_filas_afectadas) {
				echo '<p>' . $usuarioCv->experiencia->exp_id_experiencia[$i] . ' -- ';
				echo $usuarioCv->experiencia->exp_contratista[$i] . ' -- ';
				echo $usuarioCv->experiencia->exp_radicacion[$i] . ' -- ';
				echo $usuarioCv->experiencia->exp_ramo[$i] . ' -- ';
				echo $usuarioCv->experiencia->exp_puesto[$i] . ' -- ';
				echo $usuarioCv->experiencia->exp_especialidad_ejercida[$i] . ' -- ';
				echo $usuarioCv->experiencia->exp_nombre_jerarquia[$i] . ' -- ';
				echo $usuarioCv->experiencia->exp_ingreso[$i] . ' -- ';
				echo $usuarioCv->experiencia->exp_egreso[$i] . ' -- ';
				echo $usuarioCv->experiencia->exp_tareas_ejercidas[$i] . ' -- ';
				echo '</p>';
				$i ++;				
			}
?>