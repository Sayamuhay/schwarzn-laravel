<div>
    @include('layouts.navbar')
    @include('livewire.pages.cart.update')
    @include('livewire.pages.cart.ongkir')

        <center>
			<div class="konten2 col-xl-11">
        		<div class="col-md-12 heading-section justify-content-center text-center ftco-animate fadeInUp ftco-animated col-xl-11">			  
            		<h2 class="mb-4 litt">Cart & Checkout</h2>
				</div>
			</div>		
		</center>

    @if(count($cart) === 0)
        <center>
            <div class="container d-flex justify-content-center align-content-center m-t-100 m-b-50">
                <div class="alert alert-warning">Seems you doesn't have items in your cart. So go <a href="{{ route('shop') }}" class="alert-link me-1"> back to shopping </a> and grab some stuff</div>
             </div>	
        </center>

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

    @else
    
    <div class="bg0 p-t-55 p-b-85 ">
	    <div class="m-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8  m-b-50 ">
 
                    <table class="table-shopping-cart bor-8">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Size</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Subtotal</th>
                                    <th class="column-6"></th>
								</tr>

                                <form action="{{route('createOrder')}}" method="post">                               
                                @csrf
                                @method('POST')

                                <?php
                                $totalprice = 0;
                                ?>
                                <input type="text" name="counts" class="d-none" value="{{$counts}}">
                                <input type="text" name="kode" class="d-none" value="{{$kode}}">
                                @foreach ($cart as $data)

                                <?php 
                                    $subtotal = $data->Quantity * $data->Price;
                                    $totalprice+=$subtotal;
                                ?>

                                <div class="">
                                    <input type="text" name="OrderID[]"  class="d-none" value="{{$kode}}">
                                    <input type="text" name="id[]" class="d-none" value="{{ Auth::user()->id }}">
                                    <input type="text" name="ProductID[]" class="d-none" value="{{ $data->ProductID }}"></input>
						            <input type="text" name="ProductName[]"  class="d-none" value="{{ $data->ProductName }}" >
                                    <input type="text" name="ProductSize[]" class="d-none" value="{{ $data->ProductSize }}">
                                    <input type="text" name="ProductQuantity[]"  class="d-none" value="{{ $data->Quantity }}">
						            <input type="text" name="Price[]"  class="d-none" value="<?php echo $subtotal ?>">
					            </div>


                                <tr class="table_row">

									<td class="column-1">
                                        <div class=" d-flex justify-content-center">
                                            <img src="{{url('source/slider/'.$data->ProductImage)}}" alt="IMG">
                                        </div>
                                    </td>  
                            
                                    <td class="column-2">
                                        <div class=" text-lg-center">
                                            <h2 class="h6 mb-0">{{ $data->ProductName }}<br>
                                                <small class="text-muted">cost : Rp.{{ number_format($data->Price, 0, ',', '.')}}</small>
                                            </h2>
                                        </div>
                                    </td>

                                    <td class="column-3">
                                        <div class="product-line-price text-center">
                                            <span class="product-line-price">{{ $data->ProductSize }}</span>
                                        </div>
                                    </td>

                                    <td class="column-4">
                                        <div class="pass-quantity m-3 d-flex justify-content-center">
                                            <span class="product-line-price">{{ $data->Quantity }}</span>
                                        </div>
                                    </td>

                                    <td class="column-5">
                                        <div class="d-flex justify-content-center text-center">			
                                            <span class="product-line-price product__price">Rp. <?php echo number_format($subtotal, 0, ',', '.') ?></span>
                                        </div>
                                    </td>

                                    <td class="column-6">
                                        <div class="d-flex justify-content-center">
                                            <button data-mdb-toggle="modal" type="button" data-mdb-target="#updateModal" wire:click="edit({{ $data->CartID }})" class="btn-pay m-r-3 p-t-5 p-b-5 p-l-15 p-r-15">
                                                <span>Edit</span>
                                            </button>
                                            <button wire:click="delete({{ $data->CartID }})" type="button" class="btn-pay m-l-3 p-t-5 p-b-5 p-l-15 p-r-15">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                    </table> 
                </div>

                <div class="col-xl-4 col-lg-5 col-md-6 totals">
                    <div class="bor8 px-3">

                        <p class="text-uppercase mb-0 py-3"><strong>Order Summary</strong></p>
                        <div class="input-group mb-3 flex-nowrap">
                            <span class="input-group-text bor10 bg10" id="addon-wrapping">Name</span>
                            <input type="text" class="form-control bor10" name="name" value="" aria-label="Username" aria-describedby="addon-wrapping" required/>
                        </div>

                        <div class="input-group mb-3 flex-nowrap">
                            <span class="input-group-text bor10 bg10" id="addon-wrapping">No. Phone</span>
                            <input type="tel" id="typePhone" name="phone" class="form-control bor10" value="" aria-label="UserPhone" aria-describedby="addon-wrapping" required/>
                        </div>

                        <div class="input-group mb-3 flex-nowrap">
                            <span class="input-group-text bor10 bg10" id="addon-wrapping">Email</span>
                            <input type="email" id="email" name="email" class="form-control bor10" value="" aria-label="UserPhone" aria-describedby="addon-wrapping" required/>
                        </div>

                        <div class="input-group form-group mb-3 flex-nowrap">
                            <span class="input-group-text bor10 bg10" id="addon-wrapping">Province</span>
                            <select name="provinsi_id" wire:model="provinceId" id="provinsi_id" class="form-control bor10">
                            <option value="">Pilih Provinsi</option>
                            @forelse($daftarProvinsi as $province)
                            <option value="{{ $province['province_id'] }} - {{ $province['province'] }}">{{ $province['province'] }}</option>
                            @empty
                            <option value="">Pilih Tidak Ditemukan</option>
                            @endforelse
                            </select>
                        </div>

                        <div class="input-group mb-3 flex-nowrap">
                            <span class="input-group-text bor10 bg10" id="addon-wrapping">City</span>
                            <select name="kota_id" wire:model="kota_id" id="kota_id" class="form-control bor10">
                                <option value="">-- pilih kota tujuan --</option>
                                @if($provinceId)
                                    @forelse($daftarKota as $city)
                                        <option value="{{ $city['city_id']}} - {{ $city['city_name']}}">{{ $city['city_name']}}</option>
                                    @empty
                                        <option value="">Kota/Kabupaten Tidak Ditemukan</option>
                                    @endforelse
                                @endif
                            </select>
                        </div>
 


                        <div class="input-group mb-3 flex-nowrap">
                            <span class="input-group-text bor10 bg10" id="addon-wrapping">Address</span>
                            <textarea class="form-control bor10" name="address" required></textarea>
                        </div>

                        <div class="input-group mb-3 flex-nowrap">
                            <span class="input-group-text bor10 bg10" id="addon-wrapping">Post Code</span>
                            <input type="text" class="form-control bor10" name="postalCode" placeholder="Zip or Postal Code" aria-label="Username" aria-describedby="addon-wrapping" required/>
                        </div>

                        <div class=" mb-3 d-flex justify-content-between">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text bor10 bg10" id="addon-wrapping">Courier</span>
                                <select name="jasa" id="jasa" wire:model="jasa" class="form-control-courier bor10">
                                    <option>Pilih kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS INDONESIA</option>
                                </select>
                            </div>

                            <div>
                                @if($jasa)
                                    <button wire:click.prevent="getOngkir" wire:loading.class="bg-gray" data-mdb-toggle="modal" data-mdb-target="#ongkirModal" class="btn-cek p-t-5 p-b-5 p-l-15 p-r-15">cek</button>
                                @endif
                            </div>
                        </div>

                        <div class="input-group mb-3 flex-nowrap">
                            <span class="input-group-text bor10 bg10" id="addon-wrapping">Note</span>
                            <textarea class="form-control bor10" name="Note" placeholder="Additional Note" aria-label="Username" aria-describedby="addon-wrapping"/></textarea>
                        </div>

                        <div class="totals-item d-flex align-items-center justify-content-between mt-1">
                            <p class="text-uppercase">Total Weight</p>
                            <input type="hidden" name="weight" id="weight" class="" value="{{ $weight }}" readonly >
                            <p class="totals-value" id="cart-subtotal">{{ $weight }} gram</p>
                        </div>

                        <div class="totals-item d-flex align-items-center justify-content-between mt-1">
                            <p class="text-uppercase">total</p>
                            <input type="text" name="total" class="d-none" value="<?= $totalprice ?>">
                            <p class="totals-value" id="cart-subtotal">Rp. <?php echo number_format($totalprice, 0, ',', '.') ?></p>
                        </div>

                        <div class="totals-item d-flex align-items-center justify-content-between mt-1">
                            <p class="text-uppercase">Shipping Service</p>
                            <p class="totals-value" id="" name=""><input type="text" name="shippingService" class="d-none" value="{{ $courierservice }}" readonly>
                                @if($courierservice)
                                    {{ $courierservice}}
                                @endif    
                                </p>
                        </div>

                        <div class="totals-item d-flex align-items-center justify-content-between mb-3">
                            <p class="text-uppercase">Ongkos Kirim</p>
                            <p class="totals-value" id="" name="">Rp. <input type="hidden" name="ongkir" class="d-none" value="{{ $Ongkirx }}" readonly>
                            @if($Ongkirx)
                                {{ number_format($Ongkirx, 0, ',', '.') }}
                                
                            @else
                                0
                            @endif    
                            </p>
                        </div>
                        
                        <hr class="mr-3 ml-3">

                        <div class="totals-item totals-item-total d-flex align-items-center justify-content-between mb-3">
                            <p class="text-uppercase"><strong>GRAND AMOUNT</strong></p>
                            <p class="totals-value font-weight-bold cart-total" id="grandamount">Rp. <input type="text" name="grandtotal" class="d-none" value="{{ $totalprice + $Ongkirx }}" readonly>
                            @if($Ongkirx)
                            {{ number_format($totalprice + $Ongkirx, 0, ',', '.') }}
                           
                            @else
                            <?= number_format($totalprice, 0, ',', '.') ?>
                            @endif
                            </p>
                        </div>
                        
			        </div>

                    <div class="btn-pay mt-3 btn-lg rounded-0 d-flex justify-content-center">
                        <button class=" w-100 d-flex  justify-content-center" name="order" id="paynow" >Order</button>
                    </div>

                    <div>
                        <small><span class="fs-12" style="color: red;">*please fill the input fields with carefully. After you click order button, the procces cannot be canceled or undone</span></small>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
    @endif
    

</div>