<!-- Modal -->
<div>

<div wire:ignore.self class="modal modal-transparent fade" id="ongkirModal" data-mdb-keyboard="false" tabindex="-1" data-mdb-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-transparent" role="document">
       <div class="modal-content modal-transparent">

       @if($result)
            <div class="modal-body modal-transparent">
            <form>

            <div class="row d-flex justify-content-center">

            @foreach($result as $ongkir)
                <div class="card col-lg-3 text-center m-3">
                    <div class="card-body">
                        
                        <div>
                            <span class="card-title fs-25 text-uppercase">{{ $code_courier }}</span>
                        </div>
                        
                        <div>
                            <p class="text-uppercase card-text mt-3 fs-20">{{ $ongkir['service'] }}</p>
                        </div>
                        
                        <div>
                            <p class="card-text">{{ $ongkir['description'] }}</p>
                        </div>

                        <div>
                            <span class="mr-2 text-uppercase fs-13 product-line-price product__price">Rp. {{ number_format($ongkir['biaya'], 0, ',', '.') }}</span>
                        </div>

                        <div>
                            <span class="mr-2 text-uppercase fs-13">{{ $ongkir['etd'] }} Hari</span>
                        </div>

                    </div>
                    
                    <div class="card-footer ">
                        <button wire:click.prevent="masukOngkir('{{$ongkir['biaya'] }}','{{$ongkir['service']}}')" data-mdb-dismiss="modal" class="btn-pay p-t-5 p-b-5 p-l-15 p-r-15">Choose</button>
                    </div>
                
                </div>
            @endforeach

            </div>

            </form>
			</div>
        @endif 

            <div class="kaki-modal modal-transparent d-flex justify-content-center">
                <button wire:click.prevent="resetOngkir()" class="btn-pay bg- p-t-5 p-b-5 p-l-15 p-r-15" data-mdb-dismiss="modal">
                    Close
                </button>
            </div>

       </div>
    </div>
</div>

</div>