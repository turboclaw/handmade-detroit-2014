<?php
/*
Template Name: Page - Panels
*/
?>
<?php get_header(); ?>
<main role="main">
	<section class="panel panel--calendar calendar">
	    <ol>
		<?php wp_reset_query();
		query_posts( 'post_type=event&order=ASC&orderby=menu_order' );
		while ( have_posts() ) : the_post(); ?>
	        <li class="calendar__event">
	            <a href="<?php the_permalink(); ?>">
	            <date>
	            <span class="month"><?php the_field("date_month"); ?></span>
	            <span class="day"><?php the_field("date_day"); ?></span>
	            </date>
	            <h4 class="calendar__event__title"><?php the_title(); ?></h4>
	            <div class="calendar__event__location"><?php the_field("location"); ?></div>
	            </a>
	        </li>
		<?php endwhile;
		wp_reset_query(); ?>
	    </ol>
	</section>

	<?php 
	wp_reset_query();
	query_posts( 'post_type=default_panels&orderby=rand&posts_per_page=1' );
	while ( have_posts() ) : the_post();
	$post_thumbnail_url = get_field("image");
	endwhile;

	wp_reset_query();
	query_posts( 'posts_per_page=1' );
	while ( have_posts() ) : the_post(); ?>
	<?php if ( has_post_thumbnail() ) { 
		$post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	}?>
	<section class="panel panel--blog" style="background-image: url(<?php echo $post_thumbnail_url; ?>)">
	    <div class="panel__header">
	        <p class="panel__tagline">The latest from the <a href="/blog/">HD blog</a></p>
	        <h1 class="panel__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	    </div>
	    <div class="panel__body">
	        <span><?php $unwrapped_excerpt = get_the_excerpt(); echo $unwrapped_excerpt; ?></span>
	    </div>
	</section>
	<?php endwhile;
	wp_reset_query(); ?>

	<section class="panel panel--ducf">
	    <div class="panel__header">
	        <h1 class="panel__title">Detroit Urban Craft Fair</h1>
	    </div>
	    <div class="panel__body">
	        <span>Michigan's largest collection of whatever it is, or something good about the fair. I don't know. Applications are open now!</span>
	    </div>
	</section>
</main>
<?php get_footer(); ?>