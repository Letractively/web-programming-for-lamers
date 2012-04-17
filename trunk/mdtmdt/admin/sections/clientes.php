<?
	include '../../../classes/config.php';
	include '../../../classes/clsSqlServer.php';
	include '../../../classes/clsClientes.php';
	include '../../../classes/clsImagen.php';
	
	$SqlSrv		= new SqlServer();
	$ManCli		= new ManagerClientes();
	$ManImg		= new ManagerImagen();
	
	$SqlSrv->dbConnect();

	switch ($_GET["action"]) {
		case "edit":
			include 'abm_clientes.php';
			break;
		case "delete":
			include 'abm_clientes.php';
			break;
		case "verLink":
			include 'abm_clientes.php';
			break;
		case "listArchivos":
			include 'list_archivos.php';
			break;
		case "editArchivo":
			include 'abm_archivos.php';
			break;
		case "deleteArchivo":
			include 'abm_archivos.php';
			break;
		default:
			include 'list_clientes.php';
			break;
	}

?>