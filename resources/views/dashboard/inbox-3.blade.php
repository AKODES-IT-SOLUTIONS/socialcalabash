@extends('dashboard.layouts.app')

@section('title', 'Inbox-3 - Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">
        <div class="sidebar">
            <div class="page-name">
                <p>Publish</p>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li><a href="{{ route('user.dashboard') }}">calender</a></li>
                    <li class="active"><a href="{{ route('user.scheduled') }}">scheduled</a></li>
                    <li><a href="{{ route('user.queued') }}">queued</a></li>
                    <li><a href="{{ route('user.sent') }}">sent</a></li>
                    <li><a href="{{ route('user.undelivered') }}">undelivered</a></li>
                    <li><a href="{{ route('user.drafts') }}">drafts</a></li>
                    <li><a href="{{ route('user.tasks') }}">tasks</a></li>
                </ul>
            </div>
            <div class="compose-btn">
                <button id="composeBtn"><i class="fa fa-plus"></i> compose</button>
            </div>
        </div>
        <div class="inbox-3 main">
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
                        <li><a href="#"><img src="{{ asset('dashboard/img/download-icon.png" alt="Download Icon">CSV</a></li>
                        <li><a href="#">Filter by organization</a></li>
                        <li><a href="#">Filter by channel</a></li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div class="statistics">
                    <div class="statistics-item">
                        <div class="statistics-item-1 shadow-all">
                            <div class="statistics-item-1-text">
                                <div class="heading">
                                    <p>Welcome back Steve!</p>
                                </div>
                                <div class="points-desc">
                                    <p>Since your last login on the system, there were:</p>
                                </div>
                                <div class="points">
                                    <ul>
                                        <li>
                                            <img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Green Dot"> 21 new charts
                                        </li>
                                        <li>
                                            <img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Green Dot"> 15 new reports
                                        </li>
                                        <li>
                                            <img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Green Dot"> 45 new messages
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Green Dot"> 23 new posts
                                        </li>
                                        <li>
                                            <img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Green Dot"> 15 new responses
                                        </li>
                                        <li>
                                            <img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Green Dot"> 45 mentioned in a Twitter
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="statistics-item-1-img">
                                <img src="{{ asset('dashboard/img/analysis.png') }}" alt="Analysis Img">
                            </div>
                        </div>
                        <div class="statistics-item-2">
                            <div class="followers">
                                <div class="followers-img">
                                    <img src="{{ asset('dashboard/img/followers.png') }}" alt="Followers Image">
                                </div>
                                <div class="followers-footer">
                                    <div class="followers-footer-text">
                                        <p class="amount">3.4K</p>
                                        <p class="text">New followers in this month</p>
                                    </div>
                                    <div class="followers-footer-img">
                                        <a href="#"><img src="{{ asset('dashboard/img/MoreButton.png') }}" alt="More Button"/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="statistics-item">
                        <div class="statistics-item-1" style="padding: 0;border: none;">
                            <div class="mentions">
                                <div class="heading">
                                    <p>Mentions</p>
                                </div>
                                <div class="img">
                                    <img src="{{ asset('dashboard/img/mention-img.png') }}" alt="Mention Img">
                                </div>
                            </div>
                            <div class="responses">
                                <div class="heading">
                                    <p>Responses</p>
                                </div>
                                <div class="img">
                                    <img src="{{ asset('dashboard/img/responses-img.png') }}" alt="Responses">
                                </div>
                            </div>
                        </div>
                        <div class="statistics-item-2" style="padding: 0;background: transparent;">
                            <div class="views-comments-likes">
                                <div class="views bg-blue">
                                    <div class="icon">
                                        <img src="{{ asset('dashboard/img/copy-icon.png') }}" alt="Copy Icon">
                                    </div>
                                    <div class="amount">
                                        <p>56K</p>
                                    </div>
                                    <div class="text">
                                        <p>Total<br>views</p>
                                    </div>
                                </div>
                                <div class="views bg-green">
                                    <div class="icon">
                                        <img src="{{ asset('dashboard/img/copy-icon.png') }}" alt="Copy Icon">
                                    </div>
                                    <div class="amount">
                                        <p>2.8K</p>
                                    </div>
                                    <div class="text bg-purple">
                                        <p>Total<br>comments</p>
                                    </div>
                                </div>
                                <div class="views bg-purple">
                                    <div class="icon">
                                        <img src="{{ asset('dashboard/img/download.png') }}" alt="Download Icon">
                                    </div>
                                    <div class="amount">
                                        <p>41.7K</p>
                                    </div>
                                    <div class="text bg-purple">
                                        <p>Total<br>likes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="status">
                                <div class="status-img">
                                    <img src="{{ asset('dashboard/img/pie-chart.png') }}" alt="">
                                </div>
                                <div class="status-text">
                                    <p>Status<br><span>Growth</span></p>
                                </div>
                                <div class="status-text-2">
                                    <p>4.312</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="scheduled">
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
                                    <p class="red-text">Liked by Tom Bailey, Patricia Grand and 569 other...
                                        <button class="comment-btn">Add a Comment</button>
                                    </p>
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
                                    <p class="red-text">Liked by Tom Bailey, Patricia Grand and 569 other...
                                        <button class="comment-btn">Add a Comment</button>
                                    </p>
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
                                            <img src="{{ asset('dashboard/img/insta-icon.png') }}" alt="Instagram Icon">
                                        </div>
                                        <div class="text">
                                            <p>demofbchannel</p>
                                        </div>
                                    </div>
                                    <p class="desc">Fusce at nisi eget dolor rhoncus facilisis. Mauris ante nisl,
                                        consectetur et luctus et, porta ut dolor. Curabitur consectetur et luctus et,
                                        por ultricies ultrices nulla. Morbi blandit nec est vitae....</p>
                                    <p class="red-text">Liked by Tom Bailey, Patricia Grand and 569 other...
                                        <button class="comment-btn">Add a Comment</button>
                                    </p>
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
                                    <p class="red-text">Liked by Tom Bailey, Patricia Grand and 569 other...
                                        <button class="comment-btn">Add a Comment</button>
                                    </p>
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
                                    <p class="red-text">Patricia commented on your post
                                        <button class="comment-btn">Reply</button>
                                    </p>
                                </td>
                                <td>
                                    <a href="#"><img src="{{ asset('dashboard/img/edit-icon.png') }}" alt="Edit Icon"></a>
                                    <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar and main-content section ends -->

    <!-- Add Comment Modal -->
    <div id="commentModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
            </div>
            <div class="comment-input">
                <input type="text" placeholder="Type your messahe here...">
            </div>
            <div class="btns">
                <input type="reset" value="Cancel"/>
                <input type="submit" value="Send"/>
            </div>
        </div>
    </div>

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

    <script>
        $(document).ready(function () {
            $(".comment-btn").click(function () {
                $("#commentModal").show();
            });
            $(".close").click(function () {
                $("#commentModal").hide();
            });
        });
        // // Get the modal
        var modal = document.getElementById("commentModal");

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
