<?php	
/**
 * reveal Widget class definitions
 *
 * @package reveal
 */

/*
	=====================================
		REVEAL SIDEBAR WIDGET CLASS
	=====================================
*/

class Reveal_Sidebar_Widget {

	/**
	 * Register the widget locations.
	 * 
	 * @since v1.0.0
	 */

	// Registering Main Sidebar Widget Locations
	public static function reveal_sidebar_widgets_init () {
	
		register_sidebar( array(
			'name'				=> esc_html__('Sidebar (General)', 'reveal'),
			'id'				=> 'reveal-sidebar-general',
			'description'		=> esc_html__('This sidebar will show everywhere the sidebar is enabled, both Posts and Pages.', 'reveal'),	
			'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget clearfix">',
			'after_widget'  	=> '</div>',			
		) );

		register_sidebar( array(
			'name'				=> esc_html__('Sidebar (Pages)', 'reveal'),
			'id'				=> 'reveal-sidebar-page',
			'description'		=> esc_html__('This sidebar will show on all Pages.', 'reveal'),
			'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget clearfix">',
			'after_widget'  	=> '</div>',		
		) );
		
		register_sidebar( array(
			'name' 				=> esc_html__('Sidebar (Blog)', 'reveal'),
			'id'				=> 'reveal-sidebar-blog',
			'description'		=> esc_html__('This sidebar will show on all blog Posts.', 'reveal'), 
			'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget clearfix">',
			'after_widget'  	=> '</div>',		
		) );

		register_sidebar( array(
			'name' 				=> esc_html__('Sidebar (Contact Page)', 'reveal'),
			'id'				=> 'reveal-sidebar-contact-template',
			'description'		=> esc_html__('This sidebar will show only on Contact Page.', 'reveal'), 
			'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget clearfix">',
			'after_widget'  	=> '</div>',		
		) );

	} 

	// Registering Footer Widget Locations
	public static function reveal_footer_widgets () {

		$reveal_footer = reveal_option('reveal-footer-version');				

		if($reveal_footer == 1):

		$widget_count = 4;
		for ($i = 1; $i <= $widget_count ; $i++) { 

			register_sidebar( array(
				'name'				=> sprintf(esc_html__('Footer (Column-%s)', 'reveal'), $i),
				'id'				=> 'reveal-footer-col-'. $i .'',
			    'before_title'		=> '<p class="widget-title">',
			    'after_title'		=> '</p>',
				'before_widget' 	=> '<div  id="%1$s" class="%2$s reveal-widget clearfix">',
				'after_widget'  	=> '</div>',			
			) );

		}

		elseif($reveal_footer == 2):

		$widget_count = 3;
		for ($i = 1; $i <= $widget_count ; $i++) { 

			register_sidebar( array(
				'name'				=> sprintf(esc_html__('Footer (Column-%s)', 'reveal'), $i),
				'id'				=> 'reveal-footer-col-'. $i .'',
			    'before_title'		=> '<p class="widget-title">',
			    'after_title'		=> '</p>',
				'before_widget' 	=> '<div  id="%1$s" class="%2$s reveal-widget clearfix">',
				'after_widget'  	=> '</div>',			
			) );

		}

		elseif($reveal_footer == 3):

		$widget_count = 2;
		for ($i = 1; $i <= $widget_count ; $i++) { 

			register_sidebar( array(
				'name'				=> sprintf(esc_html__('Footer (Column-%s)', 'reveal'), $i),
				'id'				=> 'reveal-footer-col-'. $i .'',
			    'before_title'		=> '<p class="widget-title">',
			    'after_title'		=> '</p>',
				'before_widget' 	=> '<div  id="%1$s" class="%2$s reveal-widget clearfix">',
				'after_widget'  	=> '</div>',			
			) );

		}

		elseif($reveal_footer == 4):

		$widget_count = 3;
		for ($i = 1; $i <= $widget_count ; $i++) { 

			register_sidebar( array(
				'name'				=> sprintf(esc_html__('Footer (Column-%s)', 'reveal'), $i),
				'id'				=> 'reveal-footer-col-'. $i .'',
			    'before_title'		=> '<p class="widget-title">',
			    'after_title'		=> '</p>',
				'before_widget' 	=> '<div  id="%1$s" class="%2$s reveal-widget clearfix">',
				'after_widget'  	=> '</div>',			
			) );

		}

		elseif($reveal_footer == 5):

		$widget_count = 5;
		for ($i = 1; $i <= $reveal_footer ; $i++) { 

			register_sidebar( array(
				'name'				=> sprintf(esc_html__('Footer (Column-%s)', 'reveal'), $i),
				'id'				=> 'reveal-footer-col-'. $i .'',
			    'before_title'		=> '<p class="widget-title">',
			    'after_title'		=> '</p>',
				'before_widget' 	=> '<div  id="%1$s" class="%2$s reveal-widget clearfix">',
				'after_widget'  	=> '</div>',			
			) );

		}

		elseif($reveal_footer == 6):

		$widget_count = 4;
		for ($i = 1; $i <= $widget_count ; $i++) { 

			register_sidebar( array(
				'name'				=> sprintf(esc_html__('Footer (Column-%s)', 'reveal'), $i),
				'id'				=> 'reveal-footer-col-'. $i .'',
			    'before_title'		=> '<p class="widget-title">',
			    'after_title'		=> '</p>',
				'before_widget' 	=> '<div class="reveal-widget clearfix">',
				'after_widget'  	=> '</div>',			
			) );

		}

		endif;
	} 

}


