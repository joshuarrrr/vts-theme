<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vtstheme
 */

?>

	</div><!-- #content -->
	
	<!-- <?php if ( ! is_single() ) : ?>
	<?php get_search_form(); ?>
	<?php endif; ?> -->

	<?php if ( ! is_home() && ! is_front_page() ) : ?>
	<?php related_posts(); ?>
	<?php endif; ?>

	<footer>
		<div class="get-started">
			<h1>Find out why the top Landlords and Brokers in the world choose VTS to drive performance.</h1>
			<div class="filled-button get-started-button" id="get-started-footer">Get Started</div>
		</div>
		<div class="footer">
			<a class="vertical-logo" href="/">Data-Driven Leasing™</a>

			<div class="footer-site-links">
				<a href="/team">Team</a>
				<a href="http://grnh.se/bsl5q4" target="_blank">Careers</a>
				<a href="/press">Press</a>
				<a href="/contact">Contact</a>
				<a href="/testimonials">Testimonials</a>
				<a href="http://blog.vts.com" target="_blank">Blog</a>
				<a href="http://building.vts.com/" target="_blank">Engineering Blog</a>
			</div>
			<div class="footer-support-links">
				<p>Support &amp; General Questions</p>
				<a href="mailto:info@vts.com">info@vts.com</a>
			</div>
			<div class="footer-download-app-img-container">
				<a class="footer-download-app-img" href="https://goo.gl/rsEhHX" target="_blank">
					<img alt="Download VTS for ios" src="https://vts-herokuapp-com.global.ssl.fastly.net/assets/public-pages/homepage-bttn-footer-200-apple-cdbcb04bf8aaa8f9ee99ec36d5dde952.png">
				</a>
				<a class="footer-download-app-img" href="https://goo.gl/KTK1MT" target="_blank">
					<img alt="Download VTS for Android" src="https://vts-herokuapp-com.global.ssl.fastly.net/assets/public-pages/homepage-bttn-footer-200-android-10c36bfa892a6f8f65658d99aaa878c0.png">
				</a>
			</div>
			<div class="footer-social-media-links">
				<a href="https://twitter.com/viewthespace" id="vts-twitter" target="_blank">
					<div class="link-image footer-twitter"></div>
				</a>
				<a href="https://www.linkedin.com/company/view-the-space" id="vts-linkedin" target="_blank">
					<div class="link-image footer-linkedin"></div>
				</a>
				<a href="http://instagram.com/viewthespace/" id="vts-instagram" target="_blank">
					<div class="link-image footer-instagram"></div>
				</a>
				<a href="http://vimeo.com/viewthespace" id="vts-vimeo" target="_blank">
					<div class="link-image footer-vimeo"></div>
				</a>
			</div>
		</div>	

		<div class="copyright-and-legal">
		<p class="copyright">© View The Space. 2012–2015. All Rights Reserved. The Standard in LeaseTech™.</p>
		<p class="legal">
			<a href="/terms">Terms and Conditions</a> | 
			<a href="/privacy">Privacy Policy</a>
		</p>
		</div>
	</footer>
</div><!-- #page -->

<!-- <script src="//app-sj05.marketo.com/js/forms2/js/forms2.min.js"></script> -->


<?php wp_footer(); ?>

</body>
</html>
