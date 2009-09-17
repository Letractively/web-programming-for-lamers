<?php
$url_a_perfil = urlencode(SITIOS_PROFESIONAL . $confirmaReg->alias);
$primer_logueo = URL_BASE . 'error-login.php?error=primer_logueo&uri_rescatada=' . $url_a_perfil;
?>

<div class="col-central registro-verificado">
	<div class="contenido-cartel">
		<h2 class="al-medio"><?php echo $confirmaReg->alias; ?>, Bienvenido a la Comunidad Bubbles!!</h2>
		<p class="parrafo8 al-medio">Su registro se completó exitosamente.</p>
		<p class="parrafo8 al-medio">Logueese <a href="<?php echo $primer_logueo; ?>">en su casilla correspondiente desde este vínculo</a> 
			y podra entrar a su espacio personal; desde el link que se encuentra en la parte superior donde Ud. podra leer A MI PERFIL </p>
	</div>
</div>