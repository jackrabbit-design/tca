/* ========================================================================= */
/* BE SURE TO COMMENT CODE/IDENTIFY PER PLUGIN CALL */
/* ========================================================================= */
jQuery(function($) { /*Video Background*/
	chnageEvent();
	toInfinityScrollAndBeyond();
	_teamPage();
	//Gallery Mix Up
	window.lazySizesConfig = window.lazySizesConfig || {};
	window.lazySizesConfig.expand = 9;
	$('#galleryContainer').mixItUp({});
	//Accordian.
	$('.mobile-accoridan button').on('click', function() {
		$('#venue-search').toggleClass('opened');
		$(this).toggleClass('opened');
		if ($(this).hasClass('opened')) {
			$(this).html('Close Filter');
		} else {
			$(this).html('Open Filter');
		}
	});
	
	$(document).ready(function() {
		var nm = Math.ceil($("html").scrollTop());
		var nw = Math.ceil($("body").scrollTop());
		var n;
		if (nm > nw) {
			n = nm;
		} else {
			n = nw;
		} //USE n FOR CALCULATIONS
		$(".video-wrapper > h2").css("padding-top", '200p' + Math.ceil(n / 3) + "px");
		$(".tabs-select ul li a").click(function() {
			if ($(this).hasClass('current')) {} else {
				$(".tabs-select li a").removeClass("current");
				$(this).addClass("current");
				//var portfolioItems = $('.tabs-select ul li a.current').text();
				var activeTab = $(this).attr("href"); //Find the rel attribute value to identify the active tab + content
				$(this).parent().parent('ul').removeClass('open');
				//$('.tabs-select > span').html(portfolioItems);
				$(".tab-content").hide(); //Hide all tab content
				$(activeTab).fadeIn(); //Fade in the active content
			}
			return false;
		});
		$('a[href="' + $(location).attr('hash') + '"]').trigger('click'); /*Search Icon*/
		$('.search-icon').click(function() {
			var search = $('#search-desktop');
			search.toggleClass('open');
			search.children('input').focus();
		});
		$('.home-slider').slick({
			dots: true,
			arrows: false,
			appendArrows: '.slide-nav',
			prevArrow: '<div class="button-border previous hm white"><button type="button" class="slick-prev-home button white"><span>&#9664;</span> Previous</button></div>',
			nextArrow: '<div class="button-border white next"><button type="button" class="slick-next-home button white">Next <span>&#9654;</span></button></div>',
		});
		$('.button-border.previous.hm').after('<div class="button-border white"><a href="/gallery/" class="button white">View All</a></div>');
		//Functions at bottom
		toInfinityScrollAndBeyond();
		bannerHeight();
		_colorboxHeight();
		
	});
	$(document).scroll(function() {
		var nm = Math.ceil($("html").scrollTop());
		var nw = Math.ceil($("body").scrollTop());
		var n;
		var vn = (nm > nw ? nm : nw);
		if (vn > 100) {
			$('.contact-popup').addClass('scrolled');
		} else {
			$('.contact-popup').removeClass('scrolled');
		}
		if (nm > nw) {
			n = nm;
		} else {
			n = nw;
		} //USE n FOR CALCULATIONS
		if ($(window).width() < 768) {} else {
			$(".video-wrapper").css("background-position", "50%" + Math.ceil(n / 3) + "px");
		};
		var value = $(this).scrollTop();
		var heightOfHero = $('.video-wrapper').height();
		if (!heightOfHero) {
			heightOfHero = $('.pg-banner').height();
		}
		if (value < heightOfHero - 200) {
			$("header").removeClass('small', 500);
		} else {
			$("header").addClass('small', 500);
		}
	});
	$(window).resize(function() {
		function bannerHeight() {
			var wh = $(window).height();
			if (wh) {
				$('.video-wrapper').height(wh);
				//$('.hero > .hero-slide').height(wh );
			}
		}
		bannerHeight();
		_colorboxHeight();
		if ($(window).width() > 768) {
			$('nav.mobile').removeAttr('style');
			$('#toggle_menu_btn').removeClass('active');
		}
	});
	$('.chosen-select').chosen({
		"disable_search": true,
		width: '90%'
	});
	$('#input_1_10').chosen({
		"disable_search": true,
		width: '90%'
	});
	$('#input_3_10').chosen({
		"disable_search": true,
		width: '90%'
	});
	$('#input_3_24_4').chosen({
		"disable_search": true,
		width: '90%'
	});
	$('#input_1_6_1').chosen({
		"disable_search": true,
		width: '90%'
	});
	$('#input_1_6_2').chosen({
		"disable_search": true,
		width: '90%'
	});
	$('#input_1_6_3').chosen({
		"disable_search": true,
		width: '90%'
	});
	$('.gfield_date_dropdown_month select, .gfield_date_dropdown_day select, .gfield_date_dropdown_year select').chosen({
		"disable_search": true,
		width: '90%'
	});
	// PARALLAX
	$(document).scroll(function() {
		if ($(window).width() > 768) {
			var nm = Math.ceil($("html").scrollTop());
			var nw = Math.ceil($("body").scrollTop());
			var n;
			if (nm > nw) {
				n = nm;
			} else {
				n = nw;
			} //USE n FOR CALCULATIONS
			$("#inner-pg-banner").css("background-position", "50%" + -Math.ceil(n / 3) + "px");
		}
	});
	_mobilemenu();
	homeCarousel();
	$(".post-share.desktop").stick_in_parent({
		offset_top: 150
	});
	var hashTagActive = "";
	$(".scroll").click(function(event) {
		event.preventDefault();
		if (hashTagActive != this.hash) { //this will prevent if the user click several times the same link to freeze the scroll.            
			//calculate destination place
			var dest = 0;
			if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
				dest = $(document).height() - $(window).height();
			} else {
				dest = $(this.hash).offset().top;
			}
			//go to destination
			$('html,body').animate({
				scrollTop: dest - 80
			}, 2000, 'swing');
			hashTagActive = this.hash;
		}
	});
});

