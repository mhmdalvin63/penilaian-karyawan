<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->role}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right px-3">
                {{-- <div class="dropdown-divider"></div>     --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item has-icon" style="cursor: pointer;  background-color: red; color: white !important; border-radius: 5px; padding: .15rem 1.5rem;">
                        <i class="fas fa-sign-out-alt mt-2"></i> <span style="font-size: 14px">Logout</span>
                    </button>
                </form>

            </div>
        </li>
    </ul>
</nav>
