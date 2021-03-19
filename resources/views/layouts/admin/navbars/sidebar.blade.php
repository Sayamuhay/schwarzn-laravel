<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo d-flex justify-content-center align-items-center">
            <img class="simple-text logo-mini" style="margin-right: 5px;" src="{{asset('source/logo white.png')}}" width="35"/>
            <a href="#" class="simple-text logo-normal" style="margin-left: 5px;">SCHWARZN</a>
        </div>
        <ul class="nav">
            <li >
                <a href="{{ route('admin') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li >
                <a href="/">
                    <i class="fas fa-users"></i>
                    <p>{{ _('Data User') }}</p>
                </a>
            </li>
            <li >
                <a href="/">
                    <i class="fas fa-tshirt"></i>
                    <p>{{ _('Product Management') }}</p>
                </a>
            </li>
            <li >
                <a href="/">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <i class="tim-icons icon-bell-55"></i>
                            <p>{{ _('Notifications') }}</p>
                        </div>
                        <div class="">
                            <p class="">{{ $getcountnotif }}</p>
                        </div>
                    </div>
                </a>
            </li>
            <li >
                <a href="/">
                    <i class="fas fa-comment-alt"></i>
                    <p>{{ _('Chats') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
