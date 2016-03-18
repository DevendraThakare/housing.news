<?php
if ( ! function_exists( 'post_meta' ) ) :
function post_meta() {
	if ( 'post' === get_post_type() ) {
		printf( '<span class="byline">By <span class="author vcard"> <a class="url fn n" href="%1$s">%2$s</a></span></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}
	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		post_date();
	}
}
endif;

if ( ! function_exists( 'post_thumbnail' ) ) :
function post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	?>
	<div class="post-thum-wrap">
	<?php
	if ( is_singular() ) :
	?>
	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( array(480, 480), array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>
	<?php endif; // End is_singular()
	?>
	</div><?php
}
endif;

if ( ! function_exists( 'post_banner_img' ) ) :
	function post_banner_img() {
	?>
		<div class="post-banner-wrap">
			<a class="post-banner-img" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail( array(1160, 450), array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
			</a>
		</div>
	<?php
	}
endif;


if ( ! function_exists( 'post_excerpt' ) ) :
	function post_excerpt(){
		the_excerpt();
	}
endif;


// if ( ! function_exists( 'bootstrap_pagination' ) ) :
// 	function bootstrap_pagination($pages = '', $range = 2){
// 		$showitems = ($range * 2)+1;
// 		global $paged;
// 		if(empty($paged)) $paged = 1;
// 		if($pages == ''){
// 			global $wp_query;
// 			$pages = $wp_query->max_num_pages;
// 			if(!$pages){
// 				$pages = 1;
// 			}
// 		}

// 		if(1 != $pages){
// 			echo "<div class='pagination pagination-centered'><ul>";
// 			if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
// 			if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

// 			for ($i=1; $i <= $pages; $i++){
// 				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
// 					echo ($paged == $i)? "<li class='active'><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
// 				}
// 			}

// 			if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
// 			if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
// 			echo "</ul></div>\n";
// 		}
// 	}
// endif;


if ( ! function_exists( 'post_date' ) ) :
	function post_date(){

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
			$time_string = sprintf( $time_string, esc_attr( get_the_modified_date( 'c' ) ), get_the_modified_date());

		}
		else{
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), get_the_date());
		}

		printf( '<span class="posted-on"><span class="screen-reader-text"></span><a href="%1$s" rel="bookmark">%2$s</a></span>',
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;

?>
