<?

?>

<link href="estilosalvarez.css" rel="stylesheet" type="text/css">
<style type="text/css">

<!--
body {
	margin-left: 2px;
	margin-top: 2px;
	margin-right: 2px;
	margin-bottom: 2px;
}
  @font-face {
    font-family: Bliss-Regular;
    font-style:  normal;
    font-weight: normal;
    src: url(http://www.powersite.com.ar/mdt/BLISSRE1.eot);
  }
  @font-face {
    font-family: Bliss-Regular;
    font-style:  normal;
    font-weight: 700;
    src: url(http://www.powersite.com.ar/mdt/BLISSRE0.eot);
  }

-->
</style>
<div align="center">
<table width="100%" height="28" border="0" cellpadding="0" cellspacing="0" bgcolor="">
		<tr><td height="28" bgcolor="#666666">
			<span id="menues">
				<style type="text/css">
  @font-face {
    font-family: Bliss-Regular;
    font-style:  normal;
    font-weight: normal;
    src: url(http://www.powersite.com.ar/mdt/BLISSRE1.eot);
  }
  @font-face {
    font-family: Bliss-Regular;
    font-style:  normal;
    font-weight: 700;
    src: url(http://www.powersite.com.ar/mdt/BLISSRE0.eot);
  }

.colorover{
    font-family: Bliss-Regular;
	 font-size: 10px;
    font-style:  normal;
    font-weight: normal;
	 color:#FFFFFF;
}
.colorout{
    font-family: Bliss-Regular;
	 font-size: 10px;
    font-style:  normal;
    font-weight: normal;
	 color:#000000;
}

</style>

<script type='text/javascript'>function Go(){return}</script>

<script>

	var BaseHref="http://www.powersite.com.ar/mdt/menu/"; 
	// BaseHref lets you specify the root directory for relative links. 
	var Arrws=[BaseHref+"ico.jpg",0,0,BaseHref+"ico.jpg",0,0,BaseHref+"ico.jpg",0,0,BaseHref+"ico.jpg",0,0]; align="left";

	var LowBgColor="e4e4e4";			// Background color when mouse is not over
	var HighBgColor="156891";			// Background color when mouse is over
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


		var NoOffFirstLineMenus=6;			// Number of main menu  items

	  Menu1=new Array("rollover?"+BaseHref+"sou_1_<?=$lng?>.gif?"+BaseHref+"sou_over1_<?=$lng?>.gif","javascript:ir_a(1)","",0,28,112,"","","black","white","","",-1,-1,-1,"center","Perfil");
 		   Menu1_1=new Array("rollover?"+BaseHref+"sou_160_<?=$lng?>.gif?"+BaseHref+"sou_over160_<?=$lng?>.gif","javascript:ir_a_(160,'<?=traducemenu(160)?>','')","",3,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Asociación - 160");
 		   Menu1_1_1=new Array("rollover?"+BaseHref+"sou_161_<?=$lng?>.gif?"+BaseHref+"sou_over161_<?=$lng?>.gif","javascript:ir_a_(161,'<?=traducemenu(191)?>','')","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Argentina - 161");
 		   Menu1_1_2=new Array("rollover?"+BaseHref+"sou_162_<?=$lng?>.gif?"+BaseHref+"sou_over162_<?=$lng?>.gif","javascript:ir_a_(162,'<?=traducemenu(162)?>','')","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Brasil - 162");
 		   Menu1_1_3=new Array("rollover?"+BaseHref+"sou_163_<?=$lng?>.gif?"+BaseHref+"sou_over163_<?=$lng?>.gif","javascript:ir_a_(163,'<?=traducemenu(163)?>','')","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Chile - 163");

	  sec_actual='uno';
	  Menu2=new Array("rollover?"+BaseHref+"sou_3_<?=$lng?>.gif?"+BaseHref+"sou_over3_<?=$lng?>.gif","javascript:ir_a(3)","",7,28,112,"","","black","white","","",-1,-1,-1,"center","Areas de Práctica");
 		   Menu2_1=new Array("rollover?"+BaseHref+"sou_9_<?=$lng?>.gif?"+BaseHref+"sou_over9_<?=$lng?>.gif","javascript:ir_a_(9,'<?=traducemenu(9)?>','"+sec_actual+"',3)","",3,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Financiación de Empresas - 9");
 		   Menu2_1_1=new Array("rollover?"+BaseHref+"sou_27_<?=$lng?>.gif?"+BaseHref+"sou_over27_<?=$lng?>.gif","javascript:ir_a_(27,'<?=traducemenu(27)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Mercado de Capitales - 27");
 		   Menu2_1_1_1=new Array("rollover?"+BaseHref+"sou_42_<?=$lng?>.gif?"+BaseHref+"sou_over42_<?=$lng?>.gif","javascript:ir_a_(42,'<?=traducemenu(42)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Acciones - 42");
 		   Menu2_1_1_2=new Array("rollover?"+BaseHref+"sou_52_<?=$lng?>.gif?"+BaseHref+"sou_over52_<?=$lng?>.gif","javascript:ir_a_(52,'<?=traducemenu(52)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Valores convertibles; Warrants - 52");
 		   Menu2_1_1_3=new Array("rollover?"+BaseHref+"sou_53_<?=$lng?>.gif?"+BaseHref+"sou_over53_<?=$lng?>.gif","javascript:ir_a_(53,'<?=traducemenu(53)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Títulos de Deuda - 53");
 		   Menu2_1_1_4=new Array("rollover?"+BaseHref+"sou_54_<?=$lng?>.gif?"+BaseHref+"sou_over54_<?=$lng?>.gif","javascript:ir_a_(54,'<?=traducemenu(54)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Securitización - 54");
 		   Menu2_1_1_5=new Array("rollover?"+BaseHref+"sou_180_<?=$lng?>.gif?"+BaseHref+"sou_over180_<?=$lng?>.gif","javascript:ir_a_(180,'<?=traducemenu(180)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 180");
 		   Menu2_1_1_5_1=new Array("rollover?"+BaseHref+"sou_181_<?=$lng?>.gif?"+BaseHref+"sou_over181_<?=$lng?>.gif","javascript:ir_a_(181,'<?=traducemenu(181)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Asociación - 181");
 		   Menu2_1_1_5_2=new Array("rollover?"+BaseHref+"sou_182_<?=$lng?>.gif?"+BaseHref+"sou_over182_<?=$lng?>.gif","javascript:ir_a_(182,'<?=traducemenu(182)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Argentina - 182");
 		   Menu2_1_1_5_3=new Array("rollover?"+BaseHref+"sou_183_<?=$lng?>.gif?"+BaseHref+"sou_over183_<?=$lng?>.gif","javascript:ir_a_(183,'<?=traducemenu(183)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Brasil - 183");
 		   Menu2_1_1_5_4=new Array("rollover?"+BaseHref+"sou_184_<?=$lng?>.gif?"+BaseHref+"sou_over184_<?=$lng?>.gif","javascript:ir_a_(184,'<?=traducemenu(184)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Chile - 184");

 		   Menu2_1_2=new Array("rollover?"+BaseHref+"sou_28_<?=$lng?>.gif?"+BaseHref+"sou_over28_<?=$lng?>.gif","javascript:ir_a_(28,'<?=traducemenu(28)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Mercado Financiero - 28");
 		   Menu2_1_2_1=new Array("rollover?"+BaseHref+"sou_56_<?=$lng?>.gif?"+BaseHref+"sou_over56_<?=$lng?>.gif","javascript:ir_a_(56,'<?=traducemenu(56)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Préstamos al Sector Privado - 56");
 		   Menu2_1_2_2=new Array("rollover?"+BaseHref+"sou_57_<?=$lng?>.gif?"+BaseHref+"sou_over57_<?=$lng?>.gif","javascript:ir_a_(57,'<?=traducemenu(57)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Préstamos al Sector Público - 57");
 		   Menu2_1_2_3=new Array("rollover?"+BaseHref+"sou_58_<?=$lng?>.gif?"+BaseHref+"sou_over58_<?=$lng?>.gif","javascript:ir_a_(58,'<?=traducemenu(58)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Préstamos con Organismos Multilaterales o de Fomento - 58");
 		   Menu2_1_2_4=new Array("rollover?"+BaseHref+"sou_59_<?=$lng?>.gif?"+BaseHref+"sou_over59_<?=$lng?>.gif","javascript:ir_a_(59,'<?=traducemenu(59)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Swaps y Otros Productos Financieros - 59");
 		   Menu2_1_2_5=new Array("rollover?"+BaseHref+"sou_60_<?=$lng?>.gif?"+BaseHref+"sou_over60_<?=$lng?>.gif","javascript:ir_a_(60,'<?=traducemenu(60)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 60");
 		   Menu2_1_2_5_1=new Array("rollover?"+BaseHref+"sou_185_<?=$lng?>.gif?"+BaseHref+"sou_over185_<?=$lng?>.gif","javascript:ir_a_(185,'<?=traducemenu(185)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Asociación - 185");
 		   Menu2_1_2_5_2=new Array("rollover?"+BaseHref+"sou_186_<?=$lng?>.gif?"+BaseHref+"sou_over186_<?=$lng?>.gif","javascript:ir_a_(186,'<?=traducemenu(186)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Argentina - 186");
 		   Menu2_1_2_5_3=new Array("rollover?"+BaseHref+"sou_187_<?=$lng?>.gif?"+BaseHref+"sou_over187_<?=$lng?>.gif","javascript:ir_a_(187,'<?=traducemenu(187)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Chile - 187");
 		   Menu2_1_2_5_4=new Array("rollover?"+BaseHref+"sou_188_<?=$lng?>.gif?"+BaseHref+"sou_over188_<?=$lng?>.gif","javascript:ir_a_(188,'<?=traducemenu(188)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Brasil - 188");
 		   Menu2_1_3=new Array("rollover?"+BaseHref+"sou_29_<?=$lng?>.gif?"+BaseHref+"sou_over29_<?=$lng?>.gif","javascript:ir_a_(129,'<?=traducemenu(129)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Project Finance - 29");
 		   Menu2_1_3_1=new Array("rollover?"+BaseHref+"sou_61_<?=$lng?>.gif?"+BaseHref+"sou_over61_<?=$lng?>.gif","javascript:ir_a_(61,'<?=traducemenu(61)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia (Asociación, Argentina, Brasil & Chile) - 61");

		  sec_actual='dos';
 		   Menu2_2=new Array("rollover?"+BaseHref+"sou_10_<?=$lng?>.gif?"+BaseHref+"sou_over10_<?=$lng?>.gif","javascript:ir_a_(10,'<?=traducemenu(10)?>','"+sec_actual+"',3)","",1,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Compraventa de Empresas - 10");
 		//   Menu2_2_1=new Array("rollover?"+BaseHref+"sou_30_<?=$lng?>.gif?"+BaseHref+"sou_over30_<?=$lng?>.gif","javascript:ir_a_(30,'<?=traducemenu(30)?>','"+sec_actual+"')","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Compraventa de Empresas - 30");
 		 //  Menu2_2_2=new Array("rollover?"+BaseHref+"sou_31_<?=$lng?>.gif?"+BaseHref+"sou_over31_<?=$lng?>.gif","javascript:ir_a_(31,'<?=traducemenu(31)?>','"+sec_actual+"')","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Reorganizaciones Societarias - 31");
 		  // Menu2_2_3=new Array("rollover?"+BaseHref+"sou_32_<?=$lng?>.gif?"+BaseHref+"sou_over32_<?=$lng?>.gif","javascript:ir_a_(32,'<?=traducemenu(32)?>','"+sec_actual+"')","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Ofertas de adquisición - 32");
 		   Menu2_2_1=new Array("rollover?"+BaseHref+"sou_33_<?=$lng?>.gif?"+BaseHref+"sou_over33_<?=$lng?>.gif","javascript:ir_a_(33,'<?=traducemenu(33)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 33");

	  	  sec_actual='tres';
		   Menu2_3=new Array("rollover?"+BaseHref+"sou_11_<?=$lng?>.gif?"+BaseHref+"sou_over11_<?=$lng?>.gif","javascript:ir_a_(11,'<?=traducemenu(11)?>','"+sec_actual+"',3)","",6,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Asesoramiento General - 11");
 		   Menu2_3_1=new Array("rollover?"+BaseHref+"sou_35_<?=$lng?>.gif?"+BaseHref+"sou_over35_<?=$lng?>.gif","javascript:ir_a_(35,'<?=traducemenu(35)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Cuestiones Societarias - 35");
 		   Menu2_3_2=new Array("rollover?"+BaseHref+"sou_36_<?=$lng?>.gif?"+BaseHref+"sou_over36_<?=$lng?>.gif","javascript:ir_a_(36,'<?=traducemenu(36)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Transacciones Comerciales - 36");
 		   Menu2_3_3=new Array("rollover?"+BaseHref+"sou_37_<?=$lng?>.gif?"+BaseHref+"sou_over37_<?=$lng?>.gif","javascript:ir_a_(37,'<?=traducemenu(37)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Propiedad Intelectual - 37");
 		   Menu2_3_4=new Array("rollover?"+BaseHref+"sou_38_<?=$lng?>.gif?"+BaseHref+"sou_over38_<?=$lng?>.gif","javascript:ir_a_(38,'<?=traducemenu(38)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Derecho Inmobiliario - 38");
 		   Menu2_3_5=new Array("rollover?"+BaseHref+"sou_39_<?=$lng?>.gif?"+BaseHref+"sou_over39_<?=$lng?>.gif","javascript:ir_a_(39,'<?=traducemenu(39)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Derecho Laboral y de la Seguridad Social - 39");
 		   Menu2_3_6=new Array("rollover?"+BaseHref+"sou_40_<?=$lng?>.gif?"+BaseHref+"sou_over40_<?=$lng?>.gif","javascript:ir_a_(40,'<?=traducemenu(40)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Defensa del Consumidor - 40");
 		   Menu2_3_7=new Array("rollover?"+BaseHref+"sou_164_<?=$lng?>.gif?"+BaseHref+"sou_over164_<?=$lng?>.gif","javascript:ir_a_(164,'<?=traducemenu(164)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 164");

		  sec_actual='cuatro';
 		   Menu2_4=new Array("rollover?"+BaseHref+"sou_12_<?=$lng?>.gif?"+BaseHref+"sou_over12_<?=$lng?>.gif","javascript:ir_a_(12,'<?=traducemenu(12)?>','"+sec_actual+"',3)","",3,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Reestructuraciones, Concursos y Quiebras - 12");
 		   Menu2_4_1=new Array("rollover?"+BaseHref+"sou_64_<?=$lng?>.gif?"+BaseHref+"sou_over64_<?=$lng?>.gif","javascript:ir_a_(64,'<?=traducemenu(64)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Reestructuraciones - 64");
 		   Menu2_4_2=new Array("rollover?"+BaseHref+"sou_65_<?=$lng?>.gif?"+BaseHref+"sou_over65_<?=$lng?>.gif","javascript:ir_a_(65,'<?=traducemenu(65)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Concursos y quiebras - 65");
 		   Menu2_4_3=new Array("rollover?"+BaseHref+"sou_66_<?=$lng?>.gif?"+BaseHref+"sou_over66_<?=$lng?>.gif","javascript:ir_a_(66,'<?=traducemenu(66)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 66");

		  sec_actual='cinco';
 		   Menu2_5=new Array("rollover?"+BaseHref+"sou_13_<?=$lng?>.gif?"+BaseHref+"sou_over13_<?=$lng?>.gif","javascript:ir_a_(13,'<?=traducemenu(13)?>','"+sec_actual+"',3)","",7,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Derecho Regulatorio - 13");
 		   Menu2_5_1=new Array("rollover?"+BaseHref+"sou_70_<?=$lng?>.gif?"+BaseHref+"sou_over70_<?=$lng?>.gif","javascript:ir_a_(70,'<?=traducemenu(70)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Antitrust - 70");
 		   Menu2_5_1_1=new Array("rollover?"+BaseHref+"sou_71_<?=$lng?>.gif?"+BaseHref+"sou_over71_<?=$lng?>.gif","javascript:ir_a_(71,'<?=traducemenu(71)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Contratos Públicos - 71");
 		   Menu2_5_1_2=new Array("rollover?"+BaseHref+"sou_72_<?=$lng?>.gif?"+BaseHref+"sou_over72_<?=$lng?>.gif","javascript:ir_a_(72,'<?=traducemenu(72)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Entidades Financieras - 72");
 		   Menu2_5_1_3=new Array("rollover?"+BaseHref+"sou_73_<?=$lng?>.gif?"+BaseHref+"sou_over73_<?=$lng?>.gif","javascript:ir_a_(73,'<?=traducemenu(73)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Seguros - 73");
 		   Menu2_5_1_4=new Array("rollover?"+BaseHref+"sou_74_<?=$lng?>.gif?"+BaseHref+"sou_over74_<?=$lng?>.gif","javascript:ir_a_(74,'<?=traducemenu(74)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Telecomunicaciones y medios - 74");
 		   Menu2_5_2=new Array("rollover?"+BaseHref+"sou_75_<?=$lng?>.gif?"+BaseHref+"sou_over75_<?=$lng?>.gif","javascript:ir_a_(75,'<?=traducemenu(75)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Medio Ambiente - 75");
 		   Menu2_5_3=new Array("rollover?"+BaseHref+"sou_76_<?=$lng?>.gif?"+BaseHref+"sou_over76_<?=$lng?>.gif","javascript:ir_a_(76,'<?=traducemenu(76)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Industrias Reguladas - 76");
 		   Menu2_5_4=new Array("rollover?"+BaseHref+"sou_77_<?=$lng?>.gif?"+BaseHref+"sou_over77_<?=$lng?>.gif","javascript:ir_a_(77,'<?=traducemenu(77)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Minería y Recursos Naturales - 77");
 		   Menu2_5_5=new Array("rollover?"+BaseHref+"sou_165_<?=$lng?>.gif?"+BaseHref+"sou_over165_<?=$lng?>.gif","javascript:ir_a_(165,'<?=traducemenu(165)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Inversiones Extranjeras - 165");
 		   Menu2_5_6=new Array("rollover?"+BaseHref+"sou_166_<?=$lng?>.gif?"+BaseHref+"sou_over166_<?=$lng?>.gif","javascript:ir_a_(166,'<?=traducemenu(166)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Comercio Exterior y Derecho Aduanero - 166");
 		   Menu2_5_7=new Array("rollover?"+BaseHref+"sou_167_<?=$lng?>.gif?"+BaseHref+"sou_over167_<?=$lng?>.gif","javascript:ir_a_(167,'<?=traducemenu(167)?>','"+sec_actual+"',3)","",0,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 167");

		  sec_actual='seis';
 		   Menu2_6=new Array("rollover?"+BaseHref+"sou_14_<?=$lng?>.gif?"+BaseHref+"sou_over14_<?=$lng?>.gif","javascript:ir_a_(14,'<?=traducemenu(14)?>','"+sec_actual+"',3)","",2,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Impuestos & Tax Planning - 14");
 		   Menu2_6_1=new Array("rollover?"+BaseHref+"sou_79_<?=$lng?>.gif?"+BaseHref+"sou_over79_<?=$lng?>.gif","javascript:ir_a_(79,'<?=traducemenu(79)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Impuestos - 79");
 		   Menu2_6_2=new Array("rollover?"+BaseHref+"sou_80_<?=$lng?>.gif?"+BaseHref+"sou_over80_<?=$lng?>.gif","javascript:ir_a_(80,'<?=traducemenu(80)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Tax Planning - 80");

		  sec_actual='siete';
 		   Menu2_7=new Array("rollover?"+BaseHref+"sou_15_<?=$lng?>.gif?"+BaseHref+"sou_over15_<?=$lng?>.gif","javascript:ir_a_(15,'<?=traducemenu(15)?>','"+sec_actual+"',3)","",5,16,270,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Solución de Controversias - 15");
 		   Menu2_7_1=new Array("rollover?"+BaseHref+"sou_82_<?=$lng?>.gif?"+BaseHref+"sou_over82_<?=$lng?>.gif","javascript:ir_a_(82,'<?=traducemenu(82)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Negociación - 82");
 		   Menu2_7_2=new Array("rollover?"+BaseHref+"sou_83_<?=$lng?>.gif?"+BaseHref+"sou_over83_<?=$lng?>.gif","javascript:ir_a_(83,'<?=traducemenu(83)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Litigios - 83");
 		   Menu2_7_3=new Array("rollover?"+BaseHref+"sou_84_<?=$lng?>.gif?"+BaseHref+"sou_over84_<?=$lng?>.gif","javascript:ir_a_(84,'<?=traducemenu(84)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Mediaciones - 84");
 		   Menu2_7_4=new Array("rollover?"+BaseHref+"sou_85_<?=$lng?>.gif?"+BaseHref+"sou_over85_<?=$lng?>.gif","javascript:ir_a_(85,'<?=traducemenu(85)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Procesos Arbitrales - 85");
 		   Menu2_7_5=new Array("rollover?"+BaseHref+"sou_86_<?=$lng?>.gif?"+BaseHref+"sou_over86_<?=$lng?>.gif","javascript:ir_a_(86,'<?=traducemenu(86)?>','"+sec_actual+"',3)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Experiencia - 86");








	  Menu3=new Array("rollover?"+BaseHref+"sou_5_<?=$lng?>.gif?"+BaseHref+"sou_over5_<?=$lng?>.gif","javascript:ir_a(5)","",0,28,112,"","","black","white","","",-1,-1,-1,"center","Nuestro Equipo");
 		   Menu3_1=new Array("rollover?"+BaseHref+"sou_99_<?=$lng?>.gif?"+BaseHref+"sou_over99_<?=$lng?>.gif","javascript:ir_a(99)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Antecedentes - 99");
 		   Menu3_2=new Array("rollover?"+BaseHref+"sou_159_<?=$lng?>.gif?"+BaseHref+"sou_over159_<?=$lng?>.gif","javascript:ir_a(159)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Curriculum de los socios - 159");

	  Menu4=new Array("rollover?"+BaseHref+"sou_6_<?=$lng?>.gif?"+BaseHref+"sou_over6_<?=$lng?>.gif","javascript:ir_a(6)","",0,28,112,"","","black","white","","",-1,-1,-1,"center","Clientes Representativos");
 		   Menu4_1=new Array("rollover?"+BaseHref+"sou_19_<?=$lng?>.gif?"+BaseHref+"sou_over19_<?=$lng?>.gif","javascript:ir_a(19)","",3,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Asociación - 19");
 		   Menu4_1_1=new Array("rollover?"+BaseHref+"sou_168_<?=$lng?>.gif?"+BaseHref+"sou_over168_<?=$lng?>.gif","javascript:ir_a(168)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Argentina - 168");
 		   Menu4_1_2=new Array("rollover?"+BaseHref+"sou_169_<?=$lng?>.gif?"+BaseHref+"sou_over169_<?=$lng?>.gif","javascript:ir_a(169)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Brasil - 169");
 		   Menu4_1_3=new Array("rollover?"+BaseHref+"sou_170_<?=$lng?>.gif?"+BaseHref+"sou_over170_<?=$lng?>.gif","javascript:ir_a(170)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Chile - 170");

	  Menu5=new Array("rollover?"+BaseHref+"sou_122_<?=$lng?>.gif?"+BaseHref+"sou_over122_<?=$lng?>.gif","javascript:ir_a(122)","",0,28,112,"","","black","white","","",-1,-1,-1,"center","Oportunidades");
 		   Menu5_1=new Array("rollover?"+BaseHref+"sou_146_<?=$lng?>.gif?"+BaseHref+"sou_over146_<?=$lng?>.gif","javascript:ir_a(146)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Política de empleo - 146");
 		   Menu5_1_1=new Array("rollover?"+BaseHref+"sou_177_<?=$lng?>.gif?"+BaseHref+"sou_over177_<?=$lng?>.gif","javascript:ir_a(177)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Argentina - 177");
 		   Menu5_1_2=new Array("rollover?"+BaseHref+"sou_178_<?=$lng?>.gif?"+BaseHref+"sou_over178_<?=$lng?>.gif","javascript:ir_a(178)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Brasil - 178");
 		   Menu5_1_3=new Array("rollover?"+BaseHref+"sou_179_<?=$lng?>.gif?"+BaseHref+"sou_over179_<?=$lng?>.gif","javascript:ir_a(179)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Chile - 179");

		sec_actual='uno';
	  Menu6=new Array("rollover?"+BaseHref+"sou_7_<?=$lng?>.gif?"+BaseHref+"sou_over7_<?=$lng?>.gif","javascript:ir_a(7)","",2,28,112,"","","black","white","","",-1,-1,-1,"center","Noticias");
 		   Menu6_1=new Array("rollover?"+BaseHref+"sou_23_<?=$lng?>.gif?"+BaseHref+"sou_over23_<?=$lng?>.gif","javascript:ir_a_(23,'<?=traducemenu(23)?>','"+sec_actual+"',7)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","En la prensa - 23");
 		   Menu6_2=new Array("rollover?"+BaseHref+"sou_172_<?=$lng?>.gif?"+BaseHref+"sou_over172_<?=$lng?>.gif","javascript:ir_a_(172,'<?=traducemenu(172)?>','"+sec_actual+"',7)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Publicaciones y seminarios - 172");

 		   Menu6_1_1=new Array("rollover?"+BaseHref+"sou_87_<?=$lng?>.gif?"+BaseHref+"sou_over87_<?=$lng?>.gif","javascript:ir_a(87)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Asociación - 87");
 		   Menu6_1_2=new Array("rollover?"+BaseHref+"sou_88_<?=$lng?>.gif?"+BaseHref+"sou_over88_<?=$lng?>.gif","javascript:ir_a(88)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Argentina - 88");
 		   Menu6_1_3=new Array("rollover?"+BaseHref+"sou_89_<?=$lng?>.gif?"+BaseHref+"sou_over89_<?=$lng?>.gif","javascript:ir_a(89)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Brasil - 89");
 		   Menu6_1_4=new Array("rollover?"+BaseHref+"sou_171_<?=$lng?>.gif?"+BaseHref+"sou_over171_<?=$lng?>.gif","javascript:ir_a(171)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Chile - 171");
 		   Menu6_2_1=new Array("rollover?"+BaseHref+"sou_173_<?=$lng?>.gif?"+BaseHref+"sou_over173_<?=$lng?>.gif","javascript:ir_a(173)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Asociación - 173");
 		   Menu6_2_2=new Array("rollover?"+BaseHref+"sou_174_<?=$lng?>.gif?"+BaseHref+"sou_over174_<?=$lng?>.gif","javascript:ir_a(174)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Argentina - 174");
 		   Menu6_2_3=new Array("rollover?"+BaseHref+"sou_175_<?=$lng?>.gif?"+BaseHref+"sou_over175_<?=$lng?>.gif","javascript:ir_a(175)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Brasil - 175");
 		   Menu6_2_4=new Array("rollover?"+BaseHref+"sou_176_<?=$lng?>.gif?"+BaseHref+"sou_over176_<?=$lng?>.gif","javascript:ir_a(176)","",0,16,150,"e4e4e4","e4e4e4","black","white","","",-1,-1,-1,"center","Chile - 176");
	
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