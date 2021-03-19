<div>
<header>
	<nav class="navbar navbar-expand-sm w-full header-top2" role="navigation">
		<div class="container-fluid header__menu w-full">

			<div class="navbar-brand m-r-25 m-l-15">
				<a href="/" class="navbar-brand"><img src="{{url('source/logo.png')}}" alt="logo" loading="lazy" class="m-r-15" width="30"> SCHWARZN</a>
			</div>

			<button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
			</button>

			<div class="collapse navbar-collapse m-l-15" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto">
					<li class="nav-item"><a href="{{route('shop')}}">shop</a></li>
					<li class="nav-item"><a href="{{route('shop')}}">best seller</a></li>
					<li class="nav-item"><a href="{{route('shop')}}">new arrival</a></li>
					<li class="nav-item"><a href="{{route('shop')}}">blog</a></li>
				</ul>
			</div>
				<div class="col-lg-3 d-flex justify-content-end">

					@if(Auth::user())

						<div class="header__menu1 d-flex justify-content-end">

							@if(!Auth::user()->email_verified_at)
								<div class="m-r-15">
									<button class="drop-btn js-show-profile"><span class="btn-text text-danger animated pulse trans-04">verify your email</span></button>
								</div>
							@else
								@if(Auth::user()->level === 0)
								<button class="drop-btn m-r-5 js-show-cart" type="button" aria-expanded="false">
									<span class="btn-text"><i class="fas fa-shopping-cart"></i></span>
								</button>
							
								<div class="m-r-15">
									<span class="btn-text">: {{ $counts }}  items</span>
								</div>
								@endif
							@endif

  							<button class="drop-btn js-show-profile" >
						  		<span class="btn-text">{{ Auth::user()->name }} <i class="fas fa-bars"></i></span>
							</button>


							<div class="wrap-header-cart js-panel-profile" id="js-panel-profile">
								<div class="s-full js-hide-profile"></div>
								<div class="header-cart centered p-3" style="background-color: #F5F5F5;">

									<div class="d-flex bg-white p-2 panel-item-top">
										<div class="pointer js-hide-profile">
											<i class="fas fa-chevron-left"></i>
										</div>
										<div class="centered">
											<strong class="text-black">MENU</strong>
										</div>
									</div>

									<div class="dropdown-divider m-0"></div>

									<div class="d-flex justify-content-between p-3 bg-white panel-item-bottom">
										<div class="d-flex">
											<img src="{{url('source/user-pic/'.Auth::user()->avatar)}}" alt="Admin" class="rounded-circle m-r-15" width="60">
											<div class="mt-2">

												<div class="buset flex-nowrap align-content-center">
													<div class="name1 h5 text-uppercase text-black">	
														{{ Auth::user()->name }}
													</div>
												</div>

												<div class="m-t-1 m-b-5">
													<div class="buset flex-nowrap align-content-center">
														<div class="name1 h6">	
															{{ Auth::user()->email }}
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="m-t-20">
											<span style="color: #cccccc;"><i class="fas fa-chevron-right"></i></span>
										</div>
									</div>

									<div class="bg-dark" height=""></div>&nbsp;&nbsp;

									@if(!Auth::user()->email_verified_at)
										<div class="header-cart-wrapitem w-full m-t-5 p-3 panel-item-list bg-white disabled">

											<div class="text-danger mb-3 ">{{ __('Please check your email for a verification link. An email verification from us has sent to you.') }}</div>
											<div class="text-danger mb-3">{{ __('You only can enjoy our services and features if you verify your email') }}</div>
											<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
												@csrf
												<button type="submit" class="btn-pay mt-2 pt-2 pb-2 p-l-50 p-r-50">{{ __('click here to request another') }}</button>.
											</form>
										</div>
									@else
										<div class="">

											<a href="{{ route('account') }}" class=" t usermenu dropdown-item btn-link panel-item-top">
												<li class="d-flex justify-content-between align-items-center flex-wrap">
												  <button class="mb-0">My Account</button>
												  <div class="d-flex">
												  	<span style="color: #cccccc;"><i class="fas fa-chevron-right"></i></span>
												  </div>
												</li>
											</a>

											<a href="{{ route('orderlist') }}" class=" t usermenu dropdown-item btn-link panel-item-list">
												<li class="d-flex justify-content-between align-items-center flex-wrap">
												  <button class="mb-0">Order History</button>
												  	<div class="d-flex">
														<span class="schwarzn-secondary-color m-r-10">{{ $countorder }}</span>
														<span style="color: #cccccc;"><i class="fas fa-chevron-right"></i></span>
													</div>
												</li>
											</a>

											<div type="button" class="t usermenu dropdown-item btn-link panel-item-bottom">
												<li class="d-flex justify-content-between align-items-center flex-wrap js-show-notif" id="js-panel-notif">
													<button class="mb-0">Notification</button>
												  	<div class="d-flex">
															<span class="badge bg-danger m-r-10 ms-2 flex-c-m">{{ auth()->user()->unreadNotifications->count() }}</span>
														<span style="color: #cccccc;"><i class="fas fa-chevron-right"></i></span>
													</div>
												</li>
											</div>

										</div>

										<div class="bg-dark" height=""></div>&nbsp;&nbsp;
										
										<div class="">
											<a href="" class=" t usermenu dropdown-item btn-link panel-item-top">
												<li class="d-flex justify-content-between align-items-center flex-wrap">
													<button class="mb-0">Information Center</button>
													<div class="d-flex">
														<span style="color: #cccccc;"><i class="fas fa-chevron-right"></i></span>
													</div>
												</li>
											</a>
											
											<div class="dropdown-divider m-0"></div>
											
											<a href="" class=" t usermenu dropdown-item btn-link panel-item-bottom">
												<li class="d-flex justify-content-between align-items-center flex-wrap">
													<button class="mb-0">Customer Care</button>
													<div class="d-flex">
														<span style="color: #cccccc;"><i class="fas fa-chevron-right"></i></span>
													</div>
												</li>
											</a>
										</div>
									@endif

									<div class="bg-dark" height=""></div>&nbsp;&nbsp;

									<div class="d-flex justify-content-center w-full bg-white panel-item-list" style="border-radius: 7px;">
										<div class="p-1" type="submit" width="100%" name="logout">
											<a class="btn-in-dropdown justify-content-center text-danger" href="{{ route('logout') }}"
												   onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
												   {{ __('Logout') }}
											</a>
										</div>
								
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</div>

								</div>
							</div>

							<div class="wrap-header-cart js-panel-notif" id="js-panel-notif">
								<div class="s-full js-hide-notif"></div>
								<div class="header-cart centered p-3" style="background-color: #F5F5F5;">

									<div class="d-flex bg-white p-2 panel-item-top">
										<div class="pointer js-hide-notif">
											<i class="fas fa-chevron-left"></i>
										</div>
										<div class="centered">
											<strong class="text-black">Notifications</strong>
										</div>
									</div>

									<div class="bg-dark" height=""></div>&nbsp;&nbsp;

										<div class="mb-5">
											<div class="d-flex bg-white p-2 panel-item-top">
												<div class="">
													<strong class="text-black">New Notifications</strong>
												</div>
											</div>

											<div class="header-cart-content flex-w js-pscroll">
												<div class="header-cart-wrapitem t usermenu panel-item-list">
													<div class="">
														@foreach($notifications as $notification)
															@if($notification->read_at == NULL)
															<div class="p-2 d-flex justify-content-between">
																<div class="">Your Order with Order ID : <strong> {{ $notification->data['OrderID'] }} </strong>. Has updated with receipt : <strong>{{ $notification->data['receipt'] }}</strong>.</div>
																<div class="">
																	<button class="btn btn-success shadow-0 mb-1" wire:click.prevent="markread('{{ $notification->id }}')">
																		<i class="fas fa-check"></i>
																	</button>
																	<button class="btn btn-danger shadow-0 mt-1" wire:click.prevent="deletenotif('{{ $notification->id }}')">
																		<i class="far fa-trash-alt "></i>
																	</button>
																</div>
															</div>
															@endif
														@endforeach
													</div>
												</div>
											</div>
										</div>



										<div class="">
											<div class="d-flex bg-white p-2 panel-item-top">
												<div class="">
													<strong class="text-black">Last Notifications</strong>
												</div>
											</div>

											<div class="header-cart-content flex-w js-pscroll">
												<div class="header-cart-wrapitem t usermenu panel-item-list">
													<div class="">
														@foreach ($readednotif as $notification)
															@if (!($notification->read_at == NULL))
															<div class="p-2 d-flex justify-content-between">
																<div class="">Your Order with Order ID : <strong> {{ $notification->data['OrderID'] }} </strong>. Has updated with receipt : <strong>{{ $notification->data['receipt'] }}</strong>.</div>
																	<button class="btn btn-danger shadow-0" wire:click.prevent="deletenotif('{{ $notification->id }}')">
																		<i class="far fa-trash-alt"></i>
																	</button>
															</div>
														@endif
														@endforeach
													</div>
												</div>
											</div>
										</div>


									<div class="bg-dark" height=""></div>&nbsp;&nbsp;

									<div class="d-flex justify-content-center w-full bg-white panel-item-list" style="border-radius: 7px;">
										<div class="p-1" type="submit" width="100%" name="logout">
											<a class="btn-in-dropdown justify-content-center text-danger" href="{{ route('logout') }}"
												   onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
												   {{ __('Logout') }}
											</a>
										</div>
								
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</div>

								</div>
							</div>

							@if(Auth::user()->level ===0)
								<div class="wrap-header-cart js-panel-cart" id="js-panel-cart">
									<div class="s-full js-hide-cart"></div>
									<div class="header-cart flex-col-l p-l-65 p-r-25">
										<div class="header-cart-title flex-w flex-sb-m p-b-8">
											<span class="mtext-103 cl2">
												{{ Auth::user()->name}}'S Cart
											</span>
											<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
												<i class="zmdi zmdi-close"></i>
											</div>
										</div>
										<div class="header-cart-content flex-w js-pscroll">
											@if(count($cart) === 0)
												<div class="alert alert-warning">Seems you doesn't have items in your cart</div>
											@endif		
										
											<ul class="header-cart-wrapitem w-full m-t-5">
												<?php $totalPrice=0; ?>			
												@foreach ($cart as $data)
												<?php 
													$subtotal = $data->Quantity * $data->Price;
													$totalPrice+=$subtotal;
												?>
													<li class="header-cart-item flex-w flex-t d-flex mt-3">
														<div class="header-cart-item-img align-items-center">
															<img src="{{url('source/slider/'.$data->ProductImage)}}" alt="{{ $data->ProductImage}}">
														</div>
														<div class="header-cart-item-txt align-items-center">
															<span class="header-cart-item-name m-b-10 hov-cl1 trans-04 d-flex justify-content-start">
																{{ $data->ProductName }}
															</span>
															<span class="header-cart-item-name m-b-10 hov-cl1 trans-04 d-flex justify-content-start text-muted">
																<small>{{ $data->CategoryName }}</small>
															</span>
															<div class="d-flex justify-content-start">
																<span class="header-cart-item-info">
																	{{ $data->Quantity }} x <span class="product__price">Rp. {{ number_format($data->Price, 0, ',', '.') }}</span>
																</span>
															</div>
														</div>
													</li>
												@endforeach
											</ul>
										</div>
										<div class="w-full">
											<div class="header-cart-total w-full p-tb-40">
												Total: Rp. <?php echo  number_format($totalPrice, 0, ',', '.') ?>
											</div>					
										</div>
										<div class="header-cart-buttons d-flex justify-content-center " >
											<a href="/cart" class=" flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
												View Cart
											</a>
										</div>
									</div>
								</div>
							@endif

						</div>	

					@endif
					
					@guest
						<nav class="header__menu d-flex">
							<ul>
            	                @if (Route::has('login'))
            	                    <li class="">
            	                        <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
            	                    </li>
            	                @endif
								
								<li>or</li>

            	                @if (Route::has('register'))
            	                    <li class="">
            	                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
            	                    </li>
            	                @endif
							</ul>
            	    	</nav>
					@endguest

				</div>		

				<script>
					if ($(window).width() > 992) {
						$(window).scroll(function(){  
							if ($(this).scrollTop() > 40) {
								$('.header-top2').addClass("fixed-top");
								$('body').css('padding-top', $('.header-top2').outerHeight() + 'px');
							}else{
								$('.header-top2').removeClass("fixed-top");
								$('body').css('padding-top', '0');
							}   
						});
					}
				</script>


		</div>
	</nav>
</header>
</div>