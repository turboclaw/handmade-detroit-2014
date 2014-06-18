<?php get_header(); ?>
<main role="main">
    <?php if (is_category()) { ?>
        <h1 class="archive-title">
            Posts Categorized: <?php single_cat_title(); ?>
        </h1>

    <?php } elseif (is_tag()) { ?>
        <h1 class="archive-title">
            Posts Tagged: <?php single_tag_title(); ?>
        </h1>

    <?php } elseif (is_author()) {
        global $post;
        $author_id = $post->post_author;
    ?>
        <h1 class="archive-title">
            Posts By: <?php the_author_meta('display_name', $author_id); ?>
        </h1>
    <?php } elseif (is_day()) { ?>
        <h1 class="archive-title">
            Daily Archives: <?php the_time('l, F j, Y'); ?>
        </h1>

    <?php } elseif (is_month()) { ?>
        <h1 class="archive-title">
            Monthly Archives: <?php the_time('F Y'); ?>
        </h1>

    <?php } elseif (is_year()) { ?>
        <h1 class="archive-title">
            Yearly Archives: <?php the_time('Y'); ?>
        </h1>
    <?php } ?>
                                
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( "article article--list-item" ); ?>>
        <footer class="article__meta cf">
            <div class="article__meta__description"><?php the_time('n/j'); ?></div>
            <div class="article__meta__image">
                <?php
                    $images = get_children('post_parent='.$post->ID.'&post_type=attachment&post_mime_type=image&numberposts=1&order=ASC');
                    if ( !empty($images) ){
                      echo wp_get_attachment_image(reset($images)->ID, "thumbnail");
                    } else {
                        echo '<img src="' . get_template_directory_uri() . '/img/really.gif" alt="" />';
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

    <?php endwhile; ?>
    <nav class="pagination cf">
        <ul>
            <li class="pagination__link pagination__previous"><?php next_posts_link('Older Posts'); ?></li>
            <li class="pagination__link pagination__next"><?php previous_posts_link('Newer Posts'); ?></li>            
        </ul>
    </nav>
    <?php else : ?>
    <article id="post-not-found" class="hentry cf">
        uh
    </article>

    <?php endif; ?>
</main>
<?php get_footer(); ?>