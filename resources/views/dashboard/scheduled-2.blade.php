@extends('dashboard.layouts.app')

@section('title', 'Scheduled-2 - Dashboard')

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
                <a href="#"><img src="{{ asset('dashboard/img/delete.png') }}" alt="Delete Icon" /></a>
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
            <div class="scheduled">






                <div class="heading">
                    <p>Today</p>
                </div>
                <div style="overflow-x: auto;">
                    <table>

                        @foreach($social_posts as $post)
                            @php
                                $imageName = null;
                                $account_name = null;
                                if ($post->account_type === 'fb_page') {
                                    $imageName = 'fb-icon.png';
                                }

                                if ($post->account_type === 'fb_group') {
                                    $imageName = 'fb-icon.png';
                                }

                                if ($post->account_type === 'instagram') {
                                    $imageName = 'insta-icon.png';
                                }

                                if ($post->account_type === 'linkedin') {
                                    $imageName = 'linkedin-icon.png';
                                }

                                if ($post->account_type === 'twitter') {
                                    $imageName = 'twit-icon.png';
                                }
                                if ($post->account_type === 'pinterest') {
                                    $imageName = 'pinterest-icon.png';
                                }

                            @endphp
                        <tr style="border-bottom: 1px solid black">
                            <td style="border: none">
                                <form action="">
                                    <input type="checkbox" />
                                </form>
                            </td>
                            <td style="border: none; width: 70%">
                                <div class="icon-text">
                                    <div class="icon">
                                        <img src="{{ asset('dashboard/img/' . $imageName) }}">
                                    </div>
                                    <div class="text">
                                        <p>{{ $post->account_name }}</p>
                                    </div>
                                </div>
                                <p class="desc">{{ $post->message }}</p>
                            </td>
                            <td style="border: none">{{ "⏲️" . date('d M, Y \a\t h:ia', strtotime($post['scheduled_datetime'])) }}</td>

                            <td style="border: none; padding-right: 15px;">
                                <div style="display: flex">
                                    <a href="#"><i class="fa-solid fa-pen-to-square" style="color: black;font-size: 20px;margin-right: 10px;"></i></a>
                                    <a href="#"><i class="fa-solid fa-trash-can" style="color: black;font-size: 20px;"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach



                    </table>
                </div>












                <!--
                        <div class="heading">
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
                                        <p class="desc">Fusce at nisi eget dolor rhoncus facilisis. Mauris ante nisl,
                                            consectetur et luctus et, porta ut dolor. Curabitur consectetur et luctus et,
                                            por ultricies ultrices nulla. Morbi blandit nec est vitae....</p>
                                    </td>
                                    <td>
                                        <a href="#"><img src="{{ asset('dashboard/img/edit-icon.png') }}" alt="Edit Icon"></a>
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
                                        <p class="desc">Fusce at nisi eget dolor rhoncus facilisis. Mauris ante nisl,
                                            consectetur et luctus et, porta ut dolor. Curabitur consectetur et luctus et,
                                            por ultricies ultrices nulla. Morbi blandit nec est vitae....</p>
                                    </td>
                                    <td>
                                        <a href="#"><img src="{{ asset('dashboard/img/edit-icon.png') }}" alt="Edit Icon"></a>
                                        <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="heading">
                            <p>Saturday, 10 July</p>
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
                                                <img src="{{ asset('dashboard/img/insta-icon.png') }}" alt="Instagram Icon">
                                            </div>
                                            <div class="text">
                                                <p>demofbchannel</p>
                                            </div>
                                        </div>
                                        <p class="desc">Fusce at nisi eget dolor rhoncus facilisis. Mauris ante nisl,
                                            consectetur et luctus et, porta ut dolor. Curabitur consectetur et luctus et,
                                            por ultricies ultrices nulla. Morbi blandit nec est vitae....</p>
                                    </td>
                                    <td>
                                        <a href="#"><img src="{{ asset('dashboard/img/edit-icon.png') }}" alt="Edit Icon"></a>
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
                                        <p class="desc">Fusce at nisi eget dolor rhoncus facilisis. Mauris ante nisl,
                                            consectetur et luctus et, porta ut dolor. Curabitur consectetur et luctus et,
                                            por ultricies ultrices nulla. Morbi blandit nec est vitae....</p>
                                    </td>
                                    <td>
                                        <a href="#"><img src="{{ asset('dashboard/img/edit-icon.png') }}" alt="Edit Icon"></a>
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
                                                <img src="{{ asset('dashboard/img/twit-icon.png') }}" alt="Twitter Icon">
                                            </div>
                                            <div class="text">
                                                <p>demofbchannel</p>
                                            </div>
                                        </div>
                                        <p class="desc">Fusce at nisi eget dolor rhoncus facilisis. Mauris ante nisl,
                                            consectetur et luctus et, porta ut dolor. Curabitur consectetur et luctus et,
                                            por ultricies ultrices nulla. Morbi blandit nec est vitae....</p>
                                    </td>
                                    <td>
                                        <a href="#"><img src="{{ asset('dashboard/img/edit-icon.png') }}" alt="Edit Icon"></a>
                                        <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    -->

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

                    <input class="FileUpload1" id="FileInput" name="booking_attachment" type="file" />
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
