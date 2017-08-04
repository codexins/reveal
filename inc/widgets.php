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
			'name' 				=> esc_html__('Sidebar (Portfolio)', 'reveal'),
			'id'				=> 'reveal-sidebar-portfolio-template',
			'description'		=> esc_html__('This sidebar will show only on Portfolio Page.', 'reveal'), 
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
							esc_url( the_post_thumbnail_url('blog-widget-image') ); 
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
							esc_url( the_post_thumbnail_url('blog-widget-image') ); 
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