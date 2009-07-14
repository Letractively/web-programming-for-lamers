<h2>Se ha enviado un mail de verificación a <?php echo $nuevoReg->email_usuario; ?> , confirme su membresia</h2>

<p>El mail enviado debe redireccionar a:</p>
<p>Bienvenido a Buubles! clickee en el siguiente vinculo para confirmar su postulacion;</p>
<p><?php echo URL_BASE; ?>/registrar-nueva-empresa.php?id=<?php echo $nuevoReg->id_empresa ?>&amp;reg=<?php echo $nuevoReg->contrasenia_usuario; ?></p>