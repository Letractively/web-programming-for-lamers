	<div class="casilla-superior">
<?php
//include('contenido/casilla-superior-profesional-portfolio.php');
//las switcheo para ver que solapas tengo que incluir...
switch ($solapa_superior) {
	case 'mensajes':
		include('contenido/casilla/superior/profesional/solapas/mensajes.php');
		break;
	case 'portfolio':
		include('contenido/casilla/superior/profesional/solapas/portfolio.php');
		break;
	case 'editar_perfil':
		include('contenido/casilla/superior/profesional/solapas/ninguna-activa.php');
		break;
	case 'ninguna_activa':
		include('contenido/casilla/superior/profesional/solapas/ninguna-activa.php');
		break;
	default:
		include('contenido/casilla/superior/profesional/solapas/portfolio.php');
		break;
}
?>

<?php
//las switcheo para ver que botonera tengo que incluir...
switch ($botonera_superior) {
    case 'nuevo_mensaje':
        include('contenido/casilla/superior/profesional/botones/nuevo-mensaje.php');
        break;
    case 'ver_portfolio':
        include('contenido/casilla/superior/profesional/botones/ver-portfolio.php');
        break;
	case 'editar_perfil':
		include('contenido/casilla/superior/profesional/botones/sin-botonera.php');
		break;
	case 'editar_mi_foto':
		include('contenido/casilla/superior/profesional/botones/editar-mi-foto.php');
		break;
	case 'sin_botonera':
		break;
	default:
        include('contenido/casilla/superior/profesional/botones/ver-portfolio.php');
        break;
}
?>

<?php
//las switcheo para ver que contenido tengo que incluir...
switch ($contenido_superior) {
    case 'nuevo_mensaje':
        include('contenido/casilla/superior/profesional/contenido/nuevo-mensaje.php');
        break;
    case 'casilla_entrada':
        include('contenido/casilla/superior/profesional/contenido/casilla-entrada.php');
        break;
	case 'ver_portfolio':
        include('contenido/casilla/superior/profesional/contenido/ver-portfolio.php');
        break;
	case 'abrir_mensaje':
		include('contenido/casilla/superior/profesional/contenido/abrir-mensaje.php');
		break;
	case 'editar_perfil':
		include('contenido/casilla/superior/profesional/contenido/editar-perfil.php');
		break;
	case 'editar_mi_foto':
		include('contenido/casilla/superior/profesional/contenido/editar-mi-foto.php');
		break;
	case 'subir_un_portfolio':
		include('contenido/casilla/superior/profesional/contenido/subir-un-portfolio.php');
		break;
	case 'mis_postulaciones':
		include('contenido/casilla/superior/profesional/contenido/ver-postulaciones.php');
		break;
	default:
        include('contenido/casilla/superior/profesional/contenido/ver-portfolio.php');
        break;
}
?>
		<div class="borde-derecho">
		</div>
	</div>


	<?php include('contenido/casilla/inferior/profesional.php') ?>
