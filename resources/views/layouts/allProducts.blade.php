				@if (count($product) === 0)
					<div class="container d-flex justify-content-center align-content-center m-t-100 m-b-100">
					   <div class="alert alert-warning">Sorry the items you looking for is under production</div>
					</div>
                @endif
					
				<div class="row centered d-flex justify-content-center w-full isotope-grid mt-3" >

					@foreach ($product as $data)
	
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
	
								<div class="con-button d-flex ">
									<button class="quickView" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $data->ProductID }}">Quick View</button>
								</div>
	
							</div>
	
					@endforeach

				</div>

		@foreach ($product as $data)
		
		<div class="modal fade" id="exampleModal{{ $data->ProductID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-xl">

				<div class="modal-content">
					<form action="{{ route('inserttocart') }}" method="post">
						@csrf
						@method('POST')

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

										<h3 class="mb-4 schwarzn-secondary-color">Rp. {{ number_format($data->ProductPrice, 0, ',', '.') }}</h3>

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
									</div>
								</div>
							</div>
						</div>
					</div>
					</form>

				</div>
			</div>
		</div>
		
	@endforeach
