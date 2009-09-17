<img src="imagenes/verificacion_mail.jpg" />
<h2 class="al-medio">Se ha enviado un mail de verificación a <?php echo $nuevoReg->email; ?> , confirme su membresia desde su casilla de e-mail</h2>

<!--<p>(El mail que debe llegar a tu casilla tiene el siguiente formato, cotéjalo por favor, esta es una vesion BETA...)</p>
<p>Bienvenido a Buubles!. Clickee en el siguiente vinculo para confirmar su postulacion:</p>-->
<a href="<?php echo URL_BASE; ?>/registrar-nuevo-usuario.php?id=<?php echo $nuevoReg->id_usuario ?>&amp;reg=<?php echo $nuevoReg->contrasenia; ?>">Verificar mi Membresia...</a>

<?php
//Preparo y envio el mail de aceptación al profesional...
$codigohtml = '<html><head><title>' . $nuevoReg->alias;
$codigohtml .= ' Bienvenido a Bubbles</title></head><body>';
$codigohtml .= 'Hola ' . $nuevoReg->alias . '!:<br />';
$codigohtml .= 'Bienvenido a Bubbles!.<br />Clickee en el siguiente vinculo para confirmar su registro:<br />';
$codigohtml .= '<a href="' . URL_BASE . '/registrar-nuevo-usuario.php?id=' . $nuevoReg->id_usuario . '&amp;reg=' . $nuevoReg->contrasenia . '">Verificar mi Membresia...</a><br />';
$codigohtml .= 'Te recordamos los datos de tu cuenta para que puedas loguearte:<br />';
$codigohtml .= '- tu usuario es: ' . $nuevoReg->alias . '<br />';
$codigohtml .= '- tu password es: ' . $_SESSION['fuContrasenia'] . '<br />';
$codigohtml .= '- tu sitio personal es: ' . SITIOS_PROFESIONAL . $nuevoReg->alias . '/<br />';
$codigohtml .= '</body></html>';
$email = $nuevoReg->email;
$asunto = $nuevoReg->alias . ', bienvenido a BUBBLES. Confirme su membresia';
$cabeceras = "From: bubblescomunidad@bubblescomunidad.com\r\nContent-type: text/html\r\n";
mail($email,$asunto,$codigohtml,$cabeceras);
?>