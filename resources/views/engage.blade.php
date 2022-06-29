@extends('layouts.app')

@section('title', 'Engage')

@section('body')
<!-- Home Section Starts -->
<section class="home-2" style="background-image: url({{ asset('img/banner.png') }})">
   <div class="container">
      <div class="home-2-head">
         <p>engage</p>
      </div>
      <div class="home-2-img" style="background-image: url({{ asset('img/engage-1.png') }})">

      </div>
   </div>
</section>
<!-- Home Section Ends -->

<!-- Social Network Section Starts -->
<section class="social-networks-2 bg-white">
   <div class="container">
      <div class="social-networks-item">
         <div class="social-networks-item-img">
            <img src="{{ asset('img/engage-2.png') }}" alt="Engage" />
         </div>
         <div class="social-networks-item-text">
            <div class="social-networks-item-text-head">
               <p>Manage incoming messages</p>
            </div>
            <div class="social-networks-item-text-desc">
               <p>Arrange all your messages into inboxes so that you can easily manage your incoming content.</p>
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
               <p>Reply messages easily</p>
            </div>
            <div class="social-networks-item-text-desc">
               <p>Reply messages directly as they pop up on your Dashboard so that you engage your customers faster.</p>
            </div>
         </div>
         <div class="social-networks-item-img">
            <img src="{{ asset('img/engage-3.png') }}" alt="Engage" />
         </div>
      </div>
   </div>
</section>
<section class="social-networks-2 bg-white">
   <div class="container">
      <div class="social-networks-item">
         <div class="social-networks-item-img">
            <img src="{{ asset('img/engage-4.png') }}" alt="Engage" />
         </div>
         <div class="social-networks-item-text">
            <div class="social-networks-item-text-head">
               <p>Alerts!</p>
            </div>
            <div class="social-networks-item-text-desc">
               <p>Socialcalabash watches your back by alerting you when you seem to have dropped the ball. You are alerted when you seem not have responded to a post when the system feels you should have.</p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Socail Network Section Ends -->
@endsection
