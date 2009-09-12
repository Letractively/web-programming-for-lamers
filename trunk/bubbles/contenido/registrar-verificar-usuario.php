<img src="imagenes/verificacion_mail.jpg" />
<h2>Se ha enviado un mail de verificación a <?php echo $nuevoReg->email; ?> , confirme su membresia</h2>

<p>(El mail que debe llegar a tu casilla tiene el siguiente formato, cotéjalo por favor, esta es una vesion BETA...)</p>
<p>Bienvenido a Buubles!. Clickee en el siguiente vinculo para confirmar su postulacion;</p>
<a href="<?php echo URL_BASE; ?>/registrar-nuevo-usuario.php?id=<?php echo $nuevoReg->id_usuario ?>&amp;reg=<?php echo $nuevoReg->contrasenia; ?>">Verificar mi Memresia</a>

<?php
//Preparo y envio el mail de aceptación al profesional...
$codigohtml = '<html><head><title>' . $nuevoReg->alias . 'Bienvenido a Buubles!. Clickee en el siguiente vinculo para confirmar su postulacion:</title></head><body><a href=' . URL_BASE . '/registrar-nuevo-usuario.php?id=' . $nuevoReg->id_usuario . '&amp;reg=' . $nuevoReg->contrasenia . '">Verificar mi Memresia</a>"';
$email = $nuevoReg->email;
$asunto = $nuevoReg->alias . ', bienvenido a BUBBLES. Confirme su membresia a continuación:';
$cabeceras = "From: bubblescomunidad@bubblescomunidad.com\r\nContent-type: text/html\r\n";
mail($email,$asunto,$codigohtml,$cabeceras);
?>