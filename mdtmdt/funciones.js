// JavaScript Document
var celda_actual;

function botonovermenu(x){
	x.className='botonesOVER';
}
function botonoutmenu(x){
	x.className='botones';
}
function ir_a(x){
	document.getElementById('iframearea').src='frameset.php?id_sel='+x;
}
function ir_a_(x,t,s,v){
	if( document.getElementById('iframearea').src != 'frameset.php?id_sel='+v )
	{
		document.getElementById('iframearea').src='frameset.php?id_sel='+v;	
	}
	setTimeout( "document.frames.item('iframearea').document.frames.item('izquierda').xhola('"+s+"','"+x+"','"+t+"');", 500 );
	/*try{
		document.frames.item('iframearea').document.frames.item('izquierda').xhola(s,x,t);
	}
	catch(f)
	{
		izq = document.frames.item('iframearea').document.frames.item('izquierda');
		izq.location='./tmp_menues/sub_3.php?actualiza='+x+'&tit='+t+'&sec='+s;
	}*/
}
function ir_a1_(x,t,s){
	try{
		document.frames.item('iframearea').document.frames.item('izquierda').xhola(s,x,t);
	}
	catch(f)	{
		izq = document.frames.item('iframearea').document.frames.item('izquierda');
		izq.location='./tmp_menues/sub_7.php?actualiza='+x+'&tit='+t+'&sec='+s;
	}
}

function cambiasocio(x){
	document.form.socio.value=x;
	document.form.submit();
}
function cambiaidioma(x){
	//if(x=='por') x='ing';
	document.form.lng.value=x;
	document.form.submit();
}
