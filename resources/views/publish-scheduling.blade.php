@extends('layouts.app')

@section('title', 'Publish Scheduling')

@section('body')
    <!-- Home Section Starts -->
    <section class="home-2" style="background-image: url({{ asset('img/banner.png') }})">
        <div class="container">
            <div class="home-2-head">
                <p>Publish and Scheduling</p>
            </div>
            <div class="home-2-img" style="background-image: url({{ asset('img/publish-scheduling-1.png') }})">

            </div>
        </div>
    </section>
    <!-- Home Section Ends -->
    <!-- Social Network Section Starts -->
    <section class="social-networks-2 bg-white">
        <div class="container">
            <div class="social-networks-item">
                <div class="social-networks-item-img">
                    <img src="{{ asset('img/puslish-scheduling-2.png') }}" alt="Publish Scheduling"/>
                </div>
                <div class="social-networks-item-text">
                    <div class="social-networks-item-text-head">
                        <p>Write all your content in one place</p>
                    </div>
                    <div class="social-networks-item-text-desc">
                        <p>No need to move away from your socialcalabash Dashboard in order to write a post, now do it
                            all in once place no matter which social media channel you are writing the post for.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="social-networks-2">
        <div class="container">
            <div class="social-networks-item">
                <div class="social-networks-item-text">
                    <div class="social-networks-item-text-head">
                        <p>Schedule your posts with ease</p>
                    </div>
                    <div class="social-networks-item-text-desc">
                        <p>Easily write posts you want to publish in the future by using our scheduling feature and easy
                            to use social media calendar. Allow socialcalabash to make your life easier by allowing you
                            to plan ahead and get things done when you want to do them any time of</p>
                    </div>
                </div>
                <div class="social-networks-item-img">
                    <img src="{{ asset('img/puslish-scheduling-3.png') }}" alt="Publish Scheduling"/>
                </div>
            </div>
        </div>
    </section>
    <section class="social-networks-2 bg-white">
        <div class="container">
            <div class="social-networks-item">
                <div class="social-networks-item-img">
                    <img src="{{ asset('img/puslish-scheduling-4.png') }}" alt="Publish Scheduling"/>
                </div>
                <div class="social-networks-item-text">
                    <div class="social-networks-item-text-head">
                        <p>Create eye catching content</p>
                    </div>
                    <div class="social-networks-item-text-desc">
                        <p>We provide message editor tools that allows you to write cool content that can include media
                            content like emojis, video clips and pictures.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="social-networks-2">
        <div class="container">
            <div class="social-networks-item">
                <div class="social-networks-item-text">
                    <div class="social-networks-item-text-head">
                        <p>Great publishing tools</p>
                    </div>
                    <div class="social-networks-item-text-desc">
                        <p>Connect great publishing tools like google drive, one drive , dropbox, bitly and YouTube to
                            your dashboard so that you add content easily to your post from your third party service
                            providers and shorten long urls with bitly.</p>
                    </div>
                </div>
                <div class="social-networks-item-img">
                    <img src="{{ asset('img/puslish-scheduling-5.png') }}" alt="Publish Scheduling"/>
                </div>
            </div>
        </div>
    </section>
    <!-- Socail Network Section Ends -->
@endsection
