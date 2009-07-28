<?php
// Begin the session
session_start();

// To avoid case conflicts, make the input uppercase and check against the session value
// If it's correct, echo '1' as a string
if(isset($_GET['fuSeguridad'])){
	if($_GET['fuSeguridad'] == $_SESSION['capcha']){
		echo 'true';
	}
// Else echo '0' as a string
	else{
		echo 'false';
	}
}

if(isset($_GET['feSeguridad'])){
	if($_GET['feSeguridad'] == $_SESSION['capcha']){
		echo 'true';
	}
	else{
		echo 'false';
	}
}
?>