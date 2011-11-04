<?php 
session_start();


$code="";
$im = imagecreate(100, 16); 
$bgcolor = imagecolorallocate($im, 255, 255, 255);
imagefill($im, 64, 16, $bgcolor); 


for ($i==0; $i<6; $i++) {
	$scolor = imagecolorallocate($im, rand(100, 120) , rand(100, 120), rand(100, 120)); 
	$angle = rand(-10, 10);
	$number = rand(0, 9);
	imagettftext($im, 10, $angle,  6 + $i*15  , 11, $scolor, "mvboli.ttf", $number);
	
	$code=$code.$number;
}



$_SESSION['contacto']['captcha'] = md5($code);



header('Content-type: image/jpeg');
imagejpeg($im, NULL, 100);
imagedestroy($im);

?> 
