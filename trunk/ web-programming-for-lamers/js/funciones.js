// FUNCIONES ADHERIDAS:
// bool validarForm(); - Valida un formulario de entrada (aun beta)
// string consultaSegura(Consulta, Var, Id); - Efectua una consulta AJAX via GET de forma protegida por id-rotante

var request;
var procesandoRespuesta = 0;

function consultaSegura(Consulta, Var, Id){
	var r = 'sin_respuesta';
	request = new XMLHttpRequest();
	url ='includes/consulta_segura.php?consulta=' + Consulta + '&var=' + Var + '&id=' + Id;	// => Se hace la "consulta_segura.php"
	//alert('Soy la funcion consultaSegura\n request =' + request + '\n' + url);
	// Requiere los datos al servidor...
	request.open("GET", url, true);
	//alert('1');
	
	request.onreadystatechange = function() {
		//alert('2');
		if ( request.readyState == 4 ) {
			//alert('3');
			if( request.status == 200){ // ==> Se terminó de recivir la respuesta correctamente;
				procesandoRespuesta = 0;
				r = procesarRespuesta();
				//alert(r);
				return r;		// ==> sale de consultaSegura y devuelve r como respuesta
			}
		}
	}
	
	procesandoRespuesta = 1;
	
	request.send(null);
	
	while(procesandoRespuesta){		// Espero mientras llega el stado 200 desde la solicitud
		alert('procesando respuesta');
	}
		
	alert(r);
	return r;						// Luego de haber recibido "status=200", proceso y retorno el mensaje
}

function procesarRespuesta(){
	var resp = request.responseText;
	eval(resp);
	alert('Funcion procesarRespuesta()');
	if(respuesta == 'id_consulta_incorrecto'){
		alert('tipee correctamente la imagen, Ahora cambiara....!');
		alert(respuesta);
		// Cambiar la imagen
		return respuesta;
	}
	else{
		return respuesta;
	}
}



/* dice si car es alfanumerico                                               */  
function alfanumerico(car)  
  {  
    return(alfabetico(car) || numerico(car));
  }  
    
/* dice si car es alfabetico                                                 */  
function alfabetico(car)               // DECLARACION DE CONSTANTES  
  {                                    // caracteres alfabeticos  
    var alfa = "ABCDEFGHIJKLMNOPQRSTUWXYZabcdefghijklmnopqrstuvxyz";  
    return(alfa.indexOf(car) != - 1);  // INICIO  
  }  
    
/* dice si car es numerico                                                   */  
function numerico(car)  
  {                                    // DECLARACION DE CONSTANTES  
    var num = "0123456789";            // caracteres numericos  
    return(num.indexOf(car) != - 1);   // INICIO  
  }  

function salta_alfanumerico(cadena, i, otros)  
  {                                    // DECLARACION DE VARIABLES  
    var j;                             // indice en cadena  
    var car;                           // caracter de cadena  
    var alfanum;                       // cadena[j] es alfanumerico u otros  
    for(j = i, alfanum = true; (j < cadena.length) && alfanum; j++) // INICIO  
      {  
        car = cadena.charAt(j);  
        alfanum = alfanumerico(car) || (otros.indexOf(car) != -1);  
      }  
    if(!alfanum)                       // lee "alfanumX"  
      j--;  
    return(j);  
  }  

	/* dice si cadena es un email (alfanum@alfanum.alfanum[.alfanum]) o no, don- */
	/* de alfanum son caracteres alfanumericos u otros                           */
	function email(cadena, otros)
	{                                    // DECLARACION-INICIALIZACION VARIABLES
    var i, j;                          // indice en cadena
    var es_email = 0 < cadena.length;  // cadena es email o no
    i = salta_alfanumerico(cadena, 0, otros); // INICIO
    if(es_email = 0 < i)               // lee "alfanum*"
      if(es_email = (i < cadena.length))
        if(es_email = cadena.charAt(i) == '@') // lee "alfanum@*"
          {
            i++;
            j = salta_alfanumerico(cadena, i, otros);
            if(es_email = i < j)       // lee "alfanum@alfanum*"
              if(es_email = j < cadena.length)
                if(es_email = cadena.charAt(j) == '\.')
                  {                    // lee "alfanum@alfanum.*"
                    j++;
                    i = salta_alfanumerico(cadena, j, otros);
                    if(es_email = j < i) // lee "alfanum@alfanum.alfanum*"
                      while(es_email && (i < cadena.length))
                        if(es_email = cadena.charAt(i) == '\.')
                          {
                            i++;
                            j = salta_alfanumerico(cadena, i, otros);
                            if(es_email = i < j) // lee "alfanum@alfanum.alfanum[.alfanum]*"
                              i = j;
                          }
                  }
          }
    return(es_email);
	}
	
//bool validarForm();//////////////////////////////////////////////////////////////////
//Devuelve true si el formulario se valida, y false si no es asi.
//El DOM se levanta por "names", práctico para los Forms.
// EJ: document.getElementsByName('fAlias')[0].value
function validarForm()
{
	var compAliasDB;
	// check alias

	if (document.getElementsByName('fAlias')[0].value == "")
	{
		alert ("El Alias no es valido!");
		return false;
	}
	// Comparo el ALIAS con los existentes en ls DB mediante AJAX a consulta_segura.php:
	compAliasDB = consultaSegura('alias_ocupado',document.getElementsByName('fAlias')[0].value,document.getElementsByName('fSeguridad')[0].value);
	// Cotejo la comparacion......
	alert(compAliasDB);
	if	(compAliasDB == 'alias_ocupado')
	{
		alert("El Alias introducido ya existe, intente con otro distinto....");
		return false;
	}
	
	// check contrasenia larga
	if (document.getElementsByName('fContrasenia')[0].value.length < 6)
	{
		alert ("Su contraseña debe contener por lo menos 6 caracteres!");
		return false;
	}

	// check nombre
	if (document.getElementsByName('fNombre')[0].value == "")
	{
		alert ("El Nombre no es valido!");
		return false;
	}

	// check apellido
	if (document.getElementsByName('fApellido')[0].value == "")
	{
		alert ("El Apellido no es valido!");
		return false;
	}

	// check email
	if (!(email(document.getElementsByName('fEmail')[0].value,'-_')))
	{
		alert ("el e-mail introducido no es valido!");
		return false;
	}

	// check DNI
	if (isNaN(document.getElementsByName('fDni')[0].value) || (document.getElementsByName('fDni')[0].value.length < 5))
	{
		alert ("El DNI introducido no es valido!");
		return false;
	}

	// check NACIMIENTO (SE DIVIDIRA EN TRES CAMPOS ASI QUE NO LA CHECKEAMOS POR AHORA pues es xxxx-xx-xx)
	if (/*isNaN(document.forms[0].elements[6].value) || */(document.getElementsByName('fNacimiento')[0].value.length < 1))
	{
		alert ("La Fecha de Nacimiento introducida no es valida!");
		return false;
	}

	// check age range (SE DIVIDIRA EN TRES CAMPOS ASI QUE NO LA CHECKEAMOS POR AHORA pues es xxxx-xx-xx)
	if (parseInt(document.getElementsByName('fNacimiento')[0].value) < 1 || parseInt(document.getElementsByName('fAlias')[0].value) > 99)
	{
		//alert ("Please enter a valid age!");
		//return false;
	}

	// check especializacion
	if (document.getElementsByName('fEspecializacion')[0].value == "")
	{
		alert ("La Especializacion introducida no es valida!");
		return false;
	}

	return true;
}