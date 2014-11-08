<?php
/*
Template Name: Page - Vendor List
*/
?>
<?php get_header(); ?>
<main role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( "article article--full" ); ?>>
        <header class="article__header">
            <h1 class="article__title"><?php the_title(); ?></h1>
        </header>
        <div class="article__body cf">
	        <?php the_content(); ?>

            <ul class="vendor-list grid">
                
            <?php wp_reset_query();
            query_posts( 'post_type=vendor&order=ASC&orderby=name' );
            while ( have_posts() ) : the_post();

                $attachment = wp_get_attachment_by_post_name( $post->post_name . "-2" );

                if($attachment){
                    echo "<li class='vendor-tile grid__cell--one-quarter grid__cell--tablet--one-third grid__cell--handheld--one-half'><a href='" . $attachment->post_content . "'>" . wp_get_attachment_image( $attachment->ID, "vendor-logo" ) . "</a></li>";
                } else {
                    echo "<li class='vendor-tile vendor-tile--empty grid__cell--one-quarter grid__cell--tablet--one-third grid__cell--handheld--one-half'>" . $post->post_title . "</li>";
                }
                
            endwhile;
            wp_reset_query(); ?>

            </ul>
        </div>
    </article>

    <?php endwhile; ?>
    <?php else : ?>
    <article id="post-not-found" class="article">
        uh
    </article>

    <?php endif; ?>
</main>
<?php get_footer(); ?>