<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->

<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Styles -->
  
</head>
<body>
      

    <div class="limiter">

        <div class="container-login100">
                <nav class="collapse navbar-collapse" id="primary-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{ url('/') }}#home-page">Home</a></li>
                    <li><a href="{{ url('/') }}#service-page">Service</a></li>
              
                    <li><a href="{{ url('/') }}#team-page">Team</a></li>
                    <li><a href="{{ url('/') }}#faq-page">FAQ</a></li>
                   
                    <li><a href="{{ url('/') }}#contact-page">Contact</a></li>
                    <li><a href="{{ route('login') }}">Se Connecter</a></li>
                    <li><a href="{{ route('register') }}">S'inscrire</a></li>
                </ul>
            </nav>
            <div class="wrap-login100">

                    <form method="POST" action="{{ route('login') }}" class="login100-form validate-form" id="login-form">
                        
                         <span class="login100-form-title p-b-43">
                        Login to continue
                         </span>
                        @if ($errors->any())

                            <div class="alert alert-warning" role="alert">
                                <strong>Attention!</strong> email ou mot de passe est faux ou vide

                            </div>
                        @endif
                        @csrf

                        <div class="wrap-input100">
                            <input id="email" type="email" class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}   " name="email" value="{{ old('email') }}" required>
                            <span class="focus-input100"></span>
                            <span class="label-input100">email</span>

                        </div>
                    
                     <div class="wrap-input100">
                        <input id="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}   " name="password" required >
                        <span class="focus-input100"></span>
                        <span class="label-input100">password</span>

                    </div>

                        
                         
                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="remember">
                               {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div>
                            <a class="btn btn-link txt1" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                        
                        </div>
                    </div>
                        

                       <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn">
                                    {{ __('Login') }}
                                </button>

                                
                            </div>
                       
                        <div class="container-login100-form-btn">
                            <a  class="login100-form-btn" href="{{ route('register') }}" style="margin-top:5%;background:rgb(1, 80, 1);text-decoration: none">Sign up</a>
                    </div>
                    </form>

                    <div class="login100-more" id="bg1" style="background-image: url('images/bg-01.jpg');">
                    <div style="background:#E5B096;opacity:0.9;margin-left:30%;margin-top: 10%">
                    <h2 style="color:white;margin-left: 15%;padding:7%">Une solution innovante sélectionnée pour vous par votre syndic .
                        <br>    Pour plus d'informations lire <u id="under"> <a href="about.html" style="text-decoration:none"> propos de nous </a></u>
                    </h2>
                    </div>
                </div>
              </div>
          </div>
    </div>

        <script src="js/jquery-3.2.1.min.js"></script>     
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
    </html>
    