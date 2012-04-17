<?
define('authenticate', false);
include_once('../inc/conf.inc.php');

function menu($id_parent,$lng,$tipo){

$db2=new DBI();

if($tipo=='principal'){
	$db2->select('paginas','*',"id=0");
	if($db2->num_rows()>0){
		$row=$db2->fetch_object();
		$tipo_vinculo=$row->tipo_vinculo;
		$tipo_ventana=$row->tipo_ventana;
		$tipo_template=$row->tipo_template;
	}
	
	$db2->select('secciones','*',"id_parent=0 and lng='$lng'");
	if($db2->num_rows()>0){
		switch($tipo_vinculo){
	
			case 1:{
				$a= "<table><tr><td><select name='menu' onchange='redir()'>";
				while($row1=$db2->fetch_object()){
					$a.= "<option value='".$row->id."'>".$row1->titulo."</option>";
				}
				$a.= "</select></td></tr></table>";
				break;
			}
	
			case 2:{
				$a= "<table>";
				while($row1=$db2->fetch_object()){
					$a.= "<tr><td><a href='#'>".$row1->titulo."</a></td></tr>";
				}
				$a.= "</table>";
				break;
			}
			default :{ 
				$a="Error = $id_parent";
				 break;
			}
				
		}
	}				
}
if($tipo=='secundario'){
	$db2->select('paginas','*',"id=$id_parent");
	if($db2->num_rows()>0){
		$row=$db2->fetch_object();
		$tipo_vinculo=$row->tipo_vinculo;
		$tipo_ventana=$row->tipo_ventana;
		$tipo_template=$row->tipo_template;
	}
	
	$db2->select('secciones','*',"id_parent=$id_parent and id>0 and lng='$lng'");
	if($db2->num_rows()>0){
		switch($tipo_vinculo){
			case 1:{
				$a="<table><tr>";
				$a.= "<td><select name='menu' onchange='redir()'>";
				while($row1=$db2->fetch_object()){
					$a.= "<option value='".$row->id."'>".$row1->titulo."</option>";
				}
				$a.= "</select></td></tr></table>";
				break;
			}
	
			case 2:{
				$a= "<table><tr>";
				while($row1=$db2->fetch_object()){
					$a.= "<td><a href='#'>".$row1->titulo."</a></td>";
				}
				$a.= "</tr></table>";
				break;
			}
			default :{ 
				$a="Error = $id_parent";
				 break;
			}
				
		}
	}				
}
return $a;
}
?>
