<!-- topbar section starts -->
<div class="topbar">
    <div class="topbar-date">
        <p>{{ date('d/m/Y') }}</p>
    </div>
    <div class="topbar-time"><p>{{ date('h:i A') }}</p></div>
    <div class="topbar-btns">
        <a href="#"><img src="{{ asset('dashboard/img/help-icon.png') }}" alt="Help Icon">&nbsp;help</a>
        <a href="{{ route('user.settings') }}"><img src="{{ asset('dashboard/img/settings-icon.png') }}" alt="Settings Icon">&nbsp;settings</a>
        <a href="{{ route('user.logout') }}"><img src="{{ asset('dashboard/img/logout.svg') }}" alt="Logout Icon">&nbsp;Logout</a>
    </div>
</div>
<!-- topbar section ends -->
