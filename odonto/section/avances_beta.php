<?php 
	if (!$included) die();
?>

<div id="headtitle"> 
	<h1>Últimos Avances</h1>
</div>

<div id="topParagraph">
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
    Donec viverra odio sit amet lectus hendrerit malesuada dapibus nulla scelerisque. 
    iquam purus turpis, aliquet id vestibulum vitae, consequat at erat.</p>
</div>

<div class="block4" style="margin-left: 30px; padding-bottom: 30px; width: 768px">

	<b>febrero 24, 2012</b>
	<h2>¡Hola mundo!</h2>
	<p><p>Bienvenido a WordPress. Esta es tu primera entrada. Edítala o bórrala, ¡y comienza a publicar!.</p>
</p>
	<a href="http://www.sumacero.com/odonto/wordpress/?p=1#comments">
		Comentarios
	</a>
</div>
<div class="block4" style="margin-left: 30px; padding-bottom: 30px; width: 768px">

	<b>febrero 24, 2012</b>
	<h2>Prueba</h2>
	<p><p>esto es una prueba</p>
</p>
	<a href="http://www.sumacero.com/odonto/wordpress/?p=4#comments">
		Comentarios
	</a>
</div>


<div style="clear: both; height: 60px;"> </div>

<?php

//// The Query
//$the_query = new WP_Query( 'cat=1' );

//// The Loop
//while ( $the_query->have_posts() ) : $the_query->the_post();
//	get_template_part( 'content', get_post_format() );
//	echo '<li>';
//	the_title();
//	the_date();
//	echo '</li>';
//endwhile;

//// Reset Post Data
//wp_reset_postdata();

?>
