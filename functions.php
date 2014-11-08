<?php

// $currentsite = "handmade-detroit";
$currentsite = "ducf";
$currentsiteclass = "site-" . $currentsite;

add_theme_support( 'post-thumbnails' );


add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Extra profile information</h3>
	<table class="form-table">
		<tr>
			<th><label for="twitter">Twitter</label></th>
			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter username.</span>
			</td>
		</tr>
	</table>
<?php }

if ( ! function_exists( 'hd_comment' ) ) :
function hd_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class("comment-thread"); ?> id="li-comment-<?php comment_ID(); ?>">

		<article class="media media--comment cf" id="comment-<?php comment_ID(); ?>">
		    <footer class="media__footer">
		        <div class="media__image">
		            <?php echo get_avatar( $comment, 200 ); ?>
		        </div>
		        <cite class="fn"><?php comment_author_link(); ?></cite>
		    </footer>

		    <div class="media__body">
		    	<?php comment_text(); ?>
		    	<span class="media__comment-meta"><?php comment_date('m/d/Y'); ?> at <?php comment_time(); ?></span>
		    	<small><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?> to this comment</small>
		    </div>
		</article>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'reware' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'reware'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return "&hellip;";
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

if( ! ( function_exists( 'wp_get_attachment_by_post_name' ) ) ) {
    function wp_get_attachment_by_post_name( $post_name ) {
        $args = array(
            'post_per_page' => 1,
            'post_type'     => 'attachment',
            'post_status'   => 'inherit',
            'name'          => trim ( $post_name ),
        );
        $get_posts = new Wp_Query( $args );

        if ( $get_posts->posts[0] )
            return $get_posts->posts[0];
        else
          return false;
    }
}

add_image_size( "vendor-logo", 215, 110, true );

