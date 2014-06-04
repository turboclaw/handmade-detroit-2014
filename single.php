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
                by <?php the_author_posts_link(); ?> on <a href="<?php the_time('/Y/m/'); ?>"><?php the_time('F'); ?></a> <?php the_time('j, Y'); ?> // Categories: <?php the_category(', '); ?><?php comments_number( '', ' // 1 Comment', ' // % Comments' ); ?>
            </div>
            <div class="article__meta__image">
                <img src="http://lorempixel.com/200/200" alt="Avatar" />
            </div>
        </footer>
    </article>

    <?php endwhile; ?>
    <?php else : ?>
    <article id="post-not-found" class="article">
        uh
    </article>

    <?php endif; ?>
</main>
<?php get_footer(); ?>