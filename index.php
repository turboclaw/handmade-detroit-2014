<?php get_header(); ?>
<main role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php get_template_part( "article--list-item" ); ?>
    <?php endwhile; ?>
    <?php else : ?>
    <article id="post-not-found" class="article">
        uh
    </article>

    <?php endif; ?>
</main>
<?php get_footer(); ?>