<img src="imagenes/verificacion_mail.jpg" />
<h2>Se ha enviado un mail de verificación a <?php echo $nuevoReg->email_usuario; ?> , confirme su membresia</h2>

<p>El mail enviado debe redireccionar a:</p>
<p>Bienvenido a Buubles! clickee en el siguiente vinculo para confirmar su postulacion:</p>
<a href="<?php echo URL_BASE; ?>/registrar-nueva-empresa.php?id=<?php echo $nuevoReg->id_empresa ?>&amp;reg=<?php echo $nuevoReg->contrasenia_usuario; ?>">Verificar mi Membresia...</a>

<?php
//Preparo y envio el mail de aceptación al profesional...
$codigohtml = '<html><head><title>' . $nuevoReg->alias_usuario;
$codigohtml .= ' Bienvenido a Bubbles</title></head><body>';
$codigohtml .= 'Hola ' . $nuevoReg->alias_usuario . '!:<br />';
$codigohtml .= 'Bienvenido a Bubbles!.<br />Clickee en el siguiente vinculo para confirmar su registro:<br />';
$codigohtml .= '<a href="' . URL_BASE . '/registrar-nueva-empresa.php?id=' . $nuevoReg->id_empresa . '&amp;reg=' . $nuevoReg->contrasenia_usuario . '">Verificar mi Membresia...</a>';
$codigohtml .= '</body></html>';
$email = $nuevoReg->email_usuario;
$asunto = $nuevoReg->alias_usuario . ', bienvenido a BUBBLES. Confirme su membresia';
$cabeceras = "From: bubblescomunidad@bubblescomunidad.com\r\nContent-type: text/html\r\n";
mail($email,$asunto,$codigohtml,$cabeceras);
?>