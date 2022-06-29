<div class="sidebar">
    <div class="page-name">
        <p>Admin</p>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li class="{{ request()->routeIs('user.settings') ? 'active' : '' }}"><a href="{{ route('user.settings') }}">profile</a></li>
            <li class="{{ request()->routeIs('user.teams') ? 'active' : '' }}"><a href="{{ route('user.teams') }}">teams</a></li>
            <li class="{{ request()->routeIs('user.organizations') ? 'active' : '' }}"><a href="{{ route('user.organizations') }}">organizations</a></li>
            <li class="{{ request()->routeIs('user.manageUsers') ? 'active' : '' }}"><a href="{{ route('user.manageUsers') }}">manage users</a></li>
            <li class="{{ request()->routeIs('user.billing') ? 'active' : '' }}"><a href="{{ route('user.billing') }}">billing</a></li>
        </ul>
    </div>
    <div class="compose-btn">
        <button id="composeBtn"><i class="fa fa-plus"></i> compose</button>
    </div>
</div>
