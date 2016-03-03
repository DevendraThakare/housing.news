<?php
/**
 * About me widget
 * Display your information on footer or sidebar
 *
 * @package Wordpress
 * @since   1.0
 */

add_action( 'widgets_init', 'pencidesign_about_load_widget' );

function pencidesign_about_load_widget() {
	register_widget( 'pencidesign_about_widget' );
}

class pencidesign_about_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function pencidesign_about_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname'   => 'pencidesign_about_widget', 'description' => __( 'A widget that displays an About widget', 'pencidesign' ) );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'pencidesign_about_widget' );

		/* Create the widget. */
		global $wp_version;
		if( 4.3 > $wp_version ) {
			$this->WP_Widget( 'pencidesign_about_widget', __( 'Vancouver About Me', 'pencidesign' ), $widget_ops, $control_ops );
		} else {
			parent::__construct( 'pencidesign_about_widget', __( 'Vancouver About Me', 'pencidesign' ), $widget_ops, $control_ops );
		}
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title       = apply_filters( 'widget_title', $instance['title'] );
		$image       = $instance['image'];
		$author      = $instance['author'];
		$description = $instance['description'];

		/* Before widget (defined by themes). */
		echo ent2ncr( $before_widget );

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo ent2ncr( $before_title . $title . $after_title );

		?>

		<div class="about-widget">

			<?php if ( $image ) : ?>
				<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" />
			<?php endif; ?>

			<?php if ( is_numeric( $author ) ): ?>
				<div class="about-list-social">
					<?php if ( get_the_author_meta( 'facebook', $author ) ) : ?>
						<a target="_blank" class="author-social" href="http://facebook.com/<?php echo esc_attr( the_author_meta( 'facebook', $author ) ); ?>"><i class="fa fa-facebook"></i></a>
					<?php endif; ?>
					<?php if ( get_the_author_meta( 'twitter', $author ) ) : ?>
						<a target="_blank" class="author-social" href="http://twitter.com/<?php echo esc_attr( the_author_meta( 'twitter', $author ) ); ?>"><i class="fa fa-twitter"></i></a>
					<?php endif; ?>
					<?php if ( get_the_author_meta( 'google', $author ) ) : ?>
						<a target="_blank" class="author-social" href="http://plus.google.com/<?php echo esc_attr( the_author_meta( 'google', $author ) ); ?>?rel=author"><i class="fa fa-google-plus"></i></a>
					<?php endif; ?>
					<?php if ( get_the_author_meta( 'instagram', $author ) ) : ?>
						<a target="_blank" class="author-social" href="http://instagram.com/<?php echo esc_attr( the_author_meta( 'instagram', $author ) ); ?>"><i class="fa fa-instagram"></i></a>
					<?php endif; ?>
					<?php if ( get_the_author_meta( 'pinterest', $author ) ) : ?>
						<a target="_blank" class="author-social" href="http://pinterest.com/<?php echo esc_attr( the_author_meta( 'pinterest', $author ) ); ?>"><i class="fa fa-pinterest"></i></a>
					<?php endif; ?>
					<?php if ( get_the_author_meta( 'tumblr', $author ) ) : ?>
						<a target="_blank" class="author-social" href="http://<?php echo esc_attr( the_author_meta( 'tumblr', $author ) ); ?>.tumblr.com/"><i class="fa fa-tumblr"></i></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( $description ) : ?>
				<p><?php echo wp_kses( $description, penci_allow_html() ); ?></p>
			<?php endif; ?>

		</div>

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
		$instance['title']       = strip_tags( $new_instance['title'] );
		$instance['image']       = strip_tags( $new_instance['image'] );
		$instance['author']      = strip_tags( $new_instance['author'] );
		$instance['description'] = $new_instance['description'];

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'About Me', 'image' => '', 'author' => '', 'description' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'pencidesign' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo sanitize_text_field( $instance['title'] ); ?>" />
		</p>

		<!-- image url -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"><?php _e( 'Image URL:', 'pencidesign' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" value="<?php echo esc_attr( $instance['image'] ); ?>" /><br />
			<small><?php _e( 'Insert your image URL. For best result use 365px width.', 'pencidesign' ); ?></small>
		</p>

		<!-- select author -->
		<?php
		/**
		 * Get list author
		 * @package Wordpress
		 * @author  PenciDesign
		 */
		$allUsers = get_users( 'orderby=post_count&order=DESC' );
		$users    = array();
		// Remove subscribers from the list as they won't write any articles
		foreach ( $allUsers as $currentUser ) {
			if ( ! in_array( 'subscriber', $currentUser->roles ) ) {
				$users[] = $currentUser;
			}
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'author' ) ); ?>"><?php _e( 'Select Author:', 'pencidesign' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'author' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author' ) ); ?>">
				<option value=""><?php _e( 'None', 'pencidesign' ); ?></option>
				<?php foreach ( $users as $user ) { ?>
			<option value="<?php echo esc_attr( $user->ID ); ?>" <?php selected( $instance['author'], $user->ID ); ?>><?php echo wp_kses( $user->display_name, '' ); ?></option>
		<?php } ?>
			</select>
			<small><?php _e( 'If you want hide list social media, select "None"', 'pencidesign' ); ?></small>
		</p>

		<!-- description -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php _e( 'About me text:', 'pencidesign' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" rows="6"><?php echo esc_textarea( $instance['description'] ); ?></textarea>
		</p>


	<?php
	}
}

?>