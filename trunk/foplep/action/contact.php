<?php

include("../CONFIG.php");

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$message = $_POST['message'];
$country = $_POST['country'];
$age = $_POST['age'];
$how = $_POST['how'];
$captcha_cl = md5($_POST['captcha']);
$captcha_sv = $_SESSION['contacto']['captcha'];


$_SESSION['contact']['fullname'] = $fullname;
$_SESSION['contact']['email'] = $email;
$_SESSION['contact']['message'] = $message;
$_SESSION['contact']['country'] = $country;
$_SESSION['contact']['age'] = $age;
$_SESSION['contact']['how'] = $how;



//PHP OUT

		$verify = new dbElement();
		$error = 0;
									
		if (!$fullname) {
			$error += 1;			
		}
		
		if (!$email || !$verify->validateEmail($email)) {
			$error += 2;			
		}
		
		if (!$message) {
			$error += 4;			
		}		
		
		
		if ($captcha_cl != $captcha_sv) {
			$error += 8;			
		}
		

if ($_GET['a'] == "contact") {

		
		if (!$error) {
			
			sendEmail(CONTACT_EMAIL, 2, $fullname, $email, $message, $how);
			
			unset($_SESSION['contact']['error']);
			$_SESSION['contact']['done'] = 1;			
			header('location:../?s=contactdone');
			die();				
		} else {
			$_SESSION['contact']['error'] = $error;
			header('location:../?s=contact');
			die();		
		}

		
	
		
}


if ($_GET['a'] == "join") {

		
		if (!$error) {
			
			sendEmail(CONTACT_EMAIL, 3, $fullname, $email, $country, $age, $message);
			
			unset($_SESSION['contact']['error']);
			$_SESSION['contact']['done'] = 1;			
			header('location:../?s=joindone');
			die();				
		} else {
			$_SESSION['contact']['error'] = $error;
			header('location:../?s=join');
			die();		
		}

		
	
		
}


?>