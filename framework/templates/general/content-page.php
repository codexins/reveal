<?php
/**
 * Template partial for displaying page contents
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

?>

<div id="page-<?php the_ID(); ?>" <?php post_class( array( 'clearfix', 'page-entry-content' ) ); ?>>
	<?php 

    // Go to the template partial to show to contents
    get_template_part( 'framework/templates/general/post', 'content' );

	?>
</div> <!-- end of #page-## -->
