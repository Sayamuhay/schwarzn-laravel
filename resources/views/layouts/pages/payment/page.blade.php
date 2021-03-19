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
	
	<title>SCHWARZN | Detail Order</title>
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
	<link href="{{asset('css/mdb/mdb.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/product.css')}}">
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
	<script src="https://cdn.jsdelivr.net/gh/livewire/turbolink@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false">\</script>
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
	<script src="{{ asset('js/app.js') }}" defer></script>
	@livewireStyles
</head>
<body class="body">
	@yield('content')

	@include('layouts.footer')
</body>
</html>