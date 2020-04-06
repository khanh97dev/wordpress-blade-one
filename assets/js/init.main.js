$(function($){


	// initChangingPos();
	// initScroll();
	initToggle();
	initSwiper();
	initWOW();
	initNumbers();
	initMaps();
	initBt();
})

function initChangingPos() {
	$bannerDesktop = $(".banner-desktop");
	$bannerTablet = $(".banner-tablet");
	$bannerMobile = $(".banner-mobile");
	var bannerDesktopWidth = 1920;
	var bannerTabletWidth = 768;
	var bannerMobileWidth = 480;
	var screenWidth = $(window).width();
	$bannerDesktop.css({"margin-left": -(bannerDesktopWidth - screenWidth)/2, });
	$bannerTablet.css({"margin-left": -(bannerTabletWidth - screenWidth)/2, });
	$bannerMobile.css({"margin-left": -(bannerMobileWidth - screenWidth)/2, });
}

function initScroll(){
	// var $window = $(window)
	// var $body = $("html, body");
	// aniComplete = false;
	// $body.bind("mousewheel", function(e) {
	// 	console.log("scrolling!");
	// 	var move = 500;
	// 	aniComplete = true
	// 	if (aniComplete) {
	// 		$body.stop().animate({
	// 			scrollTop: $(window).scrollTop() - (move*e.deltaY)
	// 		}, 1000, function(){
	// 			aniComplete = true;
	// 		})
	// 	}
	// })
	if (window.addEventListener) window.addEventListener('DOMMouseScroll', wheel, false);
	window.onmousewheel = document.onmousewheel = wheel;

	function wheel(event) {
	    var delta = 0;
	    if (event.wheelDelta) delta = event.wheelDelta / 120;
	    else if (event.detail) delta = -event.detail / 3;

	    handle(delta);
	    if (event.preventDefault) event.preventDefault();
	    event.returnValue = false;
	}

	var goUp = true;
	var end = null;
	var interval = null;

	function handle(delta) {
		var animationInterval = 20; //lower is faster
		var scrollSpeed = 20; //lower is faster

		if (end == null) {
	  	end = $(window).scrollTop();
	  }
	  end -= 20 * delta;
	  goUp = delta > 0;

	  if (interval == null) {
	    interval = setInterval(function () {
	      var scrollTop = $(window).scrollTop();
	      // var step = Math.round((end - scrollTop) / scrollSpeed);
	      var step = Math.round((end - scrollTop) / scrollSpeed);
	      if (scrollTop <= 0 || 
	          scrollTop >= $(window).prop("scrollHeight") - $(window).height() ||
	          goUp && step > -1 || 
	          !goUp && step < 1 ) {
	        clearInterval(interval);
	        interval = null;
	        end = null;
	      }
	      $(window).scrollTop(scrollTop + step );
	    }, animationInterval);
	  }
	}
}


function initToggle(){
	$(".toggle-open").click(function(){
		$target = $($(this).data("target"))
		if ($target.hasClass("active")) {
			$target.removeClass("active");
		} else {
			// $($(".toggle-open").data("target")).removeClass("active");
			$target.addClass("active");
		}
	});
	$(".nav-dad").click(function(){
		$this = $(this);
		if ($this.hasClass("active")) {
			$this.removeClass("active");
		} else {
			$(".nav-dad").removeClass("active");
			$this.addClass("active");
		}

	})
	
}

