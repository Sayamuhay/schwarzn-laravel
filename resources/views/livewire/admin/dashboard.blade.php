

@section('content')

@include('layouts.admin.navbars.sidebar')
@include('layouts.admin.navbars.navbar')

<div class="content">

<div class="row">

    {{-- total order --}}
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Total Order</h5>
                <h3 class="card-title"><i class="fas fa-box text-primary"></i> {{ $countorder }}</h3>
            </div>
        </div>
    </div>
    {{-- end total order --}}

    {{-- total sales card --}}
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Total Sales</h5>
                <h3 class="card-title"><i class="fas fa-dollar-sign text-info"></i>Rp. {{ number_format($countsales, 0, ',', '.')  }}</h3>
            </div>
        </div>
    </div>
    {{-- end total sales card --}}

    {{-- total user card --}}
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Total User</h5>
                <h3 class="card-title"><i class="fas fa-users text-success"></i> {{ $countuser }}</h3>
            </div>
        </div>
    </div>
    {{-- end total user card --}}

</div>

<div class="container-fluid">


    {{-- transaction order --}}
    <div class="">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Transaction Order</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter" id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Time
                                </th>
                                <th>
                                    Order ID
                                </th>
                                <th>
                                    User ID
                                </th>
                                <th>
                                    On Name
                                </th>
                                <th class="text-center">
                                    Status
                                </th>
                                <th class="">
                                    receipt
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderlist as $list)
                                <tr>
                                    <td>
                                      {{ $list->created_at }}
                                    </td>
                                    <td>
                                      {{ $list->OrderID }}
                                    </td>
                                    <td>
                                        {{ $list->UserID }}
                                      </td>
                                    <td>
                                      {{ $list->name }}
                                    </td>
                                    <td class="text-center">
                                        @if($list->statusPayment == NULL)
                                       need to paid
                                       @else
                                       {{ $list->statusPayment }}
                                        @endif
                                    </td>
                                    <td class="">
                                        <form action="{{ route('updateorder') }}" method="post">
                                            @csrf
                                            <input type="hidden" class="" name="userid" value="{{ $list->UserID }}">
                                            <input type="hidden" class="" name="orderid" value="{{ $list->OrderID }}">
                                            @if($list->statusPayment == 'settlement')

                                                @if ($list->receipt == NULL)
                                                    <input type="text" class="form-controll" name="receipt">
                                                    <button class="btn" type="submit">Submit</button>
                                                @else
                                                
                                                {{ $list->receipt }}
                                            
                                                @endif

                                            @else

                                                waiting for settlement

                                            @endif
                                        </form>
                                    </td>
                                    <td>
                                        <a  href="{{ route('detailorder', $list->OrderID) }}">
                                            <button class="btn-pay m-l-3 p-t-5 p-b-5 p-l-15 p-r-15">Check</button>
                                          </a>
                                    </td>
                                </tr>                     
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- end transaction order --}}

</div>

</div>
@endsection


