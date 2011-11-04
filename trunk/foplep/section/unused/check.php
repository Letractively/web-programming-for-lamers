<?php
include("CONFIG.php");

$code = $_GET['c'];
$id = $_GET['id'];
$email = $_GET['email'];
$recover = $_GET['recover'];

if ($code && $id) {
	
	//VOLUNTEER CREATE
	
	$result = $db->query("SELECT * FROM ctl_users WHERE type=0 AND id=".$id." AND lastdate='".$code."'");
	
	
	if ($db->numRows($result)) {
		
		$check = new user($id);
		$check->setValue('type', 1);
		$check->setValue('lastdate', time());		
		
		$_SESSION['registration']['checkdone'] = 1;
		header("location:index.php?s=checkdone");
		die();
	}
	
	//NGO CREATE
	
	$result = $db->query("SELECT * FROM ctl_users WHERE type=4 AND id=".$id." AND lastdate='".$code."'");
	
	
	if ($db->numRows($result)) {
		
		$check = new user($id);
		$check->setValue('type', 2);
		$check->setValue('lastdate', time());		
		
		$_SESSION['registration']['checkdone'] = 1;
		header("location:index.php?s=checkdone");
		die();
	}	

	
} 


if ($recover && $email && $code) {

		$pass_recover_user = new user();
		
		if ($pass_recover_user->getObjectByValue('email', $email)) {	

				if ($code == $pass_recover_user->obj->pass_recover) {
					
					$newpass="";
					for ($i=1; $i<=6; $i++) {
						if (rand(0, 1)) {
							$newpass .= chr(rand(48, 57));
						} else {
							$newpass .= chr(rand(97, 122));
						}
					}
					
					$pass_recover_user->setValue('password', md5($newpass));
					$pass_recover_user->setValue('pass_recover', '');
					sendEmail($email, 7, $newpass, $pass_recover_user->obj->username);
					
					header("location:index.php?s=login");	
					die();						
				}
						
		}
		
	header("location:index.php");	
	die();		
}


header("location:index.php?s=registration");	
die();



?>