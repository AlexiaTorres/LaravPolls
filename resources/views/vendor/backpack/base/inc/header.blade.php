<div id="header-wrap">

    <div class="container clearfix">

        <div class="header-responsive-group">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="{{url('/')}}">
                    <img src="/img/laravpolls_logo_2.png" alt="LaravPolls" class="retina-logo">
                </a>
            </div><!-- #logo end -->
            <!-- Primary Navigation
                    ============================================= -->
            <nav id="primary-menu">
                <ul>
                    <li>
                        <a href="{{ route('polls') }}">
                            <div>All Polls</div>
                        </a>
                    </li>
                    @if (Auth::check())
                        <li>
                            <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/poll') }}">
                                <div>My Polls</div>
                            </a>
                        </li>
                    @endif
                    @if (Auth::guest())
                        <li>
                            <a href="{{ url('/login') }}">
                                Login
                            </a>
                        </li>
                    @endif
                    @if (Auth::check())
                        <li>
                            <a href="{{ url('/logout') }}">
                                <div>
                                    Log out
                                </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
