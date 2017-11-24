<?php

/**
 *
 * The search-form template.
 *
 * @package 	Reveal
 * @subpackage 	Templates
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

?>

<form role="search" method="get" class="input-group" action="<?php echo esc_url_raw( home_url( '/' ) ); ?>">
	<input type="search" class="form-control" placeholder="<?php esc_html_e( 'Search ...', 'reveal' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="Search" />
	<input type="submit" value="search">
</form>
