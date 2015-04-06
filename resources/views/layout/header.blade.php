<header id="header">
    <!--logo start-->
    <div class="brand">
        <a href="{{ url('/') }}" class="logo">
            <img src="/images/student.png">
            <span>SCHOLAR</span>CHECK</a>
    </div>
    <!--logo end-->
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown profile hidden-xs">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="meta">
                            <span class="avatar">
                                <img src="{{ Auth::user()->getGravatar(32) }}" class="img-circle" alt="">
                            </span>
                        <span class="text">{{ Auth::user()->name }}</span>
                        <span class="caret"></span>
                        </span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li style="padding:0">
                    <a href="{{ route('users.profile') }}">
                                <span class="icon"><i class="fa fa-user"></i>
                                </span>My Account</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}">
                                <span class="icon"><i class="fa fa-sign-out"></i>
                                </span>Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</header>