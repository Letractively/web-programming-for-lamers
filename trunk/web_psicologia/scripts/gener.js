//-------------------------------------------------------------------
// Declaración de variables y constantes
//-------------------------------------------------------------------
numeros="0123456789";
separadorfecha="/";
var bonosi = ['AD10','AD15','PR10','PR15','PT10','PT20','PT30','PT40','INVP','INVD'];
var bonost = ['Bono de 10 sesiones - A Distancia','Bono de 15 sesiones - A Distancia','Bono de 10 sesiones - Presencial','Bono de 15 sesiones - Presencial','PETT Mod. Reducida','PETT Mod. Regulada','PETT Mod. Ampliada','PETT Mod. Aplazada','Promoción Invierno 2009 Personal Presencial','Promoción Invierno 2009 Personal A Distancia'];
var Kues = Array(9);
for (var i=0; i<10; i++)
{
	Kues[i] = "0";
}

var rsul = false;

// les damos 1 hora aproximada de vida a las cookies
var dias = 0.04;
var caduca = new Date();
caduca.setTime(caduca.getTime() + (dias*24*60*60*1000));

// Array.indexOf( value, begin, strict ) - Regresa el indice del primer elemento que coincida con el valor especificado
if (!Array.prototype.indexOf)
{
      Array.prototype.indexOf = function( v, b, s ) {
      for( var i = +b || 0, l = this.length; i < l; i++ ) {
      if( this[i]===v || s && this[i]==v ) { return i; }
      }
      return -1;
      };
}
//-------------------------------------------------------------------
// Funciones de cookies
//-------------------------------------------------------------------
function getCookie(name)
{
	var cname = name + "=";
	var dc = document.cookie;
	if (dc.length > 0) {
		begin = dc.indexOf(cname);
		if (begin != -1) {
			begin += cname.length;
			end = dc.indexOf(";", begin);
			if (end == -1) end = dc.length;
			return unescape(dc.substring(begin, end));
		}
	}
	return null;
}

function setCookie(name, value, expires, path, domain, secure)
{
	document.cookie = name + "=" + escape(value) +
	((expires == null) ? "" : "; expires=" + expires.toGMTString()) +
	((path == null) ? "" : "; path=" + path) +
	((domain == null) ? "" : "; domain=" + domain) +
	((secure == null) ? "" : "; secure");
}
//-------------------------------------------------------------------
// Funciones de validacion de item vacio
//-------------------------------------------------------------------
function ValEmpty(campo, mensa)
{
	if (rsul)
	{
		if ( campo.value == "")
		{
			$("#messval").text(mensa);
			rsul = false;
			campo.focus();
		}
	}
	return rsul;
}
//-------------------------------------------------------------------
// Determina si un caracter es un número
//-------------------------------------------------------------------
function numero(car)
{
	return (numeros.indexOf(car)>=0);
}

