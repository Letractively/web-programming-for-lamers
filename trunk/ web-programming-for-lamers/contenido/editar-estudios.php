<?php
	echo '<pre>';
	// ....Un switch para cada <SELECT> con un SELECTED para cada <OPTION>:
	echo $usuarioCv->nivel_estudio . '<br />';
	echo $usuarioCv->area_estudio . '<br />';
	echo $usuarioCv->institucion_estudio . '<br />';
	echo $usuarioCv->pais_estudio . '<br />';
	
	$fuInicioEstudio = cambiaf_a_normal($usuarioCv->inicio_estudio);
	echo $fuInicioEstudio . '<br />';
	
	$fuFinEstudio = cambiaf_a_normal($usuarioCv->fin_estudio);
	echo $fuFinEstudio . '<br />';
	
	echo $usuarioCv->estudia_aun . '<br />';
	echo $usuarioCv->idioma_1 . '<br />';
	echo $usuarioCv->idioma_2 . '<br />';
	echo $usuarioCv->idioma_3 . '<br />';
	echo $usuarioCv->idioma_4 . '<br />';
	echo $usuarioCv->nivel_idioma_1 . '<br />';
	echo $usuarioCv->nivel_idioma_2 . '<br />';
	echo $usuarioCv->nivel_idioma_3 . '<br />';
	echo $usuarioCv->nivel_idioma_4 . '<br />';
	echo $usuarioCv->otros_conocimientos . '<br />';
	echo $usuarioCv->objetivos_laborales . '<br />';
	
	echo '</pre>';
	//.. a partir de ahora los datos estan listos para rellenar el FORM:

?>

<script type="text/javascript">
$(document).ready(function(){
	// Pongo SELECTED al campo OPTION cuyo valor se corresponda con el extraido de la DB:
	$('#fuNivelEstudio option[value="<?php echo $usuarioCv->nivel_estudio; ?>"]').attr("selected","selected");

	$('#fuAreaEstudio').val("<?php echo $usuarioCv->area_estudio; ?>");

	$('#fuInstitucionEstudio').val("<?php echo $usuarioCv->institucion_estudio; ?>");
	
	$('#fuPaisEstudio option[value="<?php echo $usuarioCv->pais_estudio; ?>"]').attr("selected","selected");

	if('<?php echo $fuInicioEstudio ?>' != '00/00/0000'){				//SOLO presento fechas != 00/00/0000
		$('#fuInicioEstudio').val('<?php echo $fuInicioEstudio ?>');
	}

	if('<?php echo $fuFinEstudio ?>' != '00/00/0000'){					//SOLO presento fechas != 00/00/0000
		$('#fuFinEstudio').val('<?php echo $fuFinEstudio ?>');
	}

	if(<?php echo $usuarioCv->estudia_aun ?>){
		$('#fuEstudiaAun').attr("checked","TRUE");
	}
	else{
		$('#fuEstudiaAun').removeAttr("checked");
	}

	$('#fuIdioma1 option[value="<?php echo $usuarioCv->idioma_1; ?>"]').attr("selected","selected");

	$('#fuNivelIdioma1 option[value="<?php echo $usuarioCv->nivel_idioma_1; ?>"]').attr("selected","selected");

	$('#fuIdioma2 option[value="<?php echo $usuarioCv->idioma_2; ?>"]').attr("selected","selected");

	$('#fuNivelIdioma2 option[value="<?php echo $usuarioCv->nivel_idioma_2; ?>"]').attr("selected","selected");

	$('#fuIdioma3 option[value="<?php echo $usuarioCv->idioma_3; ?>"]').attr("selected","selected");

	$('#fuNivelIdioma3 option[value="<?php echo $usuarioCv->nivel_idioma_3; ?>"]').attr("selected","selected");

	$('#fuIdioma4 option[value="<?php echo $usuarioCv->idioma_4; ?>"]').attr("selected","selected");

	$('#fuNivelIdioma4 option[value="<?php echo $usuarioCv->nivel_idioma_4; ?>"]').attr("selected","selected");

	$('#fuOtrosConocimientos').val("<?php echo cambiat_a_js($usuarioCv->otros_conocimientos); ?>");
	
	$('#fuObjetivosLaborales').val("<?php echo cambiat_a_js($usuarioCv->objetivos_laborales); ?>");

	//Solo se habilita la fecha de fin de estudio si no esta checkeado "aun estudio":
	$("#fuEstudiaAun").click(function(){
		if($("#fuEstudiaAun").is(":checked")){
			$('#fuFinEstudio').attr('disabled','disabled');
			$('#fuFinEstudio').val('');
			}
		else{
			$('#fuFinEstudio').removeAttr("disabled");
		}
	});
});



