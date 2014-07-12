<?php get_header(); ?>
<main role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( "article article--full" ); ?>>
        <header class="article__header">
            <h1 class="article__title"><?php the_title(); ?></h1>
        </header>
        <div class="article__body cf">
        <?php the_content(); ?>
        </div>
        <footer class="article__meta cf">
            <div class="article__meta__description">
                by <?php the_author_posts_link(); ?> on <a href="<?php the_time('/Y/m/'); ?>"><?php the_time('F'); ?></a> <?php the_time('j, Y'); ?> // Categories: <?php the_category(', '); ?><?php comments_number( '', ' // 1 Comment', ' // % Comments' ); ?> // Share on <a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>&t=<?php echo urlencode( get_the_title() ); ?>" data-icon="facebook" target="_blank"></a> <a href="http://twitter.com/share?url=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo urlencode( get_the_title() ); ?>" data-icon="twitter" target="_blank"></a> <a href="http://www.pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink() ); ?>&media=&description=<?php echo urlencode( get_the_title() ); ?>" data-icon="pinterest" target="_blank"></a>
            </div>
            <div class="article__meta__image">
                <div class="article__meta__avatar">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 200 ); ?>                    
                </div>
            </div>
        </footer>
    </article>

    <aside role="complementary" id="comments" class="comments">
    <?php comments_template( '', true ); ?>
    </aside>


    <?php endwhile; ?>
    <?php else : ?>
    <article id="post-not-found" class="article">
        uh
    </article>

    <?php endif; ?>
</main>
<?php get_footer(); ?>