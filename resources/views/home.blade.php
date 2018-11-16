<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SndicTN</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/pe-icon-7-filled.css">

    <link rel="stylesheet" href="css/style.css">
   

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
                    <a class="navbar-brand" href="{{route('home')}}"><img src="images/fsmsyndic.png" alt="Logo" >
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


        <div class="content pb-0">
            
            <!-- Widgets  -->
            <div class="row">
                
                <div class="col-lg-3 col-md-6 ">
                    <a href="{{route('recetteSyndic')}}">
                    <div class="card">
                        <div class="card-body trans" >
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <img src="images/money.png">
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                        <div class="stat-text">$<span class="count">23569</span></div>
                                        <div class="stat-heading">revenu</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
             
                <div class="col-lg-3 col-md-6">
                 <a href="depensesSyndic">
                    <div class="card">
                        <div class="card-body trans">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i ><img src="images/spendings.png"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">3435</span></div>
                                        <div class="stat-heading">Dépenses</div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reunionSyndic') }}">
                    <div class="card"  >
                        <div class="card-body trans">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i ><img src="images/reunion.png"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                        <div class="stat-text">gerer les reunion </div>
                                      <!-- Modal -->
                                  
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           </a>
                    </div>
             

                <div class="col-lg-3 col-md-6">
                    <div class="card" data-toggle="modal" data-target="#myModaloc">
                        <div class="card-body trans">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                   <img src="images/email.png">
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                        <div class="stat-text">msg aux occupants</div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- Widgets End -->


            

  

            <div class="clearfix"></div>
    





            <!-- To Do and Live Chat --> 
            <div class="row">
                <div class="col-lg-6">
                    <div class="card" style=" max-height: 400px;overflow-y: scroll;">
                        <div class="card-body">
                            
                           <div id="myDIV" class="header">
                                     
                                      <form action="{{ route('choresCreate') }}" method="POST">
                                        @csrf
                                      <input type="text" class="form-control" name="chore" id="myInput" placeholder="add a chore" style="">
                                      <button type="submit" class=" btn-primary" style="padding:13px"  >Ajouter</button>
                                      </form>
                                    </div>                             <hr>
                            <div class="card-content">
                               

                                    <ul id="myUL">
                                     @if($chores !=null)
                                         @foreach($chores as $c)
                                      <li > {{ $c->chore }} <button data-toggle="modal" data-target="#myModal_delete" data-id="{{ $c->id }}" class="btn-default pull-right" style=""><img src="images/delete.png"></button> </li>
                                      @endforeach
                                    @endif
                                    </ul>
<!-- /.todo-list -->
                            </div>
                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                </div>


                   <!-- Calender Chart Weather  -->
            <div class="col-lg-6">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body" style="overflow-y: scroll;max-height: 400px;">  
                            <!-- <h4 class="box-title">Chandler</h4> -->
                            <h3>History of reunion</h3>
                            <hr>
                            <div class="list-group">
                          
                            @if  (!empty($reunions))
                              @foreach($reunions as $r)
                                @if( strtotime($r->date) > strtotime('now'))
                              <a href="#" class="list-group-item">Date : {{ $r->date}}&nbsp; Sujet : {{$r->category    }} &nbsp; <img src="images/waitting.png"  class="pull-right"></a>
                              @endif
                              @if( strtotime($r->date) < strtotime('now'))
                              <a href="#" class="list-group-item">Date : {{ $r->date}}&nbsp; Sujet : {{$r->category    }} &nbsp; <img src="images/check.png" class="pull-right"></a>
                              @endif
                              @endforeach
                              @endif
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>

            </div><!-- /.row -->
            <!-- Calender Chart Weather  End -->
            </div> <!-- /.row -->


            <!-- END MODAL -->


        </div> <!-- .content -->



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


 <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
     <script src="js/plugins.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main_syndic.js"></script>



<script>
    jQuery(document).ready(function ($) {

     
   $('#myModal_delete').on('show.bs.modal', function (event) {
          console.log("hh");
          var button = $(event.relatedTarget)
          
          var id = button.data('id')
          var modal = $(this)
      
        modal.find('.modal-body #id').val(id);

          });
    });
</script>


    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">envoyer un message a votre syndic</h4>
                                            </div>
                                            <div class="modal-body">
                                          
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Objet</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="select" id="select" class="form-control">
                                                <option value="0">Please select</option>
                                                <option value="1">panne</option>
                                                <option value="2">securite</option>
                                                <option value="3">autre ...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Message</label></div>
                                        <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                    </div>
                                    
                                            </div>
                                            <div class="modal-footer">
                                               
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                               <button type="button" class="btn btn-info" data-dismiss="modal">Envoyer</button>
                                            </div>
                                          </div>
                                        </div>
  </div>

<div class="modal fade" id="myModaloc" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">envoyer un message aux occupants</h4>
                                            </div>
                                            <div class="modal-body">
                                   <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Numero d'appartement:</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="select" id="select" class="form-control">
                                                <option value="0">Please select</option>
                                                <option value="3">tout</option>
                                                <option value="1">app 1</option>
                                                <option value="2">app 2</option>
                                                <option value="3">app 3</option>
                                            </select>
                                        </div>
                                    </div>  
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Objet</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="select" id="select" class="form-control">
                                                <option value="0">Please select</option>
                                                <option value="1">panne</option>
                                                <option value="2">securite</option>
                                                <option value="3">autre ...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Message</label></div>
                                        <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                    </div>
                                    
                                            </div>
                                            <div class="modal-footer">
                                               
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                               <button type="button" class="btn btn-info" data-dismiss="modal">Envoyer</button>
                                            </div>
                                          </div>
                                        </div>
  </div>
</body>
</html>
