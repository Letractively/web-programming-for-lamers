<?
	define('authenticate', false);
	include('./inc/conf.inc.php');

	$db1=new DBI();
	$db2=new DBI();
	$db1->select("contactos_excel",'*');
	while($row1=$db1->fetch_object()){
	
		$id_bus=$row1->id_categoria;
		$id_act=$row1->id;	
	

		$db->select('categorias as t1, categorias_indice as t2','t1.id, t1.nombre,t2.id as idcat,t2.descrip',"t1.id=$id_bus and t1.id_parent=t2.id","t1.id_parent");
		while($row=$db->fetch_object()){
				$txt=$row->descrip." ".$row->nombre;
			 $db2->update('contactos_excel',"categoria_texto='".$txt."'","id=$id_act");	
		}
	}
