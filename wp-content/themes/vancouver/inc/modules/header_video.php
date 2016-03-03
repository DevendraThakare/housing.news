<?php
/**
 * Header video background
 * When header video background is enable, it will disable pattern on header
 *
 * @since 2.3
 */

$video_url = get_theme_mod( 'penci_featured_video_url' );
$start_time = get_theme_mod( 'penci_featured_video_start' );
if( ! is_numeric( $start_time ) || ! $start_time ) { $start_time = '0'; }

$mute = 'true';
if ( get_theme_mod( 'penci_featured_video_audio' ) ): $mute = 'false'; endif;

$video_property = "{videoURL:'". esc_url( $video_url ) ."',containment:'self', showControls:false, autoPlay:true, loop:true, mute:". esc_attr( $mute ) .", startAt:". absint( $start_time ) .", opacity:1, addRaster:true, quality:'default'}";
?>
<div class="penci-header-video">
	<div class="header-video-background<?php if( get_theme_mod( 'penci_featured_video_img_mobile' ) ): ?> has-bg-image<?php endif; ?>" id="penci-header-video-bg" data-property="<?php echo esc_attr( $video_property ); ?>">
		<?php if( get_theme_mod( 'penci_featured_video_img_mobile' ) ): ?>
			<div class="penci-video-overlay-background" style="background-image: url('<?php echo get_theme_mod( 'penci_featured_video_img_mobile' ); ?>');"></div>
		<?php endif; ?>
	</div>
</div>