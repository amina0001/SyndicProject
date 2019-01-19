<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Syndic') }}</title>
    <link rel="shortcut icon" href="/images/icon.png">

    <!-- Scripts -->

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
                           Inscrivez-vous pour continuer
                        </span>
                            <div >
                               <p class="pull-right" style="color: #0b0b0b">
                                   <i class="fa fa-long-arrow-left" ></i>
                                   <a href="{{ url('/') }}#home-page" >Acceuil</a>
                                --Ou--

                            <a  href="{{ route('login') }}"  >Retour pour connecter</a>
                               </p>
                            </div>
                        
                        @csrf

                      
                           
                    
                    <div class="wrap-input100 ">
                        <input id="name" type="text" class=" input100 {{ $errors->has('name') ? ' is-invalid' : '' }}   " name="name" value="{{ old('name') }}">
                        <span class="focus-input100"></span>
                        <span class="label-input100" style="color:steelblue">Nom*</span>

                    </div>
                        @if ($errors->has('name'))

                            <div class="alert alert-warning" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>

                        @endif
                <div class="wrap-input100 " >
                    <input id="lastname" type="text" class=" input100  {{ $errors->has('lastname') ? ' is-invalid' : '' }}  " name="lastname" value="{{ old('lastname') }}">
                    <span class="focus-input100"></span>
                    <span class="label-input100" style="color:steelblue">Prenom*</span>

                </div>
                        @if ($errors->has('lastname'))

                                <div class="alert alert-warning" role="alert">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </div>

                        @endif
                <div class="wrap-input100 " >
                    <input id="cin" type="text" class="input100 {{ $errors->has('cin') ? ' is-invalid' : '' }}" name="cin" value="{{ old('cin') }}">

                    <span class="focus-input100"></span>
                    <span class="label-input100" style="color:steelblue">Cin*</span>

                </div>
                        @if ($errors->has('cin'))

                            <div class="alert alert-warning" role="alert">
                                <strong>{{ $errors->first('cin') }}</strong>
                            </div>
                        @endif

                        <div class="wrap-input100 ">
                            <input id="nb_app" type="text" class="input100 {{ $errors->has('nb_app') ? ' is-invalid' : '' }}" name="nb_app" value="{{ old('nb_app') }}">
                            <span class="focus-input100"></span>
                            <span class="label-input100" style="color:steelblue">Nombre des appartements*</span>

                        </div>
                        @if ($errors->has('nb_app'))

                            <div class="alert alert-warning" role="alert">
                                <strong>{{ $errors->first('nb_app') }}</strong>
                            </div>
                        @endif
                        <div class="wrap-input100 ">
                            <input id="nb_loc" type="text" class="input100 {{ $errors->has('nb_loc') ? ' is-invalid' : '' }}" name="nb_loc" value="{{ old('nb_loc') }}">
                            <span class="focus-input100"></span>
                            <span class="label-input100" style="color:steelblue">Nombre des  locaux commercials à l'extérieur*</span>

                        </div>
                        @if ($errors->has('nb_loc'))

                            <div class="alert alert-warning" role="alert">
                                <strong>{{ $errors->first('nb_loc') }}</strong>
                            </div>
                        @endif

                        <div class="wrap-input100 ">
                            <input id="app_num" type="text" class="input100 {{ $errors->has('app_num') ? ' is-invalid' : '' }}" name="app_num" value="{{ old('app_num') }}">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Numero de votre appartement </span>

                        </div>
                <div class="wrap-input100">
                    <input id="building_name" type="text" class="input100 {{ $errors->has('building_name') ? ' is-invalid' : '' }} " name="building_name" value="{{ old('building_name') }}">
                    <span class="focus-input100"></span>
                    <span class="label-input100" style="color:steelblue">Nom du bâtiment*</span>

                </div>
                        @if ($errors->has('building_name'))


                            <div class="alert alert-warning" role="alert">
                                <strong>{{ $errors->first('building_name') }}</strong>
                            </div>
                        @endif
                <div class="wrap-input100">
                    <select id="state"  class="input100 {{ $errors->has('state') ? ' is-invalid' : '' }} dynamic " name="state"  value="{{ old('state') }}" required autofocus style="border:none">
                        <option value="0">--Gouvernat--</option>
                                   @foreach($states as $state)
                                   <option value="{{$state->id}}">{{ $state->name }}</option>
                                   @endforeach
                                   
                    </select>
                    <span class="focus-input100"></span>
                    <span class="label-input100"  style="color:steelblue">Gouvernat*</span>

                </div>
                        @if ($errors->has('state'))

                            <div class="alert alert-warning" role="alert">
                                <strong>{{ $errors->first('state') }}</strong>
                            </div>
                        @endif
                <div class="wrap-input100">
                    <select id="city"  class="input100 {{ $errors->has('city') ? ' is-invalid' : '' }} dynamic " name="city"  value="{{ old('cty') }}" required autofocus style="border: none">
                                 
                    <option value="0">--city--</option>
                    </select>
                    <span class="focus-input100"></span>
                    <span class="label-input100"  style="color:steelblue">Ville*</span>

                </div>
                        @if ($errors->has('city'))

                            <div class="alert alert-warning" role="alert">
                                <strong>{{ $errors->first('city') }}</strong>
                            </div>
                        @endif
            <div class="wrap-input100">
                <input id="street" type="text" class=" input100 {{ $errors->has('street') ? ' is-invalid' : '' }}   " name="street" value="{{ old('street') }}">
                <span class="focus-input100"></span>
                <span class="label-input100" style="color:steelblue">Rue*</span>

            </div>
                        @if ($errors->has('street'))

                            <div class="alert alert-warning" role="alert">
                                <strong>{{ $errors->first('street') }}</strong>
                            </div>
                        @endif
            <div class="wrap-input100">
                <input id="email" type="email" class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}   " name="email" value="{{ old('email') }}">
                <span class="focus-input100"></span>
                <span class="label-input100" style="color:steelblue">E-mail*</span>

            </div>
                        @if ($errors->has('email'))

                            <div class="alert alert-warning" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
        <div class="wrap-input100">
            <input id="password" type="password" class="input100 {{ $errors->has('password') ? ' is-invalid' : '' }}   " name="password">
            <span class="focus-input100"></span>
            <span class="label-input100" style="color:steelblue">Mot de passe*</span>

        </div>
                        @if ($errors->has('password'))

                            <div class="alert alert-warning" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    <div class="wrap-input100">
                        <input id="password-confirm" type="password" class=" input100 {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}   " name="password_confirmation" >
                        <span class="focus-input100"></span>
                            <span class="label-input100" style="color:steelblue">Confirmation mot de passe*</span>

                    </div>


          

            <div  class="container-login100-form-btn">
                
                    <button type="submit" class="login100-form-btn ">
                        {{ __('Register') }}
                    </button>
               
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
    <script>

        $(document).ready(function () {


            /*==================================================================
            [ Focus Contact2 ]*/
            $('.input100').each(function(){
                $(this).on('blur', function(){
                    if($(this).length && $(this).val().length) {
                        $(this).addClass('has-val');
                    }
                    else {
                        $(this).removeClass('has-val');
                    }
                });
                if($(this).length && $(this).val().length) {
                    $(this).addClass('has-val');
                }
                else {
                    $(this).removeClass('has-val');
                }
            })


            /*==================================================================
            [ Validate ]*/
            var input = $('.validate-input .input100');

            $('.validate-form').on('submit',function(){
                var check = true;

                for(var i=0; i<input.length; i++) {
                    if(validate(input[i]) == false){
                        showValidate(input[i]);
                        check=false;
                    }
                }

                return check;
            });


            $('.validate-form .input100').each(function(){
                $(this).focus(function(){
                    hideValidate(this);
                });
            });


            function validate (input) {
                if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
                    if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                        return false;
                    }
                }
                else {
                    if($(input).val().trim() == ''){
                        return false;
                    }
                }
            }

            function showValidate(input) {
                var thisAlert = $(input).parent();

                $(thisAlert).addClass('alert-validate');
            }

            function hideValidate(input) {
                var thisAlert = $(input).parent();

                $(thisAlert).removeClass('alert-validate');
            }


        });
    </script>
    </body>
    </html>
    