function bannerHeight() {
	var wh = $(window).innerHeight();
	if (wh) {
		$('.video-wrapper').height(wh);
	}
}

function _mobilemenu() {
	var menubox = $('#mobileNav'); //main menu wrap
	var menu_btn = $("#toggle_menu_btn"); // menu btn
	// toggle menu arrow 
	var dropDownicon = "theme-caret-right";
	var dropUpicon = "theme-caret-down";
	var arrowClass = dropDownicon + " dropdwn-btn";

	function hidesub_menu() {
		$('#mobileNav ul li').each(function() {
			$(this).children("ul").hide().removeClass("active-submenu");
			$(this).children("span").addClass(dropDownicon).removeClass(dropUpicon);
		});
	}
	menu_btn.click(function(e) {
		$(this).toggleClass("active");
		hidesub_menu();
		e.stopImmediatePropagation();
		menubox.slideToggle();
		menubox.toggleClass('opened');
	});
	menubox.click(function(e) {
		e.stopImmediatePropagation();
	});
	$('html,body').click(function(e) {
		menu_btn.removeClass("active");
		if (menubox.hasClass('opened')) {
			hidesub_menu();
			menubox.removeClass('opened');
			menubox.slideToggle();
		}
	});
	//click inner links
	$("#mobileNav ul li").each(function() {
		$(this).has("ul").addClass("menu-parent").append("<span class='dropdwn-btn'></span>");
		var sub_menu = $(this).children("ul");
		$(this).children('span').click(function(event) {
			var current_submenu = $(this).parent().children("ul");
			var sub_menu = $(".menu-parent ul");
			$(".dropdwn-btn").addClass(dropDownicon).removeClass(dropUpicon);
			if (current_submenu.hasClass("active-submenu")) {
				$(this).removeClass(dropUpicon).addClass(dropDownicon);
				sub_menu.slideUp();
				sub_menu.removeClass("active-submenu");
			} else {
				$(this).removeClass(dropDownicon).addClass(dropUpicon);
				sub_menu.removeClass("active-submenu");
				$(this).parent().children("ul").addClass("active-submenu");
				sub_menu.slideUp();
				current_submenu.slideDown();
			}
		});
	});
}

function homeCarousel() {
	$("#home .venues.mobile ul").owlCarousel({
	loop:false,
    margin:10,
    nav:false,
    dots: true,
   	items: 1
	});
}