//-------------------------------------------------------------------
// Determina si un año es bisiesto
//-------------------------------------------------------------------
function bisiesto(anio)
{
	if (((anio % 4 == 0) && anio % 100 != 0) || anio % 400 == 0)
	{
		return true;
	}
	return false;
}
//-------------------------------------------------------------------
// Comprueba si una fecha es correcta
//-------------------------------------------------------------------
function ValFecha(trae)
{
	var nsep = 0;
	// Comprobación de la sintáxis de una fecha
	if (rsul)
	{
		var fecha = trae.value;
		for (var i=0; i<fecha.length; ++i)
		{
			var car=fecha.charAt(i);
			if (!numero(car)&&car!=separadorfecha)
			{
				$("#messval").text("Caracter incorrecto");
				rsul = false;
				trae.focus();
			}
			if (car==separadorfecha)
			{
				nsep++;
			}
		}
		if (nsep!=2)
		{
			$("#messval").text("Incorrecion en los separadores");
			rsul = false;
			trae.focus();
		}
		// Comprobación de la semántica de una fecha
		var pos1=fecha.indexOf(separadorfecha);
		var dia=fecha.substring(0,pos1);
		var pos2=fecha.indexOf(separadorfecha,pos1+2);
		var mes=fecha.substring(pos1+1,pos2);
		var anio=fecha.substring(pos2+1,10);
		if (anio<1900||anio>2050)
		{
			$("#messval").text("Año fuera de rango");
			rsul = false;
			trae.focus();
		}
		if (mes<1||mes>12)
		{
			$("#messval").text("Mes incorrecto");
			rsul = false;
			trae.focus();
		}
		if ((dia<1 || dia>31)||(mes==4&&dia>30)||(mes==6&&dia>30)
		||(mes==9&&dia>30)||(mes==11&&dia>30)
		||(mes==2&&bisiesto(anio)&&dia>29)
		||(mes==2&&!bisiesto(anio)&&dia>28)
		)
		{
			$("#messval").text("Dia incorrecto");
			rsul = false;
			trae.focus();
		}
	}
	return rsul;
}
//-------------------------------------------------------------------
// Determina el genero obligatorio
//-------------------------------------------------------------------
function ValGener(campo, mensa)
{
	if (rsul)
	{
		if ( !campo[0].checked && !campo[1].checked )
		{
			$("#messval").text(mensa);
			rsul = false;
			campo[0].focus();
		}
	}
	return rsul;
}
//-------------------------------------------------------------------
// Determina la validez de un campo de correo electronico
//-------------------------------------------------------------------
function ValEmail(campo, mensa)
{
	if (rsul)
	{
		var b=/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
		rsul = b.test(campo.value);
		if (!rsul)
		{
			$("#messval").text(mensa);
			campo.focus();
		}
	}
	return rsul;
}

//-------------------------------------------------------------------
// Determina la validez de un campo de correo electronico
//-------------------------------------------------------------------
function ValCaptc(mensa)
{
	if (rsul)
	{
		rsul = jcap();
		if (!rsul)
		{
			$("#messval").text(mensa);
		}
	}
	return rsul;
}
//-------------------------------------------------------------------
// Limpia los datos de un formulario
//-------------------------------------------------------------------
function DelForm1(formu)
{

	rsul = false;

	formu.nomb.value = '';
	formu.apel.value = '';
	formu.gene[0].checked = false;
	formu.gene[1].checked = false;
	formu.fnac.value = '';
	formu.naci.value = '';
	formu.prof.value = '';
	formu.mail.value = '';
	formu.tlfn.value = '';
	formu.movl.value = '';
	formu.domi.value = '';
	formu.locl.value = '';
	formu.cpos.value = '';
	formu.prov.value = '';
	formu.regi.value = '';
	formu.pais.value = '';
	formu.porq.value = '';
	formu.nomb.focus();

	return rsul;
}
//-------------------------------------------------------------------
// Desactiva y activa los item del test
//-------------------------------------------------------------------
function pultest(which)
{
	var fila = which.charAt(1);
	var colu = which.charAt(2);

	document.getElementById("x"+fila+"1").style.background="#e0e0e0";
	document.getElementById("x"+fila+"2").style.background="#e0e0e0";
	document.getElementById("x"+fila+"3").style.background="#e0e0e0";
	document.getElementById("x"+fila+"4").style.background="#e0e0e0";
	document.getElementById("x"+fila+"5").style.background="#e0e0e0";
	document.getElementById("x"+fila+colu).style.background="#80a6c6";

	Kues[fila] = eval(colu);

	return true;
}
//-------------------------------------------------------------------
// Valida formulario de test
//-------------------------------------------------------------------
function Valtest()
{
	total = 0;
	flago = "sok";
	for (var i=0; i<10; i++)
	{
		if ( Kues[i] == "0" )
		{
			flago = "nok";
		}
		carga = parseInt(Kues[i], 10);
		total += carga;
	}
	if ( flago == "sok" )
	{
		document.getElementById("cuab1").style.visibility="hidden";
		if ( total < 21 )
		{
			document.getElementById("cuab2").style.visibility="visible";
		}
		else if ( total < 31 )
		{
			document.getElementById("cuab3").style.visibility="visible";
		}
		else if ( total < 41 )
		{
			document.getElementById("cuab4").style.visibility="visible";
		}
		else
		{
			document.getElementById("cuab5").style.visibility="visible";
		}
	}
	else
	{
		alert("Debes responder a todas las preguntas")
	}
	return true;
}


