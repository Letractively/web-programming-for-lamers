<img src="imagenes/verificacion_mail.jpg" />
<h2>Se ha enviado un mail de verificación a <?php echo $nuevoReg->email; ?> , confirme su membresia</h2>

<p>(El mail no puede enviarse, pues Bubbles esta hosteado en un server provisorio, a continuacion se detalla el contenido del mismo...)</p>
<p>Bienvenido a Buubles!. Clickee en el siguiente vinculo para confirmar su postulacion;</p>
<a href="<?php echo URL_BASE; ?>/registrar-nuevo-usuario.php?id=<?php echo $nuevoReg->id_usuario ?>&amp;reg=<?php echo $nuevoReg->contrasenia; ?>">Verificar!</a>