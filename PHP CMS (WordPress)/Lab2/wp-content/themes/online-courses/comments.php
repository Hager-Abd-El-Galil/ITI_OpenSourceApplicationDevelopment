<?php
/**
 * The template for displaying comments
 * @package Online Courses
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
if ( comments_open()) : ?>
<div class="clearfix"></div>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) :
		wp_list_comments( array( 'callback' => 'online_courses_comment', 'style' => '','short_ping' => true) );
		 paginate_comments_links();
		if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'online-courses' ); ?></p>
	<?php endif;
	endif; ?>
	<!-- #comments .comments-area -->
	<?php comment_form(); ?>
</div>
<?php endif;