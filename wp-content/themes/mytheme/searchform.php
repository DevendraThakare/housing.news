<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>


<form class="navbar-form pull-right search-form" method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<div class="input-group">
			<input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'twentysixteen' ); ?>">
			<span class="icon icon-search search-icon"></span>
			<!-- <span class="icon icon-close close-icon" data-toggle="collapse" data-target="#form-input" aria-controls="form-input"></span> -->
    	</div><!-- /input-group -->
	</div>
</form>


