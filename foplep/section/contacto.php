
<!--
    <div id="rightbar">
        <img style="margin:46px 0 0 10px;" src="img/mailbutton.jpg" />
    </div>      
    
-->

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
<!-- -->

<!-- FORM SUBMITT -->
<script type="text/javascript">
/*
jQuery(document).ready(function(){
	$('#contactoForm').submit(function(){				  
		var action = $(this).attr('action');
		$.post(action, { 
			name: $('#nombre').val(),
			email: $('#email').val(),
			company: $('#telefono').val(),
			subject: $('#area').val(),
			message: $('#mensaje').val()
		},
			function(data){
				$('#contactoForm #submit').attr('disabled','');
				$('.response').remove();
				$('#contactoForm').before('<p class="response">'+data+'</p>');
				$('.response').slideDown();
				if(data=='Message sent!') $('#contactoForm').slideUp();
			}
		); 
		return false;
	});
});*/
</script>
<!-- --> 

    <div id="column1">
    	<div class="underline">
	    	<h1 class="arial">Contacto</h1>
        </div>
        
        <div style="margin:18px 0 0 0;">
            <h3 class="arial">
				Nuestro equipo se encuentra a su disposición.
				Si desea ponerse el contacto con el Foro, utilice el siguiente formulario.
            </h3>
		<form name="contactoForm" id="contactoForm" action="SENDMAIL_TEMPORAL.php" method="post"  enctype="multipart/form-data">
		<fieldset style="margin: 0; padding: 0; border: 0;">
			<p class="arial">Nombre</p>
			<input type="text" name="emailNombre" id="nombre" class="validate[required] form" maxlength="255" />
            <p class="arial">Dirección de mail</p>
            <input type="text" name="emailEmail" id="email" class="validate[required,custom[email]] form" maxlength="255" />
            <p class="arial">Mensaje</p>
            <textarea name="emailMensaje" id="mensaje" class="validate[required] form"></textarea>
			<div style="margin:40px 0 0 0; height:100px;">
				<input class="form" type="image" value="" name="enviar" src="img/button/send.jpg" />
		</fieldset>
		</form>
			</div>
        </div>        
	</div>        
    
    <div id="column2">
    	<div class="underline">
	    	<h2 class="arial">Dónde encontrarnos</h2>
        </div>
        
        <div style="margin:18px 0 0 0;">
            <h4 class="arial">
				<b>Dirección General de Fortalecimiento Institucional y Modernización Legislativa.  </b>
            </h4>            
            <h4 class="arial">Legislatura de la Ciudad de Buenos Aires<br />
				Perú 1234    5ºB<br /><br />
				+54 (11) 4123-1234 (int. 123)
            </h4>
            
<iframe width="238" height="309" style="border:1px solid #999;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.ar/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Per%C3%BA+1234,+Buenos+Aires&amp;aq=0&amp;sll=-38.341656,-63.28125&amp;sspn=35.611539,86.044922&amp;vpsrc=6&amp;ie=UTF8&amp;hq=&amp;hnear=Per%C3%BA+1234,+San+Telmo,+Ciudad+Aut%C3%B3noma+de+Buenos+Aires&amp;ll=-34.622372,-58.374138&amp;spn=0.018365,0.042014&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com.ar/maps?f=q&amp;source=embed&amp;hl=es&amp;geocode=&amp;q=Per%C3%BA+1234,+Buenos+Aires&amp;aq=0&amp;sll=-38.341656,-63.28125&amp;sspn=35.611539,86.044922&amp;vpsrc=6&amp;ie=UTF8&amp;hq=&amp;hnear=Per%C3%BA+1234,+San+Telmo,+Ciudad+Aut%C3%B3noma+de+Buenos+Aires&amp;ll=-34.622372,-58.374138&amp;spn=0.018365,0.042014&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small>                
                                       
        </div>
    </div>
    
    <div style="clear:both;"></div>
    
    
     