function hd_widgets_init() {
	register_sidebar( array(
		'name' => 'Front Page Panels',
		'id' => 'front_panels',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'hd_widgets_init' );

// Latest blog post widget
class latest_blog_post extends WP_Widget {
	function latest_blog_post() {
		$widget_ops = array(
			'classname' => 'latest_blog_post',
			'description' => 'Latest blog post front page panel'
		);

		$this->WP_Widget(
			'latest_blog_post',
			'Latest Blog Post Panel',
			$widget_ops
		);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;

		wp_reset_query();
		query_posts( 'post_type=default_panels&orderby=rand&posts_per_page=1' );
		while ( have_posts() ) : the_post();
		$post_thumbnail_url = get_field("image");
		endwhile;

		wp_reset_query();
		query_posts( 'posts_per_page=1' );
		while ( have_posts() ) : the_post(); ?>
		<?php if ( has_post_thumbnail() ) { 
			$post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		}?>
		<section class="panel panel--blog" style="background-image: url(<?php echo $post_thumbnail_url; ?>)">
		    <div class="panel__header">
		        <p class="panel__tagline">The latest from the <a href="/blog/">HD blog</a></p>
		        <h1 class="panel__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		    </div>
		    <div class="panel__body">
		        <span><?php $unwrapped_excerpt = get_the_excerpt(); echo $unwrapped_excerpt; ?></span>
		    </div>
		</section>
		<?php endwhile;
		wp_reset_query();
		
		echo $after_widget;
	}
}

add_action(
	'widgets_init',
	create_function('','return register_widget("latest_blog_post");')
);

class ducf_panel extends WP_Widget {
	function ducf_panel() {
		$widget_ops = array(
			'classname' => 'ducf_panel',
			'description' => 'DUCF front page panel'
		);

		$this->WP_Widget(
			'ducf_panel',
			'DUCF Panel',
			$widget_ops
		);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;

		wp_reset_query();
		query_posts( 'post_type=front_page_panels&posts_per_page=1&name=detroit-urban-craft-fair' );
		while ( have_posts() ) : the_post(); ?>
		<?php if ( has_post_thumbnail() ) { 
			$post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		}?>
		<section class="panel panel--ducf" style="background-image: url(<?php echo $post_thumbnail_url; ?>)">
		    <div class="panel__header">
		        <h1 class="panel__title"><a href="http://detroiturbancraftfair.com"><?php the_title(); ?></a></h1>
		    </div>
		    <div class="panel__body">
		        <span><?php $unwrapped_excerpt = get_the_excerpt(); echo $unwrapped_excerpt; ?></span>
		    </div>
		</section>
		<?php endwhile;
		wp_reset_query();

		echo $after_widget;
	}
}

add_action(
	'widgets_init',
	create_function('','return register_widget("ducf_panel");')
);

class about_panel extends WP_Widget {
	function about_panel() {
		$widget_ops = array(
			'classname' => 'about_panel',
			'description' => 'DUCF front page panel'
		);

		$this->WP_Widget(
			'about_panel',
			'About HD Panel',
			$widget_ops
		);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;

		wp_reset_query();
		query_posts( 'post_type=front_page_panels&posts_per_page=1&name=about-handmade-detroit' );
		while ( have_posts() ) : the_post(); ?>
		<?php if ( has_post_thumbnail() ) { 
			$post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		}?>
		<section class="panel panel--about" style="background-image: url(<?php echo $post_thumbnail_url; ?>)">
		    <div class="panel__header">
		        <h1 class="panel__title"><a href="/about/"><?php the_title(); ?></a></h1>
		    </div>
		    <div class="panel__body">
		        <span><?php $unwrapped_excerpt = get_the_excerpt(); echo $unwrapped_excerpt; ?></span>
		    </div>
		</section>
		<?php endwhile;
		wp_reset_query();

		echo $after_widget;
	}
}

add_action(
	'widgets_init',
	create_function('','return register_widget("about_panel");')
);

class ducf_apply_panel extends WP_Widget {
	function ducf_apply_panel() {
		$widget_ops = array(
			'classname' => 'ducf_apply_panel',
			'description' => 'Apply front page panel'
		);

		$this->WP_Widget(
			'ducf_apply_panel',
			'Apply to DUCF Panel',
			$widget_ops
		);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;

		wp_reset_query();
		query_posts( 'post_type=default_panels&orderby=rand&posts_per_page=1' );
		while ( have_posts() ) : the_post();
		$post_thumbnail_url = get_field("image");
		endwhile;

		wp_reset_query();
		query_posts( 'post_type=front_page_panels&posts_per_page=1&name=panel-apply' );
		while ( have_posts() ) : the_post(); ?>
		<?php if ( has_post_thumbnail() ) { 
			$post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		}?>
		<section class="panel panel--apply" style="background-image: url(<?php echo $post_thumbnail_url; ?>)">
		    <div class="panel__header">
		        <h1 class="panel__title"><a href="/apply/"><?php the_title(); ?></a></h1>
		    </div>
		    <div class="panel__body">
		        <span><?php $unwrapped_excerpt = get_the_excerpt(); echo $unwrapped_excerpt; ?></span>
		    </div>
		</section>
		<?php endwhile;
		wp_reset_query();

		echo $after_widget;
	}
}

add_action(
	'widgets_init',
	create_function('','return register_widget("ducf_apply_panel");')
);

class ducf_faq_panel extends WP_Widget {
	function ducf_faq_panel() {
		$widget_ops = array(
			'classname' => 'ducf_faq_panel',
			'description' => 'DUCF faq page panel'
		);

		$this->WP_Widget(
			'ducf_faq_panel',
			'FAQ Panel',
			$widget_ops
		);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;

		wp_reset_query();
		query_posts( 'post_type=default_panels&orderby=rand&posts_per_page=1' );
		while ( have_posts() ) : the_post();
		$post_thumbnail_url = get_field("image");
		endwhile;

		wp_reset_query();
		query_posts( 'post_type=front_page_panels&posts_per_page=1&name=panel-faq' );
		while ( have_posts() ) : the_post(); ?>
		<?php if ( has_post_thumbnail() ) { 
			$post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		}?>
		<section class="panel panel--apply" style="background-image: url(<?php echo $post_thumbnail_url; ?>)">
		    <div class="panel__header">
		        <h1 class="panel__title"><a href="/faq/"><?php the_title(); ?></a></h1>
		    </div>
		    <div class="panel__body">
		        <span><?php $unwrapped_excerpt = get_the_excerpt(); echo $unwrapped_excerpt; ?></span>
		    </div>
		</section>
		<?php endwhile;
		wp_reset_query();

		echo $after_widget;
	}
}

add_action(
	'widgets_init',
	create_function('','return register_widget("ducf_faq_panel");')
);

class ducf_sponsors_panel extends WP_Widget {
	function ducf_sponsors_panel() {
		$widget_ops = array(
			'classname' => 'ducf_sponsors_panel',
			'description' => 'DUCF sponsor page panel'
		);

		$this->WP_Widget(
			'ducf_sponsors_panel',
			'Sponsors Panel',
			$widget_ops
		);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;

		wp_reset_query();
		query_posts( 'post_type=default_panels&orderby=rand&posts_per_page=1' );
		while ( have_posts() ) : the_post();
		$post_thumbnail_url = get_field("image");
		endwhile;

		wp_reset_query();
		query_posts( 'post_type=front_page_panels&posts_per_page=1&name=panel-sponsors' );
		while ( have_posts() ) : the_post(); ?>
		<?php if ( has_post_thumbnail() ) { 
			$post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		}?>
		<section class="panel panel--apply" style="background-image: url(<?php echo $post_thumbnail_url; ?>)">
		    <div class="panel__header">
		        <h1 class="panel__title"><a href="/sponsors/"><?php the_title(); ?></a></h1>
		    </div>
		    <div class="panel__body">
		        <span><?php $unwrapped_excerpt = get_the_excerpt(); echo $unwrapped_excerpt; ?></span>
		    </div>
		</section>
		<?php endwhile;
		wp_reset_query();

		echo $after_widget;
	}
}

add_action(
	'widgets_init',
	create_function('','return register_widget("ducf_sponsors_panel");')
);

class ducf_vendors_panel extends WP_Widget {
	function ducf_vendors_panel() {
		$widget_ops = array(
			'classname' => 'ducf_vendors_panel',
			'description' => 'DUCF sponsor page panel'
		);

		$this->WP_Widget(
			'ducf_vendors_panel',
			'vendors Panel',
			$widget_ops
		);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;

		wp_reset_query();
		query_posts( 'post_type=default_panels&orderby=rand&posts_per_page=1' );
		while ( have_posts() ) : the_post();
		$post_thumbnail_url = get_field("image");
		endwhile;

		wp_reset_query();
		query_posts( 'post_type=front_page_panels&posts_per_page=1&name=panel-vendors' );
		while ( have_posts() ) : the_post(); ?>
		<?php if ( has_post_thumbnail() ) { 
			$post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		}?>
		<section class="panel panel--apply" style="background-image: url(<?php echo $post_thumbnail_url; ?>)">
		    <div class="panel__header">
		        <h1 class="panel__title"><a href="/vendors/"><?php the_title(); ?></a></h1>
		    </div>
		    <div class="panel__body">
		        <span><?php $unwrapped_excerpt = get_the_excerpt(); echo $unwrapped_excerpt; ?></span>
		    </div>
		</section>
		<?php endwhile;
		wp_reset_query();

		echo $after_widget;
	}
}

add_action(
	'widgets_init',
	create_function('','return register_widget("ducf_vendors_panel");')
);

?>