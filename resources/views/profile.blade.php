@include('partials.header')
@yield('content')
    <!-- Header-->

        <!-- Header-->

<div class="container" >
    <div >
            <div class="row" >
                <div class="col-lg-12">
                         <div class="card" style="margin-top: 3%">
                            <div class="card-header">
                                <strong>Profile</strong> 
                            </div>
                             <form action="{{ route('profileUpdate', [Auth::id()]) }}" method="post" class="form-horizontal">
                                   @csrf
                            <div class="card-body card-block">
                             <div class="row"  style="display: flex
">
                  
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
                                    
                                    value="{{ $user->firstname }}">

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
                                @if( $user->role !== "admin")

                                <div class="row ">
                                    <div class="col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Building name</label></div>
                                        <div class="col-12 col-md-9"><input {{$disabl}} type="text" class="form-control" name="building_name" value="{{$building->name}}"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Street</label></div>
                                        <div class="col-12 col-md-9"><input {{$disabl}} type="text"  class="form-control" name="street" value="{{$adress->street}}"></div>
                                    </div>
                                </div>
                            </div>
                                @endif



                                @if( $user->role !== "admin" )
                              <div class="row ">
                                    <div class="col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">state</label></div>
                                        <div class="col-12 col-md-9">
                                            <select id="state" {{$disabl}}  class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }} dynamic " name="state"  value="{{ old('state') }}" required autofocus  >
                                            
                                                       
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

                                            <select id="city" {{$disabl}} class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }} dynamic " name="city"  value="{{ old('cty') }}" required autofocus >
                                                     
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
                               @endif
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


</body>
</html>
