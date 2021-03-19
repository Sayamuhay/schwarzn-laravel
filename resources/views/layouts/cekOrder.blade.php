<!-- Modal -->
<div>
@foreach ($orderl as $Order)
<div wire:ignore.self class="modal fade" id="cekOrder{{$Order->OrderID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
       <div class="modal-content">

            <div class="modal-body">
                <center>
                <div class="col-lg-10 mt-3 ">

                    <div class="">
            
                        <div class="input-group mb-3 flex-nowrap">
                            <span class="input-group-text bor10 bg10" id="addon-wrapping">Order ID</span>
                            <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                                {{ $Order->OrderID }}
                            </span>
                        </div>
            
                        <div class="input-group mb-3 flex-nowrap d-flex justify-content-between">
                            <span class="input-group-text bor10 bg10" id="addon-wrapping">User ID</span>
                            <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                                {{ $Order->UserID }}
                            </span>
            
                            <span class="input-group-text bor10 bg10" id="addon-wrapping">User Name</span>
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
            
                        <div class="input-group mb-3 flex-nowrap d-flex justify-content-between">
                            <span class="input-group-text bor10 bg10" id="addon-wrapping">Grand Total</span>
                            <span class="form-control bor10 d-flex justify-content-start" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                               Rp. {{ number_format($Order->GrandTotal, 0, ',', '.') }}
                            </span>

                            <span class="input-group-text bor10 bg10" id="addon-wrapping">Status</span>
                            <span class="form-control bor10 d-flex justify-content-start text-success" name="OrderID" aria-label="Username" aria-describedby="addon-wrapping">
                               Paid
                            </span>
                        </div>
            
                        <div class="btn-pay mt-3 btn-lg rounded-0 d-flex justify-content-center">
                            <button class="w-100" data-mdb-dismiss="modal">close</button>
                        </div>
            
                    </div>
            
                </div>
                </center>
			</div>
            
       </div>
    </div>
</div>
@endforeach
</div>