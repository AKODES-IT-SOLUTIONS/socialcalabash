@extends('home.base')
@section('home-content')
<!-- Home Section Starts -->
<section class="our-team-home" style="background-image: url('{{ asset('home/img/banner.png')}}');">
    <div class="container">
       <div class="our-team-head">
          <p>our team</p>
       </div>
       <div class="our-team-desc">
          <p>Our Dedicated and Experienced team work closely with our partners to deliver this customer friendly service.</p>
       </div>
       <div class="our-team-items">
          <div class="our-team-item">
             <div class="our-team-item-img">
                <img src="{{asset('home/img/team-member-1.png')}}" alt="Team Member">
             </div>
             <div class="our-team-item-name">
                <p>Alan Riley</p>
             </div>
             <div class="our-team-item-designation">
                <p>Co-Founder & CTO</p>
             </div>
             <div class="our-team-item-desc">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut ero labore et dolore.</p>
             </div>
             <div class="our-team-item-btn">
                <a href="#">contact</a>
             </div>
          </div>
          <div class="our-team-item">
             <div class="our-team-item-img">
                <img src="{{asset('home/img/team-member-2.png')}}" alt="Team Member">
             </div>
             <div class="our-team-item-name">
                <p>Alan Riley</p>
             </div>
             <div class="our-team-item-designation">
                <p>Co-Founder & CTO</p>
             </div>
             <div class="our-team-item-desc">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut ero labore et dolore.</p>
             </div>
             <div class="our-team-item-btn">
                <a href="#">contact</a>
             </div>
          </div>
          <div class="our-team-item">
             <div class="our-team-item-img">
                <img src="{{asset('home/img/team-member-3.png')}}" alt="Team Member">
             </div>
             <div class="our-team-item-name">
                <p>Alan Riley</p>
             </div>
             <div class="our-team-item-designation">
                <p>Co-Founder & CTO</p>
             </div>
             <div class="our-team-item-desc">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut ero labore et dolore.</p>
             </div>
             <div class="our-team-item-btn">
                <a href="#">contact</a>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- Home Section Ends -->
@endsection
