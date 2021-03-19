@include('layouts.navbar')
<div>
    
            <center>
                <div class="konten2 col-xl-11">
                    <div class="col-md-12 heading-section justify-content-center text-center ftco-animate fadeInUp ftco-animated col-xl-11">			  
                        <h2 class="mb-4 litt">Order List</h2>
                    </div>
                </div>		
            </center>
    
<div class="container mt-5">
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
                      <li class="d-flex justify-content-between align-items-center flex-wrap">
                        <button class="mb-0"><i class="fas fa-file-invoice"></i> Order History</button>
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
                <div class="">
                    <div class="">
                        <table class="table-shopping-cart bor-8 align-items-center" style="width:100%">
                            <thead>
                                <tr class="table_head">
                                    <th>Order ID</th>
                                    <th>Name</th>
                                    <th>Total Items</th>
                                    <th>Gross Amount</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orderlist as $paid)
                                    <tr class="table_row">
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                {{ $paid->OrderID }}
                                            </div>
                                        </td>
                                        <td>{{ $paid->name }}</td>
                                        <td>{{ $paid->TotalItem }}</td>
                                        <td><span class="schwarzn-secondary-color">Rp. {{ number_format($paid->GrandTotal, 0, ',', '.')}}</span></td>
                                        <td>
                                          @if($paid->kodePayment == 0)
                                            <div class="text-danger">
                                              Need To Paid
                                            </div>
                                          @elseif($paid->kodePayment == 1)
                                            <div class="@if($paid->statusPayment == 'settlement') text-success @elseif($paid->statusPayment == 'pending') text-warning @endif">
                                              {{ $paid->statusPayment }}
                                            </div>
                                           @endif
                                        </td>
                                        <td>
                                          @if($paid->kodePayment == 0)
                                            <a  href="{{ route('ordercek', $paid->OrderID) }}">
                                              <button class="btn-pay m-l-3 p-t-5 p-b-5 p-l-15 p-r-15">PAY</button>
                                            </a>
                                          @elseif($paid->kodePayment == 1)
                                            <a  href="{{ route('ordercek', $paid->OrderID) }}">
                                              <button class="btn-pay m-l-3 p-t-5 p-b-5 p-l-15 p-r-15">Check</button>
                                            </a>
                                           @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
