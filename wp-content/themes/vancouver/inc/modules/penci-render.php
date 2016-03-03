<?php
/**
 * Content in mega menu
 *
 * @since 1.0
 * @return HTML inner mega menu
 */
if ( ! function_exists( 'penci_return_html_mega_menu' ) ) {
	function penci_return_html_mega_menu( $catID ) {
		$args             = array(
			'type'         => 'post',
			'child_of'     => $catID,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => true,
			'hierarchical' => 1,
			'taxonomy'     => 'category',
		);
		$child_categories = get_categories( $args );
		$list_cats = array( __( 'All', 'pencidesign') => $catID );

		if( !empty( $child_categories ) ):
			foreach ( $child_categories as $child_cat ) {
				$list_cats[$child_cat->name] = $child_cat->term_id;
			}
		endif;

		$col = 'col-mn-5';
		$numbers = 5;
		if( !empty($child_categories) ) { $col = 'col-mn-4'; $numbers = 4; }

		ob_start();
		?>
		<?php if( !empty( $child_categories ) ): ?>
		<div class="penci-mega-child-categories">
			<?php $i = 1; foreach( $list_cats as $child_name => $child_id ): ?>
				<a class="mega-cat-child<?php if( $i == 1 ): echo ' cat-active'; endif; ?>" href="<?php echo esc_url( get_category_link( $child_id ) ); ?>" data-id="penci-mega-<?php echo esc_attr( $child_id ); ?>"><?php echo sanitize_text_field( $child_name ); ?></a>
			<?php $i++; endforeach; ?>
		</div>
		<?php endif; ?>

		<div class="penci-content-megamenu">
			<div class="penci-mega-latest-posts <?php echo esc_attr( $col ); ?>">
				<?php $j = 1; foreach( $list_cats as $cat_name => $cat_id ): ?>
				<div class="penci-mega-row<?php if( $j == 1 ): echo ' row-active'; endif; ?>" id="penci-mega-<?php echo esc_attr( $cat_id ); ?>">
					<?php
					$attr = array(
						'post_type' => 'post',
						'showposts' => $numbers,
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field'    => 'id',
								'terms'    => (int)$cat_id,
							),
						),
					);
					$latest_mega = new WP_Query( $attr );
					if( $latest_mega->have_posts() ):
					while ( $latest_mega->have_posts() ): $latest_mega->the_post();

					$category = get_the_category( get_the_ID() );
					?>
						<div class="penci-mega-post">
							<div class="penci-mega-thumbnail">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'thumb' ); ?></a>
							</div>
							<div class="penci-mega-meta">
								<h3 itemprop="name" class="post-mega-title">
									<a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<?php if ( ! get_theme_mod( 'penci_topbar_mega_date' ) ): ?>
								<p class="penci-mega-date"><?php the_time( get_option('date_format') ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile;
					wp_reset_postdata();
					endif;
					?>
				</div>
				<?php $j++; endforeach; ?>
			</div>
		</div>

		<?php
		$return = ob_get_clean();

		return $return;
	}
}