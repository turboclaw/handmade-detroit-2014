<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php bloginfo('name'); ?><?php if ( !is_home() ) { echo " | "; wp_title(""); } ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png" />
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/2014-src.css" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header role="banner" class="masthead">
            <h1 class="masthead__logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/handmade-detroit.svg" alt="Handmade Detroit" /></a></h1>
            <nav role="navigation" class="masthead__nav">
                <ul>
                    <li><a href="#">D.U.C.F.</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </header>