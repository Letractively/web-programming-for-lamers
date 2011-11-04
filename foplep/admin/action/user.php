<?php
include("../../CONFIG.php");

if ($login->obj->type != 3) {
	header('location:../');
	die();
}

$username = $_POST['username'];
$password = $_POST['password'];
$remember = $_POST['remember'];
//$captcha_cl = md5($_POST['captcha']);
//$captcha_sv = $_SESSION['contacto']['captcha'];



//PHP OUT

if ($_GET['a'] == "block") {
	
	
	
	$id = $_GET['id'];
	$f = $_GET['f'];
	$o = $_GET['o'];
	$p = $_GET['p'];	
		
	$thisuser = new user($id);
	
	if ($thisuser->obj->type == 2) {
		$thisuser->setValue("type", 12);
		header('location:../ngolist.php?f='.$f.'&o='.$o.'&p='.$p);		
	} else if ($thisuser->obj->type == 12) {
		$thisuser->setValue("type", 2);
		header('location:../ngolist.php?f='.$f.'&o='.$o.'&p='.$p);				
	} else if ($thisuser->obj->type == 11) {
		$thisuser->setValue("type", 1);
		header('location:../userlist.php?f='.$f.'&o='.$o.'&p='.$p);				
	} else if ($thisuser->obj->type == 1) {
		$thisuser->setValue("type", 11);
		header('location:../userlist.php?f='.$f.'&o='.$o.'&p='.$p);				
	}
		
	

}



if ($_GET['a'] == "delete") {
	

	$id = $_GET['id'];
	$f = $_GET['f'];
	$o = $_GET['o'];
	$p = $_GET['p'];	
		
	$thisuser = new user($id);
	
	if ($thisuser->obj->type == 1 || $thisuser->obj->type == 11) {
		$list = 'userlist';
	} else if ($thisuser->obj->type == 2 || $thisuser->obj->type == 22) {
		$list = 'ngolist';
	}
	
	$thisuser->remove();
	
	header('location:../'.$list.'.php?f='.$f.'&o='.$o.'&p='.$p);		


}



if ($_GET['a'] == "ngocreate") {

		$newuser = new user();
		$error = 0;
									
		$username = $_POST['username'];
		$ngoname = $_POST['ngoname'];
		$lastname = $_POST['lastname'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		$email1 = $_POST['email1'];
		$email2 = $_POST['email2'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$state = $_POST['state'];	
		

		if (!$newuser->validateUsername($username)) {
			$error += 1;
		} else {
			if ($newuser->getObjectByValue("username", $username)) {
				$error += 2;	
			}
		}
		
		if (strlen($ngoname) > 32 || strlen($ngoname) < 2) {
			$error += 4;	
		}

		if ($password1 == $password2) {
			if (!$newuser->validatePassword($password1)) {
				$error += 16;	
			}
		} else {
			$error += 32;	
		}
		
		if ($email1 == $email2) {
			if (!$newuser->validateEmail($email1)) {
				$error += 64;	
			}
		} else {
				$error += 128;				

			if ($newuser->getObjectByValue("email", $email1)) {
				$error += 512;	
			}

		}
		

		$_SESSION['registration']['error'] = $error;
		
		$_SESSION['registration']['username'] = $username;
		$_SESSION['registration']['ngoname'] = $ngoname;
		$_SESSION['registration']['email1'] = $email1;
		$_SESSION['registration']['email2'] = $email2;
		$_SESSION['registration']['country'] = $country;
		$_SESSION['registration']['city'] = $city;
		$_SESSION['registration']['state'] = $state;	
		
		if (!$error) {
			
			$newuser->create();
			$newuser->setValue('username', $username);
			$newuser->setValue('firstname', $ngoname);
			
			$newuser->setValue('password', md5($password1));			
			$newuser->setValue('email', $email1);
			
			$newuser->setValue('country', $country);
			$newuser->setValue('city', $city);
			$newuser->setValue('state', $state);
	
			$newuser->setValue('date', time());
			$newuser->setValue('preferences', '13');
			$newuser->setValue('type', 2);	
			
			$_SESSION['registration']['done'] = 1;		
			header('location:../newngodone.php');
			die();				
		} else {
			header('location:../newngo.php');
			die();		
		}

		
	
		
}



?>