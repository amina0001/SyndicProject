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
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Styles -->
  
</head>
<body>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			
					
                    <form method="POST" action="{{ route('register') }}" class="login100-form validate-form" id="login-form">
                        <span class="login100-form-title p-b-43">
                        Register to continue
                         </span>
                            <div >
                            <i class="fa fa-long-arrow-left" style="margin-left:70%;"></i><button id="button1"  href="{{ route('login') }}" >back to login</button>
                         </div>
                        
                        @csrf

                      
                           
                    
                    <div class="wrap-input100 ">
                        <input id="name" type="text" class=" input100{{ $errors->has('name') ? ' is-invalid' : '' }}   " name="name" value="{{ old('name') }}">
                        <span class="focus-input100"></span>
                        <span class="label-input100">name</span>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
        
                <div class="wrap-input100 " >
                    <input id="lastname" type="text" class=" input100  {{ $errors->has('lastname') ? ' is-invalid' : '' }}  " name="lastname" value="{{ old('lastname') }}">
                    <span class="focus-input100"></span>
                    <span class="label-input100">lastname</span>
                    @if ($errors->has('lastname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="wrap-input100 " >
                    <input id="cin" type="text" class="input100 {{ $errors->has('cin') ? ' is-invalid' : '' }}" name="cin" value="{{ old('cin') }}">
                    <span class="focus-input100"></span>
                    <span class="label-input100">cin</span>
                    @if ($errors->has('cin'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cin') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="wrap-input100">
                    <input id="building_name" type="text" class="input100 {{ $errors->has('building_name') ? ' is-invalid' : '' }} " name="building_name" value="{{ old('building_name') }}">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Building name</span>
                    @if ($errors->has('building_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('building_name') }}</strong>
                        </span>
                    @endif
                </div>
         
                <div class="wrap-input100">
                    <select id="state"  class="input100 {{ $errors->has('state') ? ' is-invalid' : '' }} dynamic " name="state"  value="{{ old('state') }}" required autofocus style="border:none">
                        <option>--state--</option> 
                                   @foreach($states as $state)
                                   <option value="{{$state->id}}">{{ $state->name }}</option>
                                   @endforeach
                                   
                    </select>
                    <span class="focus-input100"></span>
                    <span class="label-input100">state</span>
                    @if ($errors->has('state'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="wrap-input100">
                    <select id="city"  class="input100 {{ $errors->has('city') ? ' is-invalid' : '' }} dynamic " name="city"  value="{{ old('cty') }}" required autofocus style="border: none">
                                 
                    <option>--city--</option>           
                    </select>
                    <span class="focus-input100"></span>
                    <span class="label-input100">city</span>
                    @if ($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
            <div class="wrap-input100">
                <input id="street" type="text" class=" input100{{ $errors->has('street') ? ' is-invalid' : '' }}   " name="street" value="{{ old('street') }}">
                <span class="focus-input100"></span>
                <span class="label-input100">street</span>
                @if ($errors->has('street'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('street') }}</strong>
                    </span>
                @endif
            </div>
            <div class="wrap-input100">
                <input id="email" type="email" class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}   " name="email" value="{{ old('email') }}">
                <span class="focus-input100"></span>
                <span class="label-input100">email</span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
 
        <div class="wrap-input100">
            <input id="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}   " name="password">
            <span class="focus-input100"></span>
            <span class="label-input100">password</span>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="wrap-input100">
            <input id="password-confirm" type="password" class=" input100{{ $errors->has('password') ? ' is-invalid' : '' }}   " name="password_confirmation" >
            <span class="focus-input100"></span>
            <span class="label-input100">password confirmation</span>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password-confirm') }}</strong>
                </span>
            @endif
        </div>

                     

          

            <div  class="container-login100-form-btn">
                
                    <button type="submit" class="login100-form-btn ">
                        {{ __('Register') }}
                    </button>
               
            </div>
                <div class="container-login100-form-btn">
                            <a  class="login100-form-btn" href="{{ route('login') }}" style="margin-top:5%;background:rgb(1, 80, 1);text-decoration: none">login</a>
                    </div>
                    </form>


              <div class="login100-more" id="bg2" style="background-image: url('/images/bg-02.jpg');">
			<div style="background:#E5B096;opacity:0.9;margin-left:30%;margin-top: 10%">
			<h2 style="color:white;margin-left: 15%">Une solution innovante sélectionnée pour vous par votre syndic</h2>
			</div>
		</div>
              
		</div>
	</div>
	
</div>


<script>
 $(document).ready(function() {

$('select[name="state"]').on('change', function(){
    var state_id = $(this).val();
    if(state_id) {
        $.ajax({
            url: 'fetch/'+state_id,
            type:"GET",
            dataType:"json",
            beforeSend: function(){
                
            },


            success:function(data) {

                $('select[name="city"]').empty();

                $.each(data, function(key, value){

                    $('select[name="city"]').append('<option value="'+ key +'">' + value + '</option>');

                });
            },
            complete: function(){
                
            }
        });
    } else {
        $('select[name="city"]').empty();
    }

});

});
</script>

   <script src="js/jquery-3.2.1.min.js"></script>
	
			
       
    <!--===============================================================================================-->
        
        <script src="js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    
    <!--===============================================================================================-->
    
    
        <script src="js/main.js"></script>
    </body>
    </html>
    