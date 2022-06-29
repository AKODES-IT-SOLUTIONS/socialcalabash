@extends('layouts.app')

@section('title', 'Home')

@section('body')
    <!-- Home Section Starts -->
    <section class="home">
        <div class="slider">
            <div class="slide active"
                 style="background-image: url({{ asset('img/home-banner-1.png') }}); background-size: cover;">
                <div class="container">
                    <div class="caption">
                        <h1>All Major Social Media Accounts<br><span>In One Place!</span></h1>
                    </div>
                </div>
            </div>
            <div class="slide" style="background-image: url({{ asset('img/home-banner-2.png') }})">
                <div class="container" style="display: flex;justify-content: flex-end;">
                    <div class="caption" style="display:flex;justify-content: flex-end;">
                        <h1>A service that just<br><span>works!</span></h1>
                    </div>
                </div>
            </div>
            <div class="slide" style="background-image: url({{ asset('img/home-banner-3.png') }})">
                <div class="container">
                    <div class="caption">
                        <h1>Our partners make us<br><span>better!</span></h1>
                    </div>
                </div>
            </div>
            <div class="slide" style="background-image: url({{ asset('img/home-banner-4.png') }})">
                <div class="container">
                    <div class="caption">
                        <h1>Manage multiple accounts<br><span>easily!</span></h1>
                    </div>
                </div>
            </div>
            <div class="slide" style="background-image: url({{ asset('img/home-banner-5.png') }})">
                <div class="container">
                    <div class="caption">
                        <h1>We focus only on<br><span>core features!</span></h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- controls  -->
        <div class="controls">
            <div class="prev"><i class="fa fa-angle-left"></i></div>
            <div class="next"><i class="fa fa-angle-right"></i></div>
        </div>
        <!-- indicators -->
        <div class="indicator">
        </div>
    </section>
    <!-- Home Section Ends -->

    <!-- Social Networks Section Starts -->
    <section class="social-networks">
        <div class="container">
            <div class="social-networks-head">
                <p>All your social networks in one place!</p>
            </div>
            <div class="social-networks-desc">
                <p>A simpler and smarter social media tool designed to effectively enwrap your client's followers, keep
                    an eye on their brand name and track performance.</p>
            </div>
        </div>
    </section>
    <!-- Social Networks Section Ends -->

    <!-- Publish and Scheduling Section Starts -->
    <section class="publish-scheduling">
        <div class="container">
            <div class="publish-scheduling-head">
                <p>Publish and scheduling</p>
            </div>
            <div class="publish-scheduling-desc">
                <p>Draft new posts and schedule to multiple social networks at the same time using our publishing
                    features.</p>
            </div>
        </div>
    </section>
    <!-- Publish and Scheduling Section Ends -->

    <!-- Listen and Monitor Starts -->
    <section class="listen-monitor">
        <div class="container">
            <div class="listen-monitor-head">
                <p>Listen and Monitor</p>
            </div>
            <div class="listen-monitor-desc">
                <p>Watch out for the most recent social discussions, trends, and brand specifications. Respond instantly
                    to remarks from an inbox that joins every one of your discussions from supported social networks in
                    a solitary string.</p>
            </div>
        </div>
    </section>
    <!-- Listen and Monitor Ends	 -->

    <!-- Collaborate Section Starts -->
    <section class="collaborate">
        <div class="container">
            <div class="collaborate-head">
                <p>Collaborate</p>
            </div>
            <div class="collaborate-desc">
                <p>React to clients quicker and help positive supposition on your social channels. Relegate, reallocate,
                    and resolve social posts with colleagues to examine the most ideal approach to respond.</p>
            </div>
        </div>
    </section>
    <!-- Collaborate Section Ends -->

    <!-- Great Reports Section Starts -->
    <section class="great-reports">
        <div class="container">
            <div class="great-reports-head">
                <p>Great Reports</p>
            </div>
            <div class="great-reports-desc">
                <p>Model brand name, show prepared reports to intrigue your customers and demonstrate the ROI invested
                    of your web-based media endeavors</p>
            </div>
        </div>
    </section>
    <!-- Great Reports Section Ends -->

    <!-- Our partners section starts -->
    <section class="our-partners">
        <div class="container">
            <div class="our-partners-head">
                <p>Our Partners</p>
            </div>
            <div class="our-partners-items">
                <div class="our-partners-item">
                    <img src="{{ asset('img/fb-icon.png') }}" alt="Facebook Icon"/>
                </div>
                <div class="our-partners-item">
                    <img src="{{ asset('img/twit-icon.png') }}" alt="Twitter Icon"/>
                </div>
                <div class="our-partners-item">
                    <img src="{{ asset('img/blog-icon.png') }}" alt="Blog Icon"/>
                </div>
                <div class="our-partners-item">
                    <img src="{{ asset('img/insta-icon.png') }}" alt="Instagram Icon"/>
                </div>
                <div class="our-partners-item">
                    <img src="{{ asset('img/stripe-icon.png') }}" alt="Stripe Icon"/>
                </div>
                <div class="our-partners-item">
                    <img src="{{ asset('img/google-icon.png') }}" alt="Google Icon"/>
                </div>
                <div class="our-partners-item">
                    <img src="{{ asset('img/pint-icon.png') }}" alt="Pinterest Icon"/>
                </div>
            </div>
        </div>
    </section>
    <!-- Our partners section ends -->

    <script type="text/javascript">
        const slides = document.querySelector(".slider").children;
        const prev = document.querySelector(".prev");
        const next = document.querySelector(".next");
        const indicator = document.querySelector(".indicator");
        let index = 0;


        prev.addEventListener("click", function () {
            prevSlide();
            updateCircleIndicator();
            resetTimer();
        })

        next.addEventListener("click", function () {
            nextSlide();
            updateCircleIndicator();
            resetTimer();

        })

        // create circle indicators
        function circleIndicator() {
            for (let i = 0; i < slides.length; i++) {
                const div = document.createElement("div");
                // div.innerHTML=i+1;
                div.setAttribute("onclick", "indicateSlide(this)")
                div.id = i;
                if (i == 0) {
                    div.className = "active";
                }
                indicator.appendChild(div);
            }
        }

        circleIndicator();

        function indicateSlide(element) {
            index = element.id;
            changeSlide();
            updateCircleIndicator();
            resetTimer();
        }

        function updateCircleIndicator() {
            for (let i = 0; i < indicator.children.length; i++) {
                indicator.children[i].classList.remove("active");
            }
            indicator.children[index].classList.add("active");
        }

        function prevSlide() {
            if (index == 0) {
                index = slides.length - 1;
            } else {
                index--;
            }
            changeSlide();
        }

        function nextSlide() {
            if (index == slides.length - 1) {
                index = 0;
            } else {
                index++;
            }
            changeSlide();
        }

        function changeSlide() {
            for (let i = 0; i < slides.length; i++) {
                slides[i].classList.remove("active");
            }

            slides[index].classList.add("active");
        }

        function resetTimer() {
            // when click to indicator or controls button
            // stop timer
            clearInterval(timer);
            // then started again timer
            timer = setInterval(autoPlay, 7000);
        }


        function autoPlay() {
            nextSlide();
            updateCircleIndicator();
        }

        let timer = setInterval(autoPlay, 7000);
    </script>

@endsection







