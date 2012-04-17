<?
define ('authenticate', false);
require ('./inc/conf.inc.php');
if(!$lng){	$lng='esp';}

$HighBgColorMenu['mdt']='A01700';
$HighBgColorMenu['alv']='156891';
$HighBgColorMenu['sou']='264471';

$LowBgColorMenu['mdt']='e4e4e4';
$LowBgColorMenu['alv']='e4e4e4';
$LowBgColorMenu['sou']='e4e4e4';

$LowBgColor['mdt']='e4e4e4';
$LowBgColor['alv']='e4e4e4';
$LowBgColor['sou']='e4e4e4';

$HighBgColor['mdt']='A01700';
$HighBgColor['alv']='156891';
$HighBgColor['sou']='264471';

$FontLowColor['mdt']='000000';
$FontLowColor['alv']='000000';
$FontLowColor['sou']='000000';

$FontHighColor['mdt']='000000';
$FontHighColor['alv']='000000';
$FontHighColor['sou']='000000';
?>

<script type='text/javascript'>function Go(){return}</script>
<script>

	var BaseHref="<?=CFG_virtualPath?>menu/"; 
	// BaseHref lets you specify the root directory for relative links. 
	var Arrws=[BaseHref+"ico.jpg",0,0,BaseHref+"ico.jpg",0,0,BaseHref+"ico.jpg",0,0,BaseHref+"ico.jpg",0,0]; align="left";

	var LowBgColor="<?=$LowBgColor[$socio]?>";			// Background color when mouse is not over
	var HighBgColor="<?=$HighBgColor[$socio]?>";			// Background color when mouse is over
	var FontLowColor="<?=$FontLowColor[$socio]?>";		// Font color when mouse is not over
	var FontHighColor="<?=$FontHighColor[$socio]?>";	// Font color when mouse is over

	var BorderColor="ffffff";	// Border color
	var BorderWidthMain=1;			// Border width main items
	var BorderWidthSub=1;			// Border width sub items
	var BorderBtwnMain=1;			// Border between elements main items 1 or 0
	var BorderBtwnSub=1;			// Border between elements sub items 1 or 0
	var FontFamily="Bliss-Regular";	// Font family menu items
	var FontSize=8;				// Font size menu items
	
	var FontBold=0;				// Bold menu items 1 or 0
	var FontItalic=0;				// Italic menu items 1 or 0
	var MenuTextCentered="center";		// Item text position left, center or right
	var MenuCentered="left";			// Menu horizontal position can be: left, center, right, justify,
												//  leftjustify, centerjustify or rightjustify. PartOfWindow determines part of window to use
	var MenuVerticalCentered="top";	// Menu vertical position top, middle,bottom or static
	var ChildOverlap=-.0;				// horizontal overlap child/ parent
	var ChildVerticalOverlap=.2;		// vertical overlap child/ parent
	var StartTop=-14;				// Menu offset x coordinate. If StartTop is between 0 and 1 StartTop is calculated as part of windowheight
	var StartLeft=0;				// Menu offset y coordinate. If StartLeft is between 0 and 1 StartLeft is calculated as part of windowheight
	var VerCorrect=0;				// Multiple frames y correction
	var HorCorrect=0;				// Multiple frames x correction
	var LeftPaddng=0;				// Left padding
	var TopPaddng=0;				// Top padding
	var FirstLineHorizontal=1;			// First level items layout horizontal 1 or 0
	var MenuFramesVertical=1;			// Frames in cols or rows 1 or 0
	var DissapearDelay=500;			// delay before menu folds in
	var UnfoldDelay=100;			// delay before sub unfolds	
	var TakeOverBgColor=0;			// Menu frame takes over background color subitem frame
	var FirstLineFrame="";			// Frame where first level appears
	var SecLineFrame="area";			// Frame where sub levels appear
	var DocTargetFrame="";			// Frame where target documents appear
	var TargetLoc="menues";				// span id for relative positioning
	var MenuWrap=1;				// enables/ disables menu wrap 1 or 0
	var RightToLeft=0;				// enables/ disables right to left unfold 1 or 0
	var BottomUp=0;				// enables/ disables Bottom up unfold 1 or 0
	var UnfoldsOnClick=0;			// Level 1 unfolds onclick/ onmouseover

						// The script precedes your relative links with BaseHref
						// For instance: 
						// when your BaseHref= "http://www.MyDomain/" and a link in the menu is "subdir/MyFile.htm",
						// the script renders to: "http://www.MyDomain/subdir/MyFile.htm"
						// Can also be used when you use images in the textfields of the menu
						// "MenuX=new Array("<img src=\""+BaseHref+"MyImage\">"
						// For testing on your harddisk use syntax like: BaseHref="file:///C|/MyFiles/Homepage/"

	//var Arrws=[BaseHref+"tri.gif",3,5,BaseHref+"tridown.gif",5,3,BaseHref+"trileft.gif",3,5,BaseHref+"triup.gif",5,3];

						// Arrow source, width and height.
						// If arrow images are not needed keep source ""

	var MenuUsesFrames=0;			// MenuUsesFrames is only 0 when Main menu, submenus,
						// document targets and script are in the same frame.
						// In all other cases it must be 1

	var RememberStatus=0;			// RememberStatus: When set to 1, menu unfolds to the presetted menu item. 
						// When set to 2 only the relevant main item stays highligthed
						// The preset is done by setting a variable in the head section of the target document.
						// <head>
						//	<script type="text/javascript">var SetMenu="2_2_1";
						// 
						// 2_2_1 represents the menu item Menu2_2_1=new Array(.......
	var PartOfWindow=.8;			// PartOfWindow: When MenuCentered is justify, sets part of window width to stretch to

						// Below some pretty useless effects, since only IE6+ supports them
						// I provided 3 effects: MenuSlide, MenuShadow and MenuOpacity
						// If you don't need MenuSlide just leave in the line var MenuSlide="";
						// delete the other MenuSlide statements
						// In general leave the MenuSlide you need in and delete the others.
						// Above is also valid for MenuShadow and MenuOpacity
						// You can also use other effects by specifying another filter for MenuShadow and MenuOpacity.
						// You can add more filters by concanating the strings
	var BuildOnDemand=0;			// 1/0 When set to 1 the sub menus are build when the parent is moused over
	var MenuSlide="";
	var MenuSlide="progid:DXImageTransform.Microsoft.RevealTrans(duration=.2, transition=15)";
	var MenuSlide="progid:DXImageTransform.Microsoft.GradientWipe(duration=.2, wipeStyle=1)";

	var MenuShadow="";
	//var MenuShadow="progid:DXImageTransform.Microsoft.DropShadow(color=#888888, offX=1, offY=1, positive=1)";
	//var MenuShadow="progid:DXImageTransform.Microsoft.Shadow(color=#888888, direction=180, strength=5)";

	var MenuOpacity="";
	var MenuOpacity="progid:DXImageTransform.Microsoft.Alpha(opacity=100)";

	function BeforeStart(){return}
	function AfterBuild(){return}
	function BeforeFirstOpen(){return}
	function AfterCloseAll(){return}


