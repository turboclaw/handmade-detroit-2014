<article id="post-<?php the_ID(); ?>" <?php post_class( "article article--list-item" ); ?>>
    <footer class="article__meta cf">
        <div class="article__meta__description"><?php the_time('n/j'); ?></div>
        <div class="article__meta__image">
            <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( "thumbnail" );
                } else {
                    $images = get_children('post_parent='.$post->ID.'&post_type=attachment&post_mime_type=image&numberposts=1&order=ASC');
                    if ( !empty($images) ){
                      echo wp_get_attachment_image(reset($images)->ID, "thumbnail");
                    } else {
                        echo '<img src="' . get_template_directory_uri() . '/img/really.gif" alt="" />';
                    }
                }
            ?>
        </div>
    </footer>
    <div class="article__content">
        <header class="article__header">
            <h1 class="article__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
        </header>
        <div class="article__body cf">
            <?php the_excerpt(); ?>
        </div>
    </div>
</article>