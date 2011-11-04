<?php

include("../CONFIG.php");

$username = $_POST['username'];
$password = $_POST['password'];
$remember = $_POST['remember'];
$uri = $_SESSION['last_uri'];
//$captcha_cl = md5($_POST['captcha']);
//$captcha_sv = $_SESSION['contacto']['captcha'];



//PHP OUT

if ($_GET['a'] == "login") {


		$_SESSION['log']['username'] = $username;
		$_SESSION['log']['remember'] = $remember;
				
		if ($login->login($username, $password, $remember)) {
			
			if ($login->obj->type == 0) {
				
				$_SESSION['log']['error']=2;
				$login->logout();
				
			} else if ($login->obj->type >= 1 && $login->obj->type <=2) {
				
				unset($_SESSION['log']);
				$login->setValue('lastdate', time());
				
				if ($uri) {
					header('location:'.$uri);
				} else {
					header('location:../?s=profile&id='.$login->obj->id);
				}
				
				die();
				
			} else if ($login->obj->type == 3) {
				
				unset($_SESSION['log']);
				
				header('location:../admin/');
				die();				
				
			}
			
		} else {
			$_SESSION['log']['error']=1;			
		}
		
		header('location:../?s=login');
		die();		
		

		
}

if ($_GET['a'] == "logout") {

		$login->logout();
		
		header('location:../?s=login');
		die();	
		
}

