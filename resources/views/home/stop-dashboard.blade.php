@extends('home.base')
@section('home-content')
<!-- Home Section Starts -->
<section class="home-2" style="background-image: url('{{ asset('home/img/banner.png')}}');">
    <div class="container">
       <div class="home-2-head">
          <p>1 stop dashboard</p>
       </div>
       <div class="home-2-img" style="background-image: url('{{ asset('home/img/stop-dashboard-home-img.png')}}');">

       </div>
    </div>
 </section>
 <!-- Home Section Ends -->

 <!-- Social Network Section Starts -->
 <section class="social-networks-2 bg-white">
    <div class="container">
       <div class="social-networks-item">
          <div class="social-networks-item-img">
               <img src="{{asset('home/img/social-networks-2.png')}}" alt="Social Networks" />
          </div>
          <div class="social-networks-item-text">
             <div class="social-networks-item-text-head">
                <p>All your social networks  in one place!</p>
             </div>
             <div class="social-networks-item-text-desc">
                <p>Manage  your Facebook, Twitter, Instagram, reddit, Pinterest, google my business and Youtube from one dashboard. No need to swing between multiple social media dashboards anymore with socialcalabash.</p>
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
                <p>Easy to use and intuitive</p>
             </div>
             <div class="social-networks-item-text-desc">
                <p>Get things done easily with our easy to use dashboard, it is intuitive and allows you to hit the ground running. We have designed everything with our customers in mind so that using our dashboard becomes a joy.</p>
             </div>
          </div>
          <div class="social-networks-item-img">
               <img src="{{asset('home/img/social-networks-3.png')}}" alt="Social Networks" />
          </div>
       </div>
    </div>
 </section>
 <section class="social-networks-2 bg-white">
    <div class="container">
       <div class="social-networks-item">
          <div class="social-networks-item-img">
               <img src="{{asset('home/img/social-networks-4.png')}}" alt="Social Networks" style="width: 60%;display: block;margin: auto;" />
          </div>
          <div class="social-networks-item-text">
             <div class="social-networks-item-text-head">
                <p>Auto updated</p>
             </div>
             <div class="social-networks-item-text-desc">
                <p>Never miss any new message as your dashboard is auto updated so that you do not have to do anything. The data is dynamically refreshed so that you can trust what you are seeing at any time to be uptodate.</p>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- Socail Network Section Ends -->
@endsection
