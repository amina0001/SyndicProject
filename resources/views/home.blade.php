@include('partials.header')
@yield('content')
        <!-- Header-->


        <div class="content pb-0" style="background: url(images/balcony.jpg)!important ;   background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;  -ms-background-size: cover;
    -o-background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    background-size: cover; " >
            
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
                                        @if($recette !== null)
                                        <div class="stat-text"><span class="count">{{ $recette->sums }}</span>DNT </div>
                                        <div class="stat-heading">en {{ 
                                            $recette->years }}</div>
                                        <div class="stat-heading">revenu</div>
                                            @else
                                            <div class="stat-heading">revenu</div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
             
                <div class="col-lg-3 col-md-6">
                 <a href="{{route('depensesSyndic')}}">
                    <div class="card">
                        <div class="card-body trans">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i ><img src="images/spendings.png"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        @if($depense !== null)
                                        <div class="stat-text"><span class="count">{{ $depense->sums }}</span>DNT </div>
                                        <div class="stat-heading">en {{ 
                                            $depense->years }}</div>
                                            <div class="stat-heading">Dépenses</div>
                                        @else
                                        <div class="stat-heading">Dépenses</div>
                                            @endif
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
                                        @if($reunion !== null)
                                         <div class="stat-text"><span class="count">{{ $reunion->sums }}</span>  en {{ 
                                            $reunion->years }}</div>
                                        @endif
                                        <div class="stat-heading">gerer les reunion </div>
                                      <!-- Modal -->

                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           </a>
                    </div>
             

                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('chat') }}">
                    <div class="card" >
                        <div class="card-body trans">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                   <img src="images/email.png">
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                        <div class="stat-text">msg aux <br>occupants</div>
                                           <div class="stat-text"> </div>
                                    </div>
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
                <div class="col-lg-6">
                    <div class="card" style=" max-height: 400px;overflow-y: scroll;">
                        <div class="card-body">
                            
                           <div id="myDIV" class="header">
                                     
                                      <form action="{{ route('choresCreate') }}" method="POST">
                                        @csrf
                                      <input type="text" class="form-control" name="chore" id="myInput" placeholder="achat à faire" style="">
                                      <button type="submit" class=" btn-primary" style="padding:13px"  >Ajouter</button>
                                      </form>
                                    </div>                             <hr>
                            <div class="card-content">
                               

                                    <ul id="myUL">
                                     @if($chores->isNotEmpty())
                                         @foreach($chores as $c)
                                      <li > {{ $c->chore }} <button data-toggle="modal" data-target="#myModal_delete" data-id="{{ $c->id }}" class="btn-default pull-right" style=""><img src="images/delete.png"></button> </li>
                                      @endforeach
                                         @else
                                         <h3>--Pas d'achat a faire</h3>
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
                            <h3>Historique des réunions</h3>
                            <hr>
                            <div class="list-group">
                          
                            @if($reunionsnotif->isNotEmpty())
                              @foreach($reunionsnotif as $r)
                                @if( strtotime($r->date) > strtotime('now'))
                              <a href="#" class="list-group-item">Date : {{ $r->date}}&nbsp; Sujet : {{$r->category    }} &nbsp; <img src="images/waitting.png"  class="pull-right"></a>
                              @endif
                              @if( strtotime($r->date) < strtotime('now'))
                              <a href="#" class="list-group-item">Date : {{ $r->date}}&nbsp; Sujet : {{$r->category    }} &nbsp; <img src="images/check.png" class="pull-right"></a>
                              @endif
                              @endforeach

                                @else
                                <h3>-- Pas de réunion</h3>
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



@include('partials.footer_scripts')
@yield('content')