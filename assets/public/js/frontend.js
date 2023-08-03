/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/js/custom.js":
/*!*********************************!*\
  !*** ./assets/src/js/custom.js ***!
  \*********************************/
/***/ (() => {

jQuery(document).ready(function ($) {
  $(".menu-toggle").click(function () {
    $("#primary-menu").slideToggle();
    $(this).toggleClass('menu-open');
  });
  // Accordion
  $(".il_accordion-header").click(function () {
    $(this).siblings(".il_accordion-body").slideToggle();
    $(this).parent('.il_accordion-item ').toggleClass('open');
  });
  // Tabs
  $('.il_tabs_nav li:first-child').addClass('active');
  $('.il_tabs_nav a').click(function () {
    // Check for active
    $('.il_tabs_nav li').removeClass('active');
    $(this).parent().addClass('active');

    // Display active tab
    var currentTab = $(this).attr('href');
    $('.il_tabs_content .il_tab').hide();
    $(currentTab).show();
    return false;
  });

  // Home Hero Triggers
  $(".si_trigger.si-1").toggleClass('si_open');
  $(".tg_slidein.si-1").slideToggle().toggleClass('si_open');
  $(".si_triggers .si_trigger").click(function () {
    $(".si_triggers:not(.si_open)").addClass('si_open');
  });
  $(".si_trigger.si-1").click(function () {
    if (!$(this).hasClass('si_open')) {
      $(".si_trigger.si-1").toggleClass('si_open');
      $(".si_trigger:not(.si-1)").removeClass('si_open');
      $(".tg_slidein.si-1").slideToggle().toggleClass('si_open');
      $(".tg_slidein.si_open:not(.si-1)").slideToggle().removeClass('si_open');
    }
  });
  $(".si_trigger.si-2").click(function () {
    if (!$(this).hasClass('si_open')) {
      $(".si_trigger.si-2").toggleClass('si_open');
      $(".si_trigger:not(.si-2)").removeClass('si_open');
      $(".tg_slidein.si-2").slideToggle().toggleClass('si_open');
      $(".tg_slidein.si_open:not(.si-2)").slideToggle().removeClass('si_open');
    }
  });
  $(".si_trigger.si-3").click(function () {
    if (!$(this).hasClass('si_open')) {
      $(".si_trigger.si-3").toggleClass('si_open');
      $(".si_trigger:not(.si-3)").removeClass('si_open');
      $(".tg_slidein.si-3").slideToggle().toggleClass('si_open');
      $(".tg_slidein.si_open:not(.si-3)").slideToggle().removeClass('si_open');
    }
  });
  $(".si_trigger.si-4").click(function () {
    if (!$(this).hasClass('si_open')) {
      $(".si_trigger.si-4").toggleClass('si_open');
      $(".si_trigger:not(.si-4)").removeClass('si_open');
      $(".tg_slidein.si-4").slideToggle().toggleClass('si_open');
      $(".tg_slidein.si_open:not(.si-4)").slideToggle().removeClass('si_open');
    }
  });
  $(".si_trigger.si-5").click(function () {
    if (!$(this).hasClass('si_open')) {
      $(".si_trigger.si-5").toggleClass('si_open');
      $(".si_trigger:not(.si-5)").removeClass('si_open');
      $(".tg_slidein.si-5").slideToggle().toggleClass('si_open');
      $(".tg_slidein.si_open:not(.si-5)").slideToggle().removeClass('si_open');
    }
  });

  // Mobile

  $(".si_title").click(function () {
    $(this).parents(".tg_slidein").slideToggle().removeClass("si_open");
    $(".mobile_trigger").removeClass("si_open");
  });

  // Technologies

  $(".tg_trigger-1").click(function () {
    $(".tg_trigger-1").toggleClass('si_open');
    $(".tg_trigger.si_open:not(.tg_trigger-1)").removeClass('si_open');
    $(".tg_modal-1").slideToggle().toggleClass('si_open');
    $(".tg_modal.si_open:not(.tg_modal-1)").slideToggle().removeClass('si_open');
  });
  $(".tg_trigger-2").click(function () {
    $(".tg_trigger-2").toggleClass('si_open');
    $(".tg_trigger.si_open:not(.tg_trigger-2)").removeClass('si_open');
    $(".tg_modal-2").slideToggle().toggleClass('si_open');
    $(".tg_modal.si_open:not(.tg_modal-2)").slideToggle().removeClass('si_open');
  });
  $(".tg_trigger-3").click(function () {
    $(".tg_trigger-3").toggleClass('si_open');
    $(".tg_trigger.si_open:not(.tg_trigger-3)").removeClass('si_open');
    $(".tg_modal-3").slideToggle().toggleClass('si_open');
    $(".tg_modal.si_open:not(.tg_modal-3)").slideToggle().removeClass('si_open');
  });

  // Mobile Nav
  $(".menu-toggle").click(function () {
    $(".header-main").toggleClass('nav_open');
  });
  $("#primary-menu li.menu-item-has-children > a").after('<span class="sub-menu-trigger"></span>');
  $(".sub-menu-trigger").click(function () {
    $(this).parent().toggleClass('sub-menu-open');
    $(this).next(".sub-menu").slideToggle();
  });

  // Init Lightbox Carousel

  $('.carousel-main').flickity({
    // options
    cellAlign: 'left',
    contain: true,
    pageDots: false,
    draggable: false
  });
  $(".il_lb_triggers a").click(function () {
    $(".il_lb_carousel_wrap").addClass('is-open');
  });
  $(".il_lb_carousel_wrap .close").click(function () {
    $(".il_lb_carousel_wrap").removeClass('is-open');
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
    var member_data = $(this).data('member');
    var element_id = '#' + member_data;
    var element = $(element_id);
    var windowsize = $(window).width();
    if (windowsize < 768) {
      setTimeout(function () {
        $([document.documentElement, document.body]).animate({
          scrollTop: element.offset().top - 100
        }, 100);
      }, 400);
    } else {
      setTimeout(function () {
        $([document.documentElement, document.body]).animate({
          scrollTop: element.offset().top
        }, 100);
      }, 400);
    }
  });
  $(".member_text .close").click(function () {
    $(this).parents('.member_text').slideToggle().removeClass('t-open');
    var member_data = $(this).parents('.member_text').attr('id');
    var member_id = '#' + member_data + '_id';
    var member_view = $(member_id);
    console.log(member_view);
    $([document.documentElement, document.body]).animate({
      scrollTop: member_view.offset().top
    }, 100);
  });
});

// Get the button

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
  document.getElementById("backToTopButton").addEventListener("click", function () {
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

/***/ }),

/***/ "./assets/src/sass/frontend.scss":
/*!***************************************!*\
  !*** ./assets/src/sass/frontend.scss ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!***********************************!*\
  !*** ./assets/src/js/frontend.js ***!
  \***********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _sass_frontend_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../sass/frontend.scss */ "./assets/src/sass/frontend.scss");
/* harmony import */ var _js_custom__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../js/custom */ "./assets/src/js/custom.js");
/* harmony import */ var _js_custom__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_js_custom__WEBPACK_IMPORTED_MODULE_1__);
/**
 * SASS
 */


/**
 * JavaScript
 */


})();

/******/ })()
;