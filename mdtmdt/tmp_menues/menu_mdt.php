<?

?>

<link href="estilosmunoz.css" rel="stylesheet" type="text/css">
<script type='text/javascript'>function Go(){return}</script>
<div align="center">

<table width="100%" height="28" border="0" cellpadding="0" cellspacing="0" bgcolor="">
	<tr>
		<td height="28" bgcolor="#666666">
			<span id="menues">


<script>

	var BaseHref="http://www.powersite.com.ar/mdt/menu/"; 
	// BaseHref lets you specify the root directory for relative links. 
	var Arrws=[BaseHref+"ico.jpg",0,0,BaseHref+"ico.jpg",0,0,BaseHref+"ico.jpg",0,0,BaseHref+"ico.jpg",0,0]; align="left";

	var LowBgColor="e4e4e4";			// Background color when mouse is not over
	var HighBgColor="A01700";			// Background color when mouse is over
	var FontLowColor="000000";		// Font color when mouse is not over
	var FontHighColor="000000";	// Font color when mouse is over

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
	var StartTop=0;				// Menu offset x coordinate. If StartTop is between 0 and 1 StartTop is calculated as part of windowheight
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


		var NoOffFirstLineMenus=7;			// Number of main menu  items
	  Menu1=new Array("rollover?"+BaseHref+"mdt_1_<?=$lng?>.gif?"+BaseHref+"mdt_over1_<?=$lng?>.gif","javascript:ir_a(1)","",0,28,96,"","","black","white","","",-1,-1,-1,"center","Perfil");
		sec_actual='uno';
	  Menu2=new Array("rollover?"+BaseHref+"mdt_3_<?=$lng?>.gif?"+BaseHref+"mdt_over3_<?=$lng?>.gif","javascript:ir_a(3)","",7,28,96,"","","black","white","","",-1,-1,-1,"center","Areas de Práctica");
 		   Menu2_1=new Array("rollover?"+BaseHref+"mdt_9_<?=$lng?>.gif?"+BaseHref+"mdt_over9_<?=$lng?>.gif","javascript:ir_a_(9,'<?=traducemenu(9)?>','"+sec_actual+"',3)","",3,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Financiación de Empresas - 9");
 		   Menu2_1_1=new Array("rollover?"+BaseHref+"mdt_27_<?=$lng?>.gif?"+BaseHref+"mdt_over27_<?=$lng?>.gif","javascript:ir_a_(27,'<?=traducemenu(27)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Mercado de Capitales - 27");
 		   Menu2_1_1_1=new Array("rollover?"+BaseHref+"mdt_42_<?=$lng?>.gif?"+BaseHref+"mdt_over42_<?=$lng?>.gif","javascript:ir_a_(42,'<?=traducemenu(42)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Acciones - 42");
 		   Menu2_1_1_2=new Array("rollover?"+BaseHref+"mdt_52_<?=$lng?>.gif?"+BaseHref+"mdt_over52_<?=$lng?>.gif","javascript:ir_a_(52,'<?=traducemenu(52)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Valores convertibles; Warrants - 52");
 		   Menu2_1_1_3=new Array("rollover?"+BaseHref+"mdt_53_<?=$lng?>.gif?"+BaseHref+"mdt_over53_<?=$lng?>.gif","javascript:ir_a_(53,'<?=traducemenu(53)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Títulos de Deuda - 53");
 		   Menu2_1_1_4=new Array("rollover?"+BaseHref+"mdt_54_<?=$lng?>.gif?"+BaseHref+"mdt_over54_<?=$lng?>.gif","javascript:ir_a_(54,'<?=traducemenu(54)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Securitización - 54");
 		   Menu2_1_1_5=new Array("rollover?"+BaseHref+"mdt_180_<?=$lng?>.gif?"+BaseHref+"mdt_over180_<?=$lng?>.gif","javascript:ir_a_(180,'<?=traducemenu(180)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 180");
 		   Menu2_1_1_5_1=new Array("rollover?"+BaseHref+"mdt_181_<?=$lng?>.gif?"+BaseHref+"mdt_over181_<?=$lng?>.gif","javascript:ir_a_(181,'<?=traducemenu(181)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Asociación - 181");
 		   Menu2_1_1_5_2=new Array("rollover?"+BaseHref+"mdt_182_<?=$lng?>.gif?"+BaseHref+"mdt_over182_<?=$lng?>.gif","javascript:ir_a_(182,'<?=traducemenu(182)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Argentina - 182");
 		   Menu2_1_1_5_3=new Array("rollover?"+BaseHref+"mdt_183_<?=$lng?>.gif?"+BaseHref+"mdt_over183_<?=$lng?>.gif","javascript:ir_a_(183,'<?=traducemenu(183)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Brasil - 183");
 		   Menu2_1_1_5_4=new Array("rollover?"+BaseHref+"mdt_184_<?=$lng?>.gif?"+BaseHref+"mdt_over184_<?=$lng?>.gif","javascript:ir_a_(184,'<?=traducemenu(184)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Chile - 184");
 		   Menu2_1_2=new Array("rollover?"+BaseHref+"mdt_28_<?=$lng?>.gif?"+BaseHref+"mdt_over28_<?=$lng?>.gif","javascript:ir_a_(28,'<?=traducemenu(28)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Mercado Financiero - 28");
 		   Menu2_1_2_1=new Array("rollover?"+BaseHref+"mdt_56_<?=$lng?>.gif?"+BaseHref+"mdt_over56_<?=$lng?>.gif","javascript:ir_a_(56,'<?=traducemenu(56)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Préstamos al Sector Privado - 56");
 		   Menu2_1_2_2=new Array("rollover?"+BaseHref+"mdt_57_<?=$lng?>.gif?"+BaseHref+"mdt_over57_<?=$lng?>.gif","javascript:ir_a_(57,'<?=traducemenu(57)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Préstamos al Sector Público - 57");
 		   Menu2_1_2_3=new Array("rollover?"+BaseHref+"mdt_58_<?=$lng?>.gif?"+BaseHref+"mdt_over58_<?=$lng?>.gif","javascript:ir_a_(58,'<?=traducemenu(58)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Préstamos con Organismos Multilaterales o de Fomento - 58");
 		   Menu2_1_2_4=new Array("rollover?"+BaseHref+"mdt_59_<?=$lng?>.gif?"+BaseHref+"mdt_over59_<?=$lng?>.gif","javascript:ir_a_(59,'<?=traducemenu(59)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Swaps y Otros Productos Financieros - 59");
 		   Menu2_1_2_5=new Array("rollover?"+BaseHref+"mdt_60_<?=$lng?>.gif?"+BaseHref+"mdt_over60_<?=$lng?>.gif","javascript:ir_a_(60,'<?=traducemenu(60)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 60");
 		   Menu2_1_2_5_1=new Array("rollover?"+BaseHref+"mdt_185_<?=$lng?>.gif?"+BaseHref+"mdt_over185_<?=$lng?>.gif","javascript:ir_a_(185,'<?=traducemenu(185)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Asociación - 185");
 		   Menu2_1_2_5_2=new Array("rollover?"+BaseHref+"mdt_186_<?=$lng?>.gif?"+BaseHref+"mdt_over186_<?=$lng?>.gif","javascript:ir_a_(186,'<?=traducemenu(186)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Argentina - 186");
 		   Menu2_1_2_5_3=new Array("rollover?"+BaseHref+"mdt_187_<?=$lng?>.gif?"+BaseHref+"mdt_over187_<?=$lng?>.gif","javascript:ir_a_(187,'<?=traducemenu(187)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Chile - 187");
 		   Menu2_1_2_5_4=new Array("rollover?"+BaseHref+"mdt_188_<?=$lng?>.gif?"+BaseHref+"mdt_over188_<?=$lng?>.gif","javascript:ir_a_(188,'<?=traducemenu(188)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Brasil - 188");
 		   Menu2_1_3=new Array("rollover?"+BaseHref+"mdt_29_<?=$lng?>.gif?"+BaseHref+"mdt_over29_<?=$lng?>.gif","javascript:ir_a_(29,'<?=traducemenu(29)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Project Finance - 29");
 		   Menu2_1_3_1=new Array("rollover?"+BaseHref+"mdt_61_<?=$lng?>.gif?"+BaseHref+"mdt_over61_<?=$lng?>.gif","javascript:ir_a_(61,'','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia (Asociación, Argentina, Brasil & Chile) - 61");

			sec_actual='dos';
 		   Menu2_2=new Array("rollover?"+BaseHref+"mdt_10_<?=$lng?>.gif?"+BaseHref+"mdt_over10_<?=$lng?>.gif","javascript:ir_a_(10,'Compraventa de Empresas','"+sec_actual+"',3)","",1,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Compraventa de Empresas - 10");
 		 //  Menu2_2_1=new Array("rollover?"+BaseHref+"mdt_30_<?=$lng?>.gif?"+BaseHref+"mdt_over30_<?=$lng?>.gif","javascript:ir_a_(30,'Compraventa de Empresas','"+sec_actual+"')","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Compraventa de Empresas - 30");
 		 //  Menu2_2_2=new Array("rollover?"+BaseHref+"mdt_31_<?=$lng?>.gif?"+BaseHref+"mdt_over31_<?=$lng?>.gif","javascript:ir_a_(31,'Reorganizaciones Societarias','"+sec_actual+"')","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Reorganizaciones Societarias - 31");
 		 //  Menu2_2_3=new Array("rollover?"+BaseHref+"mdt_32_<?=$lng?>.gif?"+BaseHref+"mdt_over32_<?=$lng?>.gif","javascript:ir_a_(32,'Ofertas de adquisición','"+sec_actual+"')","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Ofertas de adquisición - 32");
 		   Menu2_2_1=new Array("rollover?"+BaseHref+"mdt_33_<?=$lng?>.gif?"+BaseHref+"mdt_over33_<?=$lng?>.gif","javascript:ir_a_(33,'Experiencia','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 33");

			sec_actual='tres';
 		   Menu2_3=new Array("rollover?"+BaseHref+"mdt_11_<?=$lng?>.gif?"+BaseHref+"mdt_over11_<?=$lng?>.gif","javascript:ir_a_(11,'Asesoramiento General','"+sec_actual+"',3)","",6,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Asesoramiento General - 11");
 		   Menu2_3_1=new Array("rollover?"+BaseHref+"mdt_35_<?=$lng?>.gif?"+BaseHref+"mdt_over35_<?=$lng?>.gif","javascript:ir_a_(35,'Cuestiones Societarias','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Cuestiones Societarias - 35");
 		   Menu2_3_2=new Array("rollover?"+BaseHref+"mdt_36_<?=$lng?>.gif?"+BaseHref+"mdt_over36_<?=$lng?>.gif","javascript:ir_a_(36,'Transacciones Comerciales','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Transacciones Comerciales - 36");
 		   Menu2_3_3=new Array("rollover?"+BaseHref+"mdt_37_<?=$lng?>.gif?"+BaseHref+"mdt_over37_<?=$lng?>.gif","javascript:ir_a_(37,'Propiedad Intelectual','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Propiedad Intelectual - 37");
 		   Menu2_3_4=new Array("rollover?"+BaseHref+"mdt_38_<?=$lng?>.gif?"+BaseHref+"mdt_over38_<?=$lng?>.gif","javascript:ir_a_(38,'Derecho Inmobiliario','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Derecho Inmobiliario - 38");
 		   Menu2_3_5=new Array("rollover?"+BaseHref+"mdt_39_<?=$lng?>.gif?"+BaseHref+"mdt_over39_<?=$lng?>.gif","javascript:ir_a_(39,'Derecho Laboral y de la Seguridad Social','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Derecho Laboral y de la Seguridad Social - 39");
 		   Menu2_3_6=new Array("rollover?"+BaseHref+"mdt_40_<?=$lng?>.gif?"+BaseHref+"mdt_over40_<?=$lng?>.gif","javascript:ir_a_(40,'Defensa del Consumidor','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Defensa del Consumidor - 40");
 		   Menu2_3_7=new Array("rollover?"+BaseHref+"mdt_164_<?=$lng?>.gif?"+BaseHref+"mdt_over164_<?=$lng?>.gif","javascript:ir_a_(164,'Experiencia','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 164");

			sec_actual='cuatro';
 		   Menu2_4=new Array("rollover?"+BaseHref+"mdt_12_<?=$lng?>.gif?"+BaseHref+"mdt_over12_<?=$lng?>.gif","javascript:ir_a_(12,'Reestructuraciones, Concursos y Quiebras','"+sec_actual+"',3)","",3,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Reestructuraciones, Concursos y Quiebras - 12");
 		   Menu2_4_1=new Array("rollover?"+BaseHref+"mdt_64_<?=$lng?>.gif?"+BaseHref+"mdt_over64_<?=$lng?>.gif","javascript:ir_a_(64,'Reestructuraciones','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Reestructuraciones - 64");
 		   Menu2_4_2=new Array("rollover?"+BaseHref+"mdt_65_<?=$lng?>.gif?"+BaseHref+"mdt_over65_<?=$lng?>.gif","javascript:ir_a_(65,'Concursos y quiebras','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Concursos y quiebras - 65");
 		   Menu2_4_3=new Array("rollover?"+BaseHref+"mdt_66_<?=$lng?>.gif?"+BaseHref+"mdt_over66_<?=$lng?>.gif","javascript:ir_a_(66,'Experiencia','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 66");

			sec_actual='cinco';
 		   Menu2_5=new Array("rollover?"+BaseHref+"mdt_13_<?=$lng?>.gif?"+BaseHref+"mdt_over13_<?=$lng?>.gif","javascript:ir_a_(13,'Derecho Regulatorio','"+sec_actual+"',3)","",7,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Derecho Regulatorio - 13");
 		   Menu2_5_1=new Array("rollover?"+BaseHref+"mdt_70_<?=$lng?>.gif?"+BaseHref+"mdt_over70_<?=$lng?>.gif","javascript:ir_a_(70,'Antitrust','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Antitrust - 70");
 		   Menu2_5_1_1=new Array("rollover?"+BaseHref+"mdt_71_<?=$lng?>.gif?"+BaseHref+"mdt_over71_<?=$lng?>.gif","javascript:ir_a_(71,'Contratos Públicos','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Contratos Públicos - 71");
 		   Menu2_5_1_2=new Array("rollover?"+BaseHref+"mdt_72_<?=$lng?>.gif?"+BaseHref+"mdt_over72_<?=$lng?>.gif","javascript:ir_a_(72,'Entidades Financieras','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Entidades Financieras - 72");
 		   Menu2_5_1_3=new Array("rollover?"+BaseHref+"mdt_73_<?=$lng?>.gif?"+BaseHref+"mdt_over73_<?=$lng?>.gif","javascript:ir_a_(73,'Seguros','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Seguros - 73");
 		   Menu2_5_1_4=new Array("rollover?"+BaseHref+"mdt_74_<?=$lng?>.gif?"+BaseHref+"mdt_over74_<?=$lng?>.gif","javascript:ir_a_(74,'Telecomunicaciones y medios','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Telecomunicaciones y medios - 74");
 		   Menu2_5_2=new Array("rollover?"+BaseHref+"mdt_75_<?=$lng?>.gif?"+BaseHref+"mdt_over75_<?=$lng?>.gif","javascript:ir_a_(75,'Medio Ambiente','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Medio Ambiente - 75");
 		   Menu2_5_3=new Array("rollover?"+BaseHref+"mdt_76_<?=$lng?>.gif?"+BaseHref+"mdt_over76_<?=$lng?>.gif","javascript:ir_a_(76,'Industrias Reguladas','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Industrias Reguladas - 76");
 		   Menu2_5_4=new Array("rollover?"+BaseHref+"mdt_77_<?=$lng?>.gif?"+BaseHref+"mdt_over77_<?=$lng?>.gif","javascript:ir_a_(77,'Minería y Recursos Naturales','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Minería y Recursos Naturales - 77");
 		   Menu2_5_5=new Array("rollover?"+BaseHref+"mdt_165_<?=$lng?>.gif?"+BaseHref+"mdt_over165_<?=$lng?>.gif","javascript:ir_a_(165,'Inversiones Extranjeras','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Inversiones Extranjeras - 165");
 		   Menu2_5_6=new Array("rollover?"+BaseHref+"mdt_166_<?=$lng?>.gif?"+BaseHref+"mdt_over166_<?=$lng?>.gif","javascript:ir_a_(166,'Comercio Exterior y Derecho Aduanero','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Comercio Exterior y Derecho Aduanero - 166");
 		   Menu2_5_7=new Array("rollover?"+BaseHref+"mdt_167_<?=$lng?>.gif?"+BaseHref+"mdt_over167_<?=$lng?>.gif","javascript:ir_a_(167,'Experiencia','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 167");

			sec_actual='seis';
 		   Menu2_6=new Array("rollover?"+BaseHref+"mdt_14_<?=$lng?>.gif?"+BaseHref+"mdt_over14_<?=$lng?>.gif","javascript:ir_a_(14,'Impuestos & Tax Planning','"+sec_actual+"',3)","",2,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Impuestos & Tax Planning - 14");
 		   Menu2_6_1=new Array("rollover?"+BaseHref+"mdt_79_<?=$lng?>.gif?"+BaseHref+"mdt_over79_<?=$lng?>.gif","javascript:ir_a_(79,'Impuestos','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Impuestos - 79");
 		   Menu2_6_2=new Array("rollover?"+BaseHref+"mdt_80_<?=$lng?>.gif?"+BaseHref+"mdt_over80_<?=$lng?>.gif","javascript:ir_a_(80,'Tax Planning','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Tax Planning - 80");

			sec_actual='siete';
 		   Menu2_7=new Array("rollover?"+BaseHref+"mdt_15_<?=$lng?>.gif?"+BaseHref+"mdt_over15_<?=$lng?>.gif","javascript:ir_a_(15,'Solución de Controversias','"+sec_actual+",3)","",5,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Solución de Controversias - 15");
 		   Menu2_7_1=new Array("rollover?"+BaseHref+"mdt_82_<?=$lng?>.gif?"+BaseHref+"mdt_over82_<?=$lng?>.gif","javascript:ir_a_(82,'Negociación','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Negociación - 82");
 		   Menu2_7_2=new Array("rollover?"+BaseHref+"mdt_83_<?=$lng?>.gif?"+BaseHref+"mdt_over83_<?=$lng?>.gif","javascript:ir_a_(83,'Litigios','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Litigios - 83");
 		   Menu2_7_3=new Array("rollover?"+BaseHref+"mdt_84_<?=$lng?>.gif?"+BaseHref+"mdt_over84_<?=$lng?>.gif","javascript:ir_a_(84,'Mediaciones','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Mediaciones - 84");
 		   Menu2_7_4=new Array("rollover?"+BaseHref+"mdt_85_<?=$lng?>.gif?"+BaseHref+"mdt_over85_<?=$lng?>.gif","javascript:ir_a_(85,'Procesos Arbitrales','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Procesos Arbitrales - 85");
 		   Menu2_7_5=new Array("rollover?"+BaseHref+"mdt_86_<?=$lng?>.gif?"+BaseHref+"mdt_over86_<?=$lng?>.gif","javascript:ir_a_(86,'Experiencia','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 86");

	  Menu3=new Array("rollover?"+BaseHref+"mdt_8_<?=$lng?>.gif?"+BaseHref+"mdt_over8_<?=$lng?>.gif","javascript:ir_a(8)","",0,28,96,"","","black","white","","",-1,-1,-1,"center","Bureau de Tranductores");
 		   Menu3_1=new Array("rollover?"+BaseHref+"mdt_125_<?=$lng?>.gif?"+BaseHref+"mdt_over125_<?=$lng?>.gif","javascript:ir_a(125)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Último Newsletter y otras novedades - 125");

	  Menu4=new Array("rollover?"+BaseHref+"mdt_5_<?=$lng?>.gif?"+BaseHref+"mdt_over5_<?=$lng?>.gif","javascript:ir_a(5)","",0,28,96,"","","black","white","","",-1,-1,-1,"center","Nuestro Equipo");

	  Menu5=new Array("rollover?"+BaseHref+"mdt_6_<?=$lng?>.gif?"+BaseHref+"mdt_over6_<?=$lng?>.gif","javascript:ir_a(6)","",0,28,96,"","","black","white","","",-1,-1,-1,"center","Clientes Representativos");

	  Menu6=new Array("rollover?"+BaseHref+"mdt_122_<?=$lng?>.gif?"+BaseHref+"mdt_over122_<?=$lng?>.gif","javascript:ir_a(122)","",0,28,96,"","","black","white","","",-1,-1,-1,"center","Oportunidades");

	  sec_actual='uno'
	  Menu7=new Array("rollover?"+BaseHref+"mdt_7_<?=$lng?>.gif?"+BaseHref+"mdt_over7_<?=$lng?>.gif","javascript:ir_a(7)","",2,28,96,"","","black","white","","",-1,-1,-1,"center","Noticias");
 		   Menu7_1=new Array("rollover?"+BaseHref+"mdt_23_<?=$lng?>.gif?"+BaseHref+"mdt_over23_<?=$lng?>.gif","javascript:ir_a_(23,'En la prensa','"+sec_actual+"',7)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","En la prensa - 23");
 		   Menu7_2=new Array("rollover?"+BaseHref+"mdt_172_<?=$lng?>.gif?"+BaseHref+"mdt_over172_<?=$lng?>.gif","javascript:ir_a_(172,'Publicaciones y Seminarios','"+sec_actual+"',7)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Publicaciones y seminarios - 172");
	
</script>
				<script type='text/javascript' src='menu9_com.js'></script>
			</span>
		</td></tr>
</table>
</div>
<?
function traducemenu($id){
	global $lng;
	$db1=new DBI();
	$db1->select('secciones','*',"id=$id and lng='$lng'");
	if($db1->num_rows()>0){
		$row=$db1->fetch_object();
		echo $row->titulo;
	}
	else{
		echo "no hay datos";
	}

}
?>