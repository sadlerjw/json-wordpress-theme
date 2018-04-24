<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<hr class="articleDivider" />

<div id="comments" class="comments-area">

	<?php
	if ( have_comments() ) : ?>
		<div class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 32,
					'style'       => 'div',
					'short_ping'  => true,
					'reply_text'  => 'Reply',
					'callback'	  => 'render_comment',
				) );
			?>
		</div>

		<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">Previous</span>',
			'next_text' => '<span class="screen-reader-text">Next</span>',
		) );?>

	<?php endif; // Check for have_comments().

	comment_form(array(
		'logged_in_as' => null,
		'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title">',
		'title_reply_after'		=> '</h2>',
	));
	?>

</div><!-- #comments -->
