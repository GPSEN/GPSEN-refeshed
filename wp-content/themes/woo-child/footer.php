<?php

/**

 * Footer Template

 *

 * Here we setup all logic and XHTML that is required for the footer section of all screens.

 *

 * @package WooFramework

 * @subpackage Template

 */

global $woo_options;

woo_footer_top();
woo_footer_before();

?>

	<footer id="footer" class="col-full">
		<?php woo_footer_inside(); ?>
		
		<div id="footerAboutUs" class="col-left">
			<!--<?php woo_footer_left(); ?>---changed By nomad 8_2_2015-->
			<h3 class="blueHeaders">GPSEN Facebook Feed</h3>
			<div class="whiteCard">
				<div class="fb-page" data-href="https://www.facebook.com/RCE.GreaterPortland/" data-tabs="timeline"
                    data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/RCE.GreaterPortland/">
                        <a href="https://www.facebook.com/RCE.GreaterPortland/">Greater Portland Sustainability Education Network - GPSEN</a>
                    </blockquote>
                    </div>
				</div>
			</div>
		</div>

		<div class="col-left" id="footerNav">
			<h3 class="blueHeaders">Quick Links</h3>
			<div class="footerSiteMapDiv">
				<?php dynamic_sidebar( 'footer_nav' ); ?>
				<h3 class="liteBlueButton"><a href="http://gpsen.org/site-map/">Site Map</a></h3>
			</div>
		</div>

		<div id="footerContact" class="col-right">
			<!--<?php woo_footer_right(); ?>--Removed By Nomad 8_2_2015-->
			<h3 class="blueHeaders">Contact Us</h3>
			<div class="whiteCard">
				<img src="http://gpsen.org/wp-content/uploads/2015/07/logoSmall.jpg" alt="Greater Portland Sustainability Network Logo with Trees, Mount Hood, River, and Bridge." class="imgCenter">
				<div class="contactInfomation">
				  <h5>Email:</h5>
				  <p>Contact@gpsen.org</p>
				  <h5>GPSEN Address:</h5>
				  <p>GPSEN c/o Kim Smith</p>
				  <p>PCC Sylvania SS 201</p>
				  <p>12000 SW 49th Ave.</p>
				  <p>Portland, OR 97219</p>
				</div>
				  <div class="footerSocialMediaLogin">
					<ul>
				    	<li><a href="https://twitter.com/gpsenews" target="_blank" class="twitterIcon"></a></li>
				    	<li><a href="https://www.facebook.com/RCE.GreaterPortland" target="_blank" class="facebookIcon"></a></li>
				    	
				    	<li><a href="https://www.linkedin.com/company/greater-portland-sustainability-education-network" target="_blank" class="linkedInIcon"></a></li>
				    	<li><a href="https://www.youtube.com/channel/UChB7TwwnSa6brrrw-xYKeSA" target="_blank" class="youTubeIcon"></a></li>
					</ul>
				</div>
                            
			</div>
		</div>
	</footer>

	<?php woo_footer_after(); ?>


	</div><!-- /#inner-wrapper -->
</div><!-- /#wrapper -->

<div class="fix"></div><!--/.fix-->

<?php wp_footer(); ?>

<?php woo_foot(); ?>

</body>

</html>