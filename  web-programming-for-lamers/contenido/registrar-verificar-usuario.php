<h2>Se ha enviado un mail de verificación a <?php echo $nuevoReg->email; ?> , confirme su membresia</h2>

<p>El mail enviado debe redireccionar a:</p>
<p>Bienvenido a Buubles! clickee en el siguiente vinculo para confirmar su postulacion;</p>
<p><?php echo URL_BASE; ?>/registrar-nuevo-usuario.php?id=<?php echo $nuevoReg->id_usuario ?>&amp;reg=<?php echo $nuevoReg->contrasenia; ?></p>