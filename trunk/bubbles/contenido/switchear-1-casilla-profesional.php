<?php
//las switcheo para ver que contenido tengo que incluir...
switch ($contenido_central) {
    case 'todos_mensajes':
        include('contenido/casilla/central/profesional/contenido/todos-comentarios.php');
        break;
    default:
        include('contenido/casilla/central/profesional/contenido/todos-comentarios.php');
        break;
}
?>