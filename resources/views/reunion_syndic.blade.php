@include('partials.header')
@yield('content')
    <!-- Header-->

    <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Reunion</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Reunion</a></li>
                                    <li class="active">liste de Reunion</li>
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
                        @if(auth::user()->role == "Syndic")
                            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal_ajout"  style="margin-bottom: 1%;">Ajouter une reunion</button>


                        @endif

                        @if($reunions->isNotEmpty())

                           <table id="bootstrap-data-table" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>category</th>
                                            <th>syndic or occupant</th>
                                            <th>date</th>

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
                    {{$reunions->render()}}
                            @else
                                <div class="alert alert-info" role="alert">
                                    <strong>Desolé.</strong> il y a pas de depenses.
                                </div>
                            @endif
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
                        Designed by <a href="#">SyndicTn</a>
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
                                        <div class="col-md-9">
                                            <select class="form-control" id="category" name="category">
                                                <option  value="securite">securite</option>
                                               
                                                <option value="other">other</option>
                                              </select>

                                            <small class="form-text text-muted">This is a help text</small>
                                        </div>
                                    </div>
                                 
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                                        <div class='col-md-9'>

                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' name="date" class="form-control" />
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
                                    <button type="submit" class="btn btn-primary pull-right">Ajouter une reunion</button>
                                
                               
                                  
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






<script src="js/jquery-2.1.4.min.js"></script>


<script src="js/popper.min.js"></script>


<script src="js/plugins.js"></script>
   

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
                                       
                                        <div class="col-md-9"><input type="hidden" id="id" name="id"  class="form-control"></div>
                                        <div class="col-md-9"><input type="hidden" id="user_id" name="user_id"  class="form-control"></div>
                                    </div>
                                      <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category:</label></div>
                                        <div class="col-md-9">
                                            <select class="form-control" id="category" name="category">
                                                <option  value="securite">securite</option>
                                               
                                                <option value="other">other</option>
                                              </select>

                                            <small class="form-text text-muted">This is a help text</small></div>
                                    </div>
                                 
                                       <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                                        <div class="col-md-9">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type='text' id="date" name="date" class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                   
                                    </div>
                                    </div>
                                  
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                        <div class="col-md-9"><textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Mettre a jour la reunion</button>
                                
                               
                                  
                                  
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


</body>
</html>
