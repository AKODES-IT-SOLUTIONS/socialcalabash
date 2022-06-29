@extends('layouts.app')

@section('title', 'Collaborate')

@section('body')
<!-- Home Section Starts -->
<section class="home-2" style="background-image: url({{ asset('img/banner.png') }})">
   <div class="container">
      <div class="home-2-head">
         <p>Collaborate Seamlessly</p>
      </div>
      <div class="home-2-img" style="background-image: url({{ asset('img/collaborate-1.png') }})">

      </div>
   </div>
</section>
<!-- Home Section Ends -->

<!-- Social Network Section Starts -->
<section class="social-networks-2 bg-white">
   <div class="container">
      <div class="social-networks-item">
         <div class="social-networks-item-img">
            <img src="{{ asset('img/collaborate-2.png') }}" alt="Collaborate" />
         </div>
         <div class="social-networks-item-text">
            <div class="social-networks-item-text-head">
               <p>Allows for better teamwork</p>
            </div>
            <div class="social-networks-item-text-desc">
               <p>With our service, your teams can be located in different locations to work together easily.</p>
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
               <p>Assign conversations to  teams or individuals</p>
            </div>
            <div class="social-networks-item-text-desc">
               <p>Easily assign conversations to a specific team or individual automatically or manually depending on your preference.</p>
            </div>
         </div>
         <div class="social-networks-item-img">
            <img src="{{ asset('img/collaborate-3.png') }}" alt="Collaborate" />
         </div>
      </div>
   </div>
</section>
<section class="social-networks-2 bg-white">
   <div class="container">
      <div class="social-networks-item">
         <div class="social-networks-item-img">
            <img src="{{ asset('img/collaborate-4.png') }}" alt="Collaborate" />
         </div>
         <div class="social-networks-item-text">
            <div class="social-networks-item-text-head">
               <p>Easily setup team and  assign permissions </p>
            </div>
            <div class="social-networks-item-text-desc">
               <p>Setup teams, individuals and assign permissions that allow your workflows to be effective and automated.</p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Socail Network Section Ends -->
@endsection
