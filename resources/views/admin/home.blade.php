@include('partials.header')
@yield('content')

        <div class="content pb-0"  >
            
            <!-- Widgets  -->
            <div class="row">
                
                <div class="col-md-6 ">
                    <a  data-toggle="modal" data-target="#myModal_occupant">
                    <div class="card">
                        <div class="card-body trans" >
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <img src="/images/money.png">
                                </div>
                                <div class="stat-content" >
                                    Les utilisateurs
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
             
                <div class=" col-md-6">
                 <a data-toggle="modal" data-target="#myModal_gener_occupant">
                    <div class="card">
                        <div class="card-body trans">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i ><img src="/images/spendings.png"></i>
                                </div>
                                <div class="stat-content">
                                gener des occcupants
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                




            </div> 
            <!-- Widgets End -->


            

  

            <div class="clearfix"></div>
    





            <!-- To Do and Live Chat --> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style=" max-height: 400px;overflow-y: scroll;">
                        <div class="card-header">Bâtiments sans occupant</div>
                        <div class="card-body">
                            @if($buildingempty->isNotEmpty())
                            <table class="table table-bordered">
                                <tr>
                               <th scope="col">Nom:</th>
                                <th scope="col">Rue:</th>
                                <th scope="col">gouvernerat:</th>
                                <th scope="col">city:</th>
                                </tr>
                            @foreach($buildingempty as $b)

                                    <tr>
                                        <td>{{$b->bname}}</td>
                                        <td>{{$b->street}}></td>

                                        <td>{{$b->sname}}</td>
                                        <td>{{$b->cname}}</td>
                                    </tr>
                           @endforeach
                            </table>
                                @else
                                <div class="alert alert-info" role="alert">
                                    <strong>info!</strong> il n' y a pas des batiment sans occupants.
                                </div>
                                @endif

                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                </div>



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



<div class="modal fade" id="myModal_occupant" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <form action="{{ route('occupants') }}" method="post" enctype="multipart/form-data" class="form-horizontal" >

      <div class="modal-body">
        <p>choisis un bâtiment</p>
             @csrf

                <select class="form-control" name="bid">
                    @foreach($buildings as $b)
                    <option value="{{$b->bid}}">{{$b->bname}}: Rue {{$b->street}},{{$b->cname}}, {{$b->sname}}</option>

                    @endforeach
                </select>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
      </form>
  </div>
</div>
</div>


    <div class="modal fade" id="myModal_gener_occupant" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">gener des occupants</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('generOccupant') }}" method="post" enctype="multipart/form-data" class="form-horizontal" >

                    <div class="modal-body">
                        <p>choisis un bâtiment</p>
                        @csrf
                        @if($buildingempty->isNotEmpty())
                        <select class="form-control" name="bid">

                            @foreach($buildingempty as $b)
                                <option value="{{$b->bid}}">{{$b->bname}}: Rue {{$b->street}},{{$b->cname}}, {{$b->sname}}</option>

                            @endforeach

                        </select>
                            @else
                            <h1>il n'y a pas de bâtiment vide!</h1>
                        @endif
                    </div>
                    <div class="modal-footer">
                        @if($buildingempty->isNotEmpty())
                        <button type="submit" class="btn btn-primary">submit</button>
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>

      
    <script src="/js/popper.min.js"></script>
     <script src="/js/plugins.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main_syndic.js"></script>



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


   

</body>
</html>
