<?php
if ( ! function_exists( 'post_meta' ) ) :
function post_meta() {
	if ( 'post' === get_post_type() ) {
		printf( '<span class="byline">By <span class="author vcard"> <span class="post-author-name" href="%1$s">%2$s</span></span></span>',
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


function entry_meta() {
	
}

function social_page_links() {
	$menu_name = 'media_pages'; // specify custom menu slug
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list .= "\t\t\t\t". '<ul class="media-pages-links nav navbar-nav">' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$el_class='icon-facebook';
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'"><span class="icon '.$el_class.'"></span></a></li>' ."\n";
		}
		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
		$menu_list .= "\t\t\t". '</nav>' ."\n";
	} else {
		// $menu_list = '<!-- no list defined -->';
	}
	echo $menu_list;
}


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

		printf( '<span class="posted-on"><span href="%1$s" rel="bookmark">%2$s</span></span>',
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;


function custom_pagination($current_page_no, $max_num_pages){
	/*
		Place code to connect to your DB here.
	*/
	
	// How many adjacent pages should be shown on each side?
	$adjacents = 1;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$total_pages = $max_num_pages;
	
	/* Setup vars for query. */
	$limit = 10; 
	$page = $current_page_no;							//how many items to show per page
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = $total_pages;		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	// $url = $_SERVER['PHP_SELF'];
	$url = home_url();
	if($lastpage > 1)
	{	
		//previous button
		if ($page > 1) 
			$pagination.= "<a class=\"page-numbers icon icon-arrow-left\" href=\"$url?page=$prev\"></a>";
		else
			$pagination.= "<span class=\"page-numbers icon icon-arrow-left disabled\"></span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"page-numbers current\">$counter</span>";
				else
					$pagination.= "<a class=\"page-numbers\" href=\"$url?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"page-numbers  current\">$counter</span>";
					else
						$pagination.= "<a class=\"page-numbers\" href=\"$url?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a class=\"page-numbers\" href=\"$url?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a class=\"page-numbers\" href=\"$url?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a class=\"page-numbers\" href=\"$url?page=1\">1</a>";
				$pagination.= "<a class=\"page-numbers\" href=\"$url?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"page-numbers current\">$counter</span>";
					else
						$pagination.= "<a class=\"page-numbers\" href=\"$url?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a class=\"page-numbers\" href=\"$url?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a class=\"page-numbers\" href=\"$url?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a class=\"page-numbers\" href=\"$url?page=1\">1</a>";
				$pagination.= "<a class=\"page-numbers\" href=\"$url?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"page-numbers  current\">$counter</span>";
					else
						$pagination.= "<a class=\"page-numbers\" href=\"$url?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a class=\"page-numbers icon icon-arrow-right\" href=\"$url?page=$next\"></a>";
		else
			$pagination.= "<span class=\"page-numbers icon icon-arrow-right disabled\"></span>";	
	}
	echo $pagination;

}

?>
