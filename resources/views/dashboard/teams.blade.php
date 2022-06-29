@extends('dashboard.layouts.app')

@section('title', 'Teams - Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">

        @include('dashboard.sidebars.admin-sidebar')

        <div class="settings main">
            <div class="main-content">
                <div class="team-items">
                    <div class="team-item">
                        <div class="team-item-1 bg-green">
                            <div class="edit-delete">
                                <a href="#"><img src="{{ asset('dashboard/img/edit-sm.png') }}" alt="Edit Icon"></a>
                                <a href="#"><img src="{{ asset('dashboard/img/delete-sm.png') }}" alt="Delete Icon"></a>
                            </div>
                            <div class="team-item-1-head">
                                <p>Consequat aliquam </p>
                            </div>
                            <div class="team-item-1-images">
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-1.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Chris Fox</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-2.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Benjamin Hawkins</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-3.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Harry Wells</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <a href="team-plus.html"><img src="{{ asset('dashboard/img/add-new.png') }}" alt="Player Image"></a>
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Add</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="team-item-2 bg-sea-green">
                            <div class="edit-delete">
                                <a href="#"><img src="{{ asset('dashboard/img/edit-sm.png') }}" alt="Edit Icon"></a>
                                <a href="#"><img src="{{ asset('dashboard/img/delete-sm.png') }}" alt="Delete Icon"></a>
                            </div>
                            <div class="team-item-1-head">
                                <p>Consequat aliquam </p>
                            </div>
                            <div class="team-item-1-images">
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-4.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Benjamin Vargas</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-5.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Chris Smith</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-6.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Anthony Porter</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-7.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Tyler Nelson</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-8.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Johnny Wallace</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <a href="team-plus.html"><img src="{{ asset('dashboard/img/add-new.png') }}" alt="Player Image"></a>
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Add</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="team-item">
                        <div class="team-item-2 bg-skin">
                            <div class="edit-delete">
                                <a href="#"><img src="{{ asset('dashboard/img/edit-sm.png') }}" alt="Edit Icon"></a>
                                <a href="#"><img src="{{ asset('dashboard/img/delete-sm.png') }}" alt="Delete Icon"></a>
                            </div>
                            <div class="team-item-1-head">
                                <p>Consequat aliquam </p>
                            </div>
                            <div class="team-item-1-images">
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-4.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Benjamin Vargas</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-5.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Chris Smith</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-6.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Anthony Porter</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-7.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Tyler Nelson</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-8.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Johnny Wallace</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <a href="team-plus.html"><img src="{{ asset('dashboard/img/add-new.png') }}" alt="Player Image"></a>
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Add</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="team-item-1 bg-purple">
                            <div class="edit-delete">
                                <a href="#"><img src="{{ asset('dashboard/img/edit-sm.png') }}" alt="Edit Icon"></a>
                                <a href="#"><img src="{{ asset('dashboard/img/delete-sm.png') }}" alt="Delete Icon"></a>
                            </div>
                            <div class="team-item-1-head">
                                <p>Consequat aliquam </p>
                            </div>
                            <div class="team-item-1-images">
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-1.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Chris Fox</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-2.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Benjamin Hawkins</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <img src="{{ asset('dashboard/img/team-img-3.png') }}" alt="Player Image">
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Harry Wells</p>
                                    </div>
                                </div>
                                <div class="team-item-1-images-item">
                                    <div class="team-item-1-images-item-img">
                                        <a href="team-plus.html"><img src="{{ asset('dashboard/img/add-new.png') }}" alt="Player Image"></a>
                                    </div>
                                    <div class="team-item-1-images-item-text">
                                        <p>Add</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-new-btn">
                    <a href="team-plus.html"><i class="fa fa-plus"></i>&nbsp;Add New</a>
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
