<?
	include '../../../classes/config.php';
	include '../../../classes/clsSqlServer.php';
	include '../../../classes/clsCurriculums.php';
	include '../../../classes/clsImagen.php';
	
	$SqlSrv		= new SqlServer();
	$ManCur		= new ManagerCurriculums();
	$ManImg		= new ManagerImagen();
	
	$SqlSrv->dbConnect();

	switch ($_GET["action"]) {
		case "edit":
			include 'abm_curriculums.php';
			break;
		case "delete":
			include 'abm_curriculums.php';
			break;
		case "setpos":
			include 'abm_curriculums.php';
			break;
		default:
			include 'list_curriculums.php';
			break;
	}

?>