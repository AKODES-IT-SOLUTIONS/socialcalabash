@extends('home.base')
@section('home-content')
<!-- Home Section Starts -->
<section class="home-2" style="background-image: url('{{ asset('home/img/banner.png')}}');">
    <div class="container">
       <div class="home-2-head">
          <p>why us</p>
       </div>
       <div class="home-2-img" style="background-image:url('{{asset('home/img/why-us-1.png')}}');">

       </div>
    </div>
 </section>
 <!-- Home Section Ends -->

 <!-- Social Network Section Starts -->
 <section class="social-networks-2 bg-white">
    <div class="container">
       <div class="social-networks-item">
          <div class="social-networks-item-img">
             <img src="{{asset('home/img/great-reports-2.png')}}" alt="Engage" />
          </div>
          <div class="social-networks-item-text">
             <div class="social-networks-item-text-head">
                <p>Easy to use</p>
             </div>
             <div class="social-networks-item-text-desc">
                <p>By focusing on the core features, we have made socialcalabash simple and easy to use.</p>
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
                <p>Reliable and secure</p>
             </div>
             <div class="social-networks-item-text-desc">
                <p>Our service is built on a solid, reliable and secure cloud infrastructure that gives you our customer peace of mind.</p>
             </div>
          </div>
          <div class="social-networks-item-img">
             <img src="{{asset('home/img/why-us-2.png')}}" alt="Why Us" />
          </div>
       </div>
    </div>
 </section>
 <section class="social-networks-2 bg-white">
    <div class="container">
       <div class="social-networks-item">
          <div class="social-networks-item-img">
             <img src="{{asset('home/img/why-us-3.png')}}" alt="Why Us" />
          </div>
          <div class="social-networks-item-text">
             <div class="social-networks-item-text-head">
                <p>Great value</p>
             </div>
             <div class="social-networks-item-text-desc">
                <p>We pride ourselves on keeping our prices the lowest in comparison to our competitors.</p>
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
                <p>Passionate Support</p>
             </div>
             <div class="social-networks-item-text-desc">
                <p>We take our support very seriously, our customers can contact us via multiple channels.</p>
             </div>
          </div>
          <div class="social-networks-item-img">
             <img src="{{asset('home/img/why-us-4.png')}}" alt="Why Us" />
          </div>
       </div>
    </div>
 </section>
 <!-- Socail Network Section Ends -->
@endsection
