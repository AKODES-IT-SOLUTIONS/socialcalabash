@extends('dashboard.layouts.app')

@section('title', 'Organizations - Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">

        @include('dashboard.sidebars.admin-sidebar')

        <div class="organizations main">
            <div class="main-content">
                <div class="organization-items">
                    <div class="organization-item bg-brown">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-1.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Quis malesuada </p>
                        </div>
                    </div>
                    <div class="organization-item bg-purple">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-2.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Curabitur neque </p>
                        </div>
                    </div>
                    <div class="organization-item bg-blue">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-3.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Quis malesuada</p>
                        </div>
                    </div>
                    <div class="organization-item bg-green">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-4.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Quis malesuada</p>
                        </div>
                    </div>
                    <div class="organization-item bg-dark-brown">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-5.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Quis malesuada</p>
                        </div>
                    </div>
                    <div class="organization-item bg-light-brown">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-6.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Quis malesuada</p>
                        </div>
                    </div>
                    <div class="organization-item bg-parrot">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-7.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Quis malesuada</p>
                        </div>
                    </div>
                    <div class="organization-item bg-teal">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-8.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Quis malesuada </p>
                        </div>
                    </div>
                    <div class="organization-item bg-dark-brown">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-9.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Curabitur neque </p>
                        </div>
                    </div>
                    <div class="organization-item bg-green">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-10.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Quis malesuada</p>
                        </div>
                    </div>
                    <div class="organization-item bg-purple">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-11.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Quis malesuada</p>
                        </div>
                    </div>
                    <div class="organization-item bg-teal">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-12.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Quis malesuada</p>
                        </div>
                    </div>
                    <div class="organization-item bg-parrot">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-13.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p>Quis malesuada</p>
                        </div>
                    </div>
                    <div class="organization-item bg-blue">
                        <div class="organization-item-img">
                            <img src="{{ asset('dashboard/img/organization-img-14.png') }}" alt="Organization Image"/>
                        </div>
                        <div class="organization-item-text">
                            <p><a href="organizations-plus.html">Add more</a></p>
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
