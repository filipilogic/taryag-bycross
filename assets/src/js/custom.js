jQuery(document).ready(function ($) {
	$( ".menu-toggle" ).click(function() {
		$( "#primary-menu" ).slideToggle();
		$( this ).toggleClass('menu-open')
	});
	// Accordion
	$( ".il_accordion-header" ).click(function() {
		$( this ).siblings( ".il_accordion-body" ).slideToggle();
		$( this ).parent('.il_accordion-item ').toggleClass('open')
	});
	// Tabs
	$('.il_tabs_nav li:first-child').addClass('active');
	$('.il_tabs_nav a').click(function() {

	// Check for active
	$('.il_tabs_nav li').removeClass('active');
	$(this).parent().addClass('active');

	// Display active tab
	let currentTab = $(this).attr('href');
	$('.il_tabs_content .il_tab').hide();
	$(currentTab).show();

	return false;
	});


	// Home Hero Triggers
	$( ".si_trigger.si-1" ).toggleClass('si_open');
	$( ".tg_slidein.si-1" ).slideToggle().toggleClass('si_open');


	$( ".si_triggers .si_trigger" ).click(function() {
		$( ".si_triggers:not(.si_open)" ).addClass('si_open');
	});

	$( ".si_trigger.si-1" ).click(function() {
		if (!$(this).hasClass('si_open')) {
			$( ".si_trigger.si-1" ).toggleClass('si_open');
			$( ".si_trigger:not(.si-1)" ).removeClass('si_open');
			$( ".tg_slidein.si-1" ).slideToggle().toggleClass('si_open');
			$( ".tg_slidein.si_open:not(.si-1)" ).slideToggle().removeClass('si_open');
		}
	});
	$( ".si_trigger.si-2" ).click(function() {
		if (!$(this).hasClass('si_open')) {
			$( ".si_trigger.si-2" ).toggleClass('si_open');
			$( ".si_trigger:not(.si-2)" ).removeClass('si_open');
			$( ".tg_slidein.si-2" ).slideToggle().toggleClass('si_open');
			$( ".tg_slidein.si_open:not(.si-2)" ).slideToggle().removeClass('si_open');
		}
	});
	$( ".si_trigger.si-3" ).click(function() {
		if (!$(this).hasClass('si_open')) {
			$( ".si_trigger.si-3" ).toggleClass('si_open');
			$( ".si_trigger:not(.si-3)" ).removeClass('si_open');
			$( ".tg_slidein.si-3" ).slideToggle().toggleClass('si_open');
			$( ".tg_slidein.si_open:not(.si-3)" ).slideToggle().removeClass('si_open');
		}
	});
	$( ".si_trigger.si-4" ).click(function() {
		if (!$(this).hasClass('si_open')) {
			$( ".si_trigger.si-4" ).toggleClass('si_open');
			$( ".si_trigger:not(.si-4)" ).removeClass('si_open');
			$( ".tg_slidein.si-4" ).slideToggle().toggleClass('si_open');
			$( ".tg_slidein.si_open:not(.si-4)" ).slideToggle().removeClass('si_open');
		}
	});
	$( ".si_trigger.si-5" ).click(function() {
		if (!$(this).hasClass('si_open')) {
			$( ".si_trigger.si-5" ).toggleClass('si_open');
			$( ".si_trigger:not(.si-5)" ).removeClass('si_open');
			$( ".tg_slidein.si-5" ).slideToggle().toggleClass('si_open');
			$( ".tg_slidein.si_open:not(.si-5)" ).slideToggle().removeClass('si_open');
		}
	});

	// Mobile

	$( ".si_title" ).click(function() {
		$( this ).parents(".tg_slidein").slideToggle().removeClass("si_open");
		$( ".mobile_trigger" ).removeClass("si_open");
	});

	// Technologies

	$( ".tg_trigger-1" ).click(function() {
		$( ".tg_trigger-1" ).toggleClass('si_open');
		$( ".tg_trigger.si_open:not(.tg_trigger-1)" ).removeClass('si_open');
		$( ".tg_modal-1" ).slideToggle().toggleClass('si_open');
		$( ".tg_modal.si_open:not(.tg_modal-1)" ).slideToggle().removeClass('si_open');
	});

	$( ".tg_trigger-2" ).click(function() {
		$( ".tg_trigger-2" ).toggleClass('si_open');
		$( ".tg_trigger.si_open:not(.tg_trigger-2)" ).removeClass('si_open');
		$( ".tg_modal-2" ).slideToggle().toggleClass('si_open');
		$( ".tg_modal.si_open:not(.tg_modal-2)" ).slideToggle().removeClass('si_open');
	});

	$( ".tg_trigger-3" ).click(function() {
		$( ".tg_trigger-3" ).toggleClass('si_open');
		$( ".tg_trigger.si_open:not(.tg_trigger-3)" ).removeClass('si_open');
		$( ".tg_modal-3" ).slideToggle().toggleClass('si_open');
		$( ".tg_modal.si_open:not(.tg_modal-3)" ).slideToggle().removeClass('si_open');
	});


	// Mobile Nav
	$( ".menu-toggle" ).click(function() {
		$( ".header-main" ).toggleClass('nav_open');
	});

	$( "#primary-menu li.menu-item-has-children > a" ).after('<span class="sub-menu-trigger"></span>');

	$( ".sub-menu-trigger" ).click(function() {
		$( this ).parent().toggleClass('sub-menu-open');
		$( this ).next(".sub-menu").slideToggle();
	});

	// Init Lightbox Carousel

	$('.carousel-main').flickity({
		// options
		cellAlign: 'left',
		contain: true,
		pageDots: false,
		draggable: false
		});

		$( ".il_lb_triggers a" ).click(function() {
		$( ".il_lb_carousel_wrap" ).addClass('is-open');
	});
	$( ".il_lb_carousel_wrap .close" ).click(function() {
		$( ".il_lb_carousel_wrap" ).removeClass('is-open');
	});

	// Init Logo Carousel

	$('.il_logos_inner').flickity({
		// options
		cellAlign: 'left',
		contain: true,
		pageDots: false,
		prevNextButtons: false,
		freeScroll: true,
		wrapAround: true,
		autoPlay: 2000,
		selectedAttraction: 0.009,
		watchCSS: true
		});

    // Team

    $(".il_team_member").click(function () {
        $(".il_team_member").not(this).next(".member_text.t-open").slideToggle().removeClass('t-open');
        $(this).next(".member_text").slideToggle().toggleClass('t-open');
        let member_data = $(this).data('member');
        let element_id = '#' + member_data;
        let element = $(element_id);
		var windowsize = $(window).width();
        if (windowsize < 768) {
			setTimeout(() => { 
				$([document.documentElement, document.body]).animate({
					scrollTop: element.offset().top - 100
				}, 100);
			}, 400);
        } else {
			setTimeout(() => { 
				$([document.documentElement, document.body]).animate({
					scrollTop: element.offset().top
				}, 100);
			}, 400);
		}
    });
    $(".member_text .close").click(function () {
        $(this).parents('.member_text').slideToggle().removeClass('t-open');
        let member_data = $(this).parents('.member_text').attr('id');
        let member_id = '#' + member_data + '_id';
        let member_view = $(member_id);
        console.log(member_view)
        $([document.documentElement, document.body]).animate({
            scrollTop: member_view.offset().top
        }, 100);
    });
});

// Get the button

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
	scrollFunction();
	
	document.getElementById("backToTopButton").addEventListener("click", function() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	});
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("backToTopButton").style.opacity = "1";
  } else {
    document.getElementById("backToTopButton").style.opacity = "0";
  }
}
