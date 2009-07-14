<?php 
	if((!strstr($_SERVER['REQUEST_URI'],"index.php"))) {
		include("includes/seguridad.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Indicen</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<h1>EMPRESA<h1>
<a href="e-perfil.php" ><p>mi perfil</p></a>
<a href="e-avisos.php" ><p>mis avisos</p></a>
<a href="e-postulaciones.php" ><p>ultimas postulaciones</p></a>
<br />