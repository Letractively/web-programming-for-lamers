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

<?php
	$posts = get_posts('numberposts=10&order=ASC&orderby=post_title');
	foreach ($posts as $post) : start_wp(); ?>
<div class="block4" style="margin-left: 30px; padding-right: 372px; padding-bottom: 30px;">
	<?php the_time('F j, Y'); ?>
	<h2><?php the_title(); ?></h2>
	<p><?php the_excerpt(); ?></p>
	<a href="<?php comments_link(); ?>">
		Comentarios
	</a>
</div>
<?php
	endforeach;
?>

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
