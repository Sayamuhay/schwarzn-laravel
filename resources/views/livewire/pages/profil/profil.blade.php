<div>

{{-- <header>
	<nav class="navbar navbar-expand-sm w-full header-top2" role="navigation">
		<div class="container-fluid header__menu w-full">

			<div class="navbar-brand m-r-25 m-l-15">
				<a href="" class="navbar-brand"><img src="{{url('source/logo.png')}}" alt="logo" loading="lazy" class="m-r-15" width="30"> SCHWARZN</a>
			</div>

			<button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
			</button>

			<div class="collapse navbar-collapse m-l-15" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto">
					<li class="nav-item"><a href="{{route('shop')}}">shop</a></li>
					<li class="nav-item"><a href="../shop-grid.html">best seller</a></li>
					<li class="nav-item"><a href="../all-products.php">new arrival</a></li>
					<li class="nav-item"><a href="../contact.html">blog</a></li>
				</ul>
			</div>
				<div class="col-lg-3 d-flex justify-content-end">

					@if(Auth::user())

						<div class="header__menu1 d-flex justify-content-end">

							@if(!Auth::user()->email_verified_at)
								<div class="m-r-15">
									<button class="drop-btn js-show-notif"><span class="btn-text text-danger animated pulse trans-04">verify your email</span></button>
								</div>

								<div class="wrap-header-cart js-panel-notif" id="js-panel-notif">
									<div class="s-full js-hide-notif"></div>
									<div class="header-cart flex-col-l p-l-65 p-r-25">
										<div class="header-cart-title flex-w flex-sb-m p-b-8">

											<span class="mtext-103 cl2">
												<span class="m-r-10 schwarzn-secondary-color">Dear</span> {{ Auth::user()->name}}
											</span>

											<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-notif">
												<i class="zmdi zmdi-close"></i>
											</div>

										</div>

										<div class="header-cart-content flex-w js-pscroll">
											<div class="header-cart-wrapitem w-full m-t-5">

												<div class="text-danger mb-3">{{ __('Please check your email for a verification link. An email verification from us has sent to you.') }}</div>
												<div class="text-danger mb-3">{{ __('You only can enjoy our services and features if you verify your email') }}</div>
												{{ __('If you did not receive the email, click button below') }}

											</div>
										</div>

									</div>
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

											<a href="{{ route('orderhistory') }}" class=" t usermenu dropdown-item btn-link panel-item-list">
												<li class="d-flex justify-content-between align-items-center flex-wrap">
												  <button class="mb-0">Order History</button>
												  	<div class="d-flex">
														<span class="schwarzn-secondary-color m-r-10">{{ $countorderhaspaid }}</span>
														<span style="color: #cccccc;"><i class="fas fa-chevron-right"></i></span>
													</div>
												</li>
											  </a>
										  
											<a href="{{ route('ordertoPaid') }}" class=" t usermenu dropdown-item btn-link panel-item-bottom">
												<li class="d-flex justify-content-between align-items-center flex-wrap">
													<button class="mb-0">My Bill</button>
													<div class="d-flex">
														<span class="text-danger m-r-10">{{ $countordertopaid }} orders need to be paid</span>
														<span style="color: #cccccc;"><i class="fas fa-chevron-right"></i></span>
													</div>
												</li>
											</a>

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
																	{{ $data->Quantity }} x <span class="product__price">Rp. {{ $data->Price }}</span>
																</span>
															</div>
														</div>
													</li>
													
												@endforeach
											</ul>
										</div>

										<div class="w-full">
											<div class="header-cart-total w-full p-tb-40">
												Total: Rp. <?php echo $totalPrice ?>
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
</header> --}}

