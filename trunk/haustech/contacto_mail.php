<?php
	$error = FALSE;
	// VALIDACION DE VARIABLES POR POST
	if (empty($_POST['nombre'])) {
		$error = TRUE;
		header("Location: http://sumacero.com/haustech/contacto.php?class=error&error=nombre");
	}
	if (empty($_POST['depto'])) {
		$error = TRUE;
		header("Location: http://sumacero.com/haustech/contacto.php?class=error&error=depto");
	}
	if (empty($_POST['mensaje'])) {
		$error = TRUE;
		header("Location: http://sumacero.com/haustech/contacto.php?class=error&error=mensaje");
	}
	if ( empty($_POST['email']) or (!strchr($_POST['email'],"@")) or (!strchr($_POST['email'],".")) ) {	
		$error = TRUE;
		header("Location: http://sumacero.com/haustech/contacto.php?class=error&error=email");
	}
	
	// Si todo sale bien	
	if ($error==FALSE) {
		//VARIABLES PASADAS POR POST
		$nombre = $_POST['nombre'];
		$depto = $_POST['depto'];
		$email = $_POST['email'];
		$mensaje = $_POST['mensaje'];
		$telefono = $_POST['telefono'];
		if ( $telefono == NULL ) { $telefono = "No disponible"; }
		$mensaje = "Nombre : ".$nombre."\r\nTelefono : ".$telefono."\r\n\r\n".$mensaje;
		$mensaje = utf8_encode($mensaje);
		$mensaje = str_replace('\r\n',"\n",$mensaje);
		//EMAIL PRINCIPAL
		$email_admin[0] = 'info@haustech.com.ar';
		$email_admin[1] = 'alex@haustech.com.ar';
		$email_admin[2] = 'francisco@haustech.com.ar';
		
		//DEPTO
		switch ($depto) {
			case 1:
				$asunto = "Informacion y Ventas";
			break;
			case 2:
				$asunto = "Administrativo";
			break;
			case 3:
				$asunto = "Tecnico";
			break;
		}
		//header
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "From: ".$nombre." <".$email."> " . "\r\n";
		$headers .= "Reply-To: " .$email."\r\n";
		$headers .= "Subject: ".$asunto." \r\n";
		
		//funcion mail
		if(mail($email_admin[0],"",$mensaje,$headers)) {
		//mensaje enviado
		mail($email_admin[1],"",$mensaje,$headers);
		mail($email_admin[2],"",$mensaje,$headers);
		header("Location: http://sumacero.com/haustech/contacto.php?class=enviado");
		}
	}
?>