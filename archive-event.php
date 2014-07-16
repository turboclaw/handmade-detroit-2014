<?php get_header(); ?>
<main role="main">
    <h1 class="archive-title">D.I.Y. Calendar</h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( "article article--calendar-event article--list-item" ); ?>>
        <footer class="article__meta cf">
            <date class="article__meta__description">
            <span class="month"><?php the_field("date_month"); ?></span>
            <span class="day"><span><?php the_field("date_day"); ?></span></span>
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