@include('layouts.navbar')

    <center>
			<div class="konten2 col-xl-11">
        		<div class="col-md-12 heading-section justify-content-center text-center ftco-animate fadeInUp ftco-animated col-xl-11">			  
            		<h2 class="mb-4 litt">Profile</h2>
				</div>
			</div>		
		</center>

    <div class="container m-b-55 mt-5">
        <div class="main-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">

                  <div class="card" id="profil-card-dekstop" style="border-radius : 10px;">
                    <div class="bg-image hover-overlay ripple centered" data-mdb-ripple-color="light">
                      <img src="{{url('source/user-pic/'.Auth::user()->avatar)}}" class="img-fluid"/>
                    </div>
                    <div class="card-body centered">
                      <h3 class="litt card-title text-uppercase">{{ Auth::user()->name }}</h3>
                      <p class="card-text">{{ Auth::user()->email }} / {{ Auth::user()->gender }}</p>
                      <div class="mt-3 d-flex justify-content-end">
                        <button class="quickView">Edit Profile</button>
                      </div>
                    </div>
                  </div>

                  <div class="card p-2 " style="border-radius : 10px;" id="profile-card-mobile">
                    <div class="d-flex justify-content-between p-3 bg-white">
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
                      <div class="m-t-20 d-flex">
                        <span class="m-r-3" style="color: #222;">EDIT</span> <span class="ml-3" style="color: #cccccc;"><i class="fas fa-chevron-right"></i></span>
                      </div>
                    </div>
                  </div>

                  <div class="card mt-3" style="border-radius : 10px;">
                    <ul class="list-group list-group-flush btn-link">
                        
                    	<a href="{{ route('cart') }}" class="list-group-item">
                    	  <li class="d-flex justify-content-between align-items-center flex-wrap">
                    	    <button class="mb-0"><i class="fas fa-shopping-cart"></i> Cart</button>
                    	    <div class="d-flex">
                    	    <span class="schwarzn-secondary-color m-r-10">{{ $counts }}</span>
                    	    <span class="text-primary"><i class="fas fa-chevron-right"></i></span>
                    	    </div>
                    	  </li>
                    	</a>

                    	<div class="dropdown-divider m-0"></div>
					
                    	<a href="{{ route('orderlist') }}" class="list-group-item">
                    		<li class=" d-flex justify-content-between align-items-center">
                    		  <button class="mb-0"><i class="fas fa-history"></i> Order History</button>
                    		  <div class="d-flex">
                    		  <span class="schwarzn-secondary-color m-r-10">{{ $countorder }}</span>
                    		  <span class="text-primary"><i class="fas fa-chevron-right"></i></span>
                    		  </div>
                    		</li>
                    	</a>
    
                    </ul>
                  </div>
    
                  <div class="card mt-3" style="border-radius : 10px;">
                    <ul class="list-group list-group-flush btn-link text-center">
    
                        <a class="list-group-item justify-content-center text-uppercase" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
    
                    </ul>
                  </div>

                </div>
                <div class="col-md-8">

                	<div class="bor8 mb-3" id="profile-detail">
                		<div class="card-body">	
                		  <div class="row m-3">
                		    <div class="col-sm-3">
                		      <h6 class="mb-0">Username</h6>
                		    </div>
                		    <div class="col-sm-9 schwarzn-secondary-color">
                		      {{ Auth::user()->name }}
                		    </div>
                		  </div>	
                		  <div class="row m-3">
                		    <div class="col-sm-3">
                		      <h6 class="mb-0">Full Name</h6>
                		    </div>
                		    <div class="col-sm-9 schwarzn-secondary-color">
                		      {{ Auth::user()->name }}
                		    </div>
                		  </div>	
                		  <div class="row m-3">
                		    <div class="col-sm-3">
                		      <h6 class="mb-0">Birthday Date</h6>
                		    </div>
                		    <div class="col-sm-9 schwarzn-secondary-color">
                		      {{ Auth::user()->birthday }}
                		    </div>
                		  </div>	
                		  <div class="row m-3">
                		    <div class="col-sm-3">
                		      <h6 class="mb-0">Email</h6>
                		    </div>
                		    <div class="col-sm-9 schwarzn-secondary-color">
                		      {{ Auth::user()->email }}
                		    </div>
                		  </div>	
                		  <div class="row m-3">
                		    <div class="col-sm-3">
                		      <h6 class="mb-0">Phone</h6>
                		    </div>
                		    <div class="col-sm-9 schwarzn-secondary-color">
                		      {{ Auth::user()->phone }}
                		    </div>
                		  </div>	
                		  <div class="row m-3">
                		    <div class="col-sm-3">
                		      <h6 class="mb-0">Province</h6>
                		    </div>
                		    <div class="col-sm-9 schwarzn-secondary-color">
                		      {{ Auth::user()->province }}
                		    </div>
                		  </div>	
                		  <div class="row m-3">
                		    <div class="col-sm-3">
                		      <h6 class="mb-0">City</h6>
                		    </div>
                		    <div class="col-sm-9 schwarzn-secondary-color">
                		      {{ Auth::user()->city }}
                		    </div>
                		  </div>	
                		  <div class="row m-3">
                		    <div class="col-sm-3">
                		      <h6 class="mb-0">Address</h6>
                		    </div>
                		    <div class="col-sm-9 schwarzn-secondary-color">
                		      {{ Auth::user()->address }}
                		    </div>
                		  </div>
                		</div>
                	</div>

                	<div class="row gutters-sm d-flex justify-content-between" id="has-ordered">

                    <div class="row col-6 d-flex justify-content-center">

                    	<div class="d-flex justify-content-center mt-3">
                    	  <h6 class="d-flex align-items-center schwarzn-secondary-color mb-3 text-uppercase">items that you have ordered</h6>
                    	</div>

                    	@if (count($hasordered) === 0)
                    		<center>
                    		    <span class="centered text-danger">Oooppps.. Sepertinya kamu belum memesan apapun. Atau kamu belum menyelesaikan pembayaran?</span>
                    		</center>
                    	@else
                    		<section id="slick">
                    		  <div class="container-fluid mt-3">					
                    		    <div class="row">
                    		      <div class="slider_lastorder">					
                    		      	@foreach ($hasordered as $data)
										<div class="card-product m-2 mb-3 categories_item">
											<div class="con-image">
												<img src="{{url('source/slider/'.$data->ProductImage)}}" alt="" class="img-fluid">
											</div>
										
											<div class="con-text">
												<div class="fs-17 name-product"> {{ $data->ProductName }} </div>
											
												<p class="text-muted">{{ $data->CategoryName }}</p>
											
											</div>
										
											<div class="con-price flex-c-m w-full">
												<span class="schwarzn-secondary-color" name="Price">
													Rp. {{ $data->ProductPrice }}
												</span>
											</div>
										
											<div class="con-button">
												<button class="quickView" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $data->ProductID }}">Quick View</button>
											</div>
										
										</div>
                    		      	@endforeach
                    		      </div>
                    		    </div>
                    		  </div>
                    		</section>
                    	@endif

                    </div>

                    <div class="col-sm-6 mb-3">
                      <div class="bor8 h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center schwarzn-secondary-color mb-3">Transaction History</h6>
                            <div class="d-flex justify-content-center">
                              @if(count($orderl) === 0)
                              <center>
                                <span class="centered text-danger">Oooppps.. Sepertinya kamu belum memesan apapun. Atau kamu belum menyelesaikan pembayaran?</span>
                              </center>
                              @else
                              <table class="text-center w-full">
                              
                                <tr class="table_head bor8">
                                  <th class="column-1">Order ID</th>
                                  <th class="column-2">Status</th>
                                  <th class="column-3">Time</th>
                                </tr>
                              
                                @foreach($orderl as $data)
                                <tr class="table_row">
                                  	<td class="column-1">{{ $data->OrderID }}</td>
                                  	<td	td class="column-2">
										@if($data->statusPayment == NULL)
											Need to Paid
										@else
											{{ $data->statusPayment }}
										@endif
									</td>
                                  	<td class="column-3">08:50</td>
                                </tr>
                                @endforeach
                                
                              
                              </table>
                              @endif
                          </div>
                        </div>
                      </div>
					</div>
					
                	</div>

                </div>
              </div>
            </div>
        </div>

</div>
