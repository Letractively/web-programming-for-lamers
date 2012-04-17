<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');
	$socio=$_SESSION['socio'];
	if($socio=='mdt'){ $anchof=93;} else{ $anchof=110; }

	$nombres['mdt']['esp']='<b>Mu�oz de Toro, Souza, Cescon Avedissian, Barrieu e Flesch, y Alvarez Hinzpeter Jana</b>, tres firmas l�deres en la Argentina, Brasil y Chile, respectivamente';
	$nombres['sou']['esp']='<b>Souza, Cescon Avedissian, Barrieu e Flesch, Mu�oz de Toro,  y Alvarez Hinzpeter Jana</b>, tres firmas l�deres en Brasil, Argentina y Chile, respectivamente';
	$nombres['alv']['esp']='<b>Alvarez Hinzpeter Jana, Mu�oz de Toro, y Souza, Cescon Avedissian, Barrieu e Flesch </b>, tres firmas l�deres en Chile, Brasil y Argentina, respectivamente';

	$nombres['mdt']['ing']='<b>Mu�oz de Toro, Souza, Cescon Avedissian, Barrieu e Flesch, and Alvarez Hinzpeter Jana</b>, three leading law firms in Argentina, Brazil and Chile, respectively';
	$nombres['sou']['ing']='<b>Souza, Cescon Avedissian, Barrieu e Flesch, Mu�oz de Toro,  and Alvarez Hinzpeter Jana</b>, three leading law firms in Brazil, Argentina and Chile, respectively';
	$nombres['alv']['ing']='<b>Alvarez Hinzpeter Jana, Mu�oz de Toro, and Souza, Cescon Avedissian, Barrieu e Flesch</b>, three leading law firms in Chile, Brazil and Argentina, respectively';
	
	$nombres['mdt']['por']='<b>Mu�oz de Toro, Souza, Cescon Avedissian, Barrieu e Flesch, e Alvarez Hinzpeter Jana</b>, tr�s escrit�rios jur�dicos l�deres em seus respectivos pa�ses';
	$nombres['sou']['por']='<b>Souza, Cescon Avedissian, Barrieu e Flesch, Mu�oz de Toro,  e Alvarez Hinzpeter Jana</b>, tr�s escrit�rios jur�dicos l�deres em seus respectivos pa�ses';
	$nombres['alv']['por']='<b>Alvarez Hinzpeter Jana, Mu�oz de Toro, e Souza, Cescon Avedissian, Barrieu e Flesch</b>, tr�s escrit�rios jur�dicos l�deres em seus respectivos pa�ses';


	$msg['esp']=', conformaron en noviembre de 2004 una asociaci�n con el objetivo de brindar a sus clientes una soluci�n integrada, coordinada y de excelencia en los principales mercados del Cono Sur.</p> La asociaci�n de tres firmas l�deres en sus respectivos mercados que comparten una misma filosof�a y estrictos est�ndares de excelencia se traduce en un nuevo concepto en materia de servicios legales en la regi�n: entender la abogac�a como una herramienta para que el cliente agregue valor a sus negocios. Alentamos una visi�n pr�ctica y creativa de la abogac�a, partiendo de una premisa esencial: elegir abogados es una decisi�n empresarial importante. Adem�s de experiencia, los clientes exigen abogados que respondan a sus necesidades y, sobre todo, que simplifiquen y resuelvan los problemas de manera r�pida y eficiente. </p>De esta forma, ponemos al servicio de nuestros clientes un equipo de m�s de 120 profesionales especializados en diversas �reas del derecho empresarial, que representan a los principales grupos empresarios y financieros de la regi�n y el mundo, lo que nos permite brindar a cada cliente el mismo servicio, con id�nticos est�ndares de calidad y profesionalismo y la misma atenci�n en cualquiera de nuestras oficinas ubicadas en Buenos Aires, San Pablo, R�o de Janeiro y Santiago, a fin de cubrir sus necesidades en los negocios que emprenda en el Cono Sur.</p>La vasta integraci�n y filosof�a com�n de las tres firmas, combinada con la diversidad cultural y acad�mica de nuestros abogados, nos coloca en inmejorable posici�n para asesorar a nuestros clientes en transacciones internacionales, eliminando barreras culturales e idiom�ticas y complejidades innecesarias.';

	$msg['ing']=', associated their offices to provide their clients with a comprehensive, coordinated and high quality solution for doing business in the most important markets in South America.</p> The association of the three leading law firms is based upon the sharing of the same philosophy, ethics and the highest standards of excellence in rendering legal services: we understand the legal profession as a tool for the client to add value to his businesses. We encourage a practical and creative vision of the legal profession, based on the belief that choosing the right lawyers is essential. Clients, in addition to seeking expert legal advice, want lawyers who respond to their needs and who efficiently and promptly simplify and resolve problems.</p> Accordingly, we offer our clients a team of over 120 professionals specialized in different areas of corporate law. We are devoted to provide each client with the same quality and professionalism standards at any of our offices in Buenos Aires, San Pablo, Rio de Janeiro and Santiago. We are proud of being in the best possible position to satisfy our clients� needs for doing businesses in South America.</p> The vast integration and shared philosophy of the three firms, coupled with cultural and academic diversity of our lawyers, enables us to provide legal advice to our clients in the most effective way in cross-border transactions, overcoming cultural and language differences and unnecessary complications.';

	$msg['por']=', que compartilham a mesma filosofia de trabalho e r�gidos padr�es de excel�ncia e dedica��o,  realizaram uma  associa��o dentro de uma imagem corporativa comum com o objetivo de prestar assessoria jur�dica a seus clientes de forma integrada, coordenada atrav�s de seus escrit�rios em S�o Paulo, Buenos Aires, Rio de Janeiro e Santiago.</p><p>Assim, nasce uma nova op��o de servi�os jur�dicos no Cone Sul, baseada num novo conceito em mat�ria de servi�os jur�dicos na regi�o: entender a advocacia como uma ferramenta para que o cliente agregue valor a seus neg�cios.  Alentamos uma vis�o pr�tica e criativa da advocacia, partindo de uma premissa essencial: escolher advogados � uma decis�o empresarial importante. Al�m de experi�ncia, os clientes exigem advogados que respondam �s suas necessidades e, sobretudo, que simplifiquem e resolvam os problemas de maneira r�pida e eficiente.</p><p>Para atingir esses objetivos, funcionaremos de forma permanente como uma  equipe �nica de trabalho, com advogados dos tr�s pa�ses, em cada um de seus escrit�rios, disponibilizando aos nossos clientes os servi�os de mais de 120 profissionais especializados em diversas �reas do direito empresarial, que representam os principais grupos empresariais e financeiros da regi�o e mundiais. Nossos clientes ter�o, assim, o mesmo servi�o e a mesma aten��o, com id�nticos padr�es de qualidade e profissionalismo em qualquer de nossos escrit�rios.</p><p>A perfeita integra��o e filosofia comum dos tr�s escrit�rios, combinada com a diversidade cultural e acad�mica de nossos advogados, nos coloca numa excelente posi��o para assessorar nossos clientes em transa��es internacionais, eliminando barreiras culturais e idiom�ticas e complexidades desnecess�rias constituindo, assim (suprimir definitivamente), uma nova op��o em servi�os legais no Cone Sul.</p>';

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./estilos<?=$_SESSION['socio']?>.css" rel="stylesheet" type="text/css">
</head>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr valign="top">
			<td height="35" align="right" valign="bottom" class="espacio" ><span class="titulos"><?=$tit!='' ? $tit:'&nbsp;' ;?>&nbsp;&nbsp;</span>&nbsp;&nbsp;<span>&nbsp;&nbsp;</span>
			</td>
		</tr>
	</table>

	<table border="0" cellpadding="1" cellspacing="0" width="95%" align="left">
		<tr><td height="10"></td></tr>
		<tr valign="top">
		   <td class="textocontenido">
		   <ul><li><?=$nombres[$socio][$lng]?><?=$msg[$lng]?></li></ul>
		   </td>
		</tr>
	</table>



</body>
</html>
