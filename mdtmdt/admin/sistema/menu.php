<?php
	include_once 'inc/conf.inc.php';
?>
<script type="text/javascript" src="javascript/cssexpr.js"></script>
<script language="JavaScript1.3" src="javascript/xmenu.php" type="text/javascript"></script>
<script language="JavaScript1.3">
	function Ir( pagina ){
		document.getElementById('main').style.display = 'block';
		open (pagina,'main','');
	}
	
	webfxMenuImagePath				= "inc/images/xmenu/";
	webfxMenuUseHover				= false;
	webfxMenuShowTime				= 100;
	webfxMenuHideTime				= 200;
// define the default values
	//Border
	webfxMenuDefaultBorderLeft		= 2;
	webfxMenuDefaultBorderRight		= 2;
	webfxMenuDefaultBorderTop		= 2;
	webfxMenuDefaultBorderBottom	= 2;
	//Padding
	webfxMenuDefaultPaddingLeft		= 1;
	webfxMenuDefaultPaddingRight	= 1;
	webfxMenuDefaultPaddingTop		= 1;
	webfxMenuDefaultPaddingBottom	= 1;
	//Shadow
	webfxMenuDefaultShadowLeft		= 0;
	webfxMenuDefaultShadowRight		= 0;
	webfxMenuDefaultShadowTop		= 0;
	webfxMenuDefaultShadowBottom	= 0;
	// Separador
	var menu_sep 					= new WebFXMenuSeparator;

//Carga de menues
	var menu;
	var menuBar = new WebFXMenuBar;	
<?php
	$menues = new DBI;
	$submenues = new DBI;

	$menues->sql="
		SELECT s.*
		FROM ".CFG_sectionsTable." s
		LEFT JOIN ".CFG_privilegesTable." p ON p.id_seccion=s.id
		WHERE p.id_grupo = '$USER->id_grupo' AND (p.accion = '' OR p.accion IS NULL)
		AND s.id_padre = 0
		ORDER BY s.nombre
	";
	$menues->query();

	$n=0;
	while ($menu = $menues->fetch_object()) { //cabeceras de menues
		if ($menu->nombre == '-separador-') {
?>
	// Creación del menu
	menu		= new WebFXMenu;
	menu.left	= 47;
	menu.top	= 86;
	menu.width	= 200;
	menu.add(new WebFXMenuItem('',""));
	//Insercion en la barra de menu
	menuBar.add(new WebFXMenuButton('',null,null,menu));
<?php
		} else {
			$submenues->sql="
				SELECT s.*
				FROM ".CFG_sectionsTable." s,".CFG_privilegesTable." p
				WHERE s.id_padre = $menu->id
				AND p.id_grupo = '$USER->id_grupo'
				AND p.id_seccion = s.id
				AND (p.accion = '' OR p.accion IS NULL)
				ORDER BY s.nombre
			";
			$submenues->query();

			if ($submenues->num_rows() > 0) {
				$n++;
?>
	// Diseño del menu
	menu	= new WebFXMenu;
	menu.left	= 47;
	menu.top	= 86;
	menu.width	= 200;
<?php
				while ($submenu = $submenues->fetch_object()) { //submenues
?>
	//submenu
	menu.add(
		new WebFXMenuItem(
			'<?php echo $submenu->nombre == '' ? 'error - Sin Nombre' : $submenu->nombre ?>',
			"javascript: Ir('<?php echo $submenu->vinculo?>')"
		)
	);
<?php
				}//end while submenu
			}//end if submenu
?>
	menuBar.add(
		new WebFXMenuButton(
			'<?=$menu->img_mime!=''?"<img align=\"absmiddle\" src=\"sistema/imagen.php?id=<?=$menu->id?>\" border=0 width=\"20\" height=\"20\">":''?><?=($menu->nombre=='') ? '&nbsp;' : $menu->nombre ?>',
			null,
			null,
			menu
		)
	);
<?php			
		}//end else menu separador
	}//end while menu
?>
//Fin carga de menues
	
	menuBar.add(
		new WebFXMenuButton(
			'Salir',
			"javascript: top.location = \"login.php?action=logout\"",
			"Salir del sistema"
		)
	);
	document.write(menuBar);
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr> 
		<td width="77">&nbsp;</td>
		<td background=>&nbsp;</td>
		<td width="381" align="right" background="" valign="top" class="text_bold"><?=$USER->nombre?><!-- <img src="img/cab_2.gif" width="381" height="55">--></td>
	</tr>
</table>