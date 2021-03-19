<!doctype html>

<html>
<head>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZQ8DJKKVD8"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', 'G-ZQ8DJKKVD8');
	</script>
	
	<meta charset="utf-8">
    <meta name="description" content="SCHWARZN">
    <meta name="keywords" content="SCHWARZN, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>SCHWARZN | Log In</title>
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
	<link href="{{asset('css/mdb/mdb.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/product.css')}}">
	<link rel="stylesheet" href="{{asset('css/register.css')}}">
	<link rel="stylesheet" href="{{asset('css/footer.css')}}">
	<link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}">
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('css/material-design-iconic-font.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/util.css')}}">
	<link rel="stylesheet" href="{{asset('css/cart.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">		
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="{{asset('css/slick/slick.css')}}">
	<link rel="stylesheet" href="{{asset('css/slick/slick-theme.css')}}">
	<link rel="stylesheet" href="{{asset('css/@sweetalert2/theme-material-ui/material-ui.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body class="body" style="background-image: url({{ url('source/login-bg.png') }}); background-size: cover; height: 100%;">

    @yield('content')
	
	<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
	<script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
	<script src="{{asset('js/slick.min.js')}}"></script>
	<script src="{{asset('js/fontawesome.js')}}"></script>
	<script src="{{asset('css/sweetalert2/dist/sweetalert2.min.js')}}"></script>
	<script  type="text/javascript"  src="{{asset('js/mdb/mdb.min.js')}}"></script>

	<script>
	$('.slider_content').slick({ 
		slidesToShow: 4,
  		slidesToScroll: 1,
  		autoplay: true,
  		autoplaySpeed: 1500,
		arrows:true,
  		prevArrow:'<button class="arrow-slick2 prev-slick2"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
  		nextArrow:'<button class="arrow-slick2 next-slick2"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
	});		
	</script>

	<script>
	$('.btn-num-product-down').on('click', function(){
        var numProduct = Number($(this).next().val());
        if(numProduct > 1) $(this).next().val(numProduct - 1);
    });

    $('.btn-num-product-up').on('click', function(){
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
	});
	
	</script>

	<script>
	const myModal = document.getElementById('myModal')
	const myInput = document.getElementById('myInput')

	myModal.addEventListener('shown.mdb.modal', () => {
  	myInput.focus()
	})
	</script>
<script>
	$(document).ready(function () {
    var navListItems = $('div.setup-panel-3 div a'),
        allWells = $('.setup-content-3'),
        allNextBtn = $('.nextBtn-3'),
        allPrevBtn = $('.prevBtn-3');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-info').addClass('btn-pink');
            $item.addClass('btn-info');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allPrevBtn.click(function(){
        var curStep = $(this).closest(".setup-content-3"),
            curStepBtn = curStep.attr("id"),
            prevStepSteps = $('div.setup-panel-3 div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

            prevStepSteps.removeAttr('disabled').trigger('click');
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content-3"),
            curStepBtn = curStep.attr("id"),
            nextStepSteps = $('div.setup-panel-3 div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
            for(var i=0; i< curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepSteps.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel-3 div a.btn-info').trigger('click');
});
</script>
	<script src="{{asset('js/slick-custom.js')}}"></script>
	<script src="{{asset('js/util.js')}}"></script>

</body>
</html>
