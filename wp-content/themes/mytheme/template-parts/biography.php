<?php
/**
 * The template part for displaying an Author biography
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div class="author-info clear">
	<div class="author-avatar">
		<?php
		/**
		 * Filter the Twenty Sixteen author bio avatar size.
		 *
		 * @since Twenty Sixteen 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'twentysixteen_author_bio_avatar_size', 100 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->
	<div class="author-data">
		<div class="author-details">
			<span class="author-name"><?php echo  get_the_author_meta( 'first_name' )." ".  get_the_author_meta( 'last_name' )?></span>
			<span class="author-username"> 
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>"> <?php echo get_the_author(); ?></a>
			</span>
		</div>
		<p class="author-desc">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-bio -->
	</div>
</div><!-- .author-info -->
