@extends('dashboard.layouts.app')

@section('title', 'Keywords-5 - Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">
        <div class="sidebar">
            <div class="page-name">
                <p>Monitor</p>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li class="active"><a href="{{ route('user.keywords5') }}">keyword alerts</a></li>
                    <li><a href="{{ route('user.search') }}">search</a></li>
                </ul>
            </div>
            <div class="compose-btn">
                <button id="composeBtn"><i class="fa fa-plus"></i> compose</button>
            </div>
        </div>
        <div class="monitor main">
            <div class="main-header" style="background: transparent;">
                <div class="main-header-text">
                    <p>Keywords/Hashtag being monitored</p>
                </div>
                <div class="tags">
                    <ul>
                        <li><img width="12" src="{{ asset('dashboard/img/dot-blue.png') }}" alt=""> #instagood</li>
                        <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt=""> photooftheday</li>
                    </ul>
                </div>
                <div class="csv-search-filter">
                    <ul>
                        <li><a href="keywords.html">Hide Chart</a></li>
                        <li>
                            <form action="">
                                <select name="" id="">
                                    <option value="">Weekly</option>
                                    <option value="">Month</option>
                                    <option value="">Yearly</option>
                                </select>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div class="graphs">
                    <div class="graphs-item">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="graphs-item">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
                <div class="percentage">
                    <div class="percentage-item">
                        <div class="percentage-item-head">
                            <p>30% Up</p>
                        </div>
                        <div class="list-percent">
                            <div class="list">
                                <ul>
                                    <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="">23 new posts</li>
                                    <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="">15 new responses</li>
                                    <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="">45 mentioned</li>
                                </ul>
                            </div>
                            <div class="percent">
                                <img src="{{ asset('dashboard/img/percent.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="percentage-item">
                        <div class="percentage-item-head">
                            <p>12% Up</p>
                        </div>
                        <div class="list-percent">
                            <div class="list">
                                <ul>
                                    <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="">23 new posts</li>
                                    <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="">15 new responses</li>
                                    <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="">45 mentioned</li>
                                </ul>
                            </div>
                            <div class="percent">
                                <img src="{{ asset('dashboard/img/percent.png') }}" alt="">
                            </div>
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

    <script src="{{ asset('dashboard/https://cdn.jsdelivr.net/npm/chart.js') }}"></script>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var xValues = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: xValues,
                datasets: [{
                    label: '#instagood', // Name the series
                    data: [25, 42, 35, 42, 25, 18, 32, 43], // Specify the data values array
                    fill: false,
                    borderColor: '#2196f3', // Add custom color border (Line)
                    backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                    borderWidth: 1 // Specify bar border width
                },
                    {
                        label: 'photooftheday', // Name the series
                        data: [10, 25, 18, 33, 42, 28, 19], // Specify the data values array
                        fill: false,
                        borderColor: '#4CAF50', // Add custom color border (Line)
                        backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
                        borderWidth: 1 // Specify bar border width
                    }]
            },
            options: {

                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height
                scales: {
                    y: {
                        max: 60,
                        min: 0,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });
    </script>
    <script>
        var ctx2 = document.getElementById("myChart2").getContext('2d');
        var xValues2 = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
        var myChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: xValues2,
                datasets: [{
                    label: '#instagood', // Name the series
                    data: [10, 42, 35, 42, 25, 18, 32, 43], // Specify the data values array
                    fill: false,
                    borderColor: '#2196f3', // Add custom color border (Line)
                    backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                    borderWidth: 1 // Specify bar border width
                },
                    {
                        label: 'photooftheday', // Name the series
                        data: [0, 25, 18, 33, 42, 28, 19], // Specify the data values array
                        fill: false,
                        borderColor: '#4CAF50', // Add custom color border (Line)
                        backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
                        borderWidth: 1 // Specify bar border width
                    }]
            },
            options: {

                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height
                scales: {
                    y: {
                        max: 60,
                        min: 0,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });
    </script>
@endsection
