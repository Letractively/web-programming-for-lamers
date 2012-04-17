<?
define ('authenticate', false);
include_once('inc/conf.inc.php');

$socio='mdt';

if($_GET['action'] == 'modificar')
{
dbi::update('exp', "socio='{$_GET['socio']}', pais='{$_GET['pais']}', text='{$_GET['text']}'", "id={$_GET['id']}");
}elseif($_GET['action'] == 'borrar')
{
dbi::delete('exp', "id={$_GET['id']}");
}elseif($_GET['action'] == 'agregar')
{
dbi::insert('exp', "id_seccion=$id_seccion, socio='$socio', pais='{$_GET['pais']}', text='{$_GET['text']}'");
}

?>

<?
if($_GET['action'] == '')
	{
		$exp=dbi::select('exp', '*', "socio='$socio'");
		while($expr = $exp->fetch_object)
			{
?>
<a href="<?=$_SERVER['PHP_SELF']?>?action=add">Agregar Experiencia</a><p>
<table width="200" border="1">
  <tr>
    <td><?=$expr->socio?>&nbsp;</td>
    <td rowspan="3"><a href="<?=$_SERVER['PHP_SELF']?>?action=mod&id=<?=$expr->id?>">Modificar</a></td>
    <td rowspan="3"><a href="<?=$_SERVER['PHP_SELF']?>?action=del&id=<?=$expr->id?>">Borrar</a></td>
  </tr>
  <tr>
    <td><?=$expr->pais?></td>
  </tr>
  <tr>
    <td><?=$expr->text?></td>
  </tr>
</table>
<?			}
	}elseif($_GET['action'] == 'mod')
		{
			$exp=dbi::record('exp', "id={$_GET['id']}");
?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="get" name="modificar">
<input type="hidden" name="action" value="modificar">
<input type="hidden" name="id" value="<?=$_GET['id']?>">
<table width="200" border="1">

  <tr>
    <td colspan="2">
	<select name="pais">
	<? $paises = dbi::select('exp', '*' ,'');
	 while($pais = $paises->fetch_object)
		{
	?>
	<option value="<?=$pais->pais?>" <? ($pais->pais == $exp->pais ? "selected" : '') ?>><?=$pais->pais?></option>
	<?
		}
	?>
	</select>	
	</td>
  </tr>
  <tr>
    <td colspan="2"><textarea name="text"><?=$exp->text?></textarea></td>
  </tr>
    <tr>
    <td><input type="submit" name="modificar" value="Modificar"></td>
	<td><input type="button" name="cancelar" value="Cancelar" onClick="history.back(1)"></td>
  </tr>
</table>
</form>
<?		}elseif($_GET['action'] == 'add')
		{

?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="get" name="agregar">
<input type="hidden" name="action" value="agregar">
<table width="200" border="1">
  <tr>
    <td colspan="2">
	<select name="pais">
	<? $paises = dbi::select('exp', '*' ,'');
	 while($pais = $paises->fetch_object)
		{
	?>
	<option value="<?=$pais->pais?>" <? ($pais->pais == $pais ? "selected" : '') ?>><?=$pais->pais?></option>
	<?
		}
	?>
	</select>	
	</td>
  </tr>
  <tr>
    <td colspan="2"><textarea name="text"></textarea></td>
  </tr>
    <tr>
    <td><input type="submit" name="modificar" value="Modificar"></td>
	<td><input type="button" name="cancelar" value="Cancelar" onClick="history.back(1)"></td>
  </tr>
</table>
</form>