if ($_GET['a'] == "registration") {

		$newuser = new user();
		$error = 0;
									
		$username = $_POST['username'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		$email1 = $_POST['email1'];
		$email2 = $_POST['email2'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$tac = $_POST['tac'];		
		

		if (!$newuser->validateUsername($username)) {
			$error += 1;
		} else {
			if ($newuser->getObjectByValue("username", $username)) {
				$error += 2;	
			}
		}
		
		if (strlen($firstname) > 32 || strlen($firstname) < 2) {
			$error += 4;	
		}
		if (strlen($lastname) > 32 || strlen($lastname) < 2) {
			$error += 8;	
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
			
			if ($newuser->getObjectByValue("email", $email1)) {
				$error += 512;	
			}			
		} else {
				$error += 128;			
		}
		
		if (!$tac) {
			$error += 256;	
		}

		$_SESSION['registration']['error'] = $error;
		
		$_SESSION['registration']['username'] = $username;
		$_SESSION['registration']['firstname'] = $firstname;
		$_SESSION['registration']['lastname'] = $lastname;
		$_SESSION['registration']['email1'] = $email1;
		$_SESSION['registration']['email2'] = $email2;
		$_SESSION['registration']['country'] = $country;
		$_SESSION['registration']['city'] = $city;
		$_SESSION['registration']['state'] = $state;
		$_SESSION['registration']['tac'] = $tac;		
		
		if (!$error) {
			
			$newuser->create();
			$newuser->setValue('username', $username);
			$newuser->setValue('firstname', $firstname);
			$newuser->setValue('lastname', $lastname);
			$newuser->setValue('password', md5($password1));			
			$newuser->setValue('email', $email1);
			$newuser->setValue('country', $country);
			$newuser->setValue('city', $city);
			$newuser->setValue('state', $state);

				for ($i=1; $i<=10; $i++) {
					if (rand(0, 1)) {
						$confirm .= chr(rand(48, 57));
					} else {
						$confirm .= chr(rand(97, 122));
					}
				}
				
			$newuser->setValue('lastdate', $confirm);	
			$newuser->setValue('date', time());
			$newuser->setValue('preferences', '31');			
			
			$newuser->setValue('type', 0);	
			
			sendEmail($email1, 0, $confirm, $newuser->obj->id, $firstname);
			
			$_SESSION['registration']['done'] = 1;			
			header('location:../?s=registrationdone');
			die();				
		} else {
			header('location:../?s=registration');
			die();		
		}

		
	
		
}



if ($_GET['a'] == "ngoregistration") {

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
			$newuser->setValue('type', 4);	
			
			
				for ($i=1; $i<=10; $i++) {
					if (rand(0, 1)) {
						$confirm .= chr(rand(48, 57));
					} else {
						$confirm .= chr(rand(97, 122));
					}
				}
				
			$newuser->setValue('lastdate', $confirm);	
			
			sendEmail($email1, 5, $confirm, $newuser->obj->id, $firstname);
			
			
			
			$_SESSION['registration']['done'] = 1;		
			header('location:../?s=registrationdone');
			die();				
		} else {
			header('location:../?s=join');
			die();		
		}

		
	
		
}





if ($_GET['a'] == "updateavatar") {
	
		$error = "";
	
		if (!$login->isLogged()) {
			$error = "Session expired, please login again.";
		}

		if ($_FILES['image']) {
			
				$uploadimg = new image($_FILES['image']);
				$uploadimg->setUploadFolder("../upload");
				
				$mini = $uploadimg->resizeCrop('156', '168');	
				$big = $uploadimg->resizeMax('800', '600', array(0, 0, 0));	
				
				$upload1 = $uploadimg->upload($mini, '-mini');
				$upload2 = $uploadimg->upload($big, '-big');
				
				
				
				if (!$upload1 || !upload2) {
					$error = "Upload error, try again later.";
				} else {
					
					if ($login->obj->avatar) {
						@unlink('../upload/'.$login->obj->avatar.'-mini.jpg');
						@unlink('../upload/'.$login->obj->avatar.'-big.jpg');			
					}
					$login->setValue('avatar', $upload2);
					
				}
				
				
		} else {
			$error = "Please browse an image file (jpg, gif, png)";			
		}
		
		if ($error) {
			$_SESSION['profile']['img'] = $error;
		} else {
			unset($_SESSION['profile']['img']);
		}		
		
		header('location:../?s=profile');
		die();		

}


if ($_GET['a'] == "pass_recover") {
	
		$error = "";
		

		$email = $_POST['email'];

		$pass_recover_user = new user();
		if ($pass_recover_user->getObjectByValue('email', $email)) {
			if (!$pass_recover_user->obj->pass_recover) {
				
				$code="";
				for ($i=1; $i<=10; $i++) {
					if (rand(0, 1)) {
						$code .= chr(rand(48, 57));
					} else {
						$code .= chr(rand(97, 122));
					}
				}
				
				$pass_recover_user->setValue('pass_recover', $code);
				sendEmail($email, 6, $code);
				
				$error = 3;
				
			} else {
				$error = 1;				
			}
		} else {
			$error = 2;			
		}

		$_SESSION['rec']['error'] = $error;
		$_SESSION['rec']['email'] = $email;

		header('location:../?s=pass_recover');
		die();			

}




//AJAX OUT

if ($_GET['a'] == "changepassword") {
	
		$error = "";
		
		if (!$login->isLogged()) {
			$error = "Session expired, please login again.";
		}
	
		$newpassword1 = $_POST['newpassword1'];
		$newpassword2 = $_POST['newpassword2'];
		$oldpassword1 = $_POST['oldpassword1'];
		$oldpassword2 = $_POST['oldpassword2'];
		
		if ($oldpassword1 != $oldpassword2) {
			$error .= "Current password fields doesn't match<br />";
		} else {
			if ($login->obj->password != md5($oldpassword1)) {
				$error .= "Current password field is incorrect<br />";
			}
		}		
		
		if ($newpassword1 != $newpassword2) {
			$error .= "New password fields doesn't match<br />";
		} else {
			if (!$login->validatePassword($newpassword1)) {
				$error .= "New password is too short<br />";
			}			
		}

		if (!$error) {
			$login->setValue('password', md5($newpassword1));		
		} else {

			echo('<p style="color:#990000;">'.$error.'<p>');
		}
		
}






if ($_GET['a'] == "editprofile1") {
	
		$error = "";
	
		if (!$login->isLogged()) {
			$error = "Session expired, please login again.";
		}
	
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$occupation = $_POST['occupation'];
		$msn = $_POST['msn'];
		$skype = $_POST['skype'];
		$gtalk = $_POST['gtalk'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$email = $_POST['email'];		
		
		if ($login->obj->email != $email) {
		
			
			$checkmail = new user();
			if ($checkmail->getObjectByValue("email", $email)) {
				$error .= "Email address already exists";	
			} else {			
				if ($login->validateEmail($email)) {
					if (sendEmail($email, 4, $login->obj->firstname." ".$login->obj->lastname)) {
						$login->setValue('email', $email);					
					}
				} else {
					$error .= "Invalid email address";
				}
			}
		}
		
		if (!$error) {
			
			$login->setValue('firstname', $firstname);
			$login->setValue('lastname', $lastname);
			$login->setValue('occupation', $occupation);
			$login->setValue('msn', $msn);
			$login->setValue('skype', $skype);
			$login->setValue('gtalk', $gtalk);
			$login->setValue('country', $country);
			$login->setValue('city', $city);	
			$login->setValue('state', $state);
			
		} else {

			echo('<p style="color:#990000;">'.$error.'<p>');
		}		

}

if ($_GET['a'] == "editprofile2") {
	
		$error = "";
	
		if (!$login->isLogged()) {
			$error = "Session expired, please login again.";
		}
	
		$education = $_POST['education'];
		$interest = $_POST['interest'];
		$work = $_POST['work'];
		$quote = $_POST['quote'];		
		
		if (strlen($education) >= 300) {
			$error .= "Education description is too long";			
		}
		if (strlen($work) >= 300) {
			$error .= "Work description is too long";
		}		
		if (strlen($interest) >= 300) {
			$error .= "Interest and Goals description is too long";
		}
		if (strlen($quote) >= 150) {
			$error .= "Quote is too long";
		}		
		

		
		if (!$error) {
			
			$login->setValue('education', $education);
			$login->setValue('interest', $interest);
			$login->setValue('work', $work);
			$login->setValue('quote', $quote);			

			
		} else {

			echo('<p style="color:#990000;">'.$error.'<p>');
		}		
		
}


if ($_GET['a'] == "editprofile3") {
	
		$error = "";
	
		if (!$login->isLogged()) {
			$error = "Session expired, please login again.";
		}
	
		$areas = $_POST['areas'];
		
		if (!$error) {
			
			$login->setValue('areas', $areas);	
			
		} else {

			echo('<p style="color:#990000;">'.$error.'<p>');
		}		
		
}


if ($_GET['a'] == "preferences") {
	
		$error = "";
	
		if (!$login->isLogged()) {
			$error = "Session expired, please login again.";
		}
	
		$preferences = $_POST['preferences'];
		
		if (!$error) {
			
			$login->setValue('preferences', $preferences);	
			
		} else {

			echo('<p style="color:#990000;">'.$error.'<p>');
		}		
		
}



if ($_GET['a'] == "opportunity") {
	
		$error = "";
	
		if (!$login->isLogged()) {
			$error = "Session expired, please login again.";
		}
	
		$area = $_POST['area'];
		$title = $_POST['title'];
		$age = $_POST['age'];
		$duration = $_POST['duration'];
		$location = $_POST['location'];
		$description = $_POST['description'];
		$ngo = $_POST['ngo'];
		$tags = $_POST['tags'];		

		if (strlen($description) > 400) {
			$error .= "Description field is too long<br />";
		}
		
		if (!$title) {
			$error .= "You must set a title<br />";
		}
		
		if (!$error) {
			
			$work = new work();
			
			$work->create();
			
			$work->setValue('area', $area);
			$work->setValue('title', $title);
			$work->setValue('age', $age);
			$work->setValue('duration', $duration);
			$work->setValue('location', $location);
			$work->setValue('description', $description);
			$work->setValue('ngo', $ngo);
			$work->setValue('tags', $tags);			
			$work->setValue('date', time());			

			
		} else {

			echo('<p style="color:#990000;">'.$error.'<p>');
		}		

}










?>