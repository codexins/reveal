<?php 

function reveal_comment_function($comment, $args, $depth) {
 $GLOBALS['comment'] = $comment; ?>
 <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div id="comment-<?php comment_ID(); ?>">
    <div class="media">
      <div class="media-left comment-author vcard">
       <?php echo get_avatar($comment,$size='48'); ?>
      </div>

      <div class="media-body comment-info">

        <?php printf('<span class="fn">%s</span>', get_comment_author_link()) ?>

        <div class="comment-text">
          <?php comment_text() ?>
        </div>


        <div class="comment-meta"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(esc_html__('%1$s at %2$s', 'reveal'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(esc_html__('(Edit)', 'reveal'),'  ','') ?> -- <span class="comment-reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span></div>

      </div>
    </div>



   <?php if ($comment->comment_approved == '0') : ?>
     <em><?php echo esc_html__('Your comment is awaiting moderation.', 'reveal') ?></em>
     <br />
   <?php endif; ?>
  




   
 </div>
 <?php
}