add_action('widgets_init',function(){

    $reveal_widget = new Reveal_Sidebar_Widget();
    $reveal_widget -> reveal_sidebar_widgets_init();
    $reveal_widget -> reveal_footer_widgets();

});


/*
	============================================
		REVEAL RECENT POSTS WIDGET CLASS
	============================================
*/

class Reveal_Recent_Posts extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'reveal-recent-posts-widget',
			'description' => esc_html__('Displays Most Recent Posts', 'reveal'),
		);
		parent::__construct( 'cx_recent_posts', esc_html__('Reveal: Recent Posts', 'reveal'), $widget_ops );
		
	}
	
	//back-end display of widget
	public function form( $instance ) {

		$title 			= ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__('Recent Posts', 'reveal') );
		$num_posts 		= ( !empty( $instance[ 'num_posts' ] ) ? absint( $instance[ 'num_posts' ] ) : esc_html__('3', 'reveal') );
		$title_len 		= ( !empty( $instance[ 'title_len' ] ) ? absint( $instance[ 'title_len' ] ) : esc_html__('7', 'reveal') );
		$show_thumb 	= ( !empty( $instance[ 'show_thumb' ] ) ? $instance[ 'show_thumb' ] : '' );
		$display_meta 	= ( !empty( $instance[ 'display_meta' ] ) ? $instance[ 'display_meta' ] : '' );
		$display_order 	= ( !empty( $instance[ 'display_order' ] ) ? $instance[ 'display_order' ] : '' );
		$show_like	 	= ( !empty( $instance[ 'show_like' ] ) ? $instance[ 'show_like' ] : '' );

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__('Title:', 'reveal') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'num_posts' ) ); ?>"><?php echo esc_html__('Number of Posts to Show:', 'reveal') ?></label>
			<input type="number" class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'num_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'num_posts' ) ); ?>" value="<?php echo esc_attr( $num_posts ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title_len' ) ); ?>"><?php echo esc_html__('Title Length (In Words): ', 'reveal') ?></label>
			<input type="number" class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'title_len' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_len' ) ); ?>" value="<?php echo esc_attr( $title_len ); ?>">
		</p>

		<p>
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $show_thumb, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'show_thumb' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_thumb' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'show_thumb' ) ); ?>"><?php echo esc_html__('Display Post Featured Image?', 'reveal'); ?></label>
		</p>

		<p>
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $show_like, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'show_like' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_like' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'show_like' ) ); ?>"><?php echo esc_html__('Display Like Button?', 'reveal'); ?></label>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('display_order') ); ?>"><?php echo esc_html__('Choose The Order to Display Posts:', 'reveal'); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name('display_order') ); ?>" id="<?php echo esc_attr( $this->get_field_id('display_order') ); ?>" class="widefat">
				<?php
				$disp_opt = array(
						esc_html__('Descending', 'reveal') => 'DESC', 
						esc_html__('Ascending', 'reveal') => 'ASC'
						);
				foreach ($disp_opt as $opt => $value) {
					echo '<option value="' . $value . '" id="' . $value . '"', $display_order == $value ? ' selected="selected"' : '', '>', $opt, '</option>';
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('display_meta') ); ?>"><?php echo esc_html__('Select Post Meta to Display:', 'reveal'); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name('display_meta') ); ?>" id="<?php echo esc_attr( $this->get_field_id('display_meta') ); ?>" class="widefat">
				<?php
				$options = array(
						esc_html__('Display Post Date', 'reveal'), 
						esc_html__('Display Post View Count', 'reveal'), 
						esc_html__('Display Comments Count', 'reveal'), 
						esc_html__('Display Both Post View and Comments Count', 'reveal')
						);
				foreach ($options as $option) {
					$opt = strtolower( str_replace(" ","-", $option ) );
					echo '<option value="' . $opt . '" id="' . $opt . '"', $display_meta == $opt ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				?>
			</select>
		</p>

<?php
		
	}

	// update widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance[ 'title' ] 			= ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'num_posts' ] 		= ( !empty( $new_instance[ 'num_posts' ] ) ? absint( strip_tags( $new_instance[ 'num_posts' ] ) ) : 0 );
		$instance[ 'title_len' ] 		= ( !empty( $new_instance[ 'title_len' ] ) ? absint( strip_tags( $new_instance[ 'title_len' ] ) ) : 0 );
		$instance[ 'show_thumb' ] 		= strip_tags( $new_instance[ 'show_thumb' ] );
		$instance[ 'show_like' ] 		= strip_tags( $new_instance[ 'show_like' ] );
		$instance[ 'display_meta' ] 	= strip_tags( $new_instance[ 'display_meta' ] );
		$instance[ 'display_order' ] 	= strip_tags( $new_instance[ 'display_order' ] );
		
		return $instance;
		
	}

	//front-end display of widget
	public function widget( $args, $instance ) {
		
		$num_posts 		= absint( $instance[ 'num_posts' ] );
		$title_len 		= absint( $instance[ 'title_len' ] );
		$show_thumb 	= $instance[ 'show_thumb' ];
		$show_like 		= $instance[ 'show_like' ];
		$display_meta 	= $instance[ 'display_meta' ];
		$display_order 	= $instance[ 'display_order' ];
		$display_meta_a = 'display-post-date';
		$display_meta_b = 'display-post-view-count';
		$display_meta_c = 'display-comments-count';
		$display_meta_d = 'display-both-post-view-and-comments-count';

		
		$posts_args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $num_posts,
			'order'				=> $display_order
		);
		
		$posts_query = new WP_Query( $posts_args );
		
		printf( '%s', $args[ 'before_widget' ] );
		
		if( !empty( $instance[ 'title' ] ) ):
			
			printf( '%s' . apply_filters( 'widget_title', $instance[ 'title' ] ) . '%s', $args[ 'before_title' ], $args[ 'after_title' ]);
			
		endif;
		
		if( $posts_query->have_posts() ):
				
			while( $posts_query->have_posts() ): $posts_query->the_post();
				
				echo '<div class="media">';
					if( 'on' == $instance[ 'show_thumb' ] ) {
						echo '<a href="' . get_the_permalink() . '" class="media-left"><img class="media-object" src="';
						if ( has_post_thumbnail() ) { 
							esc_url( the_post_thumbnail_url('blog-thumbnail-image') ); 
						} else { 
							echo esc_url('//placehold.it/120x80'); 
						}
						echo '" alt="' . get_the_title() . '"/></a>';
					}
					echo '<div class="media-body">';
						echo '<h4 class="media-heading">' . wp_trim_words( get_the_title(), $title_len, null ) . '</h4>';
						if ( $display_meta == $display_meta_a ) {
						echo '<p>'. get_the_time( 'F j, Y' ) .'</p>';
						}
						if( $display_meta == $display_meta_a AND 'on' == $instance[ 'show_like' ] ) {
						echo '<span>'. get_simple_likes_button( get_the_ID(), 0 ) .'</span>';
						}
						if( $display_meta == $display_meta_d OR $display_meta == $display_meta_b OR $display_meta == $display_meta_c) {
						echo '<div class="blog-info">';
							if( $display_meta == $display_meta_d OR $display_meta == $display_meta_b ) {
							echo '<span><i class="fa fa-eye"></i><i>' . reveal_get_post_views(get_the_ID()) . '</i></span>';
							}
							if( $display_meta == $display_meta_d OR $display_meta == $display_meta_c ) {
							echo '<span><i class="fa fa-comments"></i><i>' . ' ' . get_comments_number() . '</i></span>';
							}
							if( 'on' == $instance[ 'show_like' ] ) {
							echo '<span>'. get_simple_likes_button( get_the_ID(), 0 ) .'</span>';
							}

						echo '</div>';
						}

					echo '</div>';
				echo '</div>';
				
			endwhile;
		
		endif;

		wp_reset_postdata();
		
		printf( '%s', $args[ 'after_widget' ] );

	}
	
}

