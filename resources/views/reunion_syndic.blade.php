<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SndicTN</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/pe-icon-7-filled.css">

    <link href="/css/fullcalendar.css" rel="stylesheet" />
<link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>

     
   
<style type="text/css">
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

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
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">  
           <div class="top-left">
                <div class="navbar-header"> 
                     <a id="menuToggle" class="menutoggle" style="margin-top: 10%;margin-left: -70%"><i class="fa fa-bars"></i></a> 
                    <a class="navbar-brand" href="{{route('home')}}"><img src="images/fsmsyndic.png" style="margin-left: 40%;margin-top: -20%">
                    </a>
                    
                   
                </div> 
            </div>
            <div class="top-right"> 
                <div class="header-menu"> 
              <div class="header-left">
                      

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                @if($i !== 0)
                                <span class="count bg-danger">{{ $i }}</span>
                                @endif
                            </button>
                            
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach($notifications as $r)

                            @if($r->seen == 0)
                                  @if(strtotime(date("Y-m-d")) < strtotime($r->date))
                                <form action="{{ route('reunionSeen',$r->id ) }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $r->id }}">
                                <input type="hidden" name="user_id" value="{{ $r->user_id }}">
                                 <input type="hidden" name="reunion_id" value="{{ $r->reunion_id }}">
                                <p>Topic: {{ $r->category }} <button type="submit" style="background: transparent;"> <i class="fa fa-eye-slash"></i></button>
                                </p>
                                </form>
                             
                            
                                
                                
                            @endif
                            @endif
                            @endforeach
                            </div>

                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">1</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                             
                               {{--  <a class="dropdown-item media" href="chat.html">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">{{ $message->create }}</span>
                                        <p>{{ $msg->message }}</p>
                                    </div>
                                </a> --}}
                              
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
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

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Revenu</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Revenu</a></li>
                                    <li class="active">liste de Revenu</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Reunion</strong>
                                
                            </div>


                    <div class="card-body">
                       <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal_ajout"  style="margin-bottom: 1%;">Ajouter une reunion</button>

                                                        

                <table id="bootstrap-data-table" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>category</th>
                                            <th>syndic or occupant</th>
                                            <th>date</th>
                                            <th>approuvé</th>
                                            <th>description</th>
                                            @if(Auth::user()->role == "Syndic")
                                            <th></th>   
                                            <th></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reunions as $r)
                                        <tr>
                                             <td>{{ $r->category }}</td>
                                            
                                            <td>@if($r->role == "Syndic")
                                                    Syndic
                                                @else
                                                  appartement {{ $r->app_num }}
                                                @endif
                                                </td>
                                            <td>{{ $r->date }}</td>
                                            <td>{{ $r->approved }}</td>
                                            <td>{{ $r->description }}</td>
                                            @if(Auth::user()->role == "Syndic")
                                           
                                            <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal_update" data-id="{{ $r->id }}" data-user_id="{{ $r->user_id }}" data-category="{{$r->category  }}"
                                                data-role="{{$r->role}}" data-date="{{ $r->date }}" data-approved="{{  $r->approved  }}" data-description="{{ $r->description }}">mettre a jour</button></td>
                                              <td><button class="btn btn-danger">supprimer</button></td>
                                                @endif
                                        </tr>
                                   
                                        @endforeach
                                       
                                    </tbody>
                                </table>
           
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

  




    <div class="modal fade" id="myModal_ajout" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ajouter</h4>
        </div>
        <div class="modal-body">
                        <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body card-block">
                                <form action="{{ route('reunionCreate')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category:</label></div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" id="category" name="category">
                                                <option  value="securite">securite</option>
                                               
                                                <option value="other">other</option>
                                              </select>

                                            <small class="form-text text-muted">This is a help text</small></div>
                                    </div>
                                 
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                                        <div class='col-sm-6'>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' name="date" class="form-control" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div> </div>

                                  
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                        <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">submit</button>
                                
                               
                                  
                                </form>
                            </div>
                           
                        </div>
                      
                    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>






   

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/js/bootstrap-datetimepicker.min.js"></script>

  
    <script src="js/main_syndic.js"></script>
    

     {{--  <script src="js/plugins.js"></script> --}}
    <div class="modal fade" id="myModal_update" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mettre a jour</h4>
        </div>
        <div class="modal-body">
                        <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body card-block">
                                <form action="{{ route('reunionUpdate') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                  @csrf
                                   <div class="row form-group">
                                       
                                        <div class="col-12 col-md-9"><input type="hidden" id="id" name="id"  class="form-control"></div>
                                        <div class="col-12 col-md-9"><input type="hidden" id="user_id" name="user_id"  class="form-control"></div>
                                    </div>
                                      <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category:</label></div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" id="category" name="category">
                                                <option  value="securite">securite</option>
                                               
                                                <option value="other">other</option>
                                              </select>

                                            <small class="form-text text-muted">This is a help text</small></div>
                                    </div>
                                 
                                       <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                                        <div class="col-12 col-md-9">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' id="date" name="date" class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                   
                                    </div>
                                    </div>
                                  
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                        <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">submit</button>
                                
                               
                                  
                                  
                                </form>
                            </div>
                           
                        </div>
                      
                    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
        
    jQuery(document).ready(function ($) {
        console.log("hhh");
$(function () {
                $('#datetimepicker1').datetimepicker({
                    defaultDate: new Date(),
                    format: 'YYYY-MM-DD HH:mm:ss',

                    sideBySide: true
                });
            });
          $(function () {
                $('#datetimepicker2').datetimepicker({
                    defaultDate: new Date(),
                    format: 'YYYY-MM-DD HH:mm:ss',

                    sideBySide: true
                });
            });
     $('#myModal_update').on('show.bs.modal', function (event) {
          console.log("hhh");
          var button = $(event.relatedTarget)
           console.log( button.data('id'));
        
          var description = button.data('description')
          
          var category = button.data('category')
          var date = button.data('date')
          var user_id = button.data('user_id')
          var id = button.data('id')
          var modal = $(this)


          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #user_id').val(user_id);
          modal.find('.modal-body #category').val(category);
             
          modal.find('.modal-body #description').val(description);
       
          modal.find('.modal-body #date').val(date);
       

          });
     $('#myModal_delete').on('show.bs.modal', function (event) {
          
          var button = $(event.relatedTarget)
          
          var id = button.data('id')
          var modal = $(this)
      
        modal.find('.modal-body #id').val(id);

          });
     $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
          
          var img = button.data('image')
          var modal = $(this)  
     $('.modal-body').append('<img class="myImg" style="width:100%;"  src=" /storage/' + img  + '">');
      });
   
      $("#myModal").on("hidden.bs.modal", function(){
    $(".modal-body").html("");
    });
    });
  

</script>



</html>
