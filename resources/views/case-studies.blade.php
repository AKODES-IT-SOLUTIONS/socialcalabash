@extends('layouts.app')

@section('title', 'Case Studies')

@section('body')
<!-- Home Section Starts -->
<section class="case-studies-home" style="background-image:url({{ asset('img/banner.png') }})">
   <div class="container">
      <div class="case-studies-head">
         <p>Case Studies</p>
      </div>
      <div class="case-studies-items">
         <div class="case-studies-item">
            <div class="case-studies-item-img">
               <img src="{{ asset('img/user-profile.png') }}" alt="User Profile">
            </div>
            <div class="case-studies-item-name">
               <p>Individual</p>
            </div>
            <div class="case-studies-item-desc">
               <p>I am a one-man band that happens to have several websites that all have their own social media identities, and I use SocialCalabash to manage all of this via one easy to use dashboard</p>
            </div>
            <br><br><br>
            <div class="case-studies-item-btn">
               <a href="#">signup</a>
            </div>
         </div>
         <div class="case-studies-item active">
            <div class="case-studies-item-img">
               <img src="{{ asset('img/users-line.png') }}" alt="User Profile">
            </div>
            <div class="case-studies-item-name">
               <p>Business</p>
            </div>
            <div class="case-studies-item-desc">
               <p>Our small internet marketing company also manages the social media network accounts of our clients who are sme's who just want to focus on their businesses. We use socialcalabash platform to manage out client accounts, and our reports are whitelabeled so that our clients only see our brand.</p>
            </div>
            <div class="case-studies-item-btn">
               <a href="#">signup</a>
            </div>
         </div>
         <div class="case-studies-item">
            <div class="case-studies-item-img">
               <img src="{{ asset('img/building-line.png') }}" alt="Building Line">
            </div>
            <div class="case-studies-item-name">
               <p>Agency</p>
            </div>
            <div class="case-studies-item-desc">
               <p>We are a global business with offices all over the world and we have several divisions. Our social media team uses socialcalabash to manage our multiple social media accounts as this allows our staff to colloborate seemlessly across multiple offices.</p>
            </div>
            <br>
            <div class="case-studies-item-btn">
               <a href="#">Signup</a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Home Section Ends -->
@endsection