add_action( 'widgets_init', function() {
	register_widget( 'Reveal_Recent_Posts' );
} );



/*
	============================================
		REVEAL POPULAR POSTS WIDGET CLASS
	============================================
*/


class Reveal_Popular_Posts extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'reveal-popular-posts-widget',
			'description' => esc_html('Displays Most Popular Posts' , 'reveal'),
		);
		parent::__construct( 'reveal_popular_posts', esc_html__('Reveal: Popular Posts', 'reveal'), $widget_ops );
		
	}
	
	// back-end display of widget
	public function form( $instance ) {
		
		$title 				= ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__('Popular Posts', 'reveal') );
		$num_posts 			= ( !empty( $instance[ 'num_posts' ] ) ? absint( $instance[ 'num_posts' ] ) : esc_html__('3', 'reveal') );
		$title_len 			= ( !empty( $instance[ 'title_len' ] ) ? absint( $instance[ 'title_len' ] ) : esc_html__('7', 'reveal') );
		$show_thumb 		= ( !empty( $instance[ 'show_thumb' ] ) ? $instance[ 'show_thumb' ] : '' );
		$display_meta 		= ( !empty( $instance[ 'display_meta' ] ) ? $instance[ 'display_meta' ] : '' );
		$display_orderby 	= ( !empty( $instance[ 'display_orderby' ] ) ? $instance[ 'display_orderby' ] : '' );
		$show_like	 		= ( !empty( $instance[ 'show_like' ] ) ? $instance[ 'show_like' ] : '' );
		
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__('Title:', 'reveal') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'num_posts' ) ); ?>"><?php echo esc_html__('Number of Posts to Show: ', 'reveal') ?></label>
			<input type="number" class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'num_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'num_posts' ) ); ?>" value="<?php echo esc_attr( $num_posts ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title_len' ) ); ?>"><?php echo esc_html__('Title Length (In Words): ', 'reveal') ?></label>
			<input type="number" class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'title_len' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_len' ) ); ?>" value="<?php echo esc_attr( $title_len ); ?>">
		</p>

		<p>
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $show_thumb, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'show_thumb' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_thumb' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'show_thumb' ) ); ?>"><?php echo esc_html__('Display Post Featured Image?', 'reveal'); ?></label>
		</p>

		<p>
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $show_like, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'show_like' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_like' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'show_like' ) ); ?>"><?php echo esc_html__('Display Like Button?', 'reveal'); ?></label>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('display_orderby') ); ?>"><?php echo esc_html__('Choose The Posts Sorting Method:', 'reveal'); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name('display_orderby') ); ?>" id="<?php echo esc_attr( $this->get_field_id('display_orderby') ); ?>" class="widefat">
				<?php
				$dispby_opt = array(
						esc_html__('Sort By Views Count', 'reveal') => 'meta_value_num', 
						esc_html__('Sort By Comments Count', 'reveal') => 'comment_count'
						);
				foreach ($dispby_opt as $opt => $value) {
					echo '<option value="' . $value . '" id="' . $value . '"', $display_orderby == $value ? ' selected="selected"' : '', '>', $opt, '</option>';
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('display_meta') ); ?>"><?php echo esc_html__('Select Post Meta to Display:', 'reveal'); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name('display_meta') ); ?>" id="<?php echo esc_attr( $this->get_field_id('display_meta') ); ?>" class="widefat">
				<?php
				$options = array(
						esc_html__('Display Post Date', 'reveal'), 
						esc_html__('Display Post Views Count', 'reveal'), 
						esc_html__('Display Comments Count', 'reveal'), 
						esc_html__('Display Both Post Views and Comments Count', 'reveal')
						);
				foreach ($options as $option) {
					$opt = strtolower( str_replace(" ","-", $option ) );
					echo '<option value="' . $opt . '" id="' . $opt . '"', $display_meta == $opt ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				?>
			</select>
		</p>

		<?php
		
	}
	
	// update widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance[ 'title' ] 			= ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'num_posts' ] 		= ( !empty( $new_instance[ 'num_posts' ] ) ? absint( strip_tags( $new_instance[ 'num_posts' ] ) ) : 0 );
		$instance[ 'title_len' ] 		= ( !empty( $new_instance[ 'title_len' ] ) ? absint( strip_tags( $new_instance[ 'title_len' ] ) ) : 0 );
		$instance[ 'show_thumb' ] 		= strip_tags( $new_instance[ 'show_thumb' ] );
		$instance[ 'show_like' ] 		= strip_tags( $new_instance[ 'show_like' ] );
		$instance[ 'display_meta' ] 	= ( !empty( $new_instance[ 'display_meta' ] ) ? strip_tags( $new_instance[ 'display_meta' ] ) : '' );
		$instance[ 'display_orderby' ] 	= ( !empty( $new_instance[ 'display_orderby' ] ) ? strip_tags( $new_instance[ 'display_orderby' ] ) : '' );
		
		return $instance;
		
	}
	
	// front-end display of widget
	public function widget( $args, $instance ) {
		
		$num_posts 			= absint( $instance[ 'num_posts' ] );
		$title_len 			= absint( $instance[ 'title_len' ] );
		$show_thumb 		= $instance[ 'show_thumb' ];
		$show_like 			= $instance[ 'show_like' ];
		$display_meta 		= $instance[ 'display_meta' ];
		$display_orderby 	= $instance[ 'display_orderby' ];
		$display_meta_a 	= 'display-post-date';
		$display_meta_b 	= 'display-post-views-count';
		$display_meta_c 	= 'display-comments-count';
		$display_meta_d 	= 'display-both-post-views-and-comments-count';
		
		$posts_args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $num_posts,
			'meta_key'			=> 'cx_post_views',
			'orderby'			=> $display_orderby,
			'order'				=> 'DESC'
		);
		
		$posts_query = new WP_Query( $posts_args );
		
		printf( '%s', $args[ 'before_widget' ] );
		
		if( !empty( $instance[ 'title' ] ) ):
			
			printf( '%s' . apply_filters( 'widget_title', $instance[ 'title' ] ) . '%s', $args[ 'before_title' ], $args[ 'after_title' ]);
			
		endif;
		
		if( $posts_query->have_posts() ):
				
			while( $posts_query->have_posts() ): $posts_query->the_post();		

				echo '<div class="media">';
					if( 'on' == $instance[ 'show_thumb' ] ) {
						echo '<a href="' . get_the_permalink() . '" class="media-left"><img class="media-object" src="';
						if ( has_post_thumbnail() ) { 
							esc_url( the_post_thumbnail_url('blog-thumbnail-image') ); 
						} else { 
							echo esc_url('//placehold.it/120x80'); 
						}
						echo '" alt="' . get_the_title() . '"/></a>';
					}
					echo '<div class="media-body">';
						echo '<h4 class="media-heading">' . wp_trim_words( get_the_title(), $title_len, null ) . '</h4>';
						if ( $display_meta == $display_meta_a ) {
						echo '<p>'. get_the_time( 'F j, Y' ) .'</p>';
						}
						if( $display_meta == $display_meta_a AND 'on' == $instance[ 'show_like' ] ) {
						echo '<span>'. get_simple_likes_button( get_the_ID(), 0 ) .'</span>';
						}
						if( $display_meta == $display_meta_d || $display_meta == $display_meta_b || $display_meta == $display_meta_c) {

							echo '<div class="blog-info">';
								if( $display_orderby == 'meta_value_num' ) {
									if( $display_meta == $display_meta_d OR $display_meta == $display_meta_b ) {
									echo '<span><i class="fa fa-eye"></i><i>' . reveal_get_post_views(get_the_ID()) . '</i></span>';
									}
									if( $display_meta == $display_meta_d OR $display_meta == $display_meta_c ) {
									echo '<span><i class="fa fa-comments"></i><i>' . ' ' . get_comments_number() . '</i></span>';
									}
								} else {
									if( $display_meta == $display_meta_d OR $display_meta == $display_meta_c ) {
									echo '<span><i class="fa fa-comments"></i><i>' . ' ' . get_comments_number() . '</i></span>';
									}
									if( $display_meta == $display_meta_d OR $display_meta == $display_meta_b ) {
									echo '<span><i class="fa fa-eye"></i><i>' . reveal_get_post_views(get_the_ID()) . '</i></span>';
									}
								}
								if( 'on' == $instance[ 'show_like' ] ) {
									echo '<span>'. get_simple_likes_button( get_the_ID(), 0 ) .'</span>';
								}

							echo '</div>';

						}

					echo '</div>';
				echo '</div>';
			
			endwhile;
		
		endif;

		wp_reset_postdata();
		
		printf( '%s', $args[ 'after_widget' ] );
		
	}
	
}

