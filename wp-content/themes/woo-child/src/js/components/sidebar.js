const gpsenSidebarFunctions = (jQuery) => {

	jQuery(document).ready(function($) {
		///////////////////////////////////Widget Areas
		//// This is for the widget sidebar movement
		var $sidebar   = $("#sidebar"),
			$window    = $(window),
			offset     = $sidebar.offset(),
			topPadding = 15,
			endScrollMargin = $sidebar.offset().top  + 800,
			siteHref = window.location.href;


		if ($window.width() >= 1100) {
			$window.scroll(function() {
				if ($window.scrollTop() > offset.top) {
					$sidebar.stop().animate({
						marginTop: $window.scrollTop() - offset.top + topPadding
					});

				} else {
					$sidebar.stop().animate({
						marginTop: 0
					});
				} // end if
				/// my if statement that makes the #sidebar animate to stopped offset().top
				if ($window.scrollTop() >= endScrollMargin) {
					$sidebar.stop().animate({
						marginBottom: 0
					});
				} // end if
				// This stops the animation from moving when the sidebar links are 'clicked'
				if ($sidebar.hasClass('contactSidebarClicked')) {
					$sidebar.stop().animate();
				} // end if
				// This stops the animation from moving when the sidebar links are 'clicked'
				if ($sidebar.hasClass('getInvolvedClicked')) {
					$sidebar.stop().animate();
				} // end if
				// This stops the animation from moving when the sidebar links are 'clicked'
				if ($sidebar.hasClass('newsletterClicked')) {
					$sidebar.stop().animate();
				} // end if

				/// Turning off animation of side bar on load if page ===
				if (siteHref === 'http://gpsen.org/member-partner-registration/') {
					$sidebar.stop().animate();
				}
				if (siteHref === 'http://gpsen.org/partners/') {
					$sidebar.stop().animate();
				} // end if
				if (siteHref === 'http://gpsen.org/donations/donate-to-greater-portland-sustainability-education-network/') {
					$sidebar.stop().animate();
				} // end if
				if (siteHref === 'http://gpsen.org/mailchimp-sign-up/') {
					$sidebar.stop().animate();
				} // end if
				if (siteHref === 'http://gpsen.org/newsletter-resources/') {
					$sidebar.stop().animate();
				} // end if
				if (siteHref === 'http://gpsen.org/contact/') {
					$sidebar.stop().animate();
				} // end if
				if (siteHref === 'http://gpsen.org/the-meaning-of-our-logo/') {
					$sidebar.stop().animate();
				} // end if
				if (siteHref === 'http://gpsen.org/resources/') {
					$sidebar.stop().animate();
				} // end if
			}); // end $window.scroll function
		} else {
			$sidebar.animate({
				marginTop: 0
			});
		}
		// This check to see if any one resize there window if they are under 980px then stop animation
		var resizeTimer;
		$(window).on('resize', function(e) {
			//console.log($window.width());

			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(function() {

				if($window.width() < 1099) {
					$sidebar.stop().animate({
						marginTop: 0
					});
				}
				// THis will run larger screen animation same stament as above
				if ($window.width() >= 1100 ) {
					$window.scroll(function() {

						if ($window.scrollTop() > offset.top) {
							$sidebar.stop().animate({
								marginTop: $window.scrollTop() - offset.top + topPadding
							});


						} else {
							$sidebar.stop().animate({
								marginTop: 0
							});
						}
						/// my if statement that makes the #sidebar animate to stopped offset().top
						if($window.scrollTop() >= endScrollMargin) {
							$sidebar.stop().animate({
								marginBottom: 0
							});
						} // End if
						// This stops the animation from moving when the sidebar links are 'clicked'
						if($sidebar.hasClass('contactSidebarClicked')) {
							$sidebar.stop().animate();
						} // end if
						// This stops the animation from moving when the sidebar links are 'clicked'
						if ($sidebar.hasClass('getInvolvedClicked')) {
							$sidebar.stop().animate();
						} // end if
						// This stops the animation from moving when the sidebar links are 'clicked'
						if ($sidebar.hasClass('newsletterClicked')) {
							$sidebar.stop().animate();
						} // end if

						/// Turning off animation of side bar on load if page ===
						if (siteHref === 'http://gpsen.org/member-partner-registration/') {
							$sidebar.stop().animate();
						}
						if (siteHref === 'http://gpsen.org/partners/') {
							$sidebar.stop().animate();
						} // end if
						if (siteHref === 'http://gpsen.org/donations/donate-to-greater-portland-sustainability-education-network/') {
							$sidebar.stop().animate();
						} // end if
						if (siteHref === 'http://gpsen.org/mailchimp-sign-up/') {
							$sidebar.stop().animate();
						} // end if
						if (siteHref === 'http://gpsen.org/newsletter-resources/') {
							$sidebar.stop().animate();
						} // end if
						if (siteHref === 'http://gpsen.org/contact/') {
							$sidebar.stop().animate();
						} // end if
						if (siteHref === 'http://gpsen.org/the-meaning-of-our-logo/') {
							$sidebar.stop().animate();
						} // end if
						if (siteHref === 'http://gpsen.org/resources/') {
							$sidebar.stop().animate();
						} // end if
					}); // end $window.scroll function
				} else {
					$sidebar.stop().animate({
						marginTop: 0
					});
				} // end else
			}, 10); // end resizeTimer
		}); // End resize
	});
};

module.exports = gpsenSidebarFunctions(jQuery);
