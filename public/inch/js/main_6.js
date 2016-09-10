/*
AUTHOR   : SimplePixel
URL      : http://themeforest.net/user/SimplePixel
TEMPLATE : Inch - Creative Coming Soon Template
VERSION  : 1.0

TABLE OF CONTENTS
1.0 TEMPLATE SETTINGS
2.0 FUNCTIONS
3.0 window.resize FUNCTION
4.0 window.load FUNCTION
	4.1 activate word rotator plugin
5.0 window.scroll FUNCTION
6.0 document.ready FUNCTION
	6.1 activate slideshow background using backstretch
	6.2 activate slideshow background with kenburns effect
	6.3 activate single image background + firefly effect
	6.4 activate single image background + star effect (constellation)
	6.5 activate single image background + parallax effect
	6.6 activate YouTube video background
	6.7 activate self hosted video background
	6.8 action when navigation link clicked
	6.9 keyboard arrow (left and right) pressed
	6.10 action when show menu button (on extra small devices) clicked
	6.11 action when close menu button (on extra small devices) clicked
	6.12 activate magnific popup image
	6.13 activate countdown
	6.14 init carousel for services
	6.15 init carousel for portfolio
	6.16 check subscribe form filled or not
	6.17 activate twitter feed
	6.18 init google map
	6.19 show map section when locate us button clicked
	6.20 hide map section when map-close-button clicked
	6.21 validate and submit subscribe form
	6.22 validate and submit contact us form
*/

