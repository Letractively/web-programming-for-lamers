<?php 
	if (!$included) die();
?>

<!-- FORM VALIDATION -->
        <link rel="stylesheet" href="Validation_Engine/css/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" href="Validation_Engine/css/template.css" type="text/css"/>
        <script src="Validation_Engine/js/jquery-1.6.min.js" type="text/javascript">
        </script>
        <script src="Validation_Engine/js/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">
        </script>
        <script src="Validation_Engine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
        </script>
        <script>
            jQuery(document).ready( function() {
                // binds form submission and fields to the validation engine
                jQuery("#contactoForm").validationEngine();
				$('#contactoForm').submit(function(){				  
		var action = $(this).attr('action');
		$.post(action, { 
			nombre: $('#nombre').val(),
			email: $('#email').val(),
			telefono: $('#telefono').val(),
			area: $('#area').val(),
			mensaje: $('#mensaje').val()
		},
			function(data){
				$('#contactoForm #submit').attr('disabled','');
				$('.response').remove();
				$('#contactoForm').before('<p class="response">'+data+'</p>');
				$('.response').slideDown();
				if(data=='Hemos recibido su mensaje') $('#contactoForm').slideUp();
			}
		); 
		return false;
	});
            });
</script>


<div id="headtitle"> 
	<h1>Contacto</h1>
</div>

<div id="topParagraph">
	<p>En Odontologia Working Group, conocemos la importancia de un contacto fluido entre paciente y especialista. Por eso, ponemos a tu disposición varias formas de llegar a nosotros, de la manera más rápida y eficaz, según tus propias conveniencias. Sea por mail o teléfono.</p>
</div>







<div class="block5">
	<h2>Estamos a su disposici&oacute;n</h2>
	<p>Utilice el siguiente formulario para enviarnos un mensaje. Tanto sobre consultas odontológicas, como solicitudes de turno y mayor información sobre nuestros implantes dentales y otros servicios.</p>
	<p>Si lo desea, también puede comunicarse con nosotros por teléfono, llamando al número contiguo.</p>
	
	<form name="contactoForm" id="contactoForm" action="contact.php" method="post" enctype="multipart/form-data">
		<fieldset id="fs_contacto">
			<label for="nombre">Nombre<br />
				<input value="" type="text" name="emailNombre" id="nombre" class="validate[required]"/>
			</label>
			<br />
			<label for="email">Email<br />
				<input value="" type="text" name="emailEmail" id="email" class="validate[required,custom[email]]"/>
			</label>
			<br />
			<label for="telefono">Tel&eacute;fono (Opcional)<br />
				<input style="margin-top: 3px;" value="" type="text" name="emailTelefono" id="telefono"/>
			</label>
			<br />
			<label for="mensaje">Mensaje<br />
				<textarea name="emailMensaje" id="mensaje" class="validate[required]"></textarea>
			</label>
			<br />
			<button id="boton" type="submit" name="enviar" class="enviar"></button>
		</fieldset>
	</form>
		
</div>

<div class="block3">
    <iframe style="border: 1px solid #dddddd; magin: 0; padding: 0;" frameborder="0" width="200" height="230" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.ar/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=CORRIENTES+1955+caba&amp;aq=&amp;sll=-38.341656,-63.28125&amp;sspn=36.286491,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Av+Corrientes+1955,+Balvanera,+Ciudad+Aut%C3%B3noma+de+Buenos+Aires&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
	<p style="font-size: 11px;"><strong>Odontolog&iacute;a Working Group</strong></p>
	<p style="font-size: 11px;">Av. Corrientes 1955 2 D<br />
		4953-2183 / 15 3016 8844<br />
		contacto@owg.com.ar</p>
	<p style="font-size: 11px;">
		<img src="img/visa.png">
		<img style="margin-left: 8px; margin-right: 8px;" src="img/mastercard.png">
		<img src="img/american.png">
	</p>
</div>


<div style="clear:both; height:60px;"> </div>
