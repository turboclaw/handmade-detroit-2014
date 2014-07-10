<?php get_header(); ?>
<main role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( "article article--calendar-event article--list-item" ); ?>>
            <footer class="article__meta cf">
                <date class="article__meta__description">
                <span class="month"><?php the_field("date_month"); ?></span>
                <span class="day"><?php the_field("date_day"); ?></span>
                </date>
            </footer>
            <div class="article__content">
                <header class="article__header">
                    <h1 class="article__title"><?php the_title(); ?></h1>
                    <div class="calendar__meta">
                        <?php the_field("venue"); ?>, <?php the_field("location"); ?> <br /><a href="<?php the_field("url"); ?>"><?php the_field("url"); ?></a>
                    </div>
                </header>
                <div class="article__body cf">
                    <?php the_field("description"); ?> 
                </div>
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