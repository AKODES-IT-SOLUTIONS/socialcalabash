<div class="sidebar">
    <div class="page-name">
        <p>Activity</p>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li class="{{ request()->routeIs('user.activity') ? 'active' : '' }}"><a href="{{ route('user.activity') }}">statistics</a></li>
            <li class="{{ request()->routeIs('user.inbox') ? 'active' : '' }}"><a href="{{ route('user.inbox') }}">inbox</a></li>
        </ul>
    </div>
    <div class="compose-btn">
        <button id="composeBtn"><i class="fa fa-plus"></i> compose</button>
    </div>
</div>