add_action( 'widgets_init', function() {
	register_widget( 'Reveal_Popular_Posts' );
} );




/*
	============================================
		REVEAL INSTAGRAM WIDGET CLASS
	============================================
*/



class Reveal_Instagram_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
    public function __construct() {

		$widget_ops = array(
			'classname' => 'reveal-instagram-widget',
			'description' => esc_html('Displays Your Latest Instagrams', 'reveal'),
		);
		parent::__construct( 'reveal_instagram_widget', esc_html__('Reveal: Instagram Widget', 'reveal'), $widget_ops );

    }
	
	// front-end display of widget
    public function widget( $args, $instance ) {

        $title    = ( ! empty( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
        $username = ( ! empty( $instance['username'] ) ) ? esc_attr( $instance['username'] ) : '';

        // Get instagrams
        $cx_instagram = $this->get_instagrams_data( array(
            'user_id'     => $instance['user_id'],
            'client_id'   => $instance['client_id'],
            'accss_token' => $instance['accss_token'],
            'count'       => $instance['count'],
            'flush_cache' => false,
        ) );

        // Check the parameters
        if ( false !== $cx_instagram ) : ?>

            <?php
                printf( '%s', $args['before_widget'] );
                printf( '%s' . esc_html( $title ) . '%s', $args['before_title'], $args['after_title'] );
                $ig_image_lo_res = apply_filters( 'reveal_lo_image_res', 'thumbnail' );
                $ig_image_hi_res = apply_filters( 'reveal_hi_image_res', 'standard_resolution' );
            ?>

            <div class="instagram-images">

            <?php 
	            // Looping through the parameters
                foreach( $cx_instagram['data'] as $key => $ig_image ) {
                    echo apply_filters( 'reveal_ig_image_html', sprintf( 
                    	'<a href="%1$s" class="cx-image-link">
                    		<img src="%2$s" alt="%3$s" title="%3$s" />
                    		<div class="hoverable"></div>
                		</a>',
                        // $ig_image['link'],
						$ig_image['images'][ $ig_image_hi_res ]['url'],
                        $ig_image['images'][ $ig_image_lo_res ]['url'],
                        $ig_image['caption']['text']
                    ), $ig_image );
                }
            ?>
            </div>
            <a href="https://instagram.com/<?php echo esc_html( $username ); ?>" class='more' target='_blank'><i><?php printf( esc_html__( 'Follow %1$s on Instagram', 'reveal' ), esc_html( $username ) ); ?></i></a>

            <?php printf( '%s', $args['after_widget'] ); ?>

        <?php elseif( ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) && ( defined( 'WP_DEBUG_DISPLAY' ) && false !== WP_DEBUG_DISPLAY ) ): ?>
            <div id="message" class="error"><p><?php esc_html_e( 'Error: We were unable to fetch your instagram feed.', 'reveal' ); ?></p></div>
        <?php endif;
    }

	// back-end display of widget
    public function form( $instance ) {

        // Get options or set defaults
        $title       = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
        $username    = ( ! empty( $instance['username'] ) ) ? $instance['username'] : '';
        $user_id     = ( ! empty( $instance['user_id'] ) ) ? $instance['user_id'] : '';
        $client_id   = ( ! empty( $instance['client_id'] ) ) ? $instance['client_id'] : '';
        $accss_token = ( ! empty( $instance['accss_token'] ) ) ? $instance['accss_token'] : '';
        $count       = ( ! empty( $instance['count'] ) ) ? $instance['count'] : '';
        $placeholder = ( ! empty( $instance['placeholder'] ) ) ? $instance['placeholder'] : '';

        $this->form_input(
            array(
                'label'       => esc_html__( 'Widget Title:', 'reveal'),
                'name'        => $this->get_field_name( 'title' ),
                'id'          => $this->get_field_id( 'title' ),
                'type'        => 'text',
                'value'       => $title,
                'placeholder' => 'Instagram'
            )
        );
        $this->form_input(
            array(
                'label'       => esc_html__( 'Username:', 'reveal'),
                'name'        => $this->get_field_name( 'username' ),
                'id'          => $this->get_field_id( 'username' ),
                'type'        => 'text',
                'value'       => $username,
                'placeholder' => 'Insert User Name'
            )
        );
        $this->form_input(
            array(
                'label'       => esc_html__( 'User ID:', 'reveal'),
                'name'        => $this->get_field_name( 'user_id' ),
                'id'          => $this->get_field_id( 'user_id' ),
                'type'        => 'text',
                'value'       => $user_id,
                'placeholder' => 'Insert User ID',
                'desc'        => sprintf( __( 'Lookup your User ID from <a href="%1$s" target="_blank">here</a>', 'reveal' ), esc_url( '//ershad7.com/InstagramUserID/' ) )
            )
        );
        $this->form_input(
            array(
                'label'       => esc_html__( 'Access Token:', 'reveal'),
                'name'        => $this->get_field_name( 'accss_token' ),
                'id'          => $this->get_field_id( 'accss_token' ),
                'type'        => 'text',
                'value'       => $accss_token,
                'placeholder' => 'Insert Access Token',
                'desc'        => sprintf( __( 'Generate Your Access Token from <a href="%1$s" target="_blank">here</a>', 'reveal' ), esc_url( '//instagram.pixelunion.net/' ) )
            )
        );
        $this->form_input(
            array(
                'label'       => esc_html__( 'Client ID:', 'reveal'),
                'name'        => $this->get_field_name( 'client_id' ),
                'id'          => $this->get_field_id( 'client_id' ),
                'type'        => 'text',
                'value'       => $client_id,
                'placeholder' => 'Insert Client ID',
                'desc'        => sprintf( __( 'Register a new client from <a href="%1$s" target="_blank">here</a>', 'reveal' ), esc_url( '//instagram.com/developer/clients/manage/' )
            ) )
        );
        $this->form_input(
            array(
                'label'       => esc_html__( 'Number of Photos to be Shown:', 'reveal'),
                'name'        => $this->get_field_name( 'count' ),
                'id'          => $this->get_field_id( 'count' ),
                'type'        => 'text',
                'value'       => $count,
                'placeholder' => esc_html__('9', 'reveal')
            )
        );

    }


	// update widget
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
            foreach ( array( 'title', 'username', 'user_id', 'accss_token', 'client_id', 'count' ) as $key => $value ) {
                $instance[$value] = sanitize_text_field( $new_instance[$value] );
            }
            delete_transient( $this->id );
        return $instance;
    }

    // Building the form inputs
    public function form_input( $args = array() ) {
        $args = wp_parse_args( $args, array(
            'label'       => '',
            'name'        => '',
            'id'          => '',
            'type'        => 'text',
            'value'       => '',
            'placeholder' => '',
            'desc'        => ''
        ) );
        $label       = esc_html( $args['label'] );
        $name        = esc_html( $args['name'] );
        $id          = esc_html( $args['id'] );
        $type        = esc_html( $args['type'] );
        $value       = esc_html( $args['value'] );
        $placeholder = esc_html( $args['placeholder'] );
        $desc        = ! empty( $args['desc'] ) ? sprintf( '<span class="description">%1$s</span>', $args['desc'] ) : '';
        printf(
            '<p><label for="%1$s">%2$s</label><input type="%3$s" class="widefat" name="%4$s" id="%1$s" value="%5$s" placeholder="%6$s" />%7$s</p>',
            $id,
            $label,
            $type,
            $name,
            $value,
            $placeholder,
            $desc
        );
    }


    // Getting data from Instagram API.
    public function get_instagrams_data( $args = array() ) {

        // Get args
        $user_id   		= ( ! empty( $args['user_id'] ) ) ? $args['user_id'] : '';
        $accss_token   	= ( ! empty( $args['accss_token'] ) ) ? $args['accss_token'] : '';
        $client_id 		= ( ! empty( $args['client_id'] ) ) ? $args['client_id'] : '';
        $count     		= ( ! empty( $args['count'] ) ) ? $args['count'] : '';
        $flush     		= ( ! empty( $args['flush_cache'] ) ) ? $args['flush_cache'] : '';

        // Check if all the fields are filled up
        if ( empty( $client_id ) || empty( $user_id ) || empty( $accss_token ) ) {
            echo esc_html__('Please Provide Valid Instagram User ID, Client ID and Access Token', 'reveal');
            return false;
        }

        // Get instagram URL by username and access token
        $api_url = 'https://api.instagram.com/v1/users/' . esc_html( $user_id ) . '/media/recent/?access_token='. esc_html( $accss_token );

        // Set transient key
        $transient_key = $this->id;

        // Attempt to fetch from transient
        $data = get_transient( $transient_key );

        // If we're flushing or there's no transient
        if ( $flush || false === ( $data ) ) {

            // Ping Instragram's API
            $ig_ping = wp_remote_get( add_query_arg( array(
                'client_id' => esc_html( $client_id ),
                'count'     => absint( $count )
            ), $api_url ) );

            // Check if the API is up
            if ( ! 200 == wp_remote_retrieve_response_code( $ig_ping ) ) {
                return false;
            }

            // Parse the API data and store in a variable
            $data = json_decode( wp_remote_retrieve_body( $ig_ping ), true );

            // Check the result whether its an array
            if ( ! is_array( $data ) ) {
                return false;
            }

            // Unserialize the results
            $data = maybe_unserialize( $data );

            // Store Instagrams in a transient, and expire every hour
            set_transient( $transient_key, $data, apply_filters( 'reveal_instagram_cache', 1 * HOUR_IN_SECONDS ) );
        }

        return $data;
    }
} 

