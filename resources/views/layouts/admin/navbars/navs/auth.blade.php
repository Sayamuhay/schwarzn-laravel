<div>

<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper d-none">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <h3 class="">{{ _('Admin') }}</h3>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="search-bar input-group">
                    <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                        <span class="d-lg-none d-md-block">{{ __('Search') }}</span>
                    </button>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        @if(count($getunreadnotif) === 0)
                            
                        @else
                            <div class="notification d-none d-lg-block d-xl-block"></div>
                        @endif
                        <i class="tim-icons icon-sound-wave"></i>
                        <p class="d-lg-none"> {{ __('Notifications') }} </p>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-navbar" style="width: 700px;">

                            @if(Auth::user()->level === 1)
                                @foreach($notifications as $notification)
                                <li class="nav-link">
                                    <div class="alert alert-success" role="alert">
                                        New Order with Order ID : <strong> {{ $notification->data['OrderID'] }} </strong> on Name : {{ $notification->data['name'] }}.
                                        <button class="btn-light btn text-white float-right" wire:click="markread({{ $notification->id }})">
                                            Mark as read
                                        </button>
                                    </div>
                                </li>
                                @endforeach
                                    
                                @foreach($notifnewuser as $notification)
                                <li>
                                <div class="alert alert-success" role="alert">
                                    New User : {{ $notification->data['name'] }} with Email : {{ $notification->data['email'] }} has just registered.
                                    <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                                        Mark as read
                                    </a>
                                </div>
                                </li>
                                @endforeach

                                @foreach($notifnewtrans as $notification)
                                <li>
                                <div class="alert alert-success" role="alert">
                                    New User : {{ $notification->data['name'] }} with Order ID : {{ $notification->data['OrderID'] }} has just updataded.
                                    to {{ $notification->data['transaction_status'] }}
                                    <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                                        Mark as read
                                    </a>
                                </div>
                                </li>
                                @endforeach
                            @endif

                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link d-flex align-items-center" data-toggle="dropdown">
                        <div class="photo">
                            <img src="{{url('source/user-pic/'.Auth::user()->avatar)}}" alt="{{ __('Profile Photo') }}">
                        </div>
                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-lg-none">{{ __('Log out') }}</p>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        <li class="nav-link">
                            <a href="/" class="nav-item dropdown-item">{{ __('Profile') }}</a>
                        </li>
                        <li class="nav-link">
                            <a href="#" class="nav-item dropdown-item">{{ __('Settings') }}</a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="nav-link">
                            <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="{{ __('SEARCH') }}">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
        </div>
    </div>
</div>
</div>

  
