<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SndicTN</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/pe-icon-7-filled.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="/css/style.css">
   

    <style>
/* width */
::-webkit-scrollbar {
    width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #928CD7;
    border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #007bff; 
}
</style>
    

</head>
<body>


    <!-- Left Panel --> 
  <aside id="left-panel" class="left-panel">

        <nav class="navbar navbar-expand-sm navbar-default"> 
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('home') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                                     <li >
                        <a  href="{{ route('depensesSyndic') }}"> <i class="menu-icon fa fa-table"></i>Dépense</a>
                        
                    </li>
                    <li >
                        <a  href="{{ route('recetteSyndic') }}"> <i class="menu-icon fa fa-th"></i>Recette</a>
                        
                    </li>

                    

                   
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>  <!-- /#left-panel --> 
    <!-- Left Panel -->



    <!-- Right Panel --> 
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">  
             <div class="top-left">
                <div class="navbar-header"> 
                     <a id="menuToggle" class="menutoggle" style="margin-top: -35%"><i class="fa fa-bars"></i></a> 
                    <a class="navbar-brand" href="{{route('home')}}"><img src="/images/fsmsyndic.png" alt="Logo" >
                    </a>
                    
                   
                </div> 
            </div>
            <div class="top-right"> 
                <div class="header-menu" style="padding-top: 1%"> 
                    <div class="header-left">
                      

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">2</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 2 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>vous avez une réunion.</p>
                                </a>
                                
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>payer la dette.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media" href="chat.html">
                                    <span class="photo media-left"><img alt="avatar" src="/images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="/images/avatar/2.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="/images/avatar/3.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="/images/avatar/4.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>

                          

                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div> 
                </div>  
            </div>
        </header><!-- /header -->
        <!-- Header-->

<div class="container" >
    <div >
            <div class="row">
                <div class="col-lg-12">
                         <div class="card" style="margin-top: 3%">
                            <div class="card-header">
                                <strong>Profile</strong> 
                            </div>
                             <form action="{{ route('profileUpdate', [Auth::id()]) }}" method="post" class="form-horizontal">
                                   @csrf
                            <div class="card-body card-block">
                             <div class="row">
                  
                            <div class="col-lg-4">
                                <img src="/images/amina.jpg" style="border-radius: 50%;height: 50%;width: 70%">
                                <input type="file" name="file" accept="images/*">
                            </div>
                            <div class="col-lg-8 ">
                                
                                    <div class="row ">
                                    <div class="col-md-6">
                                    <div class="row form-group ">
                                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Nom:</label></div>
                                        <div class="col-12 col-md-9"><input type="text"   class="form-control" name="firstname" 
                                    
                                    value="@if(old('firstname'))
                                                {{ old('firstname') }}
                                            @else
                                                {{ $user->firstname }}
                                            @endif">
                                    </div>
                                    </div>

                                       @if ($errors->has('firstname'))
                                     <small class="form-text" style="colo">{{ $errors->first('firstname') }}</small>
                                        @endif
                                </div>
                                 <div class="col-md-6">
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Prenom:</label></div>
                                        <div class="col-12 col-md-9"><input type="text"  class="form-control" name="lastname" value="{{$user->lastname}}"></div>
                                    </div>

                                </div>
                                    </div>
                                      <div class="row ">
                                    <div class="col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9"><input type="email"   class="form-control" name="email" value="{{$user->email}}"></div>
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Cin:</label></div>
                                        <div class="col-12 col-md-9"><input type="number" class="form-control"  name="cin" value="{{$user->cin}}"></div>
                                    </div>
                                </div></div>
                           
                                <hr>
                                <div class="row ">
                                    <div class="col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Building name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" class="form-control" name="building_name" value="{{$building->name}}"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Street</label></div>
                                        <div class="col-12 col-md-9"><input type="text"  class="form-control" name="street" value="{{$adress->street}}"></div>
                                    </div>
                                </div>
                            </div>
                              <div class="row ">
                                    <div class="col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">state</label></div>
                                        <div class="col-12 col-md-9">
                                            <select id="state"  class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }} dynamic " name="state"  value="{{ old('state') }}" required autofocus >
                                            
                                                       
                                             <option value="{{$st->id}}">{{ $st->name }}</option>
                                                       @foreach($states as $state)
                                                       <option value="{{$state->id}}">{{ $state->name }}</option>
                                                       @endforeach
                                                       
                                        </select>
                                       
                                        @if ($errors->has('state'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-6">
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">city</label>
                                        </div>
                                        <div class="col-12 col-md-9">

                                            <select id="city"  class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }} dynamic " name="city"  value="{{ old('cty') }}" required autofocus >
                                                     
                                       <option value="{{$cty->id}}">{{$cty->name}}</option>        
                                        </select>
                                    
                                        @if ($errors->has('cty'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cty') }}</strong>
                                            </span>
                                        @endif</div>
                                    </div>
                                </div>
                            </div>
                               
                            </div>
                            </div>
                             <div class="card-footer ">
                               
                                <button type="reset" class="btn btn-danger pull-right">
                                    <i class="fa fa-ban"></i> Reset
                                </button>

                                 <button type="submit" class="btn btn-primary pull-right" style="margin-right: 1%">
                                    <i class="fa fa-dot-circle-o"></i> Mettre à jour
                                </button>
                            </div>
                        </form>
                           
                            
                        </div>
                        </form>
                    </div>
                    </div>
</div>
    </div>
</div>
        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 
                    </div>
                    
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->



<div class="modal fade" id="myModal_delete" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <form action="{{ route('choresDelete') }}" method="post" enctype="multipart/form-data" class="form-horizontal" >

      <div class="modal-body">
        <p>Delete the motherfucker.</p>
             @csrf
               <input type="hidden" name="id" id="id" value="">
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
      </form>
  </div>
</div>
</div>


 <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>

      <script src="/js/popper.min.js"></script>


    <script src="/js/plugins.js"></script>
     <script src="/js/plugins.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main_syndic.js"></script>





<script>
 $(document).ready(function() {

$('select[name="state"]').on('change', function(){
    var state_id = $(this).val();
    if(state_id) {
        $.ajax({
            url: '/fetch/'+state_id,
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
                                    {{dd($errors)}}

</body>
</html>
