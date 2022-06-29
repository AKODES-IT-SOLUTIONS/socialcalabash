@extends('dashboard.layouts.app')

@section('title', 'Monitor - Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">
        <div class="sidebar">
            <div class="page-name">
                <p>Monitor</p>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li class="active"><a href="{{ route('user.keywords') }}">keywords</a></li>
                    <li><a href="{{ route('user.hashtags') }}">hashtags</a></li>
                    <li><a href="{{ route('user.search') }}">search</a></li>
                </ul>
            </div>
            <div class="compose-btn">
                <button id="composeBtn"><i class="fa fa-plus"></i> compose</button>
            </div>
        </div>
        <div class="monitor main">
            <div class="main-header">
                <div class="main-header-btns">
                    <form action="">
                        <input type="checkbox" name="check">
                    </form>
                    <a href="#"><img src="{{ asset('dashboard/img/delete.png') }}" alt="Delete Icon"/></a>
                    <a href="#"><img src="{{ asset('dashboard/img/calendar-day.png') }}" alt="Calender Icon"></a>
                </div>
                <div class="csv-search-filter">
                    <ul>
                        <li><a href="keywords-5.html">Show Chart</a></li>
                        <li><a href="#"><i class="fa fa-plus"></i>&nbsp;Add New</a></li>
                        <li>
                            <form action="">
                                <input type="text" placeholder="Search"/>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div class="main-content-head">
                    <p>Track your first monitoring term</p>
                </div>
                <div class="main-content-img">
                    <img src="{{ asset('dashboard/img/monitor-img.png') }}" alt="Monitor Image">
                    <p>You have not yet added any monitoring terms. Setup a new monitor to keep track of mentions across
                        the social web.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar and main-content section ends -->

    <!-- Compose Modal Modal -->
    <div id="composeModal" class="composeModal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="composeClose">&times;</span>
            <div class="modal-content-head">
                <p>New Message/Post</p>
            </div>
            <div class="tags">
                <ul>
                    <li><img src="{{ asset('dashboard/img/fb-icon.png') }}">demofbchannel<span class="tag-close">&times;</span></li>

                    <li><img src="{{ asset('dashboard/img/insta-icon.png') }}"> demoigchannel<span class="tag-close">&times;</span></li>
                    <li><img src="{{ asset('dashboard/img/fb-icon.png') }}">demofbchannel<span class="tag-close">&times;</span></li>
                    <li><img src="{{ asset('dashboard/img/fb-icon.png') }}">demofbchannel<span class="tag-close">&times;</span></li>
                </ul>
            </div>
            <div class="message">
                <form action="">
                    <textarea id="" rows="5" placeholder="Type your message here..."></textarea>
                    <label class="filelabel">
                        <i class="fa fa-paperclip">
                        </i>

                        <input class="FileUpload1" id="FileInput" name="booking_attachment" type="file"/>
                    </label>
                    <img src="{{ asset('dashboard/img/emoji-smile.png') }}" alt="">
                </form>
            </div>
            <div class="links-postas">
                <div class="links">
                    <a href="#"><img src="{{ asset('dashboard/img/calendar-day.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('dashboard/img/query-queue.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('dashboard/img/globe.png') }}" alt=""></a>
                </div>
                <div class="postas">
                    <form action="">
                        <label for="">Post to Facebook as</label>
                        <select name="" id="">
                            <option value="">Published</option>
                            <option value="">Save</option>
                            <option value="">Private</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="footer">
                <a href="#">cancel</a>
                <a href="#">save</a>
                <a href="#">send for approval</a>
                <a href="#">send now</a>
            </div>
        </div>
    </div>
@endsection
