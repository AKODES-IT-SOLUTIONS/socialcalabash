<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Sign In - Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="{{asset('dashboard/css/dashboard.css')}}">

<body>
<div class="form-features">
    <div class="form">
        <div class="container">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Logo"/></a>
            </div>
            <div class="signup-form" style="width: 40%;">
                <div class="heading">
                    <p>Sign In</p>
                </div>
                <form method="POST" action="{{ route('user.signIn') }}">
                    @csrf


                    {{--Displaying Validation Errors--}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="color: red; background-color: white; padding: 10px; border-radius: 3px;box-shadow: 0 0 20px #666666; font-weight: bold">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <br><br>

                    <div class="form-group-cont">
                        <div class="form-group" style="width: 100%;">
                            <label for="email">email address *</label>
                            <input id="email" type="email" class="form-control"
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="Email Address" autofocus>
                        </div>
                        <div class="form-group" style="width: 100%;">
                            <label for="password">password *</label>
                            <input id="password" type="password"
                                   class="form-control" name="password"
                                   required autocomplete="current-password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <a href="{{ route('user.forgetPassword') }}" style="color: white; font-size:14px;">Forget
                                Password?</a>
                        </div>
                    </div>
                    <div class="btn">
                        <input type="submit" value="Sign In">
                    </div>
                </form>
            </div>
            <div class="have-account">
                <p>Don't have an account? <a href="{{ route('user.signUp') }}">Sign Up</a></p>
            </div>
        </div>
    </div>
    <div class="features">
        <div class="features-head">
            <p>Welcome to<br><span>SocialCalabash</span></p>
        </div>
        <div class="features-desc">
            <p>A simpler and smarter social media tool designed to effectively enwrap your client's followers, keep
                an eye on their brand name and track performance.</p>
        </div>
        <div class="features-list-head">
            <p>Features</p>
        </div>
        <div class="features-list">
            <ul>
                <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Dot Icon">All your social networks in one
                    place!
                </li>
                <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Dot Icon">1Stop Dashboard</li>
                <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Dot Icon">Publishing and Scheduling</li>
                <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Dot Icon">Collaborate Seamlessly</li>
                <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Dot Icon">Insightful Analytics</li>
                <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Dot Icon">Listen and Monitor</li>
                <li><img src="{{ asset('dashboard/img/dot-green.png') }}" alt="Dot Icon">Great reports</li>
            </ul>
        </div>
    </div>
</div>

<!-- Include jQuery -->
<script src="{{asset('dashboard/js/jquery-2.2.4.min.js')}}"></script>
<!-- Custom Script -->
<script src="{{asset('dashboard/js/script.js')}}"></script>
</body>
</html>
