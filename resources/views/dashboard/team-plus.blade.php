@extends('dashboard.layouts.app')

@section('title', 'Team Plus - Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">

        @include('dashboard.sidebars.admin-sidebar')

        <div class="settings main">
            <div class="main-content">

                <div class="contact-location">
                    <div class="contact-location-item">
                        <div class="contact-location-item-head">
                            <p>Team information</p>
                        </div>
                        <div class="contact-location-item-form">
                            <form action="">
                                <div class="form-group">
                                    <label for="">Team Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Reynolds"/>
                                </div>
                                <div class="form-group">
                                    <label for="">Team Email</label>
                                    <input type="email" class="form-control" name="email"
                                           placeholder="example@gmail.com"/>
                                </div>
                                <div class="form-group">
                                    <label for="">Team Leader</label>
                                    <input type="text" class="form-control" name="username" placeholder="Reynolds"/>
                                </div>
                                <div class="form-group" style="justify-content: flex-start;padding-left: 20px;">
                                    <label for="">Choose Color</label>
                                    <input type="color"/>
                                </div>
                                <div class="save-btn">
                                    <a href="teams.html">back</a>
                                    <input type="submit" value="Add">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="contact-location-item">
                        <div class="contact-location-item-img">
                            <img src="{{ asset('dashboard/img/team-img.png') }}" alt="Team Image">
                        </div>
                    </div>
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
