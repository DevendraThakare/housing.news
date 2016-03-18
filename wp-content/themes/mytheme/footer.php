<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info clear">
				<div class="footer-menu-wrap housing-line">
					<div class="footer-logo-coloured"></div>
					<div class="desc"> © 2012-15 Locon Solutions Pvt. Ltd. </div>
				</div>
				<div class="footer-menu-wrap company-menu-wrap">
					<h4 class="footer-menu-head">COMPLANY</h4>
					<?php
				        wp_nav_menu( array(
				            'menu'              => 'company',
				            'container'         => 'div',
				            'container_class'   => 'company-menu',
				            'menu_class'        => 'footer-links-wrap',
				            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				            'walker'            => new wp_bootstrap_navwalker())
				        );
				    ?>
			    </div>
			    <div class="footer-menu-wrap explore-menu-wrap">
			    	<h4 class="footer-menu-head">EXPLORE</h4>
					<?php
				        wp_nav_menu( array(
				            'menu'              => 'explore',
				            'container'         => 'div',
				            'container_class'   => 'explore-menu',
				            'menu_class'        => 'footer-links-wrap',
				            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				            'walker'            => new wp_bootstrap_navwalker())
				        );
				    ?>
			    </div>
			    <div class="footer-menu-wrap follow-menu-wrap">
			    	<h4 class="footer-menu-head">FOLLOW</h4>
					<?php
				        wp_nav_menu( array(
				            'menu'              => 'follow',
				            'container'         => 'div',
				            'container_class'   => 'follow-menu',
				            'menu_class'        => 'footer-links-wrap',
				            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				            'walker'            => new wp_bootstrap_navwalker())
				        );
				    ?>
			    </div>
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
