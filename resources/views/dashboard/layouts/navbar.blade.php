<!-- navbar section starts -->
<header class="header">
    <div class="header-main">
        <div class="logo">
            <a href="{{ route('user.dashboard') }}"><img src="{{ asset('dashboard/img/logo.png') }}" alt="Logo" /></a>
        </div>
        <div class="open-nav-menu">
            <span></span>
        </div>
        <div class="menu-overlay">
        </div>
        <!-- navigation menu start -->
        <nav class="nav-menu">
            <div class="close-nav-menu">
                <img src="{{ asset('dashboard/img/close-icon.png') }}" alt="Close Icon">
            </div>
            <ul class="menu">
                <li class="menu-item">
                    <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard', 'user.scheduled', 'user.queued', 'user.sent', 'user.undelivered', 'user.drafts', 'user.tasks') ? 'active' : '' }}">publish</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('user.activity') }}" class="{{ request()->routeIs('user.activity', 'user.inbox') ? 'active' : '' }}">Activity</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('user.monitor') }}" class="{{ request()->routeIs('user.monitor', 'user.keywords', 'user.hashtags', 'user.search') ? 'active' : '' }}">monitor</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('user.channels') }}" class="{{ request()->routeIs('user.channels') ? 'active' : '' }}">channels</a>
                </li>
            </ul>
            <ul class="menu">
                <li class="menu-item">
                    <a href="#">individual</a>
                </li>
                <li class="menu-item">
                    <a href="#">company</a>
                </li>
                <li class="menu-item menu-item-has-children">
                    <a href="#" data-toggle="sub-menu">agency <i class="plus"></i></a>
                    <ul class="sub-menu">
                        <li class="menu-item"><a href="#">Convallis</a></li>
                        <li class="menu-item"><a href="#">Nulla nec</a></li>
                        <li class="menu-item"><a href="#">Fringilla</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="menu">
                <li class="menu-item menu-item-has-children">
                    <a href="#" data-toggle="sub-menu"><img src="{{ asset('dashboard/img/profile-img.png') }}" alt="Profile Image">steve reynolds</a>
                    <!-- <ul class="sub-menu">
                      <li class="menu-item"><a href="#">Convallis</a></li>
                      <li class="menu-item"><a href="#">Nulla nec</a></li>
                      <li class="menu-item"><a href="#">Fringilla</a></li>
                    </ul> -->
                </li>
            </ul>
        </nav>
    </div>
</header>
<!-- navbar sections ends -->
