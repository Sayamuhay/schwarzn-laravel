

@section('content')

@include('layouts.navbar')

<center>
	<div class="konten2 col-xl-11">
		<div class="col-md-12 heading-section justify-content-center text-center ftco-animate fadeInUp ftco-animated col-xl-11">			  
    		<h2 class="mb-5 litt">
                @if($Order->kodePayment == 0)
                    Payment Section
                @elseif($Order->kodePayment == 1)
                    Order Detail
                @endif
            </h2>
		</div>
	</div>		
</center>

@if ($Order->kodePayment == 0)

<center>
    <div class="col-lg-10 m-b-50 mt-3">

        <div class="col-lg-9">

            <div class="input-group mb-3 flex-nowrap d-flex justify-content-between">
                <span class="input-group-text bor10 bg10" id="addon-wrapping">Order ID</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                    {{ $Order->OrderID }}
                </span>

                <span class="input-group-text bor10 bg10" id="addon-wrapping">Order created</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                    {{ $Order->created_at }}
                </span>
            </div>

            <div class="input-group mb-3 flex-nowrap d-flex justify-content-between">
                <span class="input-group-text bor10 bg10" id="addon-wrapping">User ID</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                    {{ $Order->UserID }}
                </span>

                <span class="input-group-text bor10 bg10" id="addon-wrapping">On Name</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                    {{ $Order->name }}
                </span>
            </div>

            <div class="input-group mb-3 flex-nowrap d-flex justify-content-between">
                <span class="input-group-text bor10 bg10" id="addon-wrapping">Item</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                    {{ $Order->TotalItem }}
                </span>

                <span class="input-group-text bor10 bg10" id="addon-wrapping">Subtotal</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                   Rp. {{ number_format($Order->SubTotalPrice, 0, ',', '.') }}
                </span>
            </div>

            <div class="input-group mb-3 flex-nowrap">
                <span class="input-group-text bor10 bg10" id="addon-wrapping">No. Phone</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                    {{ $Order->phone }}
                </span>
            </div>

            <div class="input-group mb-3 flex-nowrap d-flex justify-content-between">
                <span class="input-group-text bor10 bg10" id="addon-wrapping">Province</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                    {{ $Order->provinsi }}
                </span>

                <span class="input-group-text bor10 bg10" id="addon-wrapping">City</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                    {{ $Order->city }}
                </span>
            </div>

            <div class="input-group mb-3 flex-nowrap">
                <span class="input-group-text bor10 bg10" id="addon-wrapping">Postal Code</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                    {{ $Order->postalCode }}
                </span>
            </div>

            <div class="input-group mb-3 flex-nowrap">
                <span class="input-group-text bor10 bg10" id="addon-wrapping">Address</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                    {{ $Order->alamat }}
                </span>
            </div>

            <div class="input-group mb-3 flex-nowrap d-flex justify-content-between">
                <span class="input-group-text bor10 bg10" id="addon-wrapping">Shipping</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                    {{ $Order->shipping }}
                </span>

                <span class="input-group-text bor10 bg10" id="addon-wrapping">Service fee</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                   Rp. {{ number_format($Order->ongkir, 0, ',', '.') }}
                </span>
            </div>

            <div class="input-group mb-3 flex-nowrap">
                <span class="input-group-text bor10 bg10" id="addon-wrapping">Grand Total</span>
                <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                   Rp. {{ number_format($Order->GrandTotal, 0, ',', '.') }}
                </span>
            </div>

            <div class="btn-pay mt-3 btn-lg rounded-0 d-flex justify-content-center">
                <button class="w-100" id="pay-button">pay</button>
            </div>

        </div>

    </div>

</center>
@elseif($Order->kodePayment == 1)

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

@endif


<form action="Payment" id="payment-form" method="get">
    <input type="hidden" class="" id="result-data" name="result_data" value="">
</form>

</body>
<script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-yqklpfc5Qa3sTvLC"></script>
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
<script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/fontawesome.js')}}"></script>
<script  type="text/javascript"  src="{{asset('js/mdb/mdb.min.js')}}"></script>

<script src="{{asset('js/util.js')}}"></script>	
<script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function () {
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');
        function changeResult(type, data){
            $('#result-type').val(type);
            $('#result-data').val(JSON.stringify(data));
        }
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
        },
        onPending: function(result) {
            changeResult('pending', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
        },
        onError: function(result) {
            changeResult('Error', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
        }
        }); // Replace it with your transaction token
    });
  // For example trigger on button clicked, or any time you need
//   payButton.addEventListener('click', function () {
//     snap.pay('{{ $snapToken }}'); // Replace it with your transaction token
//   });
</script>

@livewireScripts
@endsection