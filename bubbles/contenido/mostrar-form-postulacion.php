<form action="<?php echo $_SERVER['PHP_SELF'] . '?id_aviso=' . $_GET['id_aviso']; ?>" method="post" class="cmxform" id="registrarForm">
Mi oferta Laboral: <textarea rows="5" cols="50" name="fObjetivoLaboral" id="fObjetivoLaboral"></textarea>
<input type="hidden" value="1" name="fPostulacionEnviada"></input>
<input type="submit" value="Postularme" name="fPostularme"></input>