<div class="sidebar">
    <div class="page-name">
        <p>Channels</p>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li class="{{ request()->routeIs('user.channels') ? 'active' : '' }}"><a href="{{ route('user.channels') }}">linked channels</a></li>
        </ul>
    </div>
    <div class="compose-btn">
        <button id="composeBtnNew" onclick="openComposer()"><i class="fa fa-plus"></i> compose</button>
    </div>
</div>