// Registering the widget
add_action( 'widgets_init', function() {
    register_widget( 'Reveal_Instagram_Widget' );
} );




/*
	============================================
		REVEAL SOCIAL WIDGET CLASS
	============================================
*/


class Reveal_Social_Widget extends WP_Widget {
	
	// setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'reveal-social-widget',
			'description' => 'Displays All Your Social Media Profiles',
		);
		parent::__construct( 'reveal_social_widget', esc_html('Reveal: Social Media', 'reveal'), $widget_ops );
		
	}
	
	// back-end display of widget
	public function form( $instance ) {

		echo '<p>'. esc_html__('In Order To Use This Widget Please Fill Up The Social Profile Information In The "Social Media" Section of ', 'reveal') .'<strong><a href="'. esc_url(admin_url().'admin.php?page=reveal') .'" target="_blank">'. esc_html('Reveal Options.', 'reveal') .'</a></strong></p>';

		echo '<p>'. esc_html('Choose The Social Profiles to be Shown:', 'reveal') .'</p>';

		$facebook	 		= ( !empty( $instance[ 'facebook' ] ) ? $instance[ 'facebook' ] : '' );
		$twitter	 		= ( !empty( $instance[ 'twitter' ] ) ? $instance[ 'twitter' ] : '' );
		$instagram	 		= ( !empty( $instance[ 'instagram' ] ) ? $instance[ 'instagram' ] : '' );
		$pinterest	 		= ( !empty( $instance[ 'pinterest' ] ) ? $instance[ 'pinterest' ] : '' );
		$behance	 		= ( !empty( $instance[ 'behance' ] ) ? $instance[ 'behance' ] : '' );
		$google_plus	 	= ( !empty( $instance[ 'google_plus' ] ) ? $instance[ 'google_plus' ] : '' );
		$youtube	 		= ( !empty( $instance[ 'youtube' ] ) ? $instance[ 'youtube' ] : '' );
		$skype	 			= ( !empty( $instance[ 'skype' ] ) ? $instance[ 'skype' ] : '' );
		$linkedin	 		= ( !empty( $instance[ 'linkedin' ] ) ? $instance[ 'linkedin' ] : '' );


	?>
		
		<p style="width: 33%; float:left">
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $facebook, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'facebook' ) ); ?>"><?php _e('Facebook', 'reveal'); ?></label>
		</p>

		<p style="width: 33%; float:left">
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $twitter, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'twitter' ) ); ?>"><?php _e('Twitter', 'reveal'); ?></label>
		</p>

		<p style="width: 33%; float:left">
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $instagram, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'instagram' ) ); ?>"><?php _e('Instagram', 'reveal'); ?></label>
		</p>

		<p style="width: 33%; float:left">
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $pinterest, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'pinterest' ) ); ?>"><?php _e('Pinterest', 'reveal'); ?></label>
		</p>

		<p style="width: 33%; float:left">
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $behance, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'behance' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'behance' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'behance' ) ); ?>"><?php _e('Behance', 'reveal'); ?></label>
		</p>

		<p style="width: 33%; float:left">
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $google_plus, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'google_plus' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'google_plus' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'google_plus' ) ); ?>"><?php _e('Google Plus', 'reveal'); ?></label>
		</p>

		<p style="width: 33%; float:left">
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $youtube, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'youtube' ) ); ?>"><?php _e('Youtube', 'reveal'); ?></label>
		</p>

		<p style="width: 33%; float:left">
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $skype, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'skype' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'skype' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'skype' ) ); ?>"><?php _e('Skype', 'reveal'); ?></label>
		</p>

		<p style="width: 33%; float:left">
		    <input class="checkbox" type="checkbox" <?php esc_attr( checked( $linkedin, 'on' ) ); ?> id="<?php echo esc_attr ($this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'linkedin' ) ); ?>" /> 
		    <label for="<?php echo esc_attr($this->get_field_id( 'linkedin' ) ); ?>"><?php _e('Linked In', 'reveal'); ?></label>
		</p>


	<?php	

	}

	//Updating the widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

        foreach ( array( 'facebook', 'twitter', 'instagram', 'pinterest', 'behance', 'google_plus', 'youtube', 'skype', 'linkedin' ) as $key => $value ) {
            $instance[$value] = ( !empty( $new_instance[ $value ] ) ? sanitize_text_field( $new_instance[ $value ] ) : '' );
        }
		return $instance;
		
	}
	
	//front-end display of widget
	public function widget( $args, $instance ) {

		// Retrieving values from theme options
		$cx_facebook 	= reveal_option('reveal-facebook');	
		$cx_twitter 	= reveal_option('reveal-twitter');	
		$cx_instagram 	= reveal_option('reveal-instagram');	
		$cx_pinterest 	= reveal_option('reveal-pinterest');	
		$cx_behance 	= reveal_option('reveal-behance');	
		$cx_gplus 		= reveal_option('reveal-google-plus');	
		$cx_youtube 	= reveal_option('reveal-youtube');	
		$cx_skype 		= reveal_option('reveal-skype');	
		$cx_linkedin 	= reveal_option('reveal-linkedin');	
		
		printf( '%s', $args['before_widget'] ); ?>

		<div class="footer-left">
			<p><span class="italic"><?php echo esc_html__('Follow Us:', 'reveal') ?></span>

				<?php if( !empty( $cx_facebook ) && ( 'on' == $instance[ 'facebook' ] ) ) : ?>
				<a href="<?php echo esc_url($cx_facebook); ?>"><i class="fa fa-facebook"></i></a>
				<?php elseif( empty( $cx_facebook ) && ( 'on' == $instance[ 'facebook' ] ) ): echo '<i class="fa fa-exclamation-triangle" title="'. esc_html__('No Valid URL Found', 'reveal') .'"></i>'; ?>
				<?php endif; ?>

				<?php if( !empty( $cx_twitter ) && ( 'on' == $instance[ 'twitter' ] ) ) : ?>
				<a href="<?php echo esc_url($cx_twitter); ?>"><i class="fa fa-twitter"></i></a>
				<?php elseif( empty( $cx_twitter ) && ( 'on' == $instance[ 'twitter' ] ) ): echo '<i class="fa fa-exclamation-triangle" title="'. esc_html__('No Valid URL Found', 'reveal') .'"></i>'; ?>
				<?php endif; ?>

				<?php if( !empty( $cx_instagram ) && ( 'on' == $instance[ 'instagram' ] ) ) : ?>
				<a href="<?php echo esc_url($cx_instagram); ?>"><i class="fa fa-instagram"></i></a>
				<?php elseif( empty( $cx_instagram ) && ( 'on' == $instance[ 'instagram' ] ) ): echo '<i class="fa fa-exclamation-triangle" title="'. esc_html__('No Valid URL Found', 'reveal') .'"></i>'; ?>
				<?php endif; ?>

				<?php if( !empty( $cx_pinterest ) && ( 'on' == $instance[ 'pinterest' ] ) ) : ?>
				<a href="<?php echo esc_url($cx_pinterest); ?>"><i class="fa fa-pinterest"></i></a>
				<?php elseif( empty( $cx_pinterest ) && ( 'on' == $instance[ 'pinterest' ] ) ): echo '<i class="fa fa-exclamation-triangle" title="'. esc_html__('No Valid URL Found', 'reveal') .'"></i>'; ?>
				<?php endif; ?>

				<?php if( !empty( $cx_behance ) && ( 'on' == $instance[ 'behance' ] ) ) : ?>
				<a href="<?php echo esc_url($cx_behance); ?>"><i class="fa fa-behance"></i></a>
				<?php elseif( empty( $cx_behance ) && ( 'on' == $instance[ 'behance' ] ) ): echo '<i class="fa fa-exclamation-triangle" title="'. esc_html__('No Valid URL Found', 'reveal') .'"></i>'; ?>
				<?php endif; ?>

				<?php if( !empty( $cx_gplus ) && ( 'on' == $instance[ 'google_plus' ] ) ) : ?>
				<a href="<?php echo esc_url($cx_gplus); ?>"><i class="fa fa-google-plus"></i></a>
				<?php elseif( empty( $cx_google_plus ) && ( 'on' == $instance[ 'google_plus' ] ) ): echo '<i class="fa fa-exclamation-triangle" title="'. esc_html__('No Valid URL Found', 'reveal') .'"></i>'; ?>
				<?php endif; ?>

				<?php if( !empty( $cx_youtube ) && ( 'on' == $instance[ 'youtube' ] ) ) : ?>
				<a href="<?php echo esc_url($cx_youtube); ?>"><i class="fa fa-youtube-play"></i></a>
				<?php elseif( empty( $cx_youtube ) && ( 'on' == $instance[ 'youtube' ] ) ): echo '<i class="fa fa-exclamation-triangle" title="'. esc_html__('No Valid URL Found', 'reveal') .'"></i>'; ?>
				<?php endif; ?>

				<?php if( !empty( $cx_skype ) && ( 'on' == $instance[ 'skype' ] ) ) : ?>
				<a href="<?php echo esc_url($cx_skype); ?>"><i class="fa fa-skype"></i></a>
				<?php elseif( empty( $cx_skype ) && ( 'on' == $instance[ 'skype' ] ) ): echo '<i class="fa fa-exclamation-triangle" title="'. esc_html__('No Valid URL Found', 'reveal') .'"></i>'; ?>
				<?php endif; ?>

				<?php if( !empty( $cx_linkedin ) && ( 'on' == $instance[ 'linkedin' ] ) ) : ?>
				<a href="<?php echo esc_url($cx_linkedin); ?>"><i class="fa fa-linkedin"></i></a>
				<?php elseif( empty( $cx_linkedin ) && ( 'on' == $instance[ 'linkedin' ] ) ): echo '<i class="fa fa-exclamation-triangle" title="'. esc_html__('No Valid URL Found', 'reveal') .'"></i>'; ?>
				<?php endif; ?>

			</p>
		</div>

		<?php
		printf( '%s', $args['after_widget'] );

	}
	
}

