<?php
/**
 * Socials Widget
 * Get in touch with your clients
 *
 * @package Wordpress
 * @since 1.0
 */

add_action( 'widgets_init', 'pencidesign_social_load_widget' );

function pencidesign_social_load_widget() {
	register_widget( 'pencidesign_social_widget' );
}

class pencidesign_social_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function pencidesign_social_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname'   => 'pencidesign_social_widget', 'description' => __( 'A widget that displays your social icons', 'pencidesign' ) );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'pencidesign_social_widget' );

		/* Create the widget. */
		global $wp_version;
		if( 4.3 > $wp_version ) {
			$this->WP_Widget( 'pencidesign_social_widget', __( 'Vancouver Social Media', 'pencidesign' ), $widget_ops, $control_ops );
		} else {
			parent::__construct( 'pencidesign_social_widget', __( 'Vancouver Social Media', 'pencidesign' ), $widget_ops, $control_ops );
		}
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title      = apply_filters( 'widget_title', $instance['title'] );
		$facebook   = $instance['facebook'];
		$twitter    = $instance['twitter'];
		$googleplus = $instance['googleplus'];
		$instagram  = $instance['instagram'];
		$youtube    = $instance['youtube'];
		$tumblr     = $instance['tumblr'];
		$behance    = isset( $instance['behance'] ) ? $instance['behance'] : '';
		$linkedin   = isset( $instance['linkedin'] ) ? $instance['linkedin'] : '';
		$flickr     = isset( $instance['flickr'] ) ? $instance['flickr'] : '';
		$pinterest  = $instance['pinterest'];
		$rss        = $instance['rss'];

		/* Before widget (defined by themes). */
		echo ent2ncr( $before_widget );

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo ent2ncr( $before_title . $title . $after_title );

		?>

		<div class="widget-social">
			<?php if ( $facebook ) : ?>
				<a href="http://facebook.com/<?php echo esc_attr( get_theme_mod( 'penci_facebook' ) ); ?>" target="_blank"><i class="fa fa-facebook"></i><span><?php _e( 'Facebook', 'pencidesign' ); ?></span></a>
			<?php endif; ?>

			<?php if ( $twitter ) : ?>
				<a href="http://twitter.com/<?php echo esc_attr( get_theme_mod( 'penci_twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i><span><?php _e( 'Twitter', 'pencidesign' ); ?></span></a>
			<?php endif; ?>

			<?php if ( $googleplus ) : ?>
				<a href="http://plus.google.com/<?php echo esc_attr( get_theme_mod( 'penci_google' ) ); ?>" target="_blank"><i class="fa fa-google-plus"></i><span><?php _e( 'Google Plus', 'pencidesign' ); ?></span></a>
			<?php endif; ?>

			<?php if ( $instagram ) : ?>
				<a href="http://instagram.com/<?php echo esc_attr( get_theme_mod( 'penci_instagram' ) ); ?>" target="_blank"><i class="fa fa-instagram"></i><span><?php _e( 'Instagram', 'pencidesign' ); ?></span></a>
			<?php endif; ?>

			<?php if ( $pinterest ) : ?>
				<a href="http://pinterest.com/<?php echo esc_attr( get_theme_mod( 'penci_pinterest' ) ); ?>" target="_blank"><i class="fa fa-pinterest"></i><span><?php _e( 'Pinterest', 'pencidesign' ); ?></span></a>
			<?php endif; ?>

			<?php if ( $linkedin ) : ?>
				<a href="<?php echo esc_url( get_theme_mod( 'penci_linkedin' ) ); ?>" target="_blank"><i class="fa fa-linkedin"></i><span><?php _e( 'Linkedin', 'pencidesign' ); ?></span></a>
			<?php endif; ?>

			<?php if ( $flickr ) : ?>
				<a href="http://www.flickr.com/photos/<?php echo esc_attr( get_theme_mod( 'penci_flickr' ) ); ?>" target="_blank"><i class="fa fa-flickr"></i><span><?php _e( 'Flickr', 'pencidesign' ); ?></span></a>
			<?php endif; ?>

			<?php if ( $behance ) : ?>
				<a href="http://www.behance.net/<?php echo esc_attr( get_theme_mod( 'penci_behance' ) ); ?>" target="_blank"><i class="fa fa-behance"></i><span><?php _e( 'Behance', 'pencidesign' ); ?></span></a>
			<?php endif; ?>

			<?php if ( $tumblr ) : ?>
				<a href="http://<?php echo esc_attr( get_theme_mod( 'penci_tumblr' ) ); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i><span><?php _e( 'Tumblr', 'pencidesign' ); ?></span></a>
			<?php endif; ?>

			<?php if ( $youtube ) : ?>
				<a href="http://youtube.com/<?php echo esc_attr( get_theme_mod( 'penci_youtube' ) ); ?>" target="_blank"><i class="fa fa-youtube-play"></i><span><?php _e( 'Youtube', 'pencidesign' ); ?></span></a>
			<?php endif; ?>

			<?php if ( $rss ) : ?>
				<a href="<?php echo esc_url( get_theme_mod( 'penci_rss' ) ); ?>" target="_blank"><i class="fa fa-rss"></i><span><?php _e( 'RSS', 'pencidesign' ); ?></span></a>
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
		$instance['title']      = strip_tags( $new_instance['title'] );
		$instance['facebook']   = strip_tags( $new_instance['facebook'] );
		$instance['twitter']    = strip_tags( $new_instance['twitter'] );
		$instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
		$instance['instagram']  = strip_tags( $new_instance['instagram'] );
		$instance['linkedin']   = strip_tags( $new_instance['linkedin'] );
		$instance['flickr']     = strip_tags( $new_instance['flickr'] );
		$instance['behance']    = strip_tags( $new_instance['behance'] );
		$instance['youtube']    = strip_tags( $new_instance['youtube'] );
		$instance['tumblr']     = strip_tags( $new_instance['tumblr'] );
		$instance['pinterest']  = strip_tags( $new_instance['pinterest'] );
		$instance['rss']        = strip_tags( $new_instance['rss'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'title'      => 'Keep in touch',
			'facebook'   => 'on',
			'twitter'    => 'on',
			'googleplus' => 'on',
			'instagram'  => 'on',
			'linkedin'   => '',
			'behance'    => '',
			'flickr'     => '',
			'youtube'    => '',
			'tumblr'     => '',
			'pinterest'  => 'on',
			'rss'        => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e('Title:','pencidesign'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo sanitize_text_field( $instance['title'] ); ?>" />
		</p>

		<p class="description"><?php _e('Note: Setup your social links in the Appearance -> Customizer','pencidesign'); ?></p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php _e('Show Facebook:','pencidesign'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" <?php checked( (bool) $instance['facebook'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php _e('Show Twitter:','pencidesign'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" <?php checked( (bool) $instance['twitter'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php _e('Show Instagram:','pencidesign'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" <?php checked( (bool) $instance['instagram'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php _e('Show Pinterest:','pencidesign'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" <?php checked( (bool) $instance['pinterest'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'googleplus' ) ); ?>"><?php _e('Show Google Plus:','pencidesign'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'googleplus' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'googleplus' ) ); ?>" <?php checked( (bool) $instance['googleplus'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php _e('Show Likedin:','pencidesign'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" <?php checked( (bool) $instance['linkedin'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>"><?php _e('Show Behance:','pencidesign'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'behance' ) ); ?>" <?php checked( (bool) $instance['behance'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>"><?php _e('Show Flickr:','pencidesign'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'flickr' ) ); ?>" <?php checked( (bool) $instance['flickr'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>"><?php _e('Show Tumblr:','pencidesign'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tumblr' ) ); ?>" <?php checked( (bool) $instance['tumblr'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php _e('Show Youtube:','pencidesign'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" <?php checked( (bool) $instance['youtube'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'rss' ) ); ?>"><?php _e('Show RSS:','pencidesign'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'rss' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rss' ) ); ?>" <?php checked( (bool) $instance['rss'], true ); ?> />
		</p>


	<?php
	}
}

?>