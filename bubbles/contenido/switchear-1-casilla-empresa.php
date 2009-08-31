<?php
//las switcheo para ver que contenido tengo que incluir...
switch ($contenido_central) {
    case 'todos_comentarios':
        include('contenido/casilla/central/empresa/contenido/todos-comentarios.php');
        break;
    default:
        include('contenido/casilla/central/empresa/contenido/todos-comentarios.php');
        break;
}
?>