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

	<?php dynamic_sidebar( "front_panels" ); ?>
</main>
<?php get_footer(); ?>