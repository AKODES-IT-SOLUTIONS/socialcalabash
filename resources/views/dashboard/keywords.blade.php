@extends('dashboard.layouts.app')

@section('title', 'Keywords - Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">

        @include('dashboard.sidebars.monitor-sidebar')

        <div class="monitor main">
            <div class="main-header">
                <div class="main-header-btns">
                    <form action="">
                        <input type="checkbox" name="check">
                    </form>
                    <a href="#"><img src="{{ asset('dashboard/img/delete.png') }}" alt="Delete Icon"/></a>
                </div>
                <div class="csv-search-filter">
                    <ul>
                        <li><a href="keywords-5.html">Show Chart</a></li>
                        <li>
                            <button id="addNewKeywordBtn"><i class="fa fa-plus"></i>&nbsp;Add New</button>
                        </li>
                        <li>
                            <form action="">
                                <input type="text" placeholder="Search"/>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div class="category-item">
                    <div class="category-item-head">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox" checked="checked"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/facebook-rect.png') }}" alt="Facebook Rect">
                            </div>
                            <div class="text">
                                <p class="heading">photooftheday</p>
                                <p class="desc">Brand and Keyword Monitoring</p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/edit-icon.png') }}" alt="Edit Icon"></a>
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                    <div class="category-item-body">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/category-1.png') }}" alt="Category 1">
                            </div>
                            <div class="text">
                                <p class="heading">Anthony Pearson</p>
                                <p class="time">04:53 pm</p>
                                <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                    no sea photooftheday sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                    duo dolores et ea
                                    <a href="">#fashion</a> <a href="">#hoodies</a> <a href="">#sportswear</a> <a
                                        href="">#tracksuits</a> <a href="">#gymwear</a> <a href="">#tshirt</a> <a
                                        href="">#hoodie</a> <a href="">#streetwear</a> <a href="">#shop</a> <a href="">https://t.co/oVvsf1QnNl3</a>
                                </p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                    <div class="category-item-body">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/category-2.png') }}" alt="Category 2">
                            </div>
                            <div class="text">
                                <p class="heading">Doris Wagner</p>
                                <p class="time">04:53 pm</p>
                                <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                    no sea photooftheday sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                    duo dolores et ea
                                    <a href="">#fashion</a> <a href="">#hoodies</a> <a href="">#sportswear</a> <a
                                        href="">#tracksuits</a> <a href="">#gymwear</a> <a href="">#tshirt</a> <a
                                        href="">#hoodie</a> <a href="">#streetwear</a> <a href="">#shop</a> <a href="">https://t.co/oVvsf1QnNl3</a>
                                </p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                    <div class="category-item-body">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/category-3.png') }}" alt="Category 3">
                            </div>
                            <div class="text">
                                <p class="heading">Denise Boyd</p>
                                <p class="time">04:53 pm</p>
                                <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                    no sea photooftheday sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                    duo dolores et ea
                                    <a href="">#fashion</a> <a href="">#hoodies</a> <a href="">#sportswear</a> <a
                                        href="">#tracksuits</a> <a href="">#gymwear</a> <a href="">#tshirt</a> <a
                                        href="">#hoodie</a> <a href="">#streetwear</a> <a href="">#shop</a> <a href="">https://t.co/oVvsf1QnNl3</a>
                                </p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                    <div class="category-item-body">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/category-4.png') }}" alt="Category 4">
                            </div>
                            <div class="text">
                                <p class="heading">Tom Gordon</p>
                                <p class="time">04:53 pm</p>
                                <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                    no sea photooftheday sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                    duo dolores et ea
                                    <a href="">#fashion</a> <a href="">#hoodies</a> <a href="">#sportswear</a> <a
                                        href="">#tracksuits</a> <a href="">#gymwear</a> <a href="">#tshirt</a> <a
                                        href="">#hoodie</a> <a href="">#streetwear</a> <a href="">#shop</a> <a href="">https://t.co/oVvsf1QnNl3</a>
                                </p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                </div>
                <div class="category-item">
                    <div class="category-item-head">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox" checked="checked"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/bxl-instagram-alt.png') }}" alt="Instagram">
                            </div>
                            <div class="text">
                                <p class="heading">instagood</p>
                                <p class="desc">Brand and Keyword Monitoring</p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/edit-icon.png') }}" alt="Edit Icon"></a>
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                    <div class="category-item-body">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/category-1.png') }}" alt="Category 1">
                            </div>
                            <div class="text">
                                <p class="heading">Anthony Pearson</p>
                                <p class="time">04:53 pm</p>
                                <img src="{{ asset('dashboard/img/road.png') }}" alt="">
                                <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                    no sea photooftheday sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                    duo dolores et ea
                                    <a href="">#fashion</a> <a href="">#hoodies</a> <a href="">#sportswear</a> <a
                                        href="">#tracksuits</a> <a href="">#gymwear</a> <a href="">#tshirt</a> <a
                                        href="">#hoodie</a> <a href="">#streetwear</a> <a href="">#shop</a> <a href="">https://t.co/oVvsf1QnNl3</a>
                                </p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                    <div class="category-item-body">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/category-2.png') }}" alt="Category 2">
                            </div>
                            <div class="text">
                                <p class="heading">Doris Waagner</p>
                                <p class="time">04:53 pm</p>
                                <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                    no sea photooftheday sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                    duo dolores et ea
                                    <a href="">#fashion</a> <a href="">#hoodies</a> <a href="">#sportswear</a> <a
                                        href="">#tracksuits</a> <a href="">#gymwear</a> <a href="">#tshirt</a> <a
                                        href="">#hoodie</a> <a href="">#streetwear</a> <a href="">#shop</a> <a href="">https://t.co/oVvsf1QnNl3</a>
                                </p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                    <div class="category-item-body">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/category-3.png') }}" alt="Category 3">
                            </div>
                            <div class="text">
                                <p class="heading">Denise Boyd</p>
                                <p class="time">04:53 pm</p>
                                <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                    no sea photooftheday sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                    duo dolores et ea
                                    <a href="">#fashion</a> <a href="">#hoodies</a> <a href="">#sportswear</a> <a
                                        href="">#tracksuits</a> <a href="">#gymwear</a> <a href="">#tshirt</a> <a
                                        href="">#hoodie</a> <a href="">#streetwear</a> <a href="">#shop</a> <a href="">https://t.co/oVvsf1QnNl3</a>
                                </p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                    <div class="category-item-body">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/category-4.png') }}" alt="Category 4">
                            </div>
                            <div class="text">
                                <p class="heading">Tom Gordon</p>
                                <p class="time">04:53 pm</p>
                                <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                    no sea photooftheday sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                    duo dolores et ea
                                    <a href="">#fashion</a> <a href="">#hoodies</a> <a href="">#sportswear</a> <a
                                        href="">#tracksuits</a> <a href="">#gymwear</a> <a href="">#tshirt</a> <a
                                        href="">#hoodie</a> <a href="">#streetwear</a> <a href="">#shop</a> <a href="">https://t.co/oVvsf1QnNl3</a>
                                </p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                </div>
                <div class="category-item">
                    <div class="category-item-head">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox" checked="checked"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/twitter-box.png') }}" alt="Twitter">
                            </div>
                            <div class="text">
                                <p class="heading">nature</p>
                                <p class="desc">Brand and Keyword Monitoring</p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/edit-icon.png') }}" alt="Edit Icon"></a>
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                    <div class="category-item-body">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/category-1.png') }}" alt="Category 1">
                            </div>
                            <div class="text">
                                <p class="heading">Anthony Pearson</p>
                                <p class="time">04:53 pm</p>
                                <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                    no sea photooftheday sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                    duo dolores et ea
                                    <a href="">#fashion</a> <a href="">#hoodies</a> <a href="">#sportswear</a> <a
                                        href="">#tracksuits</a> <a href="">#gymwear</a> <a href="">#tshirt</a> <a
                                        href="">#hoodie</a> <a href="">#streetwear</a> <a href="">#shop</a> <a href="">https://t.co/oVvsf1QnNl3</a>
                                </p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                    <div class="category-item-body">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/category-2.png') }}" alt="Category 2">
                            </div>
                            <div class="text">
                                <p class="heading">Doris Waagner</p>
                                <p class="time">04:53 pm</p>
                                <img src="{{ asset('dashboard/img/mountain.png') }}" alt="">
                                <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                    no sea photooftheday sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                    duo dolores et ea
                                    <a href="">#fashion</a> <a href="">#hoodies</a> <a href="">#sportswear</a> <a
                                        href="">#tracksuits</a> <a href="">#gymwear</a> <a href="">#tshirt</a> <a
                                        href="">#hoodie</a> <a href="">#streetwear</a> <a href="">#shop</a> <a href="">https://t.co/oVvsf1QnNl3</a>
                                </p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                    <div class="category-item-body">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/category-3.png') }}" alt="Category 3">
                            </div>
                            <div class="text">
                                <p class="heading">Denise Boyd</p>
                                <p class="time">04:53 pm</p>
                                <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                    no sea photooftheday sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                    duo dolores et ea
                                    <a href="">#fashion</a> <a href="">#hoodies</a> <a href="">#sportswear</a> <a
                                        href="">#tracksuits</a> <a href="">#gymwear</a> <a href="">#tshirt</a> <a
                                        href="">#hoodie</a> <a href="">#streetwear</a> <a href="">#shop</a> <a href="">https://t.co/oVvsf1QnNl3</a>
                                </p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
                        </div>
                    </div>
                    <div class="category-item-body">
                        <div class="category-item-head-checkbox">
                            <form action="">
                                <input type="checkbox"/>
                            </form>
                        </div>
                        <div class="category-item-head-img-text">
                            <div class="img">
                                <img src="{{ asset('dashboard/img/category-4.png') }}" alt="Category 4">
                            </div>
                            <div class="text">
                                <p class="heading">Tom Gordon</p>
                                <p class="time">04:53 pm</p>
                                <p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                    no sea photooftheday sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                    duo dolores et ea
                                    <a href="">#fashion</a> <a href="">#hoodies</a> <a href="">#sportswear</a> <a
                                        href="">#tracksuits</a> <a href="">#gymwear</a> <a href="">#tshirt</a> <a
                                        href="">#hoodie</a> <a href="">#streetwear</a> <a href="">#shop</a> <a href="">https://t.co/oVvsf1QnNl3</a>
                                </p>
                            </div>
                        </div>
                        <div class="category-item-head-btns">
                            <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}" alt="Delete Icon"></a>
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
    </div>
    <!-- Compose Modal Modal -->
    <div id="addNewKeywordModal" class="addNewKeywordModal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="addNewKeywordClose">&times;</span>
            <div class="tags">
                <ul>
                    <li><img src="{{ asset('dashboard/img/fb-icon.png') }}">demofbchannel<span class="tag-close">&times;</span></li>

                    <li><img src="{{ asset('dashboard/img/insta-icon.png') }}"> demoigchannel<span class="tag-close">&times;</span></li>
                    <li><img src="{{ asset('dashboard/img/fb-icon.png') }}">demofbchannel<span class="tag-close">&times;</span></li>
                    <li><img src="{{ asset('dashboard/img/fb-icon.png') }}">demofbchannel<span class="tag-close">&times;</span></li>
                </ul>
            </div>
            <div class="form">
                <div class="form-group">
                    <label for="">description</label>
                    <input class="form-control" type="text" placeholder="This is for your own reference">
                </div>
                <div class="form-group">
                    <label for="">has one of these terms</label>
                    <input class="form-control" type="text"
                           placeholder="Separate each word or phrase by a comma. e.g. cola, orange juice, lemonade">
                </div>
                <div class="form-group">
                    <label for="">Doesn't have these words (optional)</label>
                    <input class="form-control" type="text"
                           placeholder="Exclude entries containing the keywords above. (Separate multiple keywords with a comma)">
                </div>
                <div class="form-group">
                    <label for="">Has these Hashtags</label>
                    <input class="form-control" type="text"
                           placeholder="# Hashtag (Separate multiple Hashtags with a comma)">
                </div>
                <div class="form-group-2">
                    <label for="">Email notifications</label>
                    <select name="" id="">
                        <option value="">Never</option>
                        <option value="">Daily</option>
                        <option value="">Weekly</option>
                        <option value="">Monthly</option>
                    </select>
                </div>
                <div class="submit-btn">
                    <input type="submit" value="Add">
                </div>
            </div>
        </div>
    </div>

    <script>
        // compose modal
        // Get the modal
        var addNewKeywordModal = document.getElementById("addNewKeywordModal");

        // Get the button that opens the modal
        var addNewKeywordBtn = document.getElementById("addNewKeywordBtn");

        // Get the <span> element that closes the modal
        var addNewKeywordClose = document.getElementsByClassName("addNewKeywordClose")[0];

        // When the user clicks the button, open the modal
        addNewKeywordBtn.onclick = function () {
            addNewKeywordModal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        addNewKeywordClose.onclick = function () {
            addNewKeywordModal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == addNewKeywordModal) {
                addNewKeywordModal.style.display = "none";
            }
        }
    </script>
@endsection