// Menu tree:
// MenuX=new Array("ItemText","Link","background image",number of sub elements,height,width,"bgcolor","bghighcolor",
//	"fontcolor","fonthighcolor","bordercolor","fontfamily",fontsize,fontbold,fontitalic,"textalign","statustext");
// Color and font variables defined in the menu tree take precedence over the global variables
// Fontsize, fontbold and fontitalic are ignored when set to -1.
// For rollover images ItemText format is:  "rollover?"+BaseHref+"Image1.jpg?"+BaseHref+"Image2.jpg" 


<?
	$tabla1="<table width='100%' height='100%'><tr valign=middle>";
	$tabla1.="<td align=left>";
	$tabla2="</td></tr></table>";
	$db->select('secciones','min(id_parent) as id_inicial');
	if($db->num_rows()>0){
		$row=$db->fetch_object();
		$id_inicial=$row->id_inicial;
		
		$db1=new DBI;
		$ancho_celda=96;
		if($socio!='mdt'){ $where=' id <> 8 and'; $ancho_celda=112;}
		
		$db->select('secciones','*',"$where id_parent=$id_inicial and lng='$lng'",'orden');
		if($db->num_rows()>0){
				$c=$db->num_rows();

?>
		var NoOffFirstLineMenus=<?=$db->num_rows()?>;			// Number of main menu  items
<?	
			$n=1;
			while($row=$db->fetch_object()){
				$id=$row->id;
				$db1->select('secciones','*',"id_parent=$id and lng='$lng'");
					$ns=$db1->num_rows();
					$img="$id"."\.gif";
?>
	  Menu<?=$n?>=new Array("rollover?"+BaseHref+"<?=$socio?>_<?=$row->id?>_<?=$lng?>.gif?"+BaseHref+"<?=$socio?>_over<?=$row->id?>_<?=$lng?>.gif","javascript:ir_a(<?=$id?>)","",<?=$ns?>,28,<?=$ancho_celda?>,"","","black","white","","",-1,-1,-1,"center","<?=$row->titulo?>");
<?
				armamenu($id,$n,$c);
				$n++;
			}
		}
	}


?>	
</script>
<?
function armamenu($id,$nivel,$cant){
	global $LowBgColorMenu,$HighBgColorMenu,$socio,$lng,$LowBgColor,$highBgColor;	

	$db=new DBI;
	$db1=new DBI;
	$db->select('secciones','*',"id_parent=$id and lng='$lng'");
	if($db->num_rows()>0){

		$ancho_ant=0;
		$ancho_max=0;
		while( $row=$db->fetch_object() ){
			$tit=$row->titulo;
			$ancho_act=strlen($tit);
			if($ancho_act>$ancho_max){
				$ancho_max=$ancho_act;
			}
		}
		$alto=16;
		$ancho=150;
		if($lng=='esp'){
			if($ancho_max<35){ $ancho=150;}
			if($ancho_max>34){ $ancho=270;}
		}
		if($lng=='ing'){
			if($ancho_max<30){ $ancho=150;}
			if($ancho_max>31){ $ancho=270;}
		}
		
		$db->reset();
		$c=$db->num_rows();
		$prefijo=$nivel."_";
		$n=1;
		while( $row=$db->fetch_object() ){
			$nid=$row->id;
			$db1->select('secciones','id',"id_parent=$nid and lng='$lng'");
			$cc=$db1->num_rows();
			if(substr_count($prefijo,'_')>1){
				$cc=0;
			}

			$tit=$row->titulo;

?>
 		   Menu<?=$prefijo?><?=$n?>=new Array("rollover?"+BaseHref+"<?=$socio?>_<?=$row->id?>_<?=$lng?>.gif?"+BaseHref+"<?=$socio?>_over<?=$row->id?>_<?=$lng?>.gif","javascript:ir_a(<?=$nid?>)","",<?=$cc?>,<?=$alto?>,<?=$ancho?>,"<?=$LowBgColorMenu[$socio]?>","<?=$LowBgColorMenu[$socio]?>","black","white","","",-1,-1,-1,"center","<?=$row->titulo." - ".$row->id?>");
<?
			armamenu($nid,$prefijo.$n,$c);
			$n++;
		}
	}
	else{
		return;
	}
}


