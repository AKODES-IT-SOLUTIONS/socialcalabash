@extends('layouts.app')

@section('title', 'Listen Monitor')

@section('body')
<!-- Social Network Section Starts -->
<section class="social-networks-2 bg-white">
   <div class="container">
      <div class="social-networks-item">
         <div class="social-networks-item-img">
            <img src="{{ asset('img/listen-monitor-2.png') }}" alt="Listen and Monitor" />
         </div>
         <div class="social-networks-item-text">
            <div class="social-networks-item-text-head">
               <p>Know what are they saying about your brand</p>
            </div>
            <div class="social-networks-item-text-desc">
               <p>We keep an ear open for any mention of your brand and what is being said about you so you can respond quickly if you need to. </p>
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
               <p>Stay ahead</p>
            </div>
            <div class="social-networks-item-text-desc">
               <p>Track trends and hashtags so you can stay ahead of the game which allows you to always plan ahead and always seem to have your finger of the pulse of trends. </p>
            </div>
         </div>
         <div class="social-networks-item-img">
            <img src="{{ asset('img/listen-monitor-3.png') }}" alt="Listen and Monitor" />
         </div>
      </div>
   </div>
</section>
<!-- Socail Network Section Ends -->
@endsection
