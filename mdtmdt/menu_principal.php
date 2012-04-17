<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');
	if(!$_lng){
		$_lng='esp';
	}

?>
<table width="240" height="27" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
	<form name="form" method="post">
	<input type="hidden" name="id_sel">
	<tr>
<?
	$db->select('secciones','min(id_parent) as id_inicial');
	if($db->num_rows()>0){
		$row=$db->fetch_object();
		$id_inicial=$row->id_inicial;
		
		$db->select('secciones','*',"id_parent=$id_inicial and lng='$_lng'");
		if($db->num_rows()>0){
			while($row=$db->fetch_object()){
				if($row->id==$id_sel){
					$clase='botonesOVER';
?>
					<td class="<?=$clase?>" id="<?=$row->id?>">
					<script> celda_actual=<?=$row->id?></script>
					<?=$row->titulo?> 
					</td>
<?
				}
				else{
					$clase='botones';
?>
					<td class="<?=$clase?>" id="<?=$row->id?>"  onMouseOver="botonover(this)" onMouseOut="botonout(this)" onClick="document.form.id_sel.value=this.id;document.form.submit()">
					<?=$row->titulo?>
					</td>
<?
				}
			}
		}
	}
?>

	</tr>
