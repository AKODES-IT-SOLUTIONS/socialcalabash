@extends('home.base')
@section('home-content')
<!-- Home Section Starts -->
<section class="home-2" style="background-image: url('{{ asset('home/img/banner.png')}}');">
    <div class="container">
       <div class="home-2-head">
          <p>insightful analytics</p>
       </div>
       <div class="home-2-img" style="background-image: url('{{ asset('home/img/analytics-1.png')}}');">

       </div>
    </div>
 </section>
 <!-- Home Section Ends -->

 <!-- Social Network Section Starts -->
 <section class="social-networks-2 bg-white">
    <div class="container">
       <div class="social-networks-item">
          <div class="social-networks-item-img">
             <img src="{{asset('home/img/analytics-2.png')}}" alt="Analytics" />
          </div>
          <div class="social-networks-item-text">
             <div class="social-networks-item-text-head">
                <p>360 degree results viewable</p>
             </div>
             <div class="social-networks-item-text-desc">
                <p>By using Socialcalabash you can see the numbers that matter about all your social media channel on your dashboard in one view. </p>
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
                <p>Audience statistics</p>
             </div>
             <div class="social-networks-item-text-desc">
                <p>See how many people and their demographics that are connected to your brand.</p>
             </div>
          </div>
          <div class="social-networks-item-img">
             <img src="{{asset('home/img/analytics-3.png')}}" alt="Analytics" />
          </div>
       </div>
    </div>
 </section>
 <section class="social-networks-2 bg-white">
    <div class="container">
       <div class="social-networks-item">
          <div class="social-networks-item-img">
             <img src="{{asset('home/img/analytics-4.png')}}" alt="Analytics" />
          </div>
          <div class="social-networks-item-text">
             <div class="social-networks-item-text-head">
                <p>Content Analysis </p>
             </div>
             <div class="social-networks-item-text-desc">
                <p>Get useful analysis about content you have posted so you know what is working and what is not.</p>
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
                <p>Social media channel analysis</p>
             </div>
             <div class="social-networks-item-text-desc">
                <p>Because we are deeply integrated to all the social media channel providers, we can provide indepth analysis about each of your channels you are connected to.</p>
             </div>
          </div>
          <div class="social-networks-item-img">
             <img src="{{asset('home/img/analytics-5.png')}}" alt="Analytics" />
          </div>
       </div>
    </div>
 </section>
 <!-- Socail Network Section Ends -->
@endsection
