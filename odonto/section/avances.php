<?php 
	if (!$included) die();
?>

<div id="headtitle"> 
	<h1>Últimos Avances</h1>
</div>

<div id="topParagraph">
	<p>Nuestro blog le permite mantenerse al tanto de nuestras más recientes innovaciones, actualización de equipo, y técnicas. Su opinión nos es importante, lo invitamos también a comentar bajo nuestros artículos.</p>
</div>

<?php
	$posts = get_posts('numberposts=10&order=ASC&orderby=post_title');
	foreach ($posts as $post) : start_wp(); ?>
<div class="block6">
	<h2><a href="<?php echo post_permalink(); ?>"><?php the_title(); ?></a></h2>
	<h3>Publicado el <b><a href="<?php echo post_permalink(); ?>"><?php the_time('j F, Y'); ?></a></b></h3>
	<p><?php the_content(); ?></p>
	<h3><a href="<?php comments_link(); ?>">Comentarios</a></h3>
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
