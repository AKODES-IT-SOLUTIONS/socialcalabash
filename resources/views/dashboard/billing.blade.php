@extends('dashboard.layouts.app')

@section('title', 'Billing - Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">

        @include('dashboard.sidebars.admin-sidebar')

        <div class="billing main">
            <div class="main-content">
                <div class="main-content-head">
                    <p>Subscription details</p>
                </div>
                <div style="overflow-x: auto;padding: 10px 20px;">
                    <table>
                        <tr>
                            <td colspan="2"><b>plan type</b></td>
                            <td colspan="2">Traction</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>plan pricing</b></td>
                            <td colspan="2">&euro;75.00/month</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>payment method</b></td>
                            <td>No cards details</td>
                            <td class="text-right"><a href="#">add to cart</a></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>account created</b></td>
                            <td colspan="2">24 June 2021</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>next payment due</b></td>
                            <td>8 July 2021</td>
                            <td class="text-right"><a href="#">Pick a new plan</a></td>
                        </tr>
                        <tr>
                            <td class="vertical-align-top"><b>traction bundle</b><br><br><span>Users and Profiles are bundled together. <br>Each additional user comes with an extra 6 Profiles.</span>
                            </td>
                            <td class="vertical-align-top">users<br><br><span>4<br>1 active<br>0 inactive<br>3 available</span>
                            </td>
                            <td class="vertical-align-top">profiles<br><br><span>24<br>1 added<br>23 available</span>
                            </td>
                            <td class="text-right"><a href="#"><i class="fa fa-minus"></i></a><a href="#"><i
                                        class="fa fa-plus"></i></a></td>
                        </tr>
                        <tr>
                            <td><b>billing frequency</b></td>
                            <td colspan="3" class="text-right"><a href="#">6 month (-7%)</a><a href="#">Yearly
                                    (-15%)</a><a href="#">3 month (-5%)</a><a href="#" class="active">Monthly (-2%)</a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div style="padding: 10px 20px;">
                    <div class="cancel-subscription">
                        <div class="cancel-subscription-text">
                            <p>cancel subscription</p>
                            <p class="desc">The cancellation will take effect after the end of your current billing
                                period on 08 July 2021. Your data will be permanently deleted 30 days after the
                                cancellation date.</p>
                        </div>
                        <div class="cancel-subscription-btn">
                            <a href="#">cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar and main-content section ends -->
    <div id="composeModal" class="composeModal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
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
@endsection
