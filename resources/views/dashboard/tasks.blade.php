@extends('dashboard.layouts.app')

@section('title', 'Tasks - Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">

        @include('dashboard.sidebars.publish-sidebar')

        <div class="publish main">
            <div class="main-header">
                <div class="main-header-btns">
                    <form action="">
                        <input type="checkbox" name="check">
                    </form>
                    <a href="#"><img src="{{ asset('dashboard/img/delete.png') }}" alt="Delete Icon"/></a>
                    <a href="#"><img src="{{ asset('dashboard/img/calendar-day.png') }}" alt="Calender Icon"></a>
                </div>
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
                <div class="main-content-head">
                    <p>You don't have any new tasks assigned to yourself</p>
                </div>
                <div class="main-content-desc">
                    <p>From time to time, your co-workers and clients may assign tasks to you. These tasks may include
                        content they want you to review or incoming messages they want you to respond to.</p>
                </div>
                <div class="main-content-img">
                    <img src="{{ asset('dashboard/img/tasks-img.png') }}" alt="Tasks Image" style="width: 200px;"/>
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
