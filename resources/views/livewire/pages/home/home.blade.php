@include('layouts.navbar')
	<div class="d-flex banner justify-content-center w-full">
		<div class="w-full" >						
			<img src="{{url('source/banner/banner1.jpeg')}}">
		</div>
		
		<div class="banner2 w-full" >						
			<img src="{{url('source/banner/banner2.jpeg')}}">
		</div>
	</div>
  
	<div class="sec-banner bg0 p-t-80 p-b-25" id="sec-banner">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w bor8">
						<img src="{{asset('source/categories/categories-shirt.png')}}" class="sec-banner-img" alt="IMG-BANNER">

						<a href="/shirt" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									T-SHIRT
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w bor8">
						<img src="{{asset('source/categories/categories-jacket.png')}}" alt="IMG-BANNER">

						<a href="{{ route('shop') }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									JACKET
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Not Realesed Yet
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w bor8">
						<img src="{{asset('source/categories/categories-cn.png')}}" alt="IMG-BANNER">

						<a href="/crewneck" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									CREWNECK
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="d-flex justify-content-center btn-group-lg mt-5 mb-5" role="group" aria-label="Basic example">
		<button type="button" id="button-sec-banner" class="btn-pay m-r-3 p-t-5 p-b-5 p-l-15 p-r-15 text-uppercase">T-shirt</button>
		<button type="button" id="button-sec-banner" class="btn-pay p-t-5 p-b-5 p-l-15 p-r-15 text-uppercase">Jacket</button>
		<button type="button" id="button-sec-banner" class="btn-pay m-l-3 p-t-5 p-b-5 p-l-15 p-r-15 text-uppercase">Crewneck</button>
	</div>

	<center>
		<div class="heading-section justify-content-center text-center">			  
			<h3 class="mb-4 litt ltext-103">Recommended</h3>
		</div>		
	</center>

	<section class="categories">
		<div class="container-fluid mb-3">
			<div class="row d-flex justify-content-center">

				<div class="col-lg-4 p-0 centered">
					@foreach($getMost as $data)

					<div class="block2">
						<div class=" categories__large__item set-bg block2-pic hov-img0 img-fluid rounded" data-setbg="{{url('source/slider/'.$data->ProductImage)}}" style="background-image: url({{url('source/banner/banner2.jpeg')}});">
							<div class="block2-btn flex-c-m centered bor2 trans-04 ltext-101">
								<button type="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $data->ProductID }}" class="ltext-101 bg-white cl0 p-2 trans-09 text-dark" style="Border-radius: 25px;">
									<span class="m-l-5 m-r-5">Quick View</span>
								</button>
							</div>
						</div>
					</div>

					<h3 class="d-flex justify-content-center mt-3 text-uppercase ltext-103">{{ $data->ProductName }}</h3>
					
					@endforeach
				</div>

				<div class="col-lg-7 m-l-10" id="mostFour">
					<div class="row">
						@foreach($getMostFour as $data)
						<div class="col-lg-4 col-md-4 col-sm-4 p-0">
							<div class="block2">
								<div class="categories__item set-bg block2-pic hov-img0 img-fluid" data-setbg="{{url('source/slider/'.$data->ProductImage)}}" style="background-image: url('{{url('source/slider/'.$data->ProductImage)}}');">
									<div class="block2-btn flex-c-m centered bor2 trans-04 stext-101">
										<button type="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $data->ProductID }}" class="stext-101 bg-white cl0 p-1 trans-04 text-dark" style="Border-radius: 25px;">
											<span class="">Quick View</span>
										</button>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

	</section>

	<section class="bg0 p-b-140 mt-5">
		<div class="container">
			<div class="p-b-10 d-flex justify-content-between mb-5">
				<h3 class="ltext-103 cl5">
					Some Products Overview
				</h3>

				{{-- <div class="flex-w flex-c-m">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 js-show-filter" id="filter-button-home">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div> --}}
			</div>

			{{-- <div class="flex-w flex-sb-m p-b-52">

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>

			</div> --}}

			<div class="row centered d-flex justify-content-center w-full isotope-grid mt-1" >
				<div class="slick-response row">
				@foreach ($newArrival as $data)

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
									Rp. {{ number_format($data->ProductPrice, 0, ',', '.') }}
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

	@foreach ($newArrival as $data)
		
		<div class="modal fade" id="exampleModal{{ $data->ProductID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-xl">

				<div class="modal-content">

					<div class="modal-body">
						<div class="container">
							<div class="bg0 p-t-15 p-b-15 p-lr-15-lg how-pos3-parent">

								<div class="row">
									<div class="col-md-6 col-lg-7 p-b-0">
										<div class="p-l-25 p-r-30 p-lr-0-lg">
											<div class="wrap-slick3 flex-sb flex-w">

												<div class="wrap-slick3-dots"></div>

												<div class="slick3 gallery-lb">

													<div class="item-slick3" data-thumb="{{url('source/slider/'.$data->ProductImage)}}">
														<div class="wrap-pic-w pos-relative">
															<img height="550px" src="{{url('source/slider/'.$data->ProductImage)}}" alt="IMG-PRODUCT">
														</div>
													</div>

													<div class="item-slick3" data-thumb="{{url('source/slider/thumb/'.$data->ProductThumb)}}">
														<div class="wrap-pic-w pos-relative">
															<img height="550px" src="{{url('source/slider/thumb/'.$data->ProductThumb)}}" alt="IMG-PRODUCT">					
														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
									
									<div class="col-md-6 col-lg-5 p-b-0">
										<h2 class="text-uppercase">{{ $data->ProductName }}</h2>

										<h3 class="mb-4 text-muted" >{{ $data->CategoryName }}</h3>

										<h3 class="mb-4 product__price schwarzn-secondary-color">Rp. {{ number_format($data->ProductPrice, 0, ',', '.') }}</h3>

										<p class="mb-5">
											Bahan CottOn 30s<br>
											Sablon : Discharge ( Menyerap Kedalam Bahan Baju )<br>
											<br>
											Ukuran :<br>
											S ( 50x74 ) cm<br>
											M ( 52x76 ) cm<br>
											L ( 54x78 ) cm<br>
											XL ( 56x80 ) cm<br>
											XXL ( 58x82 ) cm<br>
										</p>
						
										<div class="d-flex"><h4 class="col-4">STOCK </h4><h4 class="text-muted">{{ $data->ProductStock }}</h4></div>

										<div class="d-flex" >
											<h4 class="col-md-4">COLOR</h4>
											<h4 class="text-muted" name="ProductColor">
											{{ $data->ProductColor }}
										  	</h4>
										</div>

										<form  action="{{ route('inserttocart') }}" method="post">
											@csrf
											@method('POST')

											<div class="p-t-13">
												<div class="mt-4 d-flex justify-content-between g-3">

													<div class="size d-flex">
														<span class="input-group-text bor10 bg10" id="addon-wrapping">Choose a size</span>
														<select type="select" name="ProductSize" height="45px" class="form-control1 bor10">
															<option>S</option>
															<option>M</option>
															<option>L</option>
															<option>XL</option>
															<option>XXL</option>
														</select>
													</div>

													<div class="wrap-num-product d-flex align-items-center justify-content-start">
														<div class="btn-num-product-down cl8 col-1 flex-c-m">
															<i class="zmdi zmdi-minus"></i>
														</div>

														<input class="mtext-104 cl3 col-2 txt-center num-product" type="number" name="Quantity" value="1">

														<div class="btn-num-product-up cl8 col-1 flex-c-m">
															<i class="fs-16 zmdi zmdi-plus"></i>
														</div>
													</div>
												</div>

												<hr class="mt-3">

												<div class="d-flex justify-content-center">

													@if(Auth::user())
													<div class="d-none">
														<input type="text" name="id" class="d-none" value="{{ Auth::user()->id }}">
														<input type="text" name="name" class="d-none" value="{{ Auth::user()->name }}">
														<input type="text" name="ProductID" class="d-none" value="{{ $data->ProductID }}">
														<input type="text" name="ProductImage" class="d-none" value="{{ $data->ProductImage }}" >
														<input type="text" name="ProductName" class="d-none" value="{{ $data->ProductName }}" >
														<input type="text" name="ProductWeight" class="d-none" value="{{ $data->ProductWeight }}" >
														<input type="text" name="ProductColor" class="d-none" value="{{ $data->ProductColor }}">
														<input type="text" name="ProductPrice" class="d-none" value="{{ $data->ProductPrice }}">
													</div>
													@endif
												
													<div class="m-r-5">
													<button class="btn-pay mt-5 pt-2 pb-2 p-l-50 p-r-50 waves-effect waves-light" type="submit">
														ADD to Cart
													</button>
													</div>

													<div class="m-l-5">
													<button class="btn-pay mt-5 pt-2 pb-2 p-l-50 p-r-50 waves-effect waves-light" type="button" data-mdb-dismiss="modal">
														Close
													</button>
													</div>

									 			</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		
	@endforeach