<?php

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

?>