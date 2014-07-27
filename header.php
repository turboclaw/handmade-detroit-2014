<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <?php include_once "siteinfo.php"; ?>
        <title><?php bloginfo('name'); ?><?php if ( !is_front_page() ) { echo " | "; wp_title(""); } ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="<?php bloginfo('description'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/2014.css" />
        <link rel="alternate" type="application/rss+xml" title="Handmade Detroit" href="http://feeds2.feedburner.com/handmadedetroit/rss" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class( $currentsiteclass ); ?>>
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
            <h1 class="masthead__logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $currentsite; ?>.svg" alt="<?php bloginfo("name"); ?>" /></a></h1>
            <nav role="navigation" class="masthead__nav">
                <ul>
                    <li><a href="http://detroiturbancraftfair.com">D.U.C.F.</a></li>
                    <li><a href="/blog/">Blog</a></li>
                    <li><a href="/about/">About</a></li>
                    <li><a href="/contact/">Contact</a></li>
                </ul>
            </nav>
        </header>