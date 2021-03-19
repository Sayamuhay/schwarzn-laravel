	$('.js-show-cart').on('click',function(){
        $('.js-panel-cart').addClass('show-header-cart');
    });

    $('.js-hide-cart').on('click',function(){
        $('.js-panel-cart').removeClass('show-header-cart');
	});
	
	$('.js-show-profile').on('click',function(){
        $('.js-panel-profile').addClass('show-header-cart');
    });

    $('.js-hide-profile').on('click',function(){
        $('.js-panel-profile').removeClass('show-header-cart');
	});
	
	$('.js-show-notif').on('click',function(){
        $('.js-panel-notif').addClass('show-header-cart');
    });

    $('.js-hide-notif').on('click',function(){
        $('.js-panel-notif').removeClass('show-header-cart');
    });

$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});

		$('.js-show-filter').on('click',function(){
			$(this).toggleClass('show-filter');
			$('.panel-filter').slideToggle(400);
	
			if($('.js-show-search').hasClass('show-search')) {
				$('.js-show-search').removeClass('show-search');
				$('.panel-search').slideUp(400);
			}    
		});
	
		$('.js-show-search').on('click',function(){
			$(this).toggleClass('show-search');
			$('.panel-search').slideToggle(400);
	
			if($('.js-show-filter').hasClass('show-filter')) {
				$('.js-show-filter').removeClass('show-filter');
				$('.panel-filter').slideUp(400);
			}    
		});

$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});

$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();
	});
				// JavaScript Document


    $(function() {
      $('#only-number').on('keydown', '#typePhone', function(e){
          -1!==$
          .inArray(e.keyCode,[46,8,9,27,13,110,190]) || /65|67|86|88/
          .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
          || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
          && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
      });
    })