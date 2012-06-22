<?php
if(!$_POST) exit;

$email = $_POST['email'];

$_POST['area'] = 'odontologiawg';	//Pongo un AREA por default porque me cansé de programar para ODONTOLOGIAWG.COM.AR

$errors=0;
//$error[] = preg_match('/\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i', $_POST['email']) ? '' : 'INVALID EMAIL ADDRESS';
//if(!eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" ."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$",$email )){
if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) { 
	//$error.="Invalid email address entered";
	$errors=1;
}

//$errors=0;
if($errors==1) {/*echo $error;*/ exit;}
else{
	$values = array ('nombre','email','mensaje','area');
	$required = array('nombre','email','mensaje','area');
	
	$your_email = "dercoli@systechsoluciones.com.ar";
	if($_POST['area'] == 'administracion')
	{
		$your_email = "alberdij@evoipsoluciones.com.ar";
	}
	if($_POST['area'] == 'odontologiawg')
	{
		$your_email = "info@odontologiawg.com.ar; fedratedesco@live.com.ar; odontologiawg@live.com; gonzalotrigo2002@hotmail.com";	// ; dercoli@systechsoluciones.com.ar
	}	
	if($_POST['area'] == 'soporte')
	{
		$your_email = "soporte@evoipsoluciones.com.ar";
	}
	$email_subject = "Nuevo mensaje";	// para: ".$_POST['area'];
	$email_content = "Contenido:\n";
	
	foreach($values as $key => $value){
	  if(in_array($value,$required)){
		//if ($key == 'telefono') {
		  if( empty($_POST[$value]) ) { /*echo 'Por favor; complete los campos requeridos';*/ exit; }
		//}
		$email_content .= $value.': '.$_POST[$value]."\n";
	  }
	}
	 
	if(@mail($your_email,$email_subject,$email_content)) {
		echo 'Hemos recibido su mensaje'; 
	} else {
		echo 'Ocurri&oacute; un error al enviar su consulta. Por favor int&eacute;ntelo nuevamente...';
	}
}
?>