<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Haustech : Casas inteligentes, cont&aacute;cto.</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
</head>
<body>
<?php
	$current = 5;
	include "header.php";
	$class = $_GET["class"];
	$error = $_GET["error"];
	
	switch ($error) {
		case "depto":
			$msg = "El departamento seleccionado no es valido.";
		break;
		case "nombre":
			$msg = "El nombre ingresado no es valido o est&aacute; vacio.";
		break;
		case "mensaje":
			$msg = "El mensaje ingresado no es valido o est&aacute; vacio.";
		break;
		case "email":
			$msg = "El email ingresado no es valido o est&aacute; vacio.";
		break;
	}
	if ( $class=='error' ) {
		$title = "Ha ocurrido un error";
	}else{
		$title = "Mensaje enviado.";
		$msg = "El mensaje se ha enviado correctamente, su respuesta llegar&aacute; en la brevedad.";
	}
?>
        
        <div id="principal">
       	  <div id="contenido">        
            <div id="contacto_header">
                    <h1>Estamos a su disposici&oacute;n.</h1>
                    <h2>Nuestro objetivo es asegurar que todas sus necesidades sean atendidas. Desde preguntas<br />sobre el servicio que está volviendose norma, hasta asistencia para arquitectos.</h2>
              </div>
              <div id="bloque_sin_formato">
<?php
			  //no mostrar form en caso de que el mail sea enviado correctamente
			  if ( $class!='enviado' && $class!='error' ) {

?>
              	<div id="form_cntn">  
                    <div id="form">
                    	<form name="contacto" action="http://sumacero.com/haustech/contacto_mail.php" method="POST" style="width:526px; padding:0; margin:0;">
                            <label>Nombre :<br /><input type="text" style="width:300px;" name="nombre" /></label><br /><br />
                            <label>Email :<br /><input type="text" style="width:300px;" name="email" /></label><br /><br />
                            <label>Tel&eacute;fono de contacto (opcional) :<br /><input type="text" style="width:300px;" name="telefono" /></label><br /><br />
                            <label>Departamento al que desea contactar :<br />
                                <select size="1" name="depto" style="width:305px;">
                                    <option selected value="1">Informaci&oacute;n y Ventas</option>
                                    <option value="2">Administrativo</option>
                                    <option value="3">T&eacute;cnico</option>
    
                                </select>
                            </label><br /><br />
                            <label>Mensaje :</label><br />
                            	<textarea rows="1" cols="2" name="mensaje" style="width:100%; height:200px;"></textarea>
                            </label><br /><br />
                            <input class="boton" type="submit" value="Enviar" name="enviar">
                        </form>
                    </div>
                    <div id="contacto_info">
                    	<div id="box_contacto_info">
                        	<h3>Haustech</h3>
							<p style="margin:0;">Oficina y Showroom</p>
                            <p>Tronador 3430 Torre3 PB “F”<br />(011) 4546 2929 / 3001<br />(Solicitar entrevista<br />telefónicamente).</p><br />
                            <a href="#">info@haustech.com.ar</a>
                        </div>
                        <div id="box_contacto_info_dw"></div>
                        <div id="box_contacto_info">
                        	<h3>Buenos Aires Design</h3>
                            <p style="margin:0;">Av. Pueyrredon 2501,<br />Esq. Av. Libertador<br />Local Arquimadera<br /><br />Horario de Atención:<br />Lunes a sábado de 10 a 21 hs.<br />Domingo de 12 a 21 hs</p>
                        </div>
                        <div id="box_contacto_info_dw">
                        </div>

                    </div>
                </div>
<?php
			  }else{
?>
			  <div id="mensaje_mail">
              	<h3><? echo $title; ?></h3>
              	<br />
              	<p><? echo $msg; ?></p>
                <br />
              </div>
              <div id="mensaje_mail_dw"></div>
        	  </div>
<?php
			  }
?>
       		</div>    
        </div>
<?php
	include "footer.php";
?>
</body>
</html>
