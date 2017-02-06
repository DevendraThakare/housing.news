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
			<div class="footer"><div class="housing-line">
				<div class="footer-logo-coloured"></div>
				<div class="desc">
				© 2012-16 Locon Solutions Pvt. Ltd.
				</div>
				</div><div class="links-row"><div class="about-company-footer links-detail">
				<div class="footer-header">
				<span class="footer-text">Company</span>
				</div>
				<ul class="half links">
				<li>
				<a class="link" data-bypass="true" href="/careers" target="_blank" title="Apply for a brighter career on Housing.com">Careers</a>
				</li>
				<li>
				<a class="link" data-bypass="true" href="/about" target="_blank" title="Know more about Housing.com">About Us</a>
				</li>
				<li>
				<a class="link" data-bypass="true" href="/testimonials" target="_blank" title="See our testimonial">Testimonial</a>
				</li>
				<li>
				<a class="link" data-bypass="true" href="/media_kit.zip" rel="nofollow" title="Get assests of logo, images of Housing.com">Media Kit</a>
				</li>
				</ul>
				<ul class="half links">
				<li>
				<a class="link" data-bypass="true" href="/terms-of-use" target="_blank" title="Read our terms and conditions">Terms</a>
				</li>
				<li>
				<a class="link" data-bypass="true" href="/privacy-policy" target="_blank" title="Read about our privacy policy">Privacy Policy</a>
				</li>
				<li>
				<a class="link" data-bypass="true" href="/contact-us" target="_blank" title="Contact Info">Contact Us</a>
				</li>
				</ul>
				</div><div class="column2 explore-links links-detail">
				<div class="footer-header">
				<span class="footer-text">Explore</span>
				</div>
				<ul class="links">
				<li>
				<a class="link" href="https://housing.com/" data-bypass="true" target="_blank">Housing.com</a>
				</li>
				<li>
				<a class="link" href="/sitemap" target="_blank" data-bypass="true">Sitemap</a>
				</li>
				</ul>
				</div><div class="links-detail social">
				<div class="footer-header">
				<span class="footer-text">Follow</span>
				</div>
				<ul class="half links">
				<li>
				<a class="link" data-bypass="true" href="http://www.facebook.com/housing.co.in" target="_blank" rel="nofollow">Facebook</a>
				</li>
				<li>
				<a class="link" data-bypass="true" href="https://twitter.com/housing" target="_blank" rel="nofollow">Twitter</a>
				</li>
				<li>
				<a class="link" data-bypass="true" href="http://www.linkedin.com/company/2741657" target="_blank" rel="nofollow">LinkedIn</a>
				</li>
				<li>
				<a class="link" data-bypass="true" href="https://plus.google.com/+Housing-com" rel="publisher" target="_blank">Google+</a>
				</li>
				</ul>
				<ul class="half links">
				<li>
				<a class="link" data-bypass="true" href="https://instagram.com/housingindia/" rel="publisher" target="_blank">Instagram</a>
				</li>
				<li>
				<a class="link" data-bypass="true" href="https://www.pinterest.com/housingindia/" rel="publisher" target="_blank">Pinterest</a>
				</li>
				<li>
				<a class="link" data-bypass="true" href="https://www.youtube.com/user/HousingY" rel="publisher" target="_blank">Youtube</a>
				</li>
				</ul>
				</div></div></div>
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<script>
function objpos(node){
  var curtop = 0;
  var curtopscroll = 0;
  count = 0;
  if (node.offsetParent) {
      do {
          count += 1
          if(count>10) return
          curtop += node.offsetTop;
          curtopscroll += node.offsetParent ? node.offsetParent.scrollTop : 0;
      } while (node = node.offsetParent);
  }
  return curtop - curtopscroll
}
var header = document.getElementsByClassName("entry-header");
var footer = document.getElementsByClassName("related_post_title");
var scrollstart = false;
var scrolltillend = false;
function gatrack(){
try{
if(header.length==1 && footer.length==1){
   var hpos = objpos(header[0]);
   var fpos = objpos(footer[0]);
   if(hpos < 0 && !scrollstart){
      scrollstart = true
      ga('send', {
  	hitType: 'event',
	eventCategory: 'scroll',
  	eventAction: 'pagestart',
  	eventLabel: ''
      });
   }
   if(fpos < window.innerHeight && !scrolltillend){
      scrolltillend = true
      ga('send', {
  	hitType: 'event',
	eventCategory: 'scroll',
  	eventAction: 'pageend',
  	eventLabel: ''
      });
   }
}
}catch(e){}
setTimeout(gatrack,1000)
}
gatrack()
</script>

<?php wp_footer(); ?>
</body>
</html>
