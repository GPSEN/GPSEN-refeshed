/*
	Programmer = Keith Murphy
	File = scripts.js
	date Created = 7-9-2015
	Last Mod =  8-5-2015
*/

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
    // This is for the wideget area for the forms and other get involved links 
	// This shows and hide the links area 
	// $('.getInvolvedContent').css('display', 'none');
	// $('#getInvolvedWidget h3').on('click', function() {
	//
	// 	if ($('.getInvolvedWidgetChild:first').is(':hidden')) {
	// 		$('.getInvolvedContent').slideDown('slow');
    	// 	$(this).find('span.floatRight').removeClass('fa-arrow-right').addClass('fa-arrow-down');
    	//
    	// 	$sidebar.addClass('getInvolvedClicked');
  	// 	} else {
    	// 	$('.getInvolvedContent').slideUp('slow');
    	// 	$(this).find('span.floatRight').removeClass('fa-arrow-down').addClass('fa-arrow-right');
    	// 	$sidebar.removeClass('getInvolvedClicked');
  	// 	}
	// });
	/// This is going to show the sign up for newsletter green button 
	$('.newsletterContent').css('display', 'none');
	$('#newletterWidget h3').on('click', function() {

		if ($('.newsletterContent').is(':hidden')) {
			$(this).find('span.floatRight').removeClass('fa-arrow-right').addClass('fa-arrow-down');
			$('.newsletterContent').slideDown('slow');
    		$sidebar.addClass('newsletterClicked');
  		
  		} else {
  			$(this).find('span.floatRight').removeClass('fa-arrow-down').addClass('fa-arrow-right');
    		$('.newsletterContent').slideUp('slow');
    		$sidebar.removeClass('newsletterClicked');
  		}
	});
	// This is for the footer navagation area and shows and hides the links 
	$('.menu-main-container').css('display', 'none');
	$('#footerNavigation').on('click', function() {
		
		if ($('.menu-main-container ul:first').is(':hidden')) {
    		$('.menu-main-container').slideDown('slow');
  		} else {
    		$('.menu-main-container').slideUp('slow');
  		}
	});
	/// This is for the Sidebar Contact Area 
	$('#contactSidebar .whiteCard').css('display', 'none');
	$('#contactSidebar h3').on('click', function() {
		
		if ($('#contactSidebar .whiteCard img:first').is(':hidden')) {
			$(this).find('span.floatRight').removeClass('fa-arrow-right').addClass('fa-arrow-down');
    		$('#contactSidebar .whiteCard').slideDown('slow');
    		$sidebar.addClass('contactSidebarClicked');
  		} else {
  			$(this).find('span.floatRight').removeClass('fa-arrow-down').addClass('fa-arrow-right');
    		$('#contactSidebar .whiteCard').slideUp('slow');
    		$sidebar.removeClass('contactSidebarClicked');
  		}
	});
	// This is for the RCE UNU picture should only show on homePage 
	var siteHref = window.location.href;
	if(siteHref === 'http://gpsen.org/') {
		$('#RCELogoSidebar').addClass('displayBlock');
	} else {
		$('#RCELogoSidebar').addClass('displayNone');
	}
	
	//////////////////////////////////////////FAQ Page
    // THis is going to animate the fa-plus and fa-minus
    // var $FAQAccordionH3 = $('#FAQAccordion h3');
  	// $('.accordionGreyHeaders').on('click', function() {
  	// 	if($FAQAccordionH3.hasClass('clicked')) {
  	// 		$(this).removeClass('clicked');
  	// 		$(this).find('span.floatRight').removeClass('fa-minus').addClass('fa-plus');
  	// 	} else {
  	// 		$(this).find('span.floatRight').removeClass('fa-plus').addClass('fa-minus');
  	// 		$(this).addClass('clicked');
  	// 	}
    // }); // end 
	// This is for th FAQ page links section which shows and hides the link in each SectionUL
	$('.FAQSectionOneUL, .FAQSectionTwoUL, .FAQSectionThreeUL, .FAQSectionFiveUL').css(
		'display', 'none' 
	);
	$('.FAQSectionOneLinks').on('click', function() {

		if ($('.FAQSectionOneUL').is(':hidden')) {
			$('.FAQSectionOneUL').slideDown('slow');
		} else {
			$('.FAQSectionOneUL').slideUp('slow');
		}
	});
	$('.FAQSectionTwoLinks').on('click', function() {
		if ($('.FAQSectionTwoUL').is(':hidden')) {
			$('.FAQSectionTwoUL').slideDown('slow');
		} else {
			$('.FAQSectionTwoUL').slideUp('slow');
		}
	});
	$('.FAQSectionThreeLinks').on('click', function() {
		if ($('.FAQSectionThreeUL').is(':hidden')) {
			$('.FAQSectionThreeUL').slideDown('slow');
		} else {
			$('.FAQSectionThreeUL').slideUp('slow');
		}
	});
	$('.FAQSectionFiveLinks').on('click', function() {

		if ($('.FAQSectionFiveUL').is(':hidden')) {
			$('.FAQSectionFiveUL').slideDown('slow');
		} else {
			$('.FAQSectionFiveUL').slideUp('slow');
		}
	});

	// This is going to be the class that add accordion to live
	function activateAccordion() {
		$('.accordion').accordion({
			collapsible: true,
			heightStyle: "content",
			active: false
		});
		//////////////////This is for the newsPage
		$('#newsAccordion').accordion({
			active: false,
			collapsible: true,
			heightStyle: "content"
		});
		//////////////////////////////////////#governancePage
		$('#governanceAccordion').accordion({
			collapsible: true,
			heightStyle: "content",
			active: false
		}); // end governanceAccordion
	}
	activateAccordion();
	function addArrowsAccordion() {
		var $accordionH3 = $('.accordion .accordionHeadersGrey');
		if (siteHref != 'http://gpsen.org/resources/') {
			$('<span class="fa fa-chevron-down floatRight"></span>').appendTo($accordionH3);
		} else if (siteHref === 'http://gpsen.org/resources/') {
			$('<span class="fa fa-chevron-down floatRight"></span>').appendTo($accordionH3);
		}
	}
	addArrowsAccordion();

	// var activeAccordion = $(this).accordion('option', 'active');
	// activeAccordion.("option", "collapsible", true);
	var $accordionH3 = $('.accordion > h3');
	$accordionH3.on('click', function() {
            /// THis is going to animate the span arrow of the h3's
            if($accordionH3.hasClass('ui-accordion-content-active')) {
                $(this).find('span.floatRight').stop().animate({  borderSpacing: 0 }, {
                    step: function(now) {
                        $(this).css('-webkit-transform','rotate('+now+'deg)');
                        $(this).css('-moz-transform','rotate('+now+'deg)');
                        $(this).css('transform','rotate('+now+'deg)');
                    },
                    duration:'fast'
                },'linear');
                $accordionH3.removeClass('ui-accordion-content-active');
            } else {
                $(this).find('span.floatRight').stop().animate({  borderSpacing: 180 }, {
                    step: function(now) {
                        $(this).css('-webkit-transform','rotate('+now+'deg)');
                        $(this).css('-moz-transform','rotate('+now+'deg)');
                        $(this).css('transform','rotate('+now+'deg)');
                    },
                    duration:'fast'
                },'linear');
                $accordionH3.addClass('ui-accordion-content-active');
            }
	}); // end $accordionH2

	// Check to see if client is on the partners page
    if (siteHref === 'http://gpsen.org/partners/') {
        // GIS Student Dyan Marcus Google Map last edited by nomad on 7-14-2016
        var map;
        var layer_0;
        var layer_1;
        function initializeMap() {
            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: new google.maps.LatLng(45.41336442086554, -122.64342000585941),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            layer_0 = new google.maps.FusionTablesLayer({
                query: {
                    select: "col2",
                    from: "1l4O3nrOYzUbPCrctBcpdKEU1ZQ2BYfrJnp1hdcXo",
                    where: " col5 = 'Current'"
                },
                map: map,
                styleId: 5,
                templateId: 7
            });
            layer_1 = new google.maps.FusionTablesLayer({
                query: {
                    select: "col2",
                    from: "1WKFd0mkeEtjs9_hsknk24alf3LMBU17NtGdSQOfL"
                },
                map: map,
                styleId: 2,
                templateId: 2
            });
        }
        google.maps.event.addDomListener(window, 'load', initializeMap);
    }


	/// Form pages
	///Mail Chimp Form
	// THis is going to be for the confirmation message a user submits Partner form as individual
	//var $confirmationMessage = $('.gform_confirmation_message_5');
	//var $message = '<h1>' + $confirmationMessage.html() + '</h1>';
	//var $confirmationArea = $('.confirmationArea');
	//$confirmationArea.append($message);
}); //end ready

