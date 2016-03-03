<?php
/**
 * This is footer template of Vancouver theme
 *
 * @package Wordpress
 * @since   1.0
 */
?>
<!-- END CONTAINER -->
</div>
<div class="clear-footer"></div>

<?php if ( get_theme_mod( 'penci_sidebar_sticky' ) ): echo '<div id="penci-end-sidebar-sticky"></div>'; endif; ?>

<?php if ( ! get_theme_mod( 'penci_footer_widget_area' ) && ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) ) : ?>
	<div id="widget-area">
	<div class="pattern-grey"></div>
	<div class="container">
	<div class="footer-widget-wrapper">
	<?php /* Widgetised Area */
if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer-1' ) ) ?>
	</div>
	<div class="footer-widget-wrapper">
<?php /* Widgetised Area */
if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer-2' ) ) ?>
	</div>
	<div class="footer-widget-wrapper last">
<?php /* Widgetised Area */
	if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer-3' ) ) ?>
		</div>
		</div>
		</div>
	<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-instagram' ) ): ?>
	<div class="footer-instagram">
		<?php dynamic_sidebar( 'footer-instagram' ); ?>
	</div>
<?php endif; ?>

<footer id="footer-copyright">
	<div class="container">
		<?php if ( get_theme_mod( 'penci_footer_copyright' ) ) : ?>
			<?php echo wp_kses( get_theme_mod( 'penci_footer_copyright' ), penci_allow_html() ); ?>
		<?php endif; ?>
		<?php if ( ! get_theme_mod( 'penci_go_to_top' ) ) : ?>
			<a href="#" class="go-to-top"><i class="fa fa-angle-double-up"></i></a>
		<?php endif; ?>
	</div>
</footer>

<div id="fb-root"></div>
<script>(function ( d, s, id ) {
		var js, fjs = d.getElementsByTagName( s )[0];
		if ( d.getElementById( id ) ) return;
		js = d.createElement( s );
		js.id = id;
		js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
		fjs.parentNode.insertBefore( js, fjs );
	}( document, 'script', 'facebook-jssdk' ));
</script>
<?php wp_footer(); ?>
</body>
</html>