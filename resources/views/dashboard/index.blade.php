@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">

        @include('dashboard.sidebars.publish-sidebar')

        <div class="publish main">
            <div class="main-header">
                <ul>
                    <li><a href="#">filter by user</a></li>
                    <li><a href="#">filter by channel</a></li>
                    <li><a href="#">filter by organization</a></li>
                </ul>
                <div class="main-header-btn-group">
                    <button class="active">scheduled</button>
                    <button>queued</button>
                    <button>sent</button>
                    <button>overview</button>
                </div>
            </div>
            <div class="main-content">
                <div class="wrapper">
                    <div class="calendar">
                        <div class="month">
                            <div class="prev" onclick="moveDate('prev')">
                                <span>&#10094;</span>
                            </div>
                            <h2 id="month"></h2>
                            <p id="date_str"></p>
                            <div class="next" onclick="moveDate('next')">
                                <span>&#10095;</span>
                            </div>
                        </div>
                        <div class="weekdays">
                            <div>Sun</div>
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                        </div>
                        <div class="days"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar and main-content section ends -->

@endsection
