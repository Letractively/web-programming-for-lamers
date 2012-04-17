<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');
	$socio=$_SESSION['socio'];
	if($socio=='mdt'){ $anchof=93;} else{ $anchof=110; }

	$nombres['mdt']['esp']='<b>Muñoz de Toro, Souza, Cescon Avedissian, Barrieu e Flesch, y Alvarez Hinzpeter Jana</b>, tres firmas líderes en la Argentina, Brasil y Chile, respectivamente';
	$nombres['sou']['esp']='<b>Souza, Cescon Avedissian, Barrieu e Flesch, Muñoz de Toro,  y Alvarez Hinzpeter Jana</b>, tres firmas líderes en Brasil, Argentina y Chile, respectivamente';
	$nombres['alv']['esp']='<b>Alvarez Hinzpeter Jana, Muñoz de Toro, y Souza, Cescon Avedissian, Barrieu e Flesch </b>, tres firmas líderes en Chile, Brasil y Argentina, respectivamente';

	$nombres['mdt']['ing']='<b>Muñoz de Toro, Souza, Cescon Avedissian, Barrieu e Flesch, and Alvarez Hinzpeter Jana</b>, three leading law firms in Argentina, Brazil and Chile, respectively';
	$nombres['sou']['ing']='<b>Souza, Cescon Avedissian, Barrieu e Flesch, Muñoz de Toro,  and Alvarez Hinzpeter Jana</b>, three leading law firms in Brazil, Argentina and Chile, respectively';
	$nombres['alv']['ing']='<b>Alvarez Hinzpeter Jana, Muñoz de Toro, and Souza, Cescon Avedissian, Barrieu e Flesch</b>, three leading law firms in Chile, Brazil and Argentina, respectively';
	
	$nombres['mdt']['por']='<b>Muñoz de Toro, Souza, Cescon Avedissian, Barrieu e Flesch, e Alvarez Hinzpeter Jana</b>, três escritórios jurídicos líderes em seus respectivos países';
	$nombres['sou']['por']='<b>Souza, Cescon Avedissian, Barrieu e Flesch, Muñoz de Toro,  e Alvarez Hinzpeter Jana</b>, três escritórios jurídicos líderes em seus respectivos países';
	$nombres['alv']['por']='<b>Alvarez Hinzpeter Jana, Muñoz de Toro, e Souza, Cescon Avedissian, Barrieu e Flesch</b>, três escritórios jurídicos líderes em seus respectivos países';


	$msg['esp']=', conformaron en noviembre de 2004 una asociación con el objetivo de brindar a sus clientes una solución integrada, coordinada y de excelencia en los principales mercados del Cono Sur.</p> La asociación de tres firmas líderes en sus respectivos mercados que comparten una misma filosofía y estrictos estándares de excelencia se traduce en un nuevo concepto en materia de servicios legales en la región: entender la abogacía como una herramienta para que el cliente agregue valor a sus negocios. Alentamos una visión práctica y creativa de la abogacía, partiendo de una premisa esencial: elegir abogados es una decisión empresarial importante. Además de experiencia, los clientes exigen abogados que respondan a sus necesidades y, sobre todo, que simplifiquen y resuelvan los problemas de manera rápida y eficiente. </p>De esta forma, ponemos al servicio de nuestros clientes un equipo de más de 120 profesionales especializados en diversas áreas del derecho empresarial, que representan a los principales grupos empresarios y financieros de la región y el mundo, lo que nos permite brindar a cada cliente el mismo servicio, con idénticos estándares de calidad y profesionalismo y la misma atención en cualquiera de nuestras oficinas ubicadas en Buenos Aires, San Pablo, Río de Janeiro y Santiago, a fin de cubrir sus necesidades en los negocios que emprenda en el Cono Sur.</p>La vasta integración y filosofía común de las tres firmas, combinada con la diversidad cultural y académica de nuestros abogados, nos coloca en inmejorable posición para asesorar a nuestros clientes en transacciones internacionales, eliminando barreras culturales e idiomáticas y complejidades innecesarias.';

	$msg['ing']=', associated their offices to provide their clients with a comprehensive, coordinated and high quality solution for doing business in the most important markets in South America.</p> The association of the three leading law firms is based upon the sharing of the same philosophy, ethics and the highest standards of excellence in rendering legal services: we understand the legal profession as a tool for the client to add value to his businesses. We encourage a practical and creative vision of the legal profession, based on the belief that choosing the right lawyers is essential. Clients, in addition to seeking expert legal advice, want lawyers who respond to their needs and who efficiently and promptly simplify and resolve problems.</p> Accordingly, we offer our clients a team of over 120 professionals specialized in different areas of corporate law. We are devoted to provide each client with the same quality and professionalism standards at any of our offices in Buenos Aires, San Pablo, Rio de Janeiro and Santiago. We are proud of being in the best possible position to satisfy our clients’ needs for doing businesses in South America.</p> The vast integration and shared philosophy of the three firms, coupled with cultural and academic diversity of our lawyers, enables us to provide legal advice to our clients in the most effective way in cross-border transactions, overcoming cultural and language differences and unnecessary complications.';

	$msg['por']=', que compartilham a mesma filosofia de trabalho e rígidos padrões de excelência e dedicação,  realizaram uma  associação dentro de uma imagem corporativa comum com o objetivo de prestar assessoria jurídica a seus clientes de forma integrada, coordenada através de seus escritórios em São Paulo, Buenos Aires, Rio de Janeiro e Santiago.</p><p>Assim, nasce uma nova opção de serviços jurídicos no Cone Sul, baseada num novo conceito em matéria de serviços jurídicos na região: entender a advocacia como uma ferramenta para que o cliente agregue valor a seus negócios.  Alentamos uma visão prática e criativa da advocacia, partindo de uma premissa essencial: escolher advogados é uma decisão empresarial importante. Além de experiência, os clientes exigem advogados que respondam às suas necessidades e, sobretudo, que simplifiquem e resolvam os problemas de maneira rápida e eficiente.</p><p>Para atingir esses objetivos, funcionaremos de forma permanente como uma  equipe única de trabalho, com advogados dos três países, em cada um de seus escritórios, disponibilizando aos nossos clientes os serviços de mais de 120 profissionais especializados em diversas áreas do direito empresarial, que representam os principais grupos empresariais e financeiros da região e mundiais. Nossos clientes terão, assim, o mesmo serviço e a mesma atenção, com idênticos padrões de qualidade e profissionalismo em qualquer de nossos escritórios.</p><p>A perfeita integração e filosofia comum dos três escritórios, combinada com a diversidade cultural e acadêmica de nossos advogados, nos coloca numa excelente posição para assessorar nossos clientes em transações internacionais, eliminando barreiras culturais e idiomáticas e complexidades desnecessárias constituindo, assim (suprimir definitivamente), uma nova opção em serviços legais no Cone Sul.</p>';

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
