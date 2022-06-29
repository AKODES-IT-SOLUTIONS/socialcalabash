@extends('dashboard.layouts.app')

@section('title', 'Manage Users - Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">

        @include('dashboard.sidebars.admin-sidebar')

        <div class="users main">
            <div class="main-content">
                <div class="main-header">
                    <ul>
                        <li><a href="#">team member filter</a></li>
                        <li><a href="#">filter by organization</a></li>
                        <li><a href="#" class="new-user-btn">new user</a></li>
                    </ul>
                </div>
                <div style="overflow-x: auto;padding: 20px;">
                    <table>
                        <tr>
                            <th>name</th>
                            <th>active</th>
                            <th>profile</th>
                            <th>permissions</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>bobby gomez</td>
                            <td><img src="{{ asset('dashboard/img/dot-green.png') }}" alt=""></td>
                            <td>administrator</td>
                            <td>default</td>
                            <td>
                                <a href="#" class="sBtn">Suspend</a>
                                <a href="#" class="eBtn">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>frank fuller</td>
                            <td><img src="{{ asset('dashboard/img/dot-green.png') }}" alt=""></td>
                            <td>administrator</td>
                            <td>default</td>
                            <td>
                                <a href="#" class="sBtn">Suspend</a>
                                <a href="#" class="eBtn">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>kevin gibson</td>
                            <td><img src="{{ asset('dashboard/img/dot-red.png') }}" alt=""></td>
                            <td>administrator</td>
                            <td>default</td>
                            <td>
                                <a href="#" class="sBtn">Suspend</a>
                                <a href="#" class="eBtn">Edit</a>
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
