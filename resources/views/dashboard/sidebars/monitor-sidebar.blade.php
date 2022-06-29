<div class="sidebar">
    <div class="page-name">
        <p>Monitor</p>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li class="{{ request()->routeIs('user.keywords') ? 'active' : '' }}"><a href="{{ route('user.keywords') }}">keywords</a></li>
            <li class="{{ request()->routeIs('user.hashtags') ? 'active' : '' }}"><a href="{{ route('user.hashtags') }}">hashtags</a></li>
            <li class="{{ request()->routeIs('user.search') ? 'active' : '' }}"><a href="{{ route('user.search') }}">search</a></li>
        </ul>
    </div>
    <div class="compose-btn">
        <button id="composeBtn"><i class="fa fa-plus"></i> compose</button>
    </div>
</div>