add_action( 'widgets_init', function() {
	register_widget( 'Reveal_Social_Widget' );
} );


/*
	============================================
		REVEAL TESTIMONIAL WIDGET CLASS
	============================================
*/

class Reveal_Testimonial_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'reveal-testimonial-widget',
			'description' => esc_html__('Displays Testimonial Carousel', 'reveal'),
		);
		parent::__construct( 'cx_testimonial_widget', esc_html__('Reveal: Testimonial Widget', 'reveal'), $widget_ops );
		
	}
	
	//back-end display of widget
	public function form( $instance ) {

		$title 			= ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__('Testimonials', 'reveal') );


		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__('Title:', 'reveal') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>

<?php
		
	}

	// update widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance[ 'title' ] 			= ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		
		return $instance;
		
	}

	//front-end display of widget
	public function widget( $args, $instance ) {
		
		$posts_args = array(
			'post_type'			=> 'testimonial',
			'posts_per_page'	=> -1,
			'order'				=> 'DESC'
		);
		
		$posts_query = new WP_Query( $posts_args );
		
		printf( '%s', $args[ 'before_widget' ] );
		
		if( !empty( $instance[ 'title' ] ) ):
			
			printf( '%s' . apply_filters( 'widget_title', $instance[ 'title' ] ) . '%s', $args[ 'before_title' ], $args[ 'after_title' ]);
			
		endif;

		echo '<div id="quote-carousel" class="carousel slide" data-ride="carousel">';
			echo '<ol class="carousel-indicators hidden">';
		    	echo '<li data-target="#quote-carousel" data-slide-to="0" class="active"></li>';
		        echo '<li data-target="#quote-carousel" data-slide-to="1"></li>';
		    echo '</ol>';
			echo '<div class="carousel-inner" role="listbox">';

			if( $posts_query->have_posts() ):

				$i = 0;	
				while( $posts_query->have_posts() ): $posts_query->the_post();
				$i++;

				?>
					<?php if( $i == 1 ): ?>
	                <div class="item active">
		            <?php else: ?>
	            	<div class="item">
		            <?php endif; ?>
	                    <div class="quote-wrapper">
	                        <div class="quote-author-thumb">
	                            <i class="fa fa-comments"></i>
	                        </div>
	                        <div class="quote-text">
	                            <p><?php echo the_content(); ?></p>
	                            <p class="quote-author-name">"<?php echo the_title(); ?>"</p>
	                        </div>
	                    </div>
	                </div>

	               <?php
	
				endwhile;
			
			endif;

			echo '</div>';
		echo '</div>';


		wp_reset_postdata();
		
		printf( '%s', $args[ 'after_widget' ] );

	}
	
}

add_action( 'widgets_init', function() {
	register_widget( 'Reveal_Testimonial_Widget' );
} );