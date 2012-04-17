<?
	require ('./inc/conf.inc.php'); 
	foreach($_REQUEST as $a => $b){
		$$a=$b;
	}

#################################################################################
#    PREVIEW                                                                    #
#################################################################################
	
		$db->select('newsletter_indice','*',"id=$id_news");
		$rowc=$db->fetch_object();
		$titulo_news='&bull;&nbsp;'.$rowc->nombre.'&nbsp;&bull;';
		$logo=$rowc->logo;
		$socio=$rowc->socio;
		$tipo=$rowc->tipo;
		$idioma=$rowc->idioma;
		
		$db->select('newsletter','*',"socio='$socio'");
		$rowa=$db->fetch_object();
		$cont=$rowa->contenido;
		$contenido = split('<#>',$cont);
		$hoy = (date('d').' de '.fecha::nombreMes(date('m')).' de '.date('Y'));
		$cabecera = $rowa->cabecera;
		if( $_SESSION['idlogo']=='agr' || $logo=='agr'){
			$cabecera = ereg_replace( '_mdt.jpg', '_agr.jpg', $cabecera );
		}
		$cab=split('<#>',$cabecera);
		$_cabecera = ereg_replace( "\[\#fecha_texto\#\]", $hoy, $cabecera );
		$_pie=$rowa->pie;
		$_pie= ereg_replace( "CFG_virtualPath", CFG_virtualPath, $_pie );
		$style=$rowa->style;


		$db->select('noticias','*',"socio='$socio' and id_news=$id_news");

		if($db->num_rows() >1){
			$tipofondo='';
		}
		else{
			$tipofondo='2';
		}
		$style=str_replace('<#>',$tipofondo,$style);
		echo $style;

		//echo "$rowa->style";
		if ($tipo==2){
			switch ($idioma){
				case "esp": $titulo_news = "• Novedades •"; break;
				case "ing": $titulo_news = "• Alerts •";	break;
				default:	$titulo_news = "• Novedades •"; break;
			}
		}

		$cabecera=$cab[0].$titulo_news.$cab[1];

		$db->select('tipo_imagen','*',"id=1");
		$row=$db->fetch_object();
		$pl=$row->plantilla;
		$plantilla=explode('<#>',$pl);

?>
	<script>
	function cambiaorden(actual){
		nvalor=document.getElementById(actual).value
		avalor=actual.split('_');
		document.form.nvalor.value=nvalor;
		document.form.avalor.value=avalor[1];
		document.form.action.value='reordenar';
		document.form.submit();
	}
	</script>
	<table width="576" align="center" border="0" class="fondo" style="border: 1px solid #000000 ">
	<tr><td colspan="2"><table><tr><td width="184"></td><td><?=$cabecera?></td></tr></table></td></tr>
	<form name="form" action="" method="post">
	<input type="hidden" name="nvalor" id="nvalor" value="">
	<input type="hidden" name="avalor" id="avalor" value="">
	<input type="hidden" name="id">
	<input type="hidden" name="action">
	<input type="hidden" name="id_news" value="<?=$id_news?>">
<?

		$db->select('noticias as t1',
			't1.id,
			 t1.fecha,
			 t1.titulo,
			 t1.titulo_link,
			 t1.copete,
			 t1.copete_link,
			 t1.nota,
			 t1.pie1,
			 t1.pie_link1,
			 t1.orden,
			 t1.archivo_name',
			 "socio='$socio' and id_news=$id_news",	
			 't1.orden');

		$banner_ant='';
		$_nro=1;
		$_tot=$db->num_rows();
		while($db->fetch_object()){

					$texto=$db->row->nota;
					$fecha=$db->row->fecha;
					$titulo=$db->row->titulo;
					$titulo_link=$db->row->titulo_link;
					$archivo_name=$db->row->archivo_name;
					$titulo1='';
					if($titulo){
						$titulo1='';
						if($titulo_link){
							if(strtolower(substr($titulo_link,0,7))!='http://'){
								$titulo_link='http://'.$titulo_link;
							}
							$titulo1.='<a href="'.$titulo_link.'" target="_blank"><span class="titulo">'.$titulo.'</span></a><br>';
						}
						else{
							$titulo1.='<span class="titulo">'.$titulo.'</span><br>';
						}
					}					
					$subtitulo=$db->row->copete;
					$subtitulo_link=$db->row->copete_link;
					$subtitulo1='';
					if($subtitulo){
						if($subtitulo_link){
							if(strtolower(substr($subtitulo_link,0,7))!='http://'){
								$subtitulo_link='http://'.$subtitulo_link;
							}
							$subtitulo1.='<a href="'.$subtitulo_link.'" target="_blank"><span class="textogris">'.$subtitulo.'</span></a><br>';
						}
						else{
							$subtitulo1.='<span class="textogris">'.$subtitulo.'</span><br>';
						}
					}					

					$pie=$db->row->pie1;
					$pie_link=$db->row->pie_link1;
					$pie1='';
					if($pie){
						if($pie_link){
							if(strtolower(substr($pie_link,0,7))!='http://'){
								$pie_link='http://'.$pie_link;
							}
							$pie1.='<br><a href="'.$pie_link.'" target="_blank"><span class="pie">'.$pie.'</span></a><br>';
						}
						else{
							$pie1.='<br><span class="pie">'.$pie.'</span><br>';
						}
					}					
			$mostrar='';
			if($archivo_name){
				$mostrar =  "<table cellspacing=0 cellpadding=0><tr valign='top'><td><img src='news/sections/verfoto.php?id=".$db->row->id."' border=0></td></tr></table>";
//				$mostrar =  "<img src='".CFG_virtualPath."sections/verfoto.php?id=".$db->row->id."'>";
				$texto=$contenido[0].$fecha.$contenido[1].$titulo1.$contenido[2].$mostrar.$contenido[3].nl2br($texto).$contenido[4];
			}
			else{
				$texto=$contenido[0].$fecha.$contenido[1].$titulo1.$contenido[2].$subtitulo1.$contenido[3].nl2br($texto).$contenido[4];
			}
				
			$combo='<select id=orden_'.$_nro.' onChange="cambiaorden(this.id)">';
			for($n=1;$n<=$_tot;$n++){
				$sel='';
				if($n==$_nro){$sel='selected';}
				$combo.='<option value="'.$n.'" '.$sel.'>'.$n.'</option>';			
			}
			$combo.='</select>';
			?>
			<tr>
			 	<td colspan="4">
					<?=$texto;?>
				</td>
			</tr>
			<?

			$_nro++;
		}
		
	
?>
<tr><td></td><td><?=$_pie?></td></tr>
</form>
