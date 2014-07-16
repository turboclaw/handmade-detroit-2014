<?php get_header(); ?>
<main role="main">
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
    <article id="post-not-found" class="article">
        uh
    </article>

    <?php endif; ?>
</main>
<?php get_footer(); ?>