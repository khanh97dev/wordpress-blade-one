$(function($){
	initToggle();
	initNavCollapse();
	initNavRunner();
	initScroll();
	initSwiper();
	initSel();
	initAlbum();
	initMaps();
})

function initToggle(){
	$(".toggle-open").click(function(){
		$target = $($(this).data("target"));
		$targetClose = $($(this).data("close"));
		if ($target.hasClass("active")) {
			$target.removeClass("active");
		} else if ($targetClose != "" || $targetClose !== undefined) {
			$($(this).data("close")).removeClass("active");
			if ($target.children("iframe").attr("src") == "") {
				src_embed = $(this).data("embed");
				$target.children("iframe").attr("src",src_embed);
			}
			$target.addClass("active");
		} else {
			$target.addClass("active");
		}
	});

	$(".lang-open").on("click", function(){
		$(".lang-open").removeClass("active");
	});
	
	// $(".nav-dad").click(function(){
	// 	$this = $(this);
	// 	if ($this.hasClass("opennav")) {
	// 		$this.removeClass("opennav");
	// 	} else {
	// 		$(".nav-dad").removeClass("opennav");
	// 		$this.addClass("opennav");
	// 	}
	// })

	
	var is_mobile = false;
	$navtoggle = $(".nav-toggle");
	if ($navtoggle.css('display')=='block') {
		is_mobile = true;
	}
	if (!is_mobile) {
		// $(".nav-dad").hover(function(){
		// 	$this = $(this);
		// 	if ($this.hasClass("opennav")) {
		// 		setTimeout(function(){
		// 			$this.removeClass("opennav");
		// 		}, 200)
		// 	} else {
		// 		$(".nav-dad").removeClass("opennav");
		// 		$this.addClass("opennav");
		// 	}
		// });
		// $(".s-header, .s-sub").hover(function(){
		// 	$(".nav-dad").removeClass("opennav");
		// })
	} else {
		$(".nav-dad").mousedown(function(){
			$this = $(this);
			if ($this.hasClass("opennav")) {
				setTimeout(function(){
					$this.removeClass("opennav");
				}, 200)
			} else {
				$(".nav-dad").removeClass("opennav");
				$this.addClass("opennav");
			}
		});
		$(".nav-dad ul li a").mousedown(function(){
			$this = $(this);
			$this.parent("#main-nav__list").parent("nav").removeClass("active");
			window.location.href = $this.attr("href");
		})
	}
}


function initScroll(){
	(function($){
		var sections = [];
		var id = false;
		var $navbara = $('#subnav a');
	  
		$navbara.click(function(e){
			e.preventDefault();
			$('html, body').animate({
				scrollTop: $($(this).attr('href')).offset().top - 120
			},1000);
			hash($(this).attr('href'));
		});
		$navbara.each(function(){
			sections.push($($(this).attr('href')));
		})
		$(window).scroll(function(e){
			var scrollTop = $(this).scrollTop();
			for (var i in sections) {
				var section = sections[i];
				if (scrollTop > section.offset().top - 140){
					var scrolled_id = section.attr('id');
				}
			}
			if (scrolled_id !== id) {
				id = scrolled_id;
				$($navbara).removeClass('active');
				$('#subnav a[href="#' + id + '"]').addClass('active'); 
			}
		})
	})(jQuery);

	hash = function(h){
		if (history.pushState){
			history.pushState(null, null, h);
		}else{
			location.hash = h;
		}
	}

	// $('a[href^="#"]').click(function(){
	// 	$('html, body').animate({
			
	// 	}, 500)
	// })
}

function initNavCollapse() {
	var $window = $(window);
	var $document = $(document);
	var $nav = $(".navigation");
	var $sub_nav = $(".sub-nav");
	if (typeof $sub_nav.offset() != "undefined") {
		var sub_nav_top = $sub_nav.offset().top;
	}
	$window.scroll(function(){
		if ($(document).scrollTop() > 50) {
			$nav.addClass("collapse");
		} else {
			$nav.removeClass("collapse")
		}
		if ($(document).scrollTop()+60>sub_nav_top) {
			$sub_nav.addClass("stick");
		} else {
			$sub_nav.removeClass("stick");
		}
	})
}

function initNavRunner() {
	var $menu_item = $(".menu > nav > ul > li ");
	if ($(".menu > nav > ul > li").hasClass("active")) {
		var $menu_active_item = $(".menu > nav > ul > li.active").first();
	}
	else {
		var $menu_active_item = $(".menu > nav > ul > li:first").addClass("active").first();
	}
	var $menu_line = $(".menu > nav > ul > li.line ");
	var $window = $(window);
	
	function currentRunnerPos($item) {
		item_left = $item.offset().left;
		item_width = $item.width();
		$menu_line.css({
			"width" : $item.width() + "px",
			"margin-left" : (item_left - $(".menu").offset().left)  + "px",
		})
	}
	$(document).ready(function(){
		currentRunnerPos($menu_active_item);
	})
	$menu_item.on("mouseout", function(){
		currentRunnerPos($menu_active_item);
		
	})
	$menu_item.on("mouseenter", function(){
		currentRunnerPos($(this));
		
	})
}

