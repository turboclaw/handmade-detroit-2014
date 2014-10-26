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

            <?php

            $attachment = wp_get_attachment_by_post_name( "apple" );
            // Replace post_name by the name/slug of the attachment
            // It will give you an object, which you can render like below to get the ID and post_parent
            if ( $attachment ) {
                echo $attachment->ID . " "; // Gives the id of the attachment
                echo $attachment->post_parent . " "; // Gives the post_parent id
                echo $attachment->post_title . " "; // Gives the attachment title.
                echo $attachment->post_content . " ";

                echo "<li class='grid__cell--one-quarter'><a href='" . $attachment->post_content . "'>" . wp_get_attachment_image( $attachment->ID, "vendor-logo" ) . "</a></li>";
            }

            ?>
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