<?php
/*
Template Name: Page - Panels
*/
?>
<?php get_header(); ?>
<main role="main">
<?php global $currentsite; if ($currentsite == "handmade-detroit") { ?>
	<section class="panel panel--calendar calendar">
	    <ol>
		<?php wp_reset_query();
		query_posts( 'post_type=event&order=ASC&meta_key=hidden_date&orderby=meta_value_num' );
		while ( have_posts() ) : the_post(); ?>
			<?php
			$event_date = get_field("hidden_date") / 1000;
			$today = time();
			if ( (int)$event_date >= (int)$today ) { ?>
	        <li class="calendar__event <?php if( get_field("featured") ) { ?>calendar__event--highlight<?php } ?>">
	            <a href="<?php the_permalink(); ?>">
	            <date>
	            <span class="month"><?php the_field("date_month"); ?></span>
	            <span class="day"><?php the_field("date_day"); ?></span>
	            </date>
	            <h4 class="calendar__event__title"><?php the_title(); ?></h4>
	            <div class="calendar__event__location"><?php the_field("location"); ?></div>
	            </a>
	        </li>
	        <?php } ?>
		<?php endwhile;
		wp_reset_query(); ?>
	    </ol>
	</section>
<?php } ?>

	<?php dynamic_sidebar( "front_panels" ); ?>
</main>
<?php get_footer(); ?>