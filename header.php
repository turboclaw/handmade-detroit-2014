<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php bloginfo('name'); ?><?php if ( !is_home() ) { echo " | "; wp_title(""); } ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/favicon-152.png" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/2014-src.css" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php 
        if( !is_front_page() ) {
            wp_reset_query();
            query_posts( 'post_type=default_panels&orderby=rand&posts_per_page=1' );
            while ( have_posts() ) : the_post();
            $post_thumbnail_url = get_field("image");
            endwhile;
            wp_reset_query();
        }
        ?>
        <header role="banner" class="masthead" style="background-image: url(<?php echo $post_thumbnail_url; ?>);">
            <h1 class="masthead__logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/handmade-detroit.svg" alt="Handmade Detroit" /></a></h1>
            <nav role="navigation" class="masthead__nav">
                <ul>
                    <li><a href="http://detroiturbancraftfair.com">D.U.C.F.</a></li>
                    <li><a href="/blog/">Blog</a></li>
                    <li><a href="/about/">About</a></li>
                    <li><a href="/contact/">Contact</a></li>
                </ul>
            </nav>
        </header>