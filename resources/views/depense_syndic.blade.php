<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SndicTN</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

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



    <!-- Styles -->
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
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Dépense</a></li>
                                    <li >liste de dépense</li>
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
                                <strong class="card-title">Dépense</strong>
                                @if(Auth::user()->role == "Syndic")
                                   <button  class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#myModal_ajout" >Ajouter depense</button>

                                   <button  class="btn btn-primary" style="float: right;margin-right:1%" data-toggle="modal" data-target="#myModal_fiche" >Gener fiche</button>
                                @endif
                            </div>
                             
                            <div class="card-body">

                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>montant</th>
                                            <th>date</th>
                                            <th>Recu</th>
                                              @if(Auth::user()->role == "Syndic")
                                            <th></th>
                                            <th></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($depenses as $d)
                                        <tr>

                                             <td>
                                                @if( empty($d->titre))
                                                    <p>--</p>
                                                @else
                                                    {{ $d->titre }}
                                                @endif
                                            </td>
                                            <td>@if( empty($d->description))
                                                    <p>--</p>
                                                @else
                                                    {{ $d->description }}
                                                @endif</td>
                                            <td>@if( empty($d->price))
                                                    <p>--</p>
                                                @else
                                                    {{ $d->price }}
                                                @endif</td>
                                            <td>@if( empty($d->date))
                                                    <p>--</p>
                                                @else
                                                    {{ $d->date }}
                                                @endif</td>
                                            <td>@if( empty($d->image))
                                                    <p>pas de reçu</p>
                                                @else
                                                   <img id="myImg" src="{{ Storage::url($d->image)}}"  style="width:100%;max-width:100px" data-toggle="modal" data-target="#myModal" data-image="{{ $d->image }}">
                                                @endif</td>
                              @if(Auth::user()->role == "Syndic")
                             <td> 
                                               
                                    
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal_update" data-id="{{ $d->id }}" data-titre="{{ $d->titre }}"data-description="{{ $d->description }}" data-price="{{ $d->price }}" data-date="{{ $d->date }}" >
                                        <span class="fa fa-pencil"></span>&nbsp;Modifier</button>
                               
                                </td>
                                <td> 
                                               
                                            
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#myModal_delete" data-id="{{ $d->id }}">
                                        Supprimer</button>
                               
                                </td>
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
<!-- Modal -->  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Recu</h4>
        </div>
        <div class="modal-body">
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
                                <form action="{{ route('depenseCreate') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                        
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Titre</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="titre" name="titre" class="form-control" value="{{ old('titre') }}" required><small class="form-text text-muted"></small></div>
                                         @if ($errors->has('titre'))
                                                <small class="form-text ">{{ $errors->first('titre') }}</small>
                                         @endif
                                    </div>
                                  <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">montant</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="montant" name="montant"  class="form-control" value="{{ old('montant') }}"></div>
                                       @if ($errors->has('montant'))
                                            <small class="form-text ">{{ $errors->first('montant') }}</small>
                                     @endif
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
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="file" name="image" class="form-control-file" accept="image/*"></div>

                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                        <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control" value="{{ old('description') }}"></textarea></div>
                                        @if ($errors->has('description'))
                                            <small class="form-text ">{{ $errors->first('description') }}</small>
                                     @endif
                                    </div>
                                
                                <button type="submit" class="btn btn-primary pull-right">
                                   submit
                                </button>
                                  
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
            <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
                        <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body card-block">
                               
                                <form action="{{ route('despenseUpdate') }}" method="post" enctype="multipart/form-data" class="form-horizontal" id=" edit-item">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Titre</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="titre" name="titre" placeholder="Text" class="form-control" value=" "><small class="form-text text-muted"></small></div>
                                        
                                    </div>
                                  <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">montant</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="montant" name="montant" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                                         
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
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="image" name="image" class="form-control-file" accept="image/*"></div>

                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                        <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                       
                                    </div>
                                
                                <button type="submit" id="submit" class="btn btn-primary pull-right">
                                   mettre a jour
                                </button>
                                  
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
      <div class="modal-body">
        <p>Supprimer cette ligne.</p>
          <form action="{{ route('despenseDelete') }}" method="post" enctype="multipart/form-data" class="form-horizontal" >
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
</div>
    <!-- Right Panel -->
{{--  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
 --}}
    <script src="js/jquery-2.1.4.min.js"></script>

 <script src="js/bootstrap.min.js"></script>

      <script src="js/popper.min.js"></script>


    <script src="js/plugins.js"></script>

     
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
          var titre = button.data('titre')
          var description = button.data('description')
          var price = button.data('price')
          var date = button.data('date')
          var id = button.data('id')
          var modal = $(this)
         modal.find('.modal-body #titre').val(titre);
          modal.find('.modal-body #titre').val(titre);
          modal.find('.modal-body #description').val(description);
          modal.find('.modal-body #montant').val(price);
          modal.find('.modal-body #date').val(date);
        modal.find('.modal-body #id').val(id);

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

<script type="text/javascript">


    $(document).ready(function() {
        $("#submit").click(function(e){
            e.preventDefault();


            var _token = $("input[name='_token']").val();
            var titre = $("input[name='titre']").val();
            var montant = $("input[name='monatnt']").val();
            var date = $("input[name='date']").val();

            $.ajax({
                url: "{{ route('despenseUpdate') }}",
                type:'POST',
                data: {_token:_token, titre:titre,montant:montant,date:date},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                       console.log(data);
                    }else{
                        printErrorMsg(data.error);
                         console.log(data);
                    }
                }
            });


        }); 


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });


</script>







</body>
</html>