</script>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onSubmit="return validarForm();">
<p>Nivel de Estudio<select name="fuNivelEstudio" id="fuNivelEstudio">
<option value="Secundario Completo">Secundario Completo</option>
<option value="Cursando Universidad">Cursando Universidad</option>
<option value="Universitario Recibido">Universitario Recibido</option>
<option value="Universitario con Maestria">Universitario con Maestria</option>
</select></p>
<p>Area de Estudio:<input type="text" name="fuAreaEstudio" id="fuAreaEstudio"></p>
<p>Institución donde Estudió:<input type="text" name="fuInstitucionEstudio" id="fuInstitucionEstudio"></p>
<p>Pais donde estudió:<select name="fuPaisEstudio" id="fuPaisEstudio">
<option value="Argentina">Argentina</option>
<option value="Alemania">Alemania</option>
<option value="EEUU">EE.UU.</option>
<option value="Brasil">Brasil</option>
</select></p>
<p>Fecha de inicio de Estudios:<input type="text" name="fuInicioEstudio" id="fuInicioEstudio"></p>
<p>Fecha de finalización de Estudios:<input type="text" name="fuFinEstudio" id="fuFinEstudio"></p>
<p><input type="checkbox" name="fuEstudiaAun" id="fuEstudiaAun" value="Si">Aún continuo cursando</p>
<p>Idioma 1:<select name="fuIdioma1" id="fuIdioma1">
<option value=""></option>
<option value="Ingles">Inglés</option>
<option value="Aleman">Alemán</option>
<option value="Frances">Fracés</option>
<option value="Italiano">Italiano</option>
</select></p>
<p>Nivel:<select name="fuNivelIdioma1" id="fuNivelIdioma1">
<option value=""></option>
<option value="Basico">Básico</option>
<option value="Intermedio">intermedio</option>
<option value="Avanzado">Avanzado</option>
<option value="Bilingue">Bilingüe</option>
</select></p>
<p>Idioma 2:<select name="fuIdioma2" id="fuIdioma2">
<option value=""></option>
<option value="Ingles">Inglés</option>
<option value="Aleman">Alemán</option>
<option value="Frances">Fracés</option>
<option value="Italiano">Italiano</option>
</select></p>
<p>Nivel:<select name="fuNivelIdioma2" id="fuNivelIdioma2">
<option value=""></option>
<option value="Basico">Básico</option>
<option value="Intermedio">intermedio</option>
<option value="Avanzado">Avanzado</option>
<option value="Bilingue">Bilingüe</option>
</select></p>
<p>Idioma 3:<select name="fuIdioma3" id="fuIdioma3">
<option value=""></option>
<option value="Ingles">Inglés</option>
<option value="Aleman">Alemán</option>
<option value="Frances">Fracés</option>
<option value="Italiano">Italiano</option>
</select></p>
<p>Nivel:<select name="fuNivelIdioma3" id="fuNivelIdioma3">
<option value=""></option>
<option value="Basico">Básico</option>
<option value="Intermedio">intermedio</option>
<option value="Avanzado">Avanzado</option>
<option value="Bilingue">Bilingüe</option>
</select></p>
<p>Idioma 4:<select name="fuIdioma4" id="fuIdioma4">
<option value=""></option>
<option value="Ingles">Inglés</option>
<option value="Aleman">Alemán</option>
<option value="Frances">Fracés</option>
<option value="Italiano">Italiano</option>
</select></p>
<p>Nivel:<select name="fuNivelIdioma4" id="fuNivelIdioma4">
<option value=""></option>
<option value="Basico">Básico</option>
<option value="Intermedio">intermedio</option>
<option value="Avanzado">Avanzado</option>
<option value="Bilingue">Bilingüe</option>
</select></p>
<p>Otros Conocimientos:<textarea rows="5" cols="50" name="fuOtrosConocimientos" id="fuOtrosConocimientos"></textarea></p>
<p>Objetivos Laborales:<textarea rows="5" cols="50" name="fuObjetivosLaborales" id="fuObjetivosLaborales"></textarea></p>
<input type="hidden" name="fuGuardarEstudios" value="1" id="fuGuardarEstudios"></input>
<input type="submit" value="Actualizar mis datos" name="experiencias"></input>
<a href="<?php echo $_SERVER['PHP_SELF'] .'?experiencias=1';?>" ><input type="button" value="Continuar con mi Curriculum"></input></a>
</form>