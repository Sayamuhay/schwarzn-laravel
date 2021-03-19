

@section('content')

@include('layouts.admin.navbars.sidebar')
@include('layouts.admin.navbars.navbar')

<div class="content">

    <div class="m-3">
        <div class="row mb-3">
    
            <div class="col-md-8">
                <div class="">
                    <div class="row centered">
                        @foreach ($detailitems as $data)
                        <div class="card-product m-2 mb-3 categories_item">
                            <div class="con-image">
                                <img src="{{url('source/slider/'.$data->ProductImage)}}" alt="" class="img-fluid">
                            </div>
                        
                            <div class="con-text">
                                <center><div class="fs-17 name-product"> {{ $data->ProductName }} </div></center>
                                
                                <div class="d-flex justify-content-between">
                                    <p class="text-muted">{{ $data->CategoryName }}</p>
                                    <p class="text-muted">Qty : {{ $data->Quantity }}</p> 
                                </div>
    
                                <div class="d-flex justify-content-between">
                                    <p class="text-muted">Item Price</p>
                                    <p class="text-muted">Rp. {{ number_format($data->ProductPrice, 0, ',', '.')}}</p> 
                                </div>
    
                                <div class="dropdown-divider"></div>
    
                                <div class="d-flex justify-content-between">
                                    <p class="text-muted">Subtotal</p>
                                    <p class="schwarzn-secondary-color">Rp. {{ number_format($data->SubTotal, 0, ',', '.')}}</p> 
                                </div>
    
                            </div>
                        
                        
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
    
            <div class="col-12 col-md-4">
                {{-- transaction status --}}
                <div class="card-utility mb-3">
                    <center>
                        <h4 class="quickView text-uppercase mb-4">Transaction status</h4>
                    </center>
    
                    <div class="dropdown-divider"></div>
    
                    <div class="d-flex">
                        <div class="col-5">Status</div>
                        <span class="col-1">:</span>
                        <span class="@if($transaction_status == 'settlement') text-success @elseif($transaction_status == 'pending') text-warning @endif">{{ $transaction_status }}</span>
                    </div>
                    @if($transaction_status == 'settlement')
                        <div class="d-flex">
                            <div class="col-5">Time</div>
                            <span class="col-1">:</span>
                            <span class="">{{ $transaction_time }}</span>
                        </div>
                    @elseif($transaction_status == 'pending')
                    <div class="d-flex">
                        <div class="col-5">Deadline</div>
                        <span class="col-1">:</span>
                        <span class="text-danger">{{ $deadline }}</span>
                    </div>
                    @endif
                    
                    <div class="d-flex">
                        <div class="col-5">Payment type</div>
                        <span class="col-1">:</span>
                        <span class="">{{ $payment_type }}</span>
                    </div>
    
                    @if ($payment_type == 'bank_transfer')
                        <div class="d-flex">
                            <div class="col-5">Bank</div>
                            <span class="col-1">:</span>
                            <span class="text-uppercase">{{ $bank }}</span>
                        </div>
                        
                        @if ($va_number)
                            <div class="d-flex">
                                <div class="col-5">VA Number</div>
                                <span class="col-1">:</span>
                                <span class="">{{ $va_number }}</span>
                            </div>
                        @endif
    
                    @endif
                    
                    @if ($payment_type == 'cstore')
                        <div class="d-flex">
                            <div class="col-5">Store</div>
                            <span class="col-1">:</span>
                            <span class="text-uppercase">{{ $store }}</span>
                        </div>
                    @endif
    
                    <div class="d-flex">
                        <div class="col-5">Gross Amount</div>
                        <span class="col-1">:</span>
                        <span class="">Rp. <span class="schwarzn-secondary-color">{{  number_format($gross_amount, 0, ',', '.') }}</span></span>
                    </div>
                </div>
                {{-- end of transaction status --}}
    
                {{-- order detail --}}
                <div class="card-utility mb-3">
    
                    <center>
                        <h4 class="quickView text-uppercase mb-4">Order Detail</h4>
                    </center>
    
    
                    <div class="d-flex">
                        <div class="col-5">Order ID</div>
                        <span class="col-1">:</span>
                        <span class="">{{ $Order->OrderID }}</span>
                    </div>
    
                    <div class="d-flex">
                        <div class="col-5">Created at</div>
                        <span class="col-1">:</span>
                        <span class="">{{ $Order->created_at }}</span>
                    </div>
    
                    <div class="d-flex">
                        <div class="col-5">User ID</div>
                        <span class="col-1">:</span>
                        <span class="">{{ $Order->UserID }}</span>
                    </div>
    
                    <div class="d-flex">
                        <div class="col-5">Order on name</div>
                        <span class="col-1">:</span>
                        <span class="">{{ $Order->name }}</span>
                    </div>
    
                    <div class="d-flex">
                        <div class="col-5">Phone Number</div>
                        <span class="col-1">:</span>
                        <span class="">{{ $Order->phone }}</span>
                    </div>
                    
                    <div class="d-flex">
                        <div class="col-5">Items in Order</div>
                        <span class="col-1">:</span>
                        <span class="">{{ $Order->TotalItem }}</span>
                    </div>
    
                    <div class="d-flex">
                        <div class="col-5">Subtotal</div>
                        <span class="col-1">:</span>
                        <span class="">Rp. <span class="schwarzn-secondary-color">{{  number_format($Order->SubTotalPrice, 0, ',', '.') }}</span></span>
                    </div>
    
                </div>
                {{-- end of order detail --}}
    
                {{-- Order Address --}}
                <div class="card-utility mb-3">
    
                    <center>
                        <h4 class="quickView text-uppercase mb-4">Order Address</h4>
                    </center>
    
                    <div class="dropdown-divider"></div>
    
                    <div class="d-flex">
                        <div class="col-5">Province</div>
                        <span class="col-1">:</span>
                        <span class="">{{ $Order->provinsi }}</span>
                    </div>
    
                    <div class="d-flex">
                        <div class="col-5">City</div>
                        <span class="col-1">:</span>
                        <span class="">{{ $Order->city }}</span>
                    </div>
    
                    <div class="d-flex">
                        <div class="col-5">Postal Code</div>
                        <span class="col-1">:</span>
                        <span class="">{{ $Order->postalCode }}</span>
                    </div>
    
                    <div class="d-flex">
                        <div class="col-5">Address</div>
                        <span class="col-1">:</span>
                        <span class="">{{ $Order->alamat }}</span>
                    </div>
    
                </div>
                {{-- end of Order Address --}}
    
                {{-- order shipping --}}
                  <div class="card-utility mb-3">    
                      <center>
                          <h4 class="quickView text-uppercase mb-4">Shipping</h4>
                      </center> 
                  
                      <div class="d-flex">
                          <div class="col-5">Shipping</div>
                          <span class="col-1">:</span>
                          <span class="text-uppercase">{{ $Order->shipping }}</span>
                      </div>    
                      <div class="d-flex">
                          <div class="col-5">Service</div>
                          <span class="col-1">:</span>
                          <span class="">{{ $Order->shippingService }}</span>
                      </div>    
                      <div class="d-flex">
                          <div class="col-5">Delivery receipt</div>
                          <span class="col-1">:</span>
                          @if ($Order->receipt == NULL)
                              <span class="">Resi akan tersedia dalam 1x24 Jam</span>
                          @else
                              <span class="text-success">{{ $Order->receipt }}</span>
                          @endif
                      </div>    
                      <div class="d-flex">
                          <div class="col-5">Shipping cost</div>
                          <span class="col-1">:</span>
                          <span class="">Rp. <span class="schwarzn-secondary-color">{{  number_format($Order->ongkir, 0, ',', '.') }}</span></span>
                      </div>    
                  </div>
                {{-- end of order shipping --}}
            </div>
        </div>
    
        <div class="row">
    
    
        </div>
    
    </div>

</div>
@endsection