function initSwiper(){
	var subnav = new Swiper('.subnav-container', {
		slidesPerView: 15,
		freeMode: true,
		loop: false,
		breakpoints: {
			1200: {
				loop: true,
				slidesPerView: 12,
			},
			768: {
				slidesPerView: 8,
			},
			480: {
				slidesPerView: 6,
			},
			320: {
				slidesPerView: 4,
			}
		}
	});
	var quote = new Swiper('.quote-container', {
		slidesPerView: 1,
		autoHeight: true,
		navigation: {
			nextEl: '.quote-next',
			prevEl: '.quote-prev',
		},
	});
	var manager = new Swiper('.manager-container', {
		slidesPerView: 1,
		loop: true, 
		// init: false,
		pagination: {
			el: ".manager-pagination",
			clickable: true,
			// type: "custom",
			// renderCustom: function(swiper, current, total) {
			// 	var imgs = [];
			// 	$(".manager-container .swiper-wrapper .swiper-slide .manager-item ").each(function(i){
			// 		$img = $(this).children("img");
			// 		$img.css({
			// 			"display": "none",
			// 		})
			// 		imgs.push($img.attr("src"));
			// 	})
			// 	var smallimg = "";
			// 	for (let i = 1; i<=total; i++) {
			// 		if (i == current) {
			// 			smallimg += "<span data-index='"+i+"' class='mp-item manager-pagination-item-active'><img src='"+imgs[i]+"' style='manager-pagination-item-active'></span>";
			// 		} else if (Math.abs(i-current)<=2){
			// 			smallimg += "<span data-index='"+i+"' class='mp-item manager-pagination-item'><img src='"+imgs[i]+"' style='manager-pagination-item'></span>";
			// 		} else {
			// 			smallimg += "";
			// 		}
			// 	}
			// 	return smallimg;
			// },
			type: "bullets",
			// dynamicBullets: true,
			// dynamicMainBullets: 1,
			renderBullet: function(index, className) {
				var imgs = [];
				$(".manager-container .swiper-wrapper .swiper-slide .manager-item ").each(function(i){
					$img = $(this).children("img");
					$img.css({
						"display": "none",
					})
					imgs.push($img.attr("src"));
				})
				return "<span class='mp-item manager-pagination-item "+className+"'><img class='' src='"+imgs[index+1]+"'></span>";
			},
		},
		navigation: {
			nextEl: '.manager-next',
			prevEl: '.manager-prev',
		}
	});
	// if (typeof($(".manager-container")[0]) != "undefined") {
	// 	manager.slideTo(2,0,false);
	// }
	
	// $(".mp-item").on("click", function(){
	// 	console.log("clicked");
	// 	manager.slideTo($(this).data("index"));
	// })

	var quote = new Swiper('.clientquote-container', {
		slidesPerView: 3,
		loop: true,
		spaceBetween: 10,
		pagination: {
			el: ".clientquote-pagination",
			clickable: true,
		},
		navigation: {
			nextEl: '.clientquote-next',
			prevEl: '.clientquote-prev',
		},
		breakpoints: {
			991: { slidesPerView: 2, },
			767: { slidesPerView: 1, }
		}
	});
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

}


function initSel(){
	var x, i, j, selElmnt, a, b, c;
	x = document.getElementsByClassName("custom-select");
	for (i = 0; i < x.length; i++) {
	  selElmnt = x[i].getElementsByTagName("select")[0];
	  a = document.createElement("DIV");
	  a.setAttribute("class", "select-selected");
	  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
	  x[i].appendChild(a);
	  b = document.createElement("DIV");
	  b.setAttribute("class", "select-items select-hide");
	  for (j = 0; j < selElmnt.length; j++) {
	    c = document.createElement("DIV");
	    c.innerHTML = selElmnt.options[j].innerHTML;
	    c.addEventListener("click", function(e) {
	        var y, i, k, s, h;
	        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
	        h = this.parentNode.previousSibling;
	        for (i = 0; i < s.length; i++) {
	          if (s.options[i].innerHTML == this.innerHTML) {
	            s.selectedIndex = i;
	            h.innerHTML = this.innerHTML;
	            y = this.parentNode.getElementsByClassName("same-as-selected");
	            for (k = 0; k < y.length; k++) {
	              y[k].removeAttribute("class");
	            }
	            this.setAttribute("class", "same-as-selected");
	            break;
	          }
	        }
	        h.click();
	    });
	    b.appendChild(c);
	  }
	  x[i].appendChild(b);
	  a.addEventListener("click", function(e) {
	      e.stopPropagation();
	      closeAllSelect(this);
	      this.nextSibling.classList.toggle("select-hide");
	      this.classList.toggle("select-arrow-active");
	    });
	}
	function closeAllSelect(elmnt) {
	  var x, y, i, arrNo = [];
	  x = document.getElementsByClassName("select-items");
	  y = document.getElementsByClassName("select-selected");
	  for (i = 0; i < y.length; i++) {
	    if (elmnt == y[i]) {
	      arrNo.push(i)
	    } else {
	      y[i].classList.remove("select-arrow-active");
	    }
	  }
	  for (i = 0; i < x.length; i++) {
	    if (arrNo.indexOf(i)) {
	      x[i].classList.add("select-hide");
	    }
	  }
	}
	document.addEventListener("click", closeAllSelect);
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

function initAlbum(){
	$(window).bind("load", function(){
		if (document.querySelector(".album-container") != null) {
			// var album = new Bricklayer(document.querySelector(".album-container"));
			var imgs_el = ".album-item img";
			// imgStatus.watch('.album-item img', function(imgs){
			// 	if (imgs.loaded) {
			// 		console.log("imgs done!");
			// 		waterfall(".album-container");
			// 	}
			// });
			waterfall(".album-container");
		}
	})
	$(".shnews-box").on("click", function(){
		if ($(this).parent(".shnews-item").hasClass("active")) {
			$(this).parent(".shnews-item").removeClass("active");
		} else {
			$(".shnews-item").removeClass("active");
			$(this).parent(".shnews-item").addClass("active");
		}
	})
	$('[data-fancybox="album-item"]').fancybox({
		arrows: true,
		infobar: true,
	})
	$('[data-fancybox="people"]').fancybox({
		arrows: true,
		baseClass: "fancy-people",
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