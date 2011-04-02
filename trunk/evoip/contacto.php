<?
	
	//Link activo en header
	$active = "contacto";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?
		include "header.php"
	?>	
    <div id="bloque_general">
    	
        <div id="bloque_general_cntn">
        	
            <div id="gradient_light">
        		
                <span class="title">Contacto</span>
                        	
            </div>
            
            <div id="box_contacto">
                
                <h1>Estamos a su disposicion</h1>
                
                <p>In sita, metus vitae <a href="#">enenatis rutrum</a>, felis dolor volutpat lorem, vitae pellentesque purus dolor quis felis. Sed vel massa ut leo elementum varius. Curabitur nulla risus, malesuada in dictum ut, fermentum non enim.</p>

				<p>Fusce ultrices dui et enim posuere ornare. Nullam id ipsum quis lacus tempus viverra. Aliquam pretium, enim in consectetur varius, nunc dolor faucibus eros, eget imperdiet erat purus in nibh. Cras turpis arcu, sagittis id lobortis non, posuere in nibh. </p>
            
                <form name="contactoForm" id="contactoForm" action="#" method="post" enctype="multipart/form-data">
                
                	<fieldset>         
                            <label for="nombre"> 
                                Nombre <span>*</span>
                                <br />
                                <input value="" type="text" name="emailNombre" id="nombre"/>
                            </label>
                            
                            <label for="email" style="margin:0 30px 0 30px;"> 
                                Email <span>*</span>
                                <br />
                                <input value="" type="text" name="emailEmail" id="email"/>
                            </label>
                            
                            <label for="telefono"> 
                                Tel&eacute;fono
                                <br />
                                <input value="" type="text" name="emailTelefono" id="telefono"/>
                            </label>
                            <label for="area" class="large" > 
                                Area a contactar <span>*</span>
                                <br />
                                <select size="1"  name="emailArea" id="area"/>
                                    <option selected value="">Ninguna</option>
                                </select>                      	
                            </label>
                            
                            <label for="descripcion" class="large" style="padding:0 0 2px 0;">
                                Mensaje <span>*</span>
                            </label>
                           	
                            <textarea rows="1" cols="2" name="emailMensaje" id="mensaje"></textarea>
    
                	</fieldset>
                    
                    <input id="boton" type="submit" value="" name="enviar" />
               
                </form>

            
            </div>
                        
    	</div>
    
    </div>
    
<?

	include "footer.php";

?>
</body>
</html>