function _colorboxHeight() {
	var colorBox_h = 'auto';
	if ($(window).width() > 980) {
		colorBox_h = $(window).height();
	} else if ($(window).width() < 480) {
		colorBox_h = 200 + 'px';
	} else if ($(window).width() < 680) {
		colorBox_h = 300 + 'px';
	} else {
		colorBox_h = 500 + 'px';
	}
	return colorBox_h;
}

function chnageEvent() {
	$('.contact-us #field_1_10 .chosen-container-single-nosearch').change(function() {
		$.colorbox.resize({});
	});
	$('.event-Type').change(function() {
		$.colorbox.resize({});
	});
}

function resiseImagePlease() {
	var h = $(window).height();
	$('.venue-slider img').height(h);
	//$('.gallery-slider img').height(h);
}

function toInfinityScrollAndBeyond() {
	$('.blog-post').infinitescroll({
		navSelector: ".loading",
		nextSelector: ".loading a",
		itemSelector: ".blog-post > div",
		loading: {
			finishedMsg: "<p>Congratulations, you've finished your dish.</p>",
			msgText: "<p>Loading...</p>",
			speed: 'fast',
			img: '../ui/images/loadmore-cus.gif'
		},
	});
	$('#news .module').infinitescroll({
		navSelector: ".loading",
		nextSelector: ".loading a",
		itemSelector: "#news .module > .news-wrap",
		loading: {
			finishedMsg: "<p>No more news to load.</p>",
			msgText: "<p>Loading...</p>",
			speed: 'fast',
			img: '../../ui/images/loadmore-cus.gif'
		},
	});
}

function _teamPage(){

	var $sync1 = $('.team-slider');
	var $sync2 = $('.team-bios');
	var flag = false;
	var duration = 300;

	$sync1.owlCarousel({
			nav: false,
			
			dots: false,
			autoWidth: true,
			responsive: {
				480 : {
					items: 1,
					margin: 40,
					center: false
				},
				768 : {
					items: 3,
					margin: 40,
					mouseDrag: false,
					touchDrag: true,
					center: true,
				},
				960 : {
					items: 5,
					margin: 100,
					mouseDrag: false,
					touchDrag: false,
					loop: false,
					center: true,

				}
			}
		}).on('changed.owl.carousel', function (e) {
			if (!flag) {
				flag = true;
				$sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
				flag = false;
			}
		});

	$sync2.owlCarousel({
			animateOut: 'fadeOut',
			items: 1,
			nav: false,
			center: true,
			dots: false
		}).on('click', '.owl-item', function () {
			$sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);

		}).on('changed.owl.carousel', function (e) {
			if (!flag) {
				flag = true;		
				$sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
				flag = false;
			}
		});


	
	var wWidth = $(window).width();
	var bWidth = $('.header-row img').width();
	var bPos = $('.row-bg img').position();
	var speed = wWidth/5;
	console.log('this is the windows width: '+ wWidth + ' and this is the image background width: '+ bWidth + 'position: '+ bPos.left + ' ' + bPos.top);
	
	$('button.prev').on('click', function(){
		console.log('this is the windows width: '+ wWidth + ' and this is the image background width: '+ bWidth + ' position: '+ bPos.left + ' ' + bPos.top);
		// $('.header-row img').css('transform', '+='+speed);
		$sync2.trigger('prev.owl.carousel', [300]);
	});

	$('button.next').on('click', function(){
		console.log('this is the windows width: '+ wWidth + ' and this is the image background width: '+ bWidth + 'position: '+ bPos.left + ' ' + bPos.top);
		// $('.header-row img').css('transform', '-='+speed);
		$sync2.trigger('next.owl.carousel', [300]);
	});


   // 'webkitTransform' : 'translate3d('+speed+ 'px, 0)',
            // 'MozTransform'    : 'translate3d('+speed+ 'px, 0)',
            // 'msTransform'     : 'translateX(' +speed+'px)',
            // 'OTransform'      : 'translate3d('+speed+ 'px, 0)',
            // 'transform'       : 'translate3d('+speed+ 'px, 0)',
    // 'webkitTransform' : 'translate3d('+speed+ 'px, 0)',
            // 'MozTransform'    : 'translate3d('+speed+ 'px, 0)',
            // 'msTransform'     : 'translateX(' +speed+'px)',
            // 'OTransform'      : 'translate3d('+speed+ 'px, 0)',
            // 'transform'       : 'translate3d('+speed+ 'px, 0)' ,

}

