<!-- Side Header Start -->
<div class="side-header show">
    <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
    <!-- Side Header Inner Start -->
    <div class="side-header-inner custom-scroll">

        <nav class="side-header-menu" id="side-header-menu">
            <ul>
                <li class="has-sub-menu"><a href="#"><i class="ti-home"></i> <span>Dashboard</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a href="{{ route('admin.dashboard') }}"><span>Dashboard</span></a></li>
                    </ul>
                </li>
                <li class="has-sub-menu"><a href="#"><i class="ti-lock"></i> <span>Users</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a href="#"><span>Add Users</span></a></li>
                        <li><a href="{{ route('admin.users') }}"><span>View Users</span></a></li>
                    </ul>
                </li>
                <li><a  href="{{ route('admin.form') }}"><span>Form</span></a></li>
                <li><a href="{{ route('admin.datatable') }}"><span>Data Table</span></a></li>
            </ul>
        </nav>

    </div><!-- Side Header Inner End -->
</div><!-- Side Header End -->
