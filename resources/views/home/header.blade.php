<!-- Header Section Starts -->
<header class="header">
   <div class="container">
      <div class="header-main">
         <div class="logo">
            <a href="{{ route('homepage') }}"><img src="{{asset('home/img/logo.png')}}" alt="Logo" /></a>
         </div>
         <div class="open-nav-menu">
            <span></span>
         </div>
         <div class="menu-overlay">
         </div>
         <!-- navigation menu start -->
         <nav class="nav-menu">
          <div class="close-nav-menu">
             <img src="{{asset('home/img/close-icon.png')}}" alt="Close Icon">
          </div>
          <ul class="menu">
              <li class="menu-item">
                <a href="{{route('homepage')}}"><img class="home-icon" src="{{asset('home/img/home.png')}}" alt="Home Image" /></a>
             </li>
             <li class="menu-item menu-item-has-children">
                <a href="{{route('homepage')}}" data-toggle="sub-menu">Services <i class="plus"></i></a>
                <ul class="sub-menu">
                    <li class="menu-item"><a href="{{url('stop_dashboard')}}">1 Stop Dashboard</a></li>
                    <li class="menu-item"><a href="{{url('publish_scheduling')}}">Publishing and Scheduling</a></li>
                    <li class="menu-item"><a href="{{url('collaborate')}}">Collaborate Seamlessly</a></li>
                    <li class="menu-item"><a href="{{url('analytics')}}">Insightful Analytics</a></li>
                    <li class="menu-item"><a href="{{url('listen_monitor')}}">Listen and Monitor</a></li>
                    <li class="menu-item"><a href="{{url('great_reports')}}">Great Reports</a></li>
                    <li class="menu-item"><a href="{{url('engage')}}">Engage</a></li>
                </ul>
             </li>
             <li class="menu-item menu-item-has-children">
                <a href="{{url('/why_us')}}" data-toggle="sub-menu">Why Us <i class="plus"></i></a>
                <ul class="sub-menu">
                    <li class="menu-item"><a href="{{url('our_team')}}">Our Team</a></li>
                    <li class="menu-item"><a href="#">Easy to Use</a></li>
                    <li class="menu-item"><a href="#">Reliable and Secure</a></li>
                    <li class="menu-item"><a href="#">Great Value</a></li>
                    <li class="menu-item"><a href="#">Passionate Support</a></li>
                </ul>
             </li>
             <li class="menu-item">
                <a href="{{url('case_studies')}}">Case Studies</a>
             </li>
             <li class="menu-item">
                <a href="{{url('pricing')}}">Pricing</a>
             </li>
             <li class="menu-item register-login-btn-sm">
                <a href="{{url('/signin')}}">Register/Login</a>
             </li>
          </ul>
         </nav>
         <!-- navigation menu end -->
         @if(Auth::guard('web')->user())
         <div class="register-login-btn">
            <a href="{{route('user.dashboard')}}">Dashboard</a>
         </div>
         @else
         <div class="register-login-btn">
            <a href="{{route('user.login')}}">register/login</a>
         </div>
         @endif
      </div>
   </div>
</header>
<!-- Header Section Ends -->
