<?php
/*
Template Name: Page - Contact
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

	        <h3>Send us an email</h3>
	        <?php global $ddfm; echo $ddfm{1}->generate_data(); ?>
	        <h3>Sign up for our mailing list</h3>
	        <div class="ddfmwrap">
	        	<form method="post" action="http://oi.vresp.com?fid=7139dcab8b" target="vr_optin_popup" onsubmit="window.open( 'http://www.verticalresponse.com', 'vr_optin_popup', 'scrollbars=yes,width=600,height=450' ); return true;" >
	        		<p><label for="email_address">Email</label><input name="email_address" size="15" type="text" class="text" /></p>
	        		<p><input type="submit" value="Sign me up!" style="submit" /></p>
	        	</form>
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