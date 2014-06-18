<aside id="comments">
<?php if ( have_comments() ) : ?>
	<h3 class="comments__title">Comments</h3>
	<ol class="comment-list cf"><?php wp_list_comments('callback=hd_comment'); ?></ol>
<?php else :
	if ( ! comments_open() ) :
?>
	<p class="nocomments">Comments for this post are closed.</p>
<?php endif; // end ! comments_open() ?>
<?php endif; // end have_comments() ?>
<?php comment_form(); ?>
</aside>
