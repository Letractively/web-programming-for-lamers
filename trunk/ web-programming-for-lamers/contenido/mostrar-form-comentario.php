<form action="<?php echo $_SERVER['PHP_SELF'] . '?entidad_visitada=' . $_GET['entidad_visitada']; ?>" method="post" class="cmxform" id="registrarForm">
<textarea rows="5" cols="50" name="fComentario" id="fComentario"></textarea>
<input type="hidden" value="1" name="fComentarioEnviado"></input>
<input type="submit" value="Comentar" name="comentar"></input>