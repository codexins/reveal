<?php
//wordpress custom breadcrumbs without plugin
// start reveal_custom_breadcrumb
function reveal_custom_breadcrumbs(array $options = array() ) {
	
	// default values assigned to options
	$options = array_merge(array(
    'crumbId' 		=> 'nav_crumb', // id for the breadcrumb Div
		'crumbClass' 	=> 'nav_crumb', // class for the breadcrumb Div
		'beginningText' => 'You are here :', // text showing before breadcrumb starts
		'showOnHome' 	=> 1,// 1 - show breadcrumbs on the homepage, 0 - don't show
		'delimiter' 	=> ' &gt; ', // delimiter between crumbs
		'homePageText' 	=> 'Home', // text for the 'Home' link
		'showCurrent' 	=> 1, // 1 - show current post/page title in breadcrumbs, 0 - don't show
		'beforeTag' 	=> '<span class="current">', // tag before the current breadcrumb
		'afterTag' 		=> '</span>', // tag after the current crumb
		'showTitle'		=> 1 // showing post/page title or slug if title to show then 1
   ), $options);
   
  $crumbId = $options['crumbId'];
	$crumbClass = $options['crumbClass'];
	$beginningText = $options['beginningText'] ;
	$showOnHome = $options['showOnHome'];
	$delimiter = $options['delimiter']; 
	$homePageText = $options['homePageText']; 
	$showCurrent = $options['showCurrent']; 
	$beforeTag = $options['beforeTag']; 
	$afterTag = $options['afterTag']; 
	$showTitle =  $options['showTitle']; 
	
	global $post;

	$wp_query = $GLOBALS['wp_query'];

	$homeLink = esc_url(home_url());
	
	echo '<div id="'.$crumbId.'" class="'.$crumbClass.'" >'.$beginningText;
	
	if (is_home() || is_front_page()) {
	
		if ($showOnHome == 1)

			echo $beforeTag . $homePageText . $afterTag;

	} else { 
	
		echo '<a href="' . $homeLink . '">' . $homePageText . '</a> ' . $delimiter . ' ';
	
		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
			echo $beforeTag . 'Archive by Category "' . single_cat_title('', false) . '"' . $afterTag;
	
	  } elseif ( is_tax() ) {
		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		$parents = array();
		$parent = $term->parent;
		while ( $parent ) {
		  $parents[] = $parent;
		  $new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ) );
		  $parent = $new_parent->parent;

		}		  
		  if ( ! empty( $parents ) ) {
			  $parents = array_reverse( $parents );
			  foreach ( $parents as $parent ) {
				  $item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
				  echo   '<a href="' . get_term_link( $item->slug, get_query_var( 'taxonomy' ) ) . '">' . $item->name . '</a>'  . $delimiter;
			  }
		  }

		  $queried_object = $wp_query->get_queried_object();
		  echo $beforeTag . $queried_object->name . $afterTag;	  
		  } elseif ( is_search() ) {
		echo $beforeTag . 'Search results for "' . get_search_query() . '"' . $afterTag;
	
	  } elseif ( is_day() ) {
		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
		echo $beforeTag . get_the_time('d') . $afterTag;
	
	  } elseif ( is_month() ) {
		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		echo $beforeTag . get_the_time('F') . $afterTag;
	
	  } elseif ( is_year() ) {
		echo $beforeTag . get_the_time('Y') . $afterTag;
	
	  } elseif ( is_single() && !is_attachment() ) {
		  
		     if($showTitle)
			   $title = get_the_title();
			  else
			  $title =  $post->post_name;
		  
					 if ( get_post_type() == 'product' ) { // it is for custom post type with custome taxonomies like
					 //Breadcrumb would be : Home Furnishings > Bed Covers > Cotton Quilt King Kantha Bedspread 
					 // product = Cotton Quilt King Kantha Bedspread, custom taxonomy product_cat (Home Furnishings -> Bed Covers)
					// show  product with category on single page
					  if ( $terms = wp_get_object_terms( $post->ID, 'product_cat' ) ) {
		
						  $term = current( $terms );
		
						  $parents = array();
		
						  $parent = $term->parent;
						  while ( $parent ) {
		
							  $parents[] = $parent;
		
							  $new_parent = get_term_by( 'id', $parent, 'product_cat' );
		
							  $parent = $new_parent->parent;
		
						  }
						  if ( ! empty( $parents ) ) {
		
							  $parents = array_reverse($parents);
		
							  foreach ( $parents as $parent ) {
		
								  $item = get_term_by( 'id', $parent, 'product_cat');
		
								  echo  '<a href="' . get_term_link( $item->slug, 'product_cat' ) . '">' . $item->name . '</a>'  . $delimiter;
		
							  }
		
						  }
						  echo  '<a href="' . get_term_link( $term->slug, 'product_cat' ) . '">' . $term->name . '</a>'  . $delimiter;
					  }
					  echo $beforeTag . $title . $afterTag;
				  }  elseif ( get_post_type() != 'post' ) {
				  $post_type = get_post_type_object(get_post_type());
				  $slug = $post_type->rewrite;
				  echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
				  if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $beforeTag . $title . $afterTag;
				} else {
				  $cat = get_the_category(); $cat = $cat[0];
				  $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				  if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
				  echo $cats;
				  if ($showCurrent == 1) echo $beforeTag . $title . $afterTag;
		
				}

	  } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		  
		$post_type = get_post_type_object(get_post_type());
		
		echo $beforeTag . $post_type->labels->singular_name . $afterTag;
			 
	 } elseif ( is_attachment() ) {
			 
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); $cat = $cat[0];
		echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
		if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $beforeTag . get_the_title() . $afterTag;	
		  
		} elseif ( is_page() && !$post->post_parent ) {
			$title =($showTitle)? get_the_title():$post->post_name;
			  
		if ($showCurrent == 1) echo $beforeTag .  $title . $afterTag;

	  } elseif ( is_page() && $post->post_parent ) {
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) {
		  $page = get_page($parent_id);
		  $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
		  $parent_id  = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		for ($i = 0; $i < count($breadcrumbs); $i++) {
		  echo $breadcrumbs[$i];
		  if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
		}
			$title =($showTitle)? get_the_title():$post->post_name;
		   
	if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $beforeTag . $title . $afterTag;

	  } elseif ( is_tag() ) {

		echo $beforeTag . 'Posts Tagged "' . single_tag_title('', false) . '"' . $afterTag;

	  } elseif ( is_author() ) {
		 global $author;
		$userdata = get_userdata($author);

		echo $beforeTag . 'Articles Posted by ' . $userdata->display_name . $afterTag;

	  } elseif ( is_404() ) {
		  
		echo $beforeTag . 'Error 404' . $afterTag;

	  }

	  if ( get_query_var('paged') ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_tax() ) echo ' (';
		echo esc_html__('Page', 'reveal') . ' ' . get_query_var('paged');
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_tax() ) echo ')';
	  }
	}
	echo '</div>';
  }
// end reveal_custom_breadcrumb