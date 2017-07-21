<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
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

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3><?php comments_number(__('This post has no comments', 'reveal'), __('This post has 1 Comment', 'reveal'), __('This post has % Comments', 'reveal')); ?></h3>


		<ol class="comment-list clearfix">
			<?php
				wp_list_comments('type=comment&callback=reveal_comment_function');
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'reveal' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'reveal' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'reveal' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'reveal' ); ?></p>
	<?php
	endif;

	//comment_form();



	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	comment_form(array(
		'fields' => apply_filters( 'comment_form_default_fields', array(
			
			'comment_notes_after' => '',	
			'author' => '<div class="row"><div class="col-sm-4"><div class="comment-form-author"><fieldset><input id="author" name="author" type="text" placeholder="'.__( 'Name', 'reveal' ). ( $req ? ' *' : '' ).'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></fieldset></div></div>',
			'email' => '<div class="col-sm-4"><div class="comment-form-email"><fieldset><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="'. __( 'Email', 'reveal' ) . ( $req ? ' *' : '' ) .'" ' . $aria_req . ' /></fieldset></div></div>',
			'url' => '<div class="col-sm-4"><div class="comment-form-url"><fieldset><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="'.__( 'Website', 'reveal' ).'" size="30" /></fieldset></div></div></div>'

		)),
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'title_reply' => __( 'Leave a Comment', 'reveal' ),
		'title_reply_to' => __( 'Leave a  Comment', 'reveal' ),
		'cancel_reply_link' => __( 'Cancel Comment', 'reveal' ),	
		'comment_field' => '<div class="comment-form-comment"><fieldset>' . '<textarea id="comment" placeholder="' . __( 'Your Comment', 'reveal' ) . ( $req ? ' *' : '' ) . '" name="comment" cols="45" rows="8" aria-required="true"></textarea></fieldset></div>',
		'label_submit' => __( 'Submit Comment', 'reveal' ),
		'id_submit' => 'submit_my_comment'
		
	));


	?>

</div><!-- #comments -->
