<div class="casilla-superior">
<?php
//include('contenido/casilla-superior-profesional-portfolio.php');
//las switcheo para ver que solapas tengo que incluir...
switch ($solapa_superior) {
//    case 'mensajes':
//        include('contenido/casilla/superior/empresa/solapas/mensajes.php');
//        break;
//    case 'laborales':
//        include('contenido/casilla/superior/empresa/solapas/laborales.php');
//        break;
//    case 'ninguna_activa':
//		include('contenido/casilla/superior/empresa/solapas/laborales.php');
//        break;
    default:
        include('contenido/casilla/superior/empresa/solapas/laborales.php');
        break;
}
?>

<?php
//las switcheo para ver que botonera tengo que incluir...
switch ($botonera_superior) {
    case 'nuevo_mensaje':
        include('contenido/casilla/superior/empresa/botones/nuevo-mensaje.php');
        break;
    case 'ver_laborales':
        break;
    case 'abrir_mensaje':
        include('contenido/casilla/superior/empresa/botones/abrir-mensaje.php');
        break;
	case 'editar_mi_foto':
        include('contenido/casilla/superior/empresa/botones/editar-mi-foto.php');
        break;
	case 'subir_oferta':
        break;
	case 'ver_mis_ofertas':
		break;
    default:
        include('contenido/casilla/superior/empresa/botones/nuevo-mensaje.php');
        break;
}
?>

<?php
//las switcheo para ver que contenido tengo que incluir...
switch ($contenido_superior){
    case 'nuevo_mensaje':
        include('contenido/casilla/superior/empresa/contenido/nuevo-mensaje.php');
        break;
    case 'casilla_entrada':
        include('contenido/casilla/superior/empresa/contenido/casilla-entrada.php');
        break;
	case 'ver_laborales':
        include('contenido/casilla/superior/empresa/contenido/ver-laborales.php');
        break;
	case 'abrir_mensaje':
		include('contenido/casilla/superior/empresa/contenido/abrir-mensaje.php');
		break;
	case 'ver_mis_ofertas':
		include('contenido/casilla/superior/empresa/contenido/ver-ofertas.php');
		break;
	case 'editar_mi_foto':
		include('contenido/casilla/superior/empresa/contenido/editar-mi-foto.php');
		break;
  case 'subir_oferta':
        include('contenido/casilla/superior/empresa/contenido/subir-oferta.php');
        break;
    default:
        include('contenido/casilla/superior/empresa/contenido/nuevo-mensaje.php');
        break;
}
?>
	<div class="borde-derecho">
	</div>
</div>

<?php include('contenido/casilla/inferior/empresa.php') ?>