(function($) {
	"use strict";
	
	/*-- ================================ --
		1.0 TEMPLATE SETTINGS
	/*-- ================================ --*/
	$.bg_type = 6;
	/*
	* 1. Backstretch slideshow background
	* 2. Slideshow background with Kenburns Effect
	* 3. Single image background + firefly effect
	* 4. Single image background + star effect (constellation)
	* 5. Single image background + parallax effect
	* 6. YouTube video background
	* 7. Self hosted video background
	*/
	$.launch_date = [1,8,2015];						//-- launch date [d,m,yyyy], for example 1 August 2015 : [1,8,2015]
	$.bg_urls = ["http://placehold.it/2560x1600"];		//-- this is for fallback image (in small devices).
	$.youtube_url = "2e52RcPAlwU";					//-- just the last words after https://www.youtube.com/watch?v=
	$.self_host_video_path = "";					//-- self hosted video path
	$.self_host_video_filename = "";				//-- self hosted video filename "WITHOUT .MP4 EXTENSION"
	$.latitude_longitude = [[40.67,-73.940]];		//-- google map latitude and longitude, $.latitude_longitude = [[latitude,longitude]];
	$.map_marker_url = "img/marker.png";
	$.map_marker_info = '<h4 class="marker-info-title">Main Office</h4><p class="marker-info-desc">Open at 09:00 - 15:00<br>Monday till Saturday</p>';
	
	
	/*-- ================================ --
		2.0 FUNCTIONS
	/*-- ================================ --*/
	function ShowHomeContents(){
		$('.menu-container, .logo, .countdown-container').removeClass('entrance').addClass('fadeInDown');
		$('.home-title, .wordsrotator-container').removeClass('entrance').addClass('fadeInUp');
		$('.keyboard-guide').removeClass('entrance').addClass('fadeInUpCenterX');
		$('.social-media-container a').each(function(index, element) {
            $(this).removeClass('entrance').addClass('bounceIn');
        });
	}
	function AdjustSection(){
		//-- this function will be executed only on small devices
		if($(window).width() <= 1023){
			//-- set countdown position
			$('.countdown-container').insertAfter('.wordsrotator-container');
			$('.countdown-container .countdown-title').insertAfter('.countdown-container .countdown');
			
			//-- set map position
			$('#map').insertAfter('div.contact-details');
			
			//-- set page-container height
			$('.page-container').css({
				height:($('section.is-visible').height()+200)
			});
		}
		
		//-- set contact details text-container width
		var detail_cont_width = $('.contact-details .detail').width();
		$('.contact-details .detail .text-container').css({
			width:(detail_cont_width-65.5)
		});
	}
	
	/*-- ================================ --
		3.0 window.resize FUNCTION
	/*-- ================================ --*/
	$(window).resize(function(e) {
		//-- revert to default when tablet portrait rotate to lanscape
		if($(window).width() > 1023){
			//-- set countdown position
			$('.countdown-container').insertBefore('nav.menu');
			$('.countdown-container .countdown-title').insertBefore('.countdown-container .countdown');
			
			//-- set map position
			$('#map').insertBefore('.map-close-button');
			
			//-- set page-container height
			$('.page-container').css({
				height:'100%'
			});
			
			//-- set contact details text-container width
			var detail_cont_width = $('.contact-details .detail').width();
			$('.contact-details .detail .text-container').css({
				width:(detail_cont_width-65.5)
			});
		}
		else{
			//-- adjust section
			AdjustSection();
		}
    });
	//-- end window.resize function
	
	/*-- ================================ --
		4.0 window.load FUNCTION
	/*-- ================================ --*/
	$(window).load(function(e) {
		//-- hide preloader
		$('.preloader').addClass('animated fadeOut');
		
		//-- show home content
		var show_home = setTimeout(function(){
			ShowHomeContents();
			
			//-- hide preloader
			$('.preloader').hide();
			
			//-- 4.1 activate word rotator plugin
			$("#wordsrotator").wordsrotator({
    			autoLoop: true,                  										//-- auto rotate words
    			randomize: false,                										//-- show random entries from the words array
    			stopOnHover: false,              										//-- stop animation on hover
    			changeOnClick: false,            										//-- force animation run on click
    			animationIn: "fadeInDown",          									//-- css class for entrace animation
    			animationOut: "fadeOutUp",        										//-- css class for exit animation
    			speed: 3000,               		 										//-- delay in milliseconds between two words
    			words: ['we are creative agency', 'we create awesome product']  		//-- Array of words, it may contain HTML values
			});
			
			clearTimeout(this);
		},1500);
    });
	//-- end window.load function
	
	/*-- ================================ --
		5.0 window.scroll FUNCTION
	/*-- ================================ --*/
	$(window).scroll(function(e) {
		
    });
	//-- end window.scroll function
	
	
	/*-- ================================ --
		6.0 document.ready FUNCTION
	/*-- ================================ --*/
	$(document).ready(function(e) {
		//-- adjust section
		AdjustSection();	
						
		//-- 6.1 activate slideshow background using backstretch
		if($.bg_type == 1){
			$(".bg-container").backstretch($.bg_urls,{
				duration:6000,
				fade:'normal'
			});
		}
		//-- 6.2 activate slideshow background with kenburns effect
		else if($.bg_type == 2){
			var i=0;
			for(i;i<$.bg_urls.length;i++){
				var html_code = '<img src="'+$.bg_urls[i]+'" alt="bg-'+i+'" />';
				
				//-- append image to bg-container
				$('.bg-container').append(html_code);	
			}
			
			//-- activate kenburns
			$(".bg-container").kenburnsy({
        		fullscreen: true
        	});
		}
		//-- 6.3 activate single image background + firefly effect
		else if($.bg_type == 3){
			$(".bg-container").backstretch([
				$.bg_urls
			],{
				duration:6000,
				fade:'normal'
			});
			
			$.firefly({
				color: '#9c9c9c',	//-- firefly color
				minPixel: 1,					
				maxPixel: 3,
				total : 50,
				on: '.bg-container'
			});
		}
		//-- 6.4 activate single image background + star effect (constellation)
		else if($.bg_type == 4){
			$(".bg-container").backstretch([
				$.bg_urls
			],{
				duration:6000,
				fade:'normal'
			});
			
			var canvas = '<canvas id="bg-canvas"> </canvas>';
			$('body').prepend(canvas);
			
			//-- init star effect
			if($(window).width() < 700){
					$('canvas').constellation({
					distance: 40
				});
			}
			else{
				$('canvas').constellation();
			}
		}
		//-- 6.5 activate single image background + parallax effect
		else if($.bg_type == 5){	
			//-- add parallax image
			var parallax_img = '<div class="parallax"> </div>';
			$('.bg-container').append(parallax_img);
			
			//-- set background
			$('.bg-container .parallax').css({
				'background-image':'url('+$.bg_urls+')',
				backgroundRepeat:'no-repeat',
				backgroundSize:'cover'
			});
			
			//-- activate plugin
			$('.bg-container .parallax').attr('data-parallaxify-background-range','60');
			$('.parallax').parallaxify({
				motionType: 'performance',
        		mouseMotionType: 'performance'
			});
		}
		//-- 6.6 activate YouTube video background
		else if($.bg_type == 6){
			//-- put the video to the body
			var vid_elem = '<a id="video" class="player" data-property="{videoURL:\''+$.youtube_url+'\',containment:\'.bg-container\', showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, addRaster:false, quality:\'large\'}"></a>';
			
			$('body').prepend(vid_elem);
			
			//-- activate plugin
			if($(window).width() >= 1200){
				/*
				* Please note that this player doesn’t work as background for devices due to the restriction policy adopted by all on 
				* managing multimedia files via javascript. It fallsback to the default Youtube player if used as player (not applied to the body).
				*/
				
				$('.player').mb_YTPlayer();
			}
			else{
				$(".bg-container").backstretch([
					$.bg_urls
				],{
					duration:6000,
					fade:'normal'
				});
			}
		}
		//-- 6.7 activate self hosted video background
		else if($.bg_type == 7){
			var videobackground = new $.backgroundVideo($('.bg-container'), {
        		"align": "centerXY",
				"width": 1280,
        		"height": 720,
        		"path": $.self_host_video_path,
        		"filename": $.self_host_video_filename,
        		"types": ["mp4"]
      		});
		}
		
		//-- 6.8 action when navigation link clicked
		$('nav a[class*=nav-]').each(function(index, element) {
            $(this).on('click',function(){
				if(!$(this).hasClass('active')){
					var curr_section = $('nav').find('.active').removeClass('active').attr('class').replace('nav-','');
					var next_section = $(this).attr('class').replace('nav-','');
				
					//-- set active section
					$(this).addClass('active');
				
					//-- hide current section
					$('.'+curr_section+'-section').removeClass('is-visible').addClass('is-hidden-left');
					var hideSection = setTimeout(function(){
						$('.'+curr_section+'-section').removeClass('is-hidden-left').addClass('is-hidden-right');
					
						clearTimeout(this);
					},600);
				
					//-- set bg-container opacity and set social-media-container visibility
					if(next_section == "home"){
						$('.bg-container').removeClass('dark');
						$('.social-media-container-bottom').removeClass('is-visible');
					}
					else{
						$('.bg-container').addClass('dark');
						$('.social-media-container-bottom').addClass('is-visible');
					}
				
					//-- show next section
					$('.'+next_section+'-section').removeClass('is-hidden-right').addClass('is-visible');
				
					//-- adjust section
					AdjustSection();
				
					//-- close menu panel (ON EXTRA SMALL DEVICES)
					$('.menu-container .menu-wrapper').removeClass('is-visible');
				}
			});
        });
		
		//-- 6.9 keyboard arrow (left and right) pressed
		$('body').on('keydown',function(e){
			//-- execute if form is not focused
			if(!$('.subscribe-email, .contact-name, .contact-email, .contact-message').is(':focus')){
				//-- left arrow
				if(e.which == 37){
					//-- find active nav
					var active_nav = $('nav').find('.active').attr('class').replace(' active','');
				
					if(active_nav == "nav-home"){
						$('nav a.nav-contact').trigger('click');
					}
					else if(active_nav == "nav-contact"){
						$('nav a.nav-portfolio').trigger('click');
					}
					else if(active_nav == "nav-portfolio"){
						$('nav a.nav-subscribe').trigger('click');
					}
					else if(active_nav == "nav-subscribe"){
						$('nav a.nav-about').trigger('click');
					}
					else if(active_nav == "nav-about"){
						$('nav a.nav-home').trigger('click');
					}
				}
				//-- right arrow
				else if(e.which == 39){
					//-- find active nav
					var active_nav = $('nav').find('.active').attr('class').replace(' active','');
				
					if(active_nav == "nav-home"){
						$('nav a.nav-about').trigger('click');
					}
					else if(active_nav == "nav-about"){
						$('nav a.nav-subscribe').trigger('click');
					}
					else if(active_nav == "nav-subscribe"){
						$('nav a.nav-portfolio').trigger('click');
					}
					else if(active_nav == "nav-portfolio"){
						$('nav a.nav-contact').trigger('click');
					}
					else if(active_nav == "nav-contact"){
						$('nav a.nav-home').trigger('click');
					}
				}
			}
		});
		
		//-- 6.10 action when show menu button (on extra small devices) clicked
		$('.show-menu').on('click',function(){
			$('.menu-container .menu-wrapper').addClass('is-visible');
		});
		
		//-- 6.11 action when close menu button (on extra small devices) clicked
		$('.close-menu').on('click',function(){
			$('.menu-container .menu-wrapper').removeClass('is-visible');
		});
		
		//-- 6.12 activate magnific popup image
		$('.popup-image').each(function(index, element) {
            $(this).magnificPopup({ 
  				type: 'image',
				closeBtnInside: true,
				removalDelay: 300,
				mainClass: 'mfp-fade'
			});
        });
		
		//-- 6.13 activate countdown
		$('.countdown').countDown({
			targetDate: {
				'day': 		$.launch_date[0],
				'month': 	$.launch_date[1],
				'year': 	$.launch_date[2],
				'hour': 	0,
				'min': 		0,
				'sec': 		0
			},
			omitWeeks: true
		});
		
		//-- 6.14 init carousel for services
		$('.service-container').owlCarousel({
			singleItem:true,
			navigation:false,
			transitionStyle : "goDown"
		});
		
		//-- 6.15 init carousel for portfolio
		$('.portfolio-container').owlCarousel({
			singleItem:true,
			navigation:false,
			transitionStyle : "goDown"
		});
		
		//-- 6.16 check subscribe form filled or not
		$('.subscribe-email').on('focusout',function(){
			if($(this).val() != "" && $(this).val() != " "){
				$(this).addClass('filled');
			}
			else{
				$(this).removeClass('filled');
			}
		});
		
		//-- 6.17 activate twitter feed
		$('.twitter-feed').twittie({
			username:'pixel_simple',
			list:'envato',
            dateFormat: '%b %d, %Y',
            template: '<div class="feed col-lg-12 col-md-12 col-sm-12 col-xs-12"><p class="tweet">{{tweet}}</p><p class="date">{{date}}</p><div class="user-container"> <div class="centering-x"> <div class="twitter-logo"> <i class="fa fa-twitter"></i> </div><div class="name-container"> <p class="name">{{user_name}}</p><p class="username">{{screen_name}}</p></div></div></div></div>',
            count: 10,
            loadingText: 'loading feed . . .'
        },function(){
			//-- init carousel for twitter feed
			var feed_carousel = $('.twitter-feed .owl-carousel');
			feed_carousel.owlCarousel({
				singleItem:true,
				navigation:false,
				pagination:false,
				autoPlay:5000,
				transitionStyle : "goDown"
			});
			
			//-- adjust section
			AdjustSection();
		});
		
		//-- 6.18 init google map
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 12,
			scrollwheel: true,
			navigationControl: true,
			mapTypeControl: false,
			scaleControl: false,
			draggable: true,
			disableDefaultUI: false,
			styles: [{"elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"color":"#f5f5f2"},{"visibility":"on"}]},{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType": "administrative.neighborhood","elementType": "labels","stylers":[{"visibility":"on"},{"color":"#989898"},{"saturation":"-23"},{"weight":"0.01"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","stylers":[{"visibility":"off"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#ffffff"},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"visibility":"simplified"},{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"color":"#ffffff"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.park","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#71c8d4"}]},{"featureType":"landscape","stylers":[{"color":"#e5e8e7"}]},{"featureType":"poi.park","stylers":[{"color":"#8ba129"}]},{"featureType":"road","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.sports_complex","elementType":"geometry","stylers":[{"color":"#c7c7c7"},{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#a0d3d3"}]},{"featureType":"poi.park","stylers":[{"color":"#91b65d"}]},{"featureType":"poi.park","stylers":[{"gamma":1.51}]},{"featureType":"road.local","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"poi.government","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","stylers":[{"visibility":"simplified"}]},{"featureType":"road"},{"featureType":"road"},{},{"featureType":"road.highway"}],
			center: new google.maps.LatLng($.latitude_longitude[0][0],$.latitude_longitude[0][1]),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		var marker = new google.maps.Marker({
      		position: new google.maps.LatLng($.latitude_longitude[0][0],$.latitude_longitude[0][1]),
      		map: map,
      		icon: $.map_marker_url
  		});
		var infowindow = new google.maps.InfoWindow({
      		content: $.map_marker_info
  		});
		google.maps.event.addListener(marker, 'click', function() {
    		infowindow.open(map,marker);
  		});
		//-- end init google map
		
		//-- 6.19 show map section when locate us button clicked
		$('.locate-us').on('click',function(){
			$('.page-container').removeClass('is-visible').addClass('is-hidden');
			$('.page-container-map').removeClass('is-hidden').addClass('is-visible');
		});
		
		//-- 6.20 hide map section when map-close-button clicked
		$('.map-close-button').on('click',function(){
			$('.page-container').removeClass('is-hidden').addClass('is-visible');
			$('.page-container-map').removeClass('is-visible').addClass('is-hidden');
		});
		
		//-- 6.21 validate and submit subscribe form
		$('.subscribe-form').validate({
			rules: {
	        	EMAIL: {
	            	required: true,
	                email: true
	            }
	        },
			messages: {
				EMAIL: {
					required: "Please insert your email address",
					email: "Your email address is not valid"
				}
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('form-error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('form-error');
			},
			errorPlacement: function(error, element) {
    			
 			},
			submitHandler: function(form) {							
				var url_dest = $(form).attr('action');
				var form_data = $(form).serialize();
				var form_method = $(form).attr('method');
			
				//-- show loading
				$('.subscribe-notif').show().append('<label class="loading-subscribe">Please wait</label>');
				$('.loading-subscribe').fadeIn('fast');
			
				$.ajax({
					type: form_method,
	        		url: url_dest,
	        		data: form_data,
	        		cache : false,
	        		dataType : 'json',
	        		contentType: "application/json; charset=utf-8",
	        		error : function(err) { alert("Could not connect to the registration server. Please try again later."); },
	        		success : function(data) {
	            		if(data.result == "success"){
							//-- reset form
							$(form).trigger('reset');
							
							//-- set element to focusout and remove error class
							$('.subscribe-email').focusout();
							$(form).find('.form-error').removeClass('form-error');
					
							//-- hide loading
							$('.loading-subscribe').fadeOut('fast',function(){
								//-- show notif
								$('.subscribe-notif').append('<label class="subscribe-notif-success">Thank you for subscribing us.</label>');
								$('.subscribe-notif-success').fadeIn('fast').delay(5000).fadeOut('fast',function(){
									$(this).remove();
									$('.loading-subscribe').remove();
								});
							});
						}
						else{
							//-- reset form
							$(form).trigger('reset');
					
							//-- hide loading
							$('.loading-subscribe').fadeOut('fast',function(){
								//-- show notif
								$('.subscribe-notif').append('<label class="subscribe-notif-error">Error.</label>');
								$('.subscribe-notif-error').fadeIn('fast').delay(5000).fadeOut('fast',function(){
									$(this).remove();
									$('.loading-subscribe').remove();
								});
							});
						}
	        		}
				});
							
				return false;
			}
		});
		//-- end validate and submit subscribe form
		
		//-- 6.22 validate and submit contact us form
		$('.contact-form').validate({
			rules: {
	        	email: {
	            	required: true,
	                email: true
	            },
				name: {
	            	required: true
	            },
				message: {
	            	required: true
	            }
	        },
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('form-error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('form-error');
			},
			errorPlacement: function(error, element) {
    			
 			},
			submitHandler: function(form) {
				var url_dest = $(form).attr('action');
				var form_data = $(form).serialize();
				
				//-- show loading
				$('.contact-notif').show().append('<label class="loading-contact">Please wait</label>');
				$('.loading-contact').fadeIn('fast');
			
				$.post(url_dest,form_data,function(data){
					var success = data;
					
					if(success){
						//-- reset form
						$(form).trigger('reset');
					
						//-- hide loading
						$('.loading-contact').fadeOut('fast',function(){
							//-- show notif
							$('.contact-notif').append('<label class="contact-notif-success">Thank you for contacting us. We will reply you shortly.</label>');
							$('.contact-notif-success').fadeIn('fast').delay(5000).fadeOut('fast',function(){
								$(this).remove();
								$('.loading-contact').remove();
							});
						});
					}
					else{
						//-- reset form
						$(form).trigger('reset');
						
						//-- hide loading
						$('.loading-contact').fadeOut('fast',function(){
							//-- show notif
							$('.contact-notif').append('<label class="contact-notif-error">Error.</label>');
							$('.contact-notif-error').fadeIn('fast').delay(5000).fadeOut('fast',function(){
								$(this).remove();
								$('.loading-contact').remove();
							});
						});
					}
				});
				
				return false;
			}
		});
		//-- end validate and submit contact us form
    });
	//-- end document.ready function
})(jQuery);