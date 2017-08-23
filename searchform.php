    	<form role="search" method="get" class="input-group" action="<?php echo home_url('/'); ?>">
			<input autocomplete="off" type="search" class="form-control ajax-search" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" title="Search" />
			<input type="submit" value="search">
			<div class="clearable"><i class="fa fa-times"></i></div>
			<div class="ajax-results"></div>
    	</form>
