<?php

/**
 *
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package reveal
 * @subpackage Templates
 */


// Disable direct access to the comments script
if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
    die ( esc_html__('Please do not load this page directly.', 'reveal')  );

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	echo '<div class="nopassword">'. esc_html__('This post is password protected. Enter the password to view any comments.', 'reveal') .'</div>';
    return;
}

?>

<div id="comments" class="comments-area" itemprop="comment" itemscope itemtype="http://schema.org/UserComments">

	<?php

		if ( have_comments() ) { ?>

			<h3>
				<?php
					comments_number(
					esc_html__( 'This post has no comments', 'reveal' ), 
					esc_html__( 'This post has One Comment', 'reveal' ), 
					wp_kses( __( 'This post has <span>%</span> Comments', 'reveal' ), array( 'span' => array() ) ) ); 
				?>
			</h3>

			<ol class="comment-list clearfix">
				<?php
					wp_list_comments('type=all&callback=reveal_comment_function');
				?>
			</ol><!-- end of comment-list -->

			<?php reveal_comments_navigation(); ?>

		<?php

	} // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'reveal' ); ?></p>
	<?php
	}

	// Building Comment Form
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	comment_form(array(
		'fields' => apply_filters( 'comment_form_default_fields', 
			array(			
				'comment_notes_after'	=> '',	
				'author' 				=> 
					'<div class="row">
						<div class="col-sm-4">
							<div class="comment-form-author">
								<fieldset>
									<input id="author" name="author" type="text" placeholder="'.esc_html__( 'Name', 'reveal' ). ( $req ? ' *' : '' ).'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
								</fieldset>
							</div>
						</div>',
				'email' 				=> 
					'<div class="col-sm-4">
						<div class="comment-form-email">
							<fieldset>
								<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="'. esc_html__( 'Email', 'reveal' ) . ( $req ? ' *' : '' ) .'" ' . $aria_req . ' />
							</fieldset>
						</div>
					</div>',
				'url' 					=> 
					'<div class="col-sm-4">
						<div class="comment-form-url">
							<fieldset>
								<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="'.esc_html__( 'Website', 'reveal' ).'" size="30" />
							</fieldset>
						</div>
					</div>
				</div>'
			)
		),

		'comment_notes_before' 			=> '',
		'comment_notes_after' 			=> '',
		'title_reply' 					=> esc_html__( 'Leave a Comment', 'reveal' ),
		'title_reply_to' 				=> esc_html__( 'Leave a  Comment', 'reveal' ),
		'cancel_reply_link' 			=> esc_html__( 'Cancel Comment', 'reveal' ),	
		'comment_field' 				=> 
			'<div class="comment-form-comment">
				<fieldset>' . '<textarea id="comment" placeholder="' . esc_html__( 'Your Comment', 'reveal' ) . ( $req ? ' *' : '' ) . '" name="comment" cols="45" rows="8" aria-required="true"></textarea>
				</fieldset>
			</div>',
		'label_submit' 					=> esc_html__( 'Submit Comment', 'reveal' ),
		'id_submit' 					=> 'submit_my_comment'
		
	));

	?>

</div><!-- end of #comments -->
