/*
* EPIC -  Multipurpose  Html Template
* Author: Novatech Solution
* Copyright (C) 2019 Novatech Solution
*/
//////////////////////////////////////// ONE PAGE NAVIGATION ////////////////////////////////////////
$(document).ready(function() {
$('.onepage').onePageNav();
});
///////////////////////// STICKY NAVIGATION //////////////////////
// Closes responsive menu when a scroll link is clicked
	$('.nav-link').on('click', function () {
		$('.navbar-collapse').collapse('hide');
	});
// smooth scroll js 
	$(window).scroll(function () {
		var scrolling = $(this).scrollTop();
		var stikey = $('.sticky-top');

		if (scrolling >= 100) {

			$(stikey).addClass("nav-bg");
		} else {

			$(stikey).removeClass("nav-bg");
		}
		if (scrolling > 50) {
			$('.backtotop').fadeIn(500);
		} else {
			$('.backtotop').fadeOut(500);
		}
	});
//////////////////////////////////////// PAGE SCROLL ANIMATION ////////////////////////////////////////
$(document).ready(function() {
  // Check if element is scrolled into view
  function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
  }
  // If element is scrolled into view, fade it in
  $(window).scroll(function() {
    $('.scroll-animations .animated').each(function() {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('fadeInLeft');
      }
    });
	});
});
//////////////////////////////////////// TYPED JS ANIMATION FOR TEXT ////////////////////////////////////////

	var typed = new Typed('.element', {
		strings: ["UX DESIGNER", "DESIGNER", "DEVELOPER", "ANIMATOR", "PHOTOGRAPHER"],
		// Optionally use an HTML element to grab strings from (must wrap each string in a <p>)
		stringsElement: null,
		// typing speed
		typeSpeed: 60,
		// time before typing starts
		startDelay: 1200,
		// backspacing speed
		backSpeed: 20,
		// time before backspacing
		backDelay: 500,
		// loop
		loop: true,
		// false = infinite
		loopCount: false,
		// show cursor
		showCursor: false,
		// character for cursor
		cursorChar: "|",
		// attribute to type (null == text)
		attr: null,
		// either html or text
		contentType: 'html',
		// call when done callback function
		callback: function () {},
		// starting callback function before each string
		preStringTyped: function () {},
		//callback for every typed string
		onStringTyped: function () {},
		// callback for reset
		resetCallback: function () {}
	});
//////////////////////////////////////// AOS : ANIMATE ON SCROLL ITEMS LIBRARY ////////////////////////////////////////
AOS.init({
  duration: 600,
})
//////////////////////////////////////// ICON SCROLL-DOWN : BANNER  ////////////////////////////////////////
//animation scroll js
	var html_body = $('html, body');
	$('.navbar a , .scroll-down a , .backtotop a').on('click', function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				html_body.animate({
					scrollTop: target.offset().top - 25
				}, 1500);
				return false;
			}
		}
	});

//scorllspy js
	$('body').scrollspy({
		target: ".navbar",
		offset: 50,
	});
//////////////////////////////////////// FILTERATION : PORTFOLIO  ////////////////////////////////////////
$(function() {
		var selectedClass = "";
		$(".fil-cat").click(function(){ 
		selectedClass = $(this).attr("data-rel"); 
     $("#portfolio").fadeTo(100, 0.1);
		$("#portfolio figure").not("."+selectedClass).fadeOut().removeClass('scale-anm');
    setTimeout(function() {
      $("."+selectedClass).fadeIn().addClass('scale-anm');
	  
      $("#portfolio").fadeTo(300, 1);
    }, 300); 
		
	});
});
//////////////////////////////////////// Hovering: Portfolio ////////////////////////////////////////
var snippet = [].slice.call(document.querySelectorAll('.hover'));
if (snippet.length) {
  snippet.forEach(function (snippet) {
    snippet.addEventListener('mouseout', function (event) {
      if (event.target.parentNode.tagName === 'figure') {
        event.target.parentNode.classList.remove('hover')
      } else {
        event.target.parentNode.classList.remove('hover')
      }
    });
  });
}
//////////////////////////////////////// COPYRIGHT : FOOTER  ////////////////////////////////////////
var d = new Date();
document.getElementById("copyright").innerHTML = d.getFullYear();