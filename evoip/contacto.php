<?		//Link activo en header	$active = "contacto";?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Evoip - Soluciones Tecnológicas</title><link href="css/style.css" rel="stylesheet" type="text/css"><!-- FORM VALIDATION -->        <link rel="stylesheet" href="Validation_Engine/css/validationEngine.jquery.css" type="text/css"/>        <link rel="stylesheet" href="Validation_Engine/css/template.css" type="text/css"/>        <script src="Validation_Engine/js/jquery-1.6.min.js" type="text/javascript">        </script>        <script src="Validation_Engine/js/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">        </script>        <script src="Validation_Engine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">        </script>        <script>            jQuery(document).ready( function() {                // binds form submission and fields to the validation engine                jQuery("#contactoForm").validationEngine();				$('#contactoForm').submit(function(){				  		var action = $(this).attr('action');		$.post(action, { 			nombre: $('#nombre').val(),			email: $('#email').val(),			telefono: $('#telefono').val(),			area: $('#area').val(),			mensaje: $('#mensaje').val()		},			function(data){				$('#contactoForm #submit').attr('disabled','');				$('.response').remove();				$('#contactoForm').before('<p class="response">'+data+'</p>');				$('.response').slideDown();				if(data=='Hemos recibido su mensaje') $('#contactoForm').slideUp();			}		); 		return false;	});            });        </script><!-- --><!-- FORM SUBMITT --><script type="text/javascript">/*jQuery(document).ready(function(){	$('#contactoForm').submit(function(){				  		var action = $(this).attr('action');		$.post(action, { 			name: $('#nombre').val(),			email: $('#email').val(),			company: $('#telefono').val(),			subject: $('#area').val(),			message: $('#mensaje').val()		},			function(data){				$('#contactoForm #submit').attr('disabled','');				$('.response').remove();				$('#contactoForm').before('<p class="response">'+data+'</p>');				$('.response').slideDown();				if(data=='Message sent!') $('#contactoForm').slideUp();			}		); 		return false;	});});*/</script><!-- --><script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-25920886-1']);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></head><body>	<?		include "header.php"	?>    <div id="bloque_general">    	        <div id="bloque_general_cntn">        	            <div id="gradient_light">        		                <span class="title">Contacto</span>                        	            </div>                        <div id="box_contacto">                                <h1>Estamos a su disposicion</h1>                                <p>Estamos a su disposición en todo momento. Puede ponerse en contacto con nosotros a través de nuestro formulario, y una vez recibido su mensaje responderemos a la mayor brevedad. Para obtener la mejor información posible con cada respuesta, seleccione el área que mejor se ajuste a sus necesidades, y se asegurará la atención profesional de nuestros especialistas.</p>                            <form name="contactoForm" id="contactoForm" action="contact.php" method="post" enctype="multipart/form-data">                                	<fieldset>                                     <label for="nombre">                                 Nombre <span>*</span>                                <br />                                <input value="" type="text" name="emailNombre" id="nombre" class="validate[required]"/>                            </label>                                                        <label for="email" style="margin:0 30px 0 30px;">                                 Email <span>*</span>                                <br />                                <input value="" type="text" name="emailEmail" id="email" class="validate[required,custom[email]]"/>                            </label>                                                        <label for="telefono">                                 Tel&eacute;fono                                <br />                                <input style="margin-top: 3px;" value="" type="text" name="emailTelefono" id="telefono"/>                            </label>							                            <label for="area" class="large" >                                 Area a contactar <span>*</span>                                <br />                                <select size="1"  name="emailArea" id="area" class="validate[required]"/>                                    <option selected value="">Seleccione un área...</option>									<option value="administracion">Administración</option>									<option value="ventas">Ventas</option>									<option value="soporte">Técnica y soporte</option>                                </select>                      	                            </label>                                                        <label for="descripcion" class="large" style="padding:0 0 2px 0;">                                Mensaje <span>*</span>                            </label>                           	                            <textarea rows="1" cols="2" name="emailMensaje" id="mensaje" class="validate[required]"></textarea>																					<iframe style="float: left; position: static; border: 1px solid #DEDEDE; margin-left: 30px; margin-top: -90px;" width="255" height="248" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.ar/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Evoip+Soluciones&amp;aq=&amp;sll=-34.550786,-58.496017&amp;sspn=0.018733,0.038581&amp;vpsrc=6&amp;ie=UTF8&amp;hq=Evoip+Soluciones&amp;hnear=&amp;t=m&amp;ll=-34.550751,-58.49606&amp;spn=0.009013,0.0109&amp;z=15&amp;output=embed"></iframe><br />							<!--<small><a href="http://maps.google.com.ar/maps?f=q&amp;source=embed&amp;hl=es&amp;geocode=&amp;q=Evoip+Soluciones&amp;aq=&amp;sll=-34.550786,-58.496017&amp;sspn=0.018733,0.038581&amp;vpsrc=6&amp;ie=UTF8&amp;hq=Evoip+Soluciones&amp;hnear=&amp;t=m&amp;ll=-34.550751,-58.49606&amp;spn=0.009013,0.0109&amp;z=15" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small>-->						    <div style="clear:both;"></div>							<input id="boton" type="submit" value="" name="enviar" />							<div id="box_right">								<p><b>Evoip Soluciones</b><br/>								Pico 4738, Buenos Aires, Argentina<br/>								(+54 11) 4541-7200<br/>								info@evoipsoluciones.com.ar</p>							</div>                    	</fieldset>                                                                       </form>                        </div>                            	</div>        </div>    <?	include "footer.php";?></body></html>