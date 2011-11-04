<?php 
if ($login->obj->type != 3) {
	header('location:../../');
	die();
}
?>

<!doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>

        <title>Cross The Line</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Title" content="cross the line">
        <meta name="Author" content="">
        <meta name="Subject" content="Cross The Line">
        <meta name="Description" content="Cross The Line">
        <meta name="Keywords" content="Cross The Line">
        <meta name="Language" content="Spanish">
        <meta name="Robots" content="All">
        

        <link rel=stylesheet href="../style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="../jquery.twitter.css" type="text/css" media="all">        

        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/jquery.color.js" type="text/javascript"></script>
		<script src="../js/jquery.preload.js" type="text/javascript"></script>
		<script src="../js/jquery.fadebutton.js" type="text/javascript"></script>        
        <script src="../js/jquery.maxlength.js" type="text/javascript"></script>
        <script src="../js/jquery.twitter.js" type="text/javascript"></script>
		<script src="../js/script.js" type="text/javascript"></script>    
        <!--[if lte IE 6]>
        <script type="text/javascript" src="../js/supersleight.js"></script>
        <![endif]-->        
          
	</head>
	<body>
    
    
        <div id="inside">    

            
            <div id="title">
	            <h1><?=$title;?></h1>
            </div>
            
            <div style="clear:both;"> </div>
            
            <div id="menu">
	            <div style="width:75px; float:left;"> 
                	<a <?php echo($section=='home') ? 'class="current"' : '';?> href="../?s=home">Home</a>
                </div>
	            <div style="width:90px; float:left;" <?php echo($section=='about') ? 'class="current"' : '';?>>
                	<a <?php echo($section=='about') ? 'class="current"' : '';?> href="../?s=about">About Us</a>
                </div>
	            <div style="width:180px; float:left;" <?php echo($section=='volunteer') ? 'class="current"' : '';?>>
                	<a <?php echo($section=='volunteer') ? 'class="current"' : '';?> href="../?s=volunteer">Be a Volunteer/Activist</a>
                </div>
	            <div style="width:80px; float:left;" <?php echo($section=='join') ? 'class="current"' : '';?>>
                	<a <?php echo($section=='join') ? 'class="current"' : '';?> href="../?s=join">Join Us</a>
                 </div>
	            <div style="width:80px; float:left;" <?php echo($section=='contact') ? 'class="current"' : '';?>>
                	<a <?php echo($section=='contact') ? 'class="current"' : '';?> href="../?s=contact">Contact Us</a>
                </div>
            </div>           

			<div id="menuright">
	            <div style="width:70px; float:left;">
                                   
                </div>

                	<p style="margin:0; font-size:13px;">
		                <a href="index.php" style="color:#0b0">Administrator</a> 
                        <a href="../action/user.php?a=logout" style="font-size:10px; color:#666;"> [Logout]</a>
                    </p>  

            </div>
            
            <div style="clear:both;"> </div>            



