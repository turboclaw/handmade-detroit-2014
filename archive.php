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

        <?php if(is_author('amy')){ ?>
            <?php $post_id = $wpdb->get_var("SELECT id FROM wp_posts WHERE post_name='amy-cronkite' LIMIT 1");
            $requested_post = get_post($post_id); ?>
        <?php }elseif(is_author('bethany')){ ?>
            <?php $post_id = $wpdb->get_var("SELECT id FROM wp_posts WHERE post_name='bethany-nixon' LIMIT 1");
            $requested_post = get_post($post_id); ?>
        <?php }elseif(is_author('carey')){ ?>
            <?php $post_id = $wpdb->get_var("SELECT id FROM wp_posts WHERE post_name='carey-gustafson' LIMIT 1");
            $requested_post = get_post($post_id); ?>
        <?php }elseif(is_author('lish')){ ?>
            <?php $post_id = $wpdb->get_var("SELECT id FROM wp_posts WHERE post_name='lish-dorset' LIMIT 1");
            $requested_post = get_post($post_id); ?>
        <?php } ?>
        
        <article class="article article--list-item article--author-profile">
            <footer class="article__meta cf">
                <div class="article__meta__image">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 200 ); ?>
                </div>
            </footer>
            <div class="article__content">
                <header class="article__header">
                    <h1 class="article__title"><?php echo $requested_post->post_title; ?></h1>
                </header>
                <div class="article__body cf">
                    <?php echo $requested_post->post_content; ?>
                </div>
            </div>
        </article>

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
    <?php get_template_part( "article--list-item" ); ?>
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