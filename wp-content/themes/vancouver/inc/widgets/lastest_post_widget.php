<?php
/**
 * Lastest post widget
 * Get recent posts and display in widget
 *
 * @package Wordpress
 * @since 1.0
 */

add_action( 'widgets_init', 'pencidesign_latest_news_load_widget' );

function pencidesign_latest_news_load_widget() {
	register_widget( 'pencidesign_latest_news_widget' );
}

class pencidesign_latest_news_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function pencidesign_latest_news_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'pencidesign_latest_news_widget', 'description' => __('A widget that displays your latest posts from all categories or a category', 'pencidesign') );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'pencidesign_latest_news_widget' );

		/* Create the widget. */
		global $wp_version;
		if( 4.3 > $wp_version ) {
			$this->WP_Widget( 'pencidesign_latest_news_widget', __('Vancouver Latest Posts', 'pencidesign'), $widget_ops, $control_ops );
		} else {
			parent::__construct( 'pencidesign_latest_news_widget', __('Vancouver Latest Posts', 'pencidesign'), $widget_ops, $control_ops );
		}
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$categories = isset( $instance['categories'] ) ? $instance['categories']: '';
		$number = isset( $instance['number'] ) ? $instance['number']: '';


		$query = array( 'showposts'           => $number,
						'nopaging'            => 0,
						'post_status'         => 'publish',
						'ignore_sticky_posts' => 1,
						'cat'                 => $categories
		);

		$loop = new WP_Query($query);
		if ($loop->have_posts()) :

		/* Before widget (defined by themes). */
		echo ent2ncr( $before_widget );

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo ent2ncr( $before_title . $title . $after_title );

		?>
			<ul class="side-newsfeed">

			<?php  while ($loop->have_posts()) : $loop->the_post(); ?>

				<li>
					<div class="side-item">

						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
						<div class="side-image">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumb', array('class' => 'side-item-thumb')); ?></a>
						</div>
						<?php endif; ?>
						<div class="side-item-text">
							<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
							<span class="side-item-meta"><?php the_time( get_option('date_format') ); ?></span>
						</div>
					</div>
				</li>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>

			</ul>

		<?php

		/* After widget (defined by themes). */
		echo ent2ncr( $after_widget );
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['categories'] = $new_instance['categories'];
		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Latest Posts', 'pencidesign'), 'number' => 5, 'categories' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e('Title:', 'pencidesign'); ?></label>
			<input  type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo sanitize_text_field( $instance['title'] ); ?>"  />
		</p>

		<!-- Category -->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id('categories') ); ?>"><?php _e('Filter by Category:', 'pencidesign'); ?></label>
		<select id="<?php echo esc_attr( $this->get_field_id('categories') ); ?>" name="<?php echo esc_attr( $this->get_field_name('categories') ); ?>" class="widefat categories" style="width:100%;">
			<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php _e('All categories', 'pencidesign'); ?></option>
			<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
			<?php foreach($categories as $category) { ?>
			<option value='<?php echo esc_attr( $category->term_id ); ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo sanitize_text_field( $category->cat_name ); ?></option>
			<?php } ?>
		</select>
		</p>

		<!-- Number of posts -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e('Number of posts to show:', 'pencidesign'); ?></label>
			<input  type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo esc_attr( $instance['number'] ); ?>" size="3" />
		</p>


	<?php
	}
}

?>