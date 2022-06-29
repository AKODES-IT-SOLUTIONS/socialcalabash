@extends('dashboard.layouts.app')

@section('title', 'Social Feeds-13 - Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">
        <div class="sidebar">
            <div class="page-name">
                <p>Activity</p>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li><a href="{{ route('user.activity') }}">statistics</a></li>
                    <li class="active"><a href="{{ route('user.inbox') }}">inbox</a></li>
                    <ul>
                        <li><a href="#">Scheduled</a></li>
                        <li><a href="#">Queued</a></li>
                        <li><a href="#">Sent</a></li>
                        <li><a href="#">Undelivered</a></li>
                        <li><a href="#">Drafts</a></li>
                        <li><a href="#">Deleted</a></li>
                    </ul>
                </ul>
            </div>
            <div class="compose-btn">
                <button id="composeBtn"><i class="fa fa-plus"></i> compose</button>
            </div>
        </div>
        <div class="social-feeds main">
            <div class="main-header">
                <div class="main-header-btns">
                    <form action="">
                        <input type="checkbox" name="check">
                    </form>
                    <a href="#"><img src="{{ asset('dashboard/img/delete.png') }}" alt="Delete Icon"/></a>
                    <a href="#"><img src="{{ asset('dashboard/img/calendar-day.png') }}" alt="Calender Icon"></a>
                    <form action="">
                        <label for=""><input type="checkbox" name="check"> Archived only</label>
                    </form>
                </div>
                <div class="csv-search-filter">
                    <ul>
                        <li><a href="#"><img src="{{ asset('dashboard/img/download-icon.png') }}" alt="Download Icon">CSV</a></li>
                        <li>
                            <a href="#">Organization-1 <i class="fa fa-angle-down"></i></a>
                        </li>
                        <li><a href="#">All channels <i class="fa fa-angle-down"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div class="main-content-head">
                    <p>Today</p>
                </div>
                <div style="overflow-x: auto;">
                    <table>
                        <tr>
                            <td>
                                <form action="">
                                    <input type="checkbox"/>
                                </form>
                            </td>
                            <td>12:45 PM</td>
                            <td>
                                <div class="icon-text">
                                    <div class="icon">
                                        <img src="{{ asset('dashboard/img/fb-icon.png') }}" alt="FB Icon">
                                    </div>
                                    <div class="text">
                                        <p>demofbchannel</p>
                                    </div>
                                </div>
                                <p class="desc"><span class="blue-text">1 Message Received from Brandon Sanders </span>Fusce
                                    at nisi eget dolor rhoncus facilisis. Mauris ante nisl, consectetur et luctus et,
                                    porta ut dolor. Curabitur consectetur et luctus et, por ultricies….</p>
                                </p>
                            </td>
                            <td>
                                <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="">
                                    <input type="checkbox"/>
                                </form>
                            </td>
                            <td>12:45 PM</td>
                            <td>
                                <div class="icon-text">
                                    <div class="icon">
                                        <img src="{{ asset('dashboard/img/twit-icon.png') }}" alt="FB Icon">
                                    </div>
                                    <div class="text">
                                        <p>demofbchannel</p>
                                    </div>
                                </div>
                                <p class="desc"><span class="red-text">Sent </span>Fusce at nisi eget dolor rhoncus
                                    facilisis. Mauris ante nisl, consectetur et luctus et, porta ut dolor. Curabitur
                                    consectetur et luctus et, por ultricies….</p>
                                </p>
                            </td>
                            <td>
                                <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="">
                                    <input type="checkbox"/>
                                </form>
                            </td>
                            <td>12:45 PM</td>
                            <td>
                                <div class="icon-text">
                                    <div class="icon">
                                        <img src="{{ asset('dashboard/img/fb-icon.png') }}" alt="FB Icon">
                                    </div>
                                    <div class="text">
                                        <p>demofbchannel</p>
                                    </div>
                                </div>
                                <p class="desc"><span class="blue-text">1 Message Received from Brandon Sanders </span>Fusce
                                    at nisi eget dolor rhoncus facilisis. Mauris ante nisl, consectetur et luctus et,
                                    porta ut dolor. Curabitur consectetur et luctus et, por ultricies….</p>
                                </p>
                            </td>
                            <td>
                                <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="">
                                    <input type="checkbox"/>
                                </form>
                            </td>
                            <td>12:45 PM</td>
                            <td>
                                <div class="icon-text">
                                    <div class="icon">
                                        <img src="{{ asset('dashboard/img/fb-icon.png') }}" alt="FB Icon">
                                    </div>
                                    <div class="text">
                                        <p>demofbchannel</p>
                                    </div>
                                </div>
                                <p class="desc"><span class="red-text">Sent </span>Fusce at nisi eget dolor rhoncus
                                    facilisis. Mauris ante nisl, consectetur et luctus et, porta ut dolor. Curabitur
                                    consectetur et luctus et, por ultricies….</p>
                                </p>
                            </td>
                            <td>
                                <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="">
                                    <input type="checkbox"/>
                                </form>
                            </td>
                            <td>12:45 PM</td>
                            <td>
                                <div class="icon-text">
                                    <div class="icon">
                                        <img src="{{ asset('dashboard/img/fb-icon.png') }}" alt="FB Icon">
                                    </div>
                                    <div class="text">
                                        <p>demofbchannel</p>
                                    </div>
                                </div>
                                <p class="desc"><span class="blue-text">1 Message Received from Brandon Sanders </span>Fusce
                                    at nisi eget dolor rhoncus facilisis. Mauris ante nisl, consectetur et luctus et,
                                    porta ut dolor. Curabitur consectetur et luctus et, por ultricies….</p>
                                </p>
                            </td>
                            <td>
                                <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="">
                                    <input type="checkbox"/>
                                </form>
                            </td>
                            <td>12:45 PM</td>
                            <td>
                                <div class="icon-text">
                                    <div class="icon">
                                        <img src="{{ asset('dashboard/img/fb-icon.png') }}" alt="FB Icon">
                                    </div>
                                    <div class="text">
                                        <p>demofbchannel</p>
                                    </div>
                                </div>
                                <p class="desc"><span class="red-text">Sent </span>Fusce at nisi eget dolor rhoncus
                                    facilisis. Mauris ante nisl, consectetur et luctus et, porta ut dolor. Curabitur
                                    consectetur et luctus et, por ultricies….</p>
                                </p>
                            </td>
                            <td>
                                <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="">
                                    <input type="checkbox"/>
                                </form>
                            </td>
                            <td>12:45 PM</td>
                            <td>
                                <div class="icon-text">
                                    <div class="icon">
                                        <img src="{{ asset('dashboard/img/google.png') }}" alt="Google Icon">
                                    </div>
                                    <div class="text">
                                        <p>demofbchannel</p>
                                    </div>
                                </div>
                                <p class="desc"><span class="blue-text">1 Message Received from Brandon Sanders </span>Fusce
                                    at nisi eget dolor rhoncus facilisis. Mauris ante nisl, consectetur et luctus et,
                                    porta ut dolor. Curabitur consectetur et luctus et, por ultricies….</p>
                                </p>
                            </td>
                            <td>
                                <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                            </td>
                        </tr>
                    </table>
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
                    <li><img src="{{ asset('dashboard/img/fb-icon.pn') }}g">demofbchannel<span class="tag-close">&times;</span></li>

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
