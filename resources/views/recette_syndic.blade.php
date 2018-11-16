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
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
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
                                <strong class="card-title">Revenu</strong>
                                 <button  class="btn btn-success" style="float: right" data-toggle="modal" data-target="#myModal_ajout" >Ajouter un recette</button>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Appartement</th>
                                            
                                            <th>description</th>
                                            <th>date</th>
                                            <th>devis</th>
                                            <th>montant</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recettes as $r)
                                        <tr>


                                             <td>@if( empty($r->app_num))
                                                    <p>--</p>
                                                @else
                                                    {{ $r->app_num }}
                                                @endif</td>
                                            
                                            <td>@if( empty( $r->description ))
                                                    <p>--</p>
                                                @else
                                                   {{ $r->description }}
                                                @endif</td>
                                            <td>@if( empty( $r->date ))
                                                    <p>--</p>
                                                @else
                                                   {{ $r->date }}
                                                @endif</td>
                                            <td>

                                                @if($r->image == null)
                                                <p>pas de recu</p>
                                                @else
                                                <img id="myImg" src="{{ Storage::url($r->image)}}"  style="width:100%;max-width:100px" data-toggle="modal" data-target="#myModal" data-image="{{ $r->image }}">
                                                @endif
                                            </td>
                                            <td>@if( empty( $r->price ))
                                                    <p>--</p>
                                                @else
                                                   {{ $r->price }}
                                                @endif</td>
                                    <td>
                                         @if( empty( $r->price ))
                                      <img  src="images/waitting.png"> Waitting
                                     
                                      @else
                                      <img  src="images/success.png"> Payé
                                      @endif
                                            </td>
                                            <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal_update" data-app="{{ $r->app_num }}" data-description="{{ $r->description }}" data-date="{{ $r->date }}" data-price="{{ $r->price }}" data-user_id="{{ $r->user_id }}" data-id="{{ $r->id }}" data-image="{{ $r->image }}">mettre a jour</button></td>
                                              <td>         
                                             <button class="btn btn-danger" data-toggle="modal" data-target="#myModal_delete" data-id="{{ $r->id }}">
                                        Supprimer</button></td>
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



  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Recu</h4>
        </div>
        <div class="modal-body">
          <img id="myImg" src="images/recu.jpg"  style="width:100%;" >
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
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
                                <form action="{{route('recetteCreate')  }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Appartement:</label></div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" id="app" name="app">
                                                <option  value="1">app 1</option>
                                                
                                              </select>

                                            <small class="form-text text-muted">This is a help text</small></div>
                                    </div>
                                  <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">montant</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="price" name="price" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
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
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">image </label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="image" name="image" class="form-control-file"></div>
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
                                <form action="{{ route('recetteUpdate') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                  @csrf
                                      <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label"></label></div>
                                        <div class="col-12 col-md-9">
                                           <input type="hidden" name="id" id="id">
                                        </div>
                                          <div class="col-12 col-md-9">
                                           <input type="hidden" name="user_id" id="user_id">
                                        </div>
                                    </div>
                                   <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Appartement:</label></div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" >
                                                <option  id="app" name="app" value="">app 1</option>
                                                
                                              </select>

                                            <small class="form-text text-muted">This is a help text</small></div>
                                    </div>
                                  <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">montant</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="price" name="price" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                                    </div>
                                      <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                                        <div class="col-12 col-md-9">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type='text' id="date" name="date" class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                   
                                    </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">image </label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="image" name="image" class="form-control-file"></div>
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


  <div class="modal fade" id="myModal_delete" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <form  method="post" enctype="multipart/form-data" class="form-horizontal" >

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
    <!-- Right Panel -->
 <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>



{{--     <script src="js/popper.min.js"></script> --}}
    <script src="js/plugins.js"></script>
      <script src="js/bootstrap.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/js/bootstrap-datetimepicker.min.js"></script>

  
    <script src="js/main_syndic.js"></script>
    


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
          var app = button.data('app')
          var description = button.data('description')
          var price = button.data('price')
          var image = button.data('image')
          var date = button.data('date')
          var user_id = button.data('user_id')
          var id = button.data('id')
          var modal = $(this)


          modal.find('.modal-body #app').val(app);
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #user_id').val(user_id);
          modal.find('.modal-body #image').val(image);        
          modal.find('.modal-body #description').val(description);
          modal.find('.modal-body #price').val(price);
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

</body>
</html>