function initSwiper(){
	var banner = new Swiper('.banner-container',{
		pagination: {
			el: '.banner-pagination',
			clickable: true,
		},
		autoHeight: true,
	});
	banner.on('slideChange', function() {
		initWOW();
	});
	var product = new Swiper('.product-container', {
		  fadeEffect: {
		    crossFade: true
		  },
		  allowTouchMove: false,
	});
	$(".product-item-01").on("click", function(){
		product.slideTo(0, 400);
		$(".product-item").removeClass("active");
		$(this).addClass("active");
	});
	$(".product-item-02").on("click", function(){
		product.slideTo(1, 400);
		$(".product-item").removeClass("active");
		$(this).addClass("active");
	});
	$(".product-item-03").on("click", function(){
		product.slideTo(2, 400);
		$(".product-item").removeClass("active");
		$(this).addClass("active");
	});
	$(".product-item-04").on("click", function(){
		product.slideTo(3, 400);
		$(".product-item").removeClass("active");
		$(this).addClass("active");
	});
	$(".product-item-05").on("click", function(){
		product.slideTo(4, 400);
		$(".product-item").removeClass("active");
		$(this).addClass("active");
	});
	var about = new Swiper('.about-container', {
		slidesPerView: 'auto',
		spaceBetween: 10,
      	freeMode: true,
		navigation: {
			nextEl: '.about-next',
			prevEl: '.about-prev',
		},
	});
	$('[data-fancybox="about-img"]').fancybox({
		arrows: true,
	})
	var history = new Swiper('.history-container', {
		autoHeight: true,
		fadeEffect: {
		    crossFade: true
		},
		allowTouchMove: false,
	});
	$(".history-item-01").on("click", function(){
		history.slideTo(0, 400);
		$(".history-item").parent().removeClass("active");
		$(this).parent().addClass("active");
	});
	$(".history-item-02").on("click", function(){
		history.slideTo(1, 400);
		$(".history-item").parent().removeClass("active");
		$(this).parent().addClass("active");
	});
	$(".history-item-03").on("click", function(){
		history.slideTo(2, 400);
		$(".history-item").parent().removeClass("active");
		$(this).parent().addClass("active");
	});
	// $(".history-item-04").on("click", function(){
	// 	history.slideTo(3, 400);
	// 	$(".history-item").parent().removeClass("active");
	// 	$(this).parent().addClass("active");
	// });
	$(".history-item-05").on("click", function(){
		history.slideTo(3, 400);
		$(".history-item").parent().removeClass("active");
		$(this).parent().addClass("active");
	});
	$(".history-item-06").on("click", function(){
		history.slideTo(4, 400);
		$(".history-item").parent().removeClass("active");
		$(this).parent().addClass("active");
	});
	var quote = new Swiper('.quote-container', {
		slidesPerView: 1,
		autoHeight: true,
		navigation: {
			nextEl: '.quote-next',
			prevEl: '.quote-prev',
		},
	});
	var sponsor = new Swiper('.sponsor-container', {
		slidesPerView: 'auto',
		freeMode: true,
		autoplay: true,
		loop: true,
	});
}

function initWOW(){
	var wow = new WOW({
		boxClass: 'box-ani',
		mobile: false,
	}).init();
}

function initNumbers(){
	var actionNumber = false;
	$(".number-circle").viewportChecker({
		callbackFunction: function() {
			if (actionNumber == false) {
				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator('.')
				$('.number-circle-1').animateNumber({ number: $('.number-circle-1').data("incto"), numberStep: comma_separator_number_step, });
				$('.number-circle-2').animateNumber({ number: $('.number-circle-2').data("incto") });
				$('.number-circle-3').animateNumber({ number: $('.number-circle-3').data("incto") });
				$('.number-circle-4').animateNumber({ number: $('.number-circle-4').data("incto") });
				actionNumber = true;
			}
		}
	})
}

function initMaps(){
	$(".bt-showmap").on("click",function(){
		$map = $(".s-map");
		if ($map.hasClass("active")) {
			$map.removeClass("active");
		} else {
			$map.addClass("active");
		}
	})
}

function initBt(){
	$(".bt").viewportChecker({
		classToAdd: 'active'
	})
}



	function btnTopAction () {
		var position = $(window).outerHeight() / 2;
		var fullDocHeight = $(document).outerHeight();
		$('#btnTop').on('click', function(){
			$('html, body').animate({scrollTop: 0 },600, function(){
				showHide();
			});
		});


		$(window).on('mousewheel', function(){
			showHide();
		});

		//show/hide
		function showHide() {
			var curScrollTop = $(document).scrollTop() + $(window).outerHeight()
			if($(document).scrollTop() > position || fullDocHeight == curScrollTop ) {
				$('#btnTop').fadeIn();
			}else {
				$('#btnTop').fadeOut();
			}
		}
	}

$(document).ready(function(){
	btnTopAction();
});