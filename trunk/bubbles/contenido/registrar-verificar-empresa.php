<img src="imagenes/verificacion_mail.jpg" />
<h2>Se ha enviado un mail de verificación a <?php echo $nuevoReg->email_usuario; ?> , confirme su membresia</h2>

<p>El mail enviado debe redireccionar a:</p>
<p>Bienvenido a Buubles! clickee en el siguiente vinculo para confirmar su postulacion;</p>
<a href="<?php echo URL_BASE; ?>/registrar-nueva-empresa.php?id=<?php echo $nuevoReg->id_empresa ?>&amp;reg=<?php echo $nuevoReg->contrasenia_usuario; ?>">Verificar mi Memresia</a>

<?php
//Preparo y envio el mail de aceptación al profesional...
$codigohtml = '<html><head><title>' . $nuevoReg->alias_usuario . ', Bienvenido a Buubles!. Clickee en el siguiente vinculo para confirmar su postulacion:</title></head><body><a href="' . URL_BASE . '/registrar-nuevo-usuario.php?id=' . $nuevoReg->id_usuario . '&amp;reg=' . $nuevoReg->contrasenia . '">Verificar mi Membresia</a>"';
$email = $nuevoReg->email_usuario;
$asunto = $nuevoReg->alias_usuario . ', bienvenido a BUBBLES. Confirme su membresia';
$cabeceras = "From: bubblescomunidad@bubblescomunidad.com\r\nContent-type: text/html\r\n";
mail($email,$asunto,$codigohtml,$cabeceras);
?>