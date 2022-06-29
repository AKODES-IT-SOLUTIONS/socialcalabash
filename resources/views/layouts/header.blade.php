<!-- Header Section Starts -->
<header class="header">
    <div class="container">
        <div class="header-main">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Logo"/></a>
            </div>
            <div class="open-nav-menu">
                <span></span>
            </div>
            <div class="menu-overlay">
            </div>
            <!-- navigation menu start -->
            <nav class="nav-menu">
                <div class="close-nav-menu">
                    <img src="{{ asset('img/close-icon.png') }}" alt="Close Icon">
                </div>
                <ul class="menu">
                    <li class="menu-item">
                        <a href="{{ route('home') }}"><img class="home-icon" src="{{ asset('img/home.png') }}"
                                                           alt="Home Image"/></a>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="#" data-toggle="sub-menu">Services <i class="plus"></i></a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="{{ url('stop-dashboard') }}">1 Stop Dashboard</a></li>
                            <li class="menu-item"><a href="{{ url('publish-scheduling') }}">Publishing and
                                    Scheduling</a></li>
                            <li class="menu-item"><a href="{{ url('collaborate') }}">Collaborate Seamlessly</a></li>
                            <li class="menu-item"><a href="{{ url('analytics') }}">Insightful Analytics</a></li>
                            <li class="menu-item"><a href="{{ url('listen-monitor') }}">Listen and Monitor</a></li>
                            <li class="menu-item"><a href="{{ url('great-reports') }}">Great Reports</a></li>
                            <li class="menu-item"><a href="{{ url('engage') }}">Engage</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="{{ url('why-us') }}" data-toggle="sub-menu">Why Us <i class="plus"></i></a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="{{ url('our-team') }}">Our Team</a></li>
                            <li class="menu-item"><a href="{{ url('easy-to-use') }}">Easy to Use</a></li>
                            <li class="menu-item"><a href="{{ url('reliable-secure') }}">Reliable and Secure</a></li>
                            <li class="menu-item"><a href="{{ url('great-value') }}">Great Value</a></li>
                            <li class="menu-item"><a href="{{ url('support') }}">Passionate Support</a></li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('case-studies') }}">Case Studies</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('pricing') }}">Pricing</a>
                    </li>
                    <li class="menu-item register-login-btn-sm">
                        @auth()
                            <a href="{{ route('user.dashboard') }}">Dashboard</a>
                        @endauth

                        @guest()
                            <a href="{{ route('user.signIn') }}">register/login</a>
                        @endguest
                    </li>
                </ul>
            </nav>
            <!-- navigation menu end -->
            <div class="register-login-btn">
                @auth()
                    <a href="{{ route('user.dashboard') }}">Dashboard</a>
                @endauth

                @guest()
                    <a href="{{ route('user.signIn') }}">register/login</a>
                @endguest
            </div>
        </div>
    </div>
</header>
<!-- Header Section Ends -->
