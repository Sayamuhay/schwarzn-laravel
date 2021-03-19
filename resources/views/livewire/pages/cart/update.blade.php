<!-- Modal -->
<div>
@foreach($cart as $data)
<?php $subtotal = $data->Quantity * $data->Price;?>
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
       <div class="modal-content">

            <div class="modal-body">
            <form>
			    <table class="table-shopping-cart">
                <input type="hidden" wire:model="user_id">
					<tr class="table_head">
						<th class="column-1">Product</th>
						<th class="column-2"></th>
						<th class="column-3">Size</th>
						<th class="column-4">Quantity</th>
						<th class="column-5">Total</th>
                        <th class="column-6"></th>
					</tr>

                    <tr class="table_row">

						<td class="column-1">
                            <div class=" d-flex justify-content-center">
                                <img src="{{url('source/slider/'.$data->ProductImage)}}" alt="IMG">
                            </div>
                        </td>  
                            
                        <td class="column-2">
                            <div class=" text-lg-center">
                                <h2 class="h6 mb-0">{{ $data->ProductName }}<br>
                                    <small class="text-muted">cost : Rp. {{ $data->Price }}</small>
                                </h2>
                            </div>
                        </td>

                        <td class="column-3">
                            <div class="product-line-price text-center">
                                <select type="select" wire:model="productsize" name="productsize" height="45px" class="form-control1 bor10">
									<option>S</option>
									<option>M</option>
									<option>L</option>
									<option>XL</option>
									<option>XXL</option>
								</select>
                            </div>
                        </td>

                        <td class="column-4">
                            <div class="product-line-price text-center">
                            <select type="select" wire:model="quantity" name="productsize" height="45px" class="form-control1 bor10">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
								</select>
							</div>
                        </td>

                        <td class="column-5">
                            <div class="d-flex justify-content-center text-center">			
                                <span class="product-line-price product__price">Rp. <?php echo $subtotal?></span>
                            </div>
                        </td>
                        </form> 
                        <td class="column-6">
                            <div class="align-items-center d-flex justify-content-start">
                            <button type="button" wire:click.prevent="cancel()" class="btn-cancel p-t-5 p-b-5 p-l-15 p-r-15" data-mdb-dismiss="modal">Cancel</button>
                            <button type="button" wire:click.prevent="update()" class="btn-pay p-t-5 p-b-5 p-l-15 p-r-15" data-mdb-dismiss="modal">Update</button>
                            </div>
                        </td>

                    </tr>

                </table>
                </form>
			</div>
            
       </div>
    </div>
</div>
@endforeach
</div>