<?php
/**
 * Related post template
 * Render list related posts
 *
 * @since 1.0
 */
$data_auto = 'true';
$auto = get_theme_mod( 'penci_post_related_autoplay' );
if( $auto == false ): $data_auto = 'false'; endif;

$orig_post = $post;
global $post;
$numbers_related = get_theme_mod('penci_numbers_related_post');
if ( !isset( $numbers_related ) || $numbers_related < 1 ): $numbers_related = 10; endif;

$categories = get_the_category( $post->ID );
if ( $categories ) {
	$category_ids = array();
	foreach ( $categories as $individual_category ) {
		$category_ids[] = $individual_category->term_id;
	}

	$args = array(
		'category__in'        => $category_ids,
		'post__not_in'        => array( $post->ID ),
		'posts_per_page'      => $numbers_related, // Number of related posts that will be shown.
		'ignore_sticky_posts' => 1,
		'orderby'             => 'rand'
	);

	$my_query = new wp_query( $args );
	if ( $my_query->have_posts() ) {
		$related_title = get_theme_mod('penci_post_related_text');
		$related_title = ( isset( $related_title ) && ! empty( $related_title ) ) ? $related_title : __( 'You may also like', 'pencidesign' );
		?>
		<div class="post-related">
		<div class="post-title-box"><div class="pattern-grey"></div><h4 class="post-box-title"><?php echo esc_attr( $related_title ); ?></h4></div>
		<div class="penci-carousel penci-related-carousel" data-auto="<?php echo esc_attr( $data_auto ); ?>">
		<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
				<div class="item-related">
					<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) : ?>
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumb' ); ?></a>
					<?php endif; ?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span>
				</div>
		<?php
		endwhile;
		echo '</div></div>';
	}
}
$post = $orig_post;
wp_reset_postdata();
?>