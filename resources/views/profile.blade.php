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
                             <form action="{{ route('profileUpdate', [Auth::id()]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                   @csrf
                            <div class="card-body card-block">
                             <div class="row"  style="display: flex
">
                  
                            <div class="col-md-3">
                                <img src="{{ Auth::user()->photo }}" style="border-radius: 50%;height: 50%;width: 70%">
                                <input type="file" name="avatar" accept="images/*">
                            </div>
                            <div class="col-lg-9">
                                
                                    <div class="row ">
                                    <div class="col-md-6">
                                    <div class="row form-group ">
                                        <div class="col-md-3"><label for="hf-email" class=" form-control-label">Nom:</label></div>
                                        <div class="col-md-9"><input type="text"   class="form-control" name="firstname"
                                    
                                    value="{{ $user->firstname }}">
                                            @if ($errors->has('firstname'))
                                                <small class="form-text" style="color:red">{{ $errors->first('firstname') }}</small>
                                            @endif
                                    </div>

                                    </div>


                                </div>
                                 <div class="col-md-6">
                                     <div class="row form-group">
                                        <div class="col-md-3"><label for="hf-email" class=" form-control-label">Prenom:</label></div>
                                        <div class="col-md-9"><input type="text"  class="form-control" name="lastname" value="{{$user->lastname}}">
                                            @if ($errors->has('lastname'))
                                                <small class="form-text" style="color:red">{{ $errors->first('lastname') }}</small>
                                            @endif
                                        </div>

                                    </div>

                                </div>
                                    </div>
                                      <div class="row ">
                                    <div class="col-md-6">
                                    <div class="row form-group">
                                        <div class="col-md-3"><label for="hf-email" class=" form-control-label">Email</label></div>
                                        <div class="col-md-9"><input type="email"   class="form-control" name="email" value="{{$user->email}}">
                                            @if ($errors->has('email'))
                                                <small class="form-text" style="color:red">{{ $errors->first('email') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                     <div class="row form-group">
                                        <div class="col-md-3"><label for="hf-email" class=" form-control-label">Cin:</label></div>
                                        <div class="col-md-9"><input type="number" class="form-control"  name="cin" value="{{$user->cin}}">
                                            @if ($errors->has('cin'))
                                                <small class="form-text" style="color:red">{{ $errors->first('cin') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div></div>
                           
                                <hr>
                                @if( $user->role !== "admin")

                                <div class="row ">

                                    <div class="col-lg-12">
                                    <div class="row form-group">
                                        <div class="col-md-2"><label class=" form-control-label">Building name</label></div>
                                        <div class="col-md-9"><input  {{$readonly}} type="text" class="form-control" name="building_name" value="{{$building->name}}">
                                            @if ($errors->has('building_name'))
                                                <small class="form-text" style="color:red">{{ $errors->first('building_name') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <hr>
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <div class="row form-group">
                                                <div class="col-md-3"><label class=" form-control-label">Nb app</label></div>
                                                <div class="col-md-9"><input {{$readonly}} type="text"  class="form-control" name="num_app" value="{{$building->num_app}}">
                                                    @if ($errors->has('num_app'))

                                                        <small class="form-text" style="color:red">{{ $errors->first('num_app') }}</small>

                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row form-group">
                                                <div class="col-md-3"><label  class=" form-control-label">nb loc</label></div>
                                                <div class="col-md-9"><input {{$readonly}} type="text" class="form-control" name="num_locaux" value="{{$building->num_locaux}}">
                                                    @if ($errors->has('num_locaux'))
                                                        <small class="form-text" style="color:red">{{ $errors->first('num_locaux') }}</small>

                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <hr>
                                    <div class="row ">
                                <div class="col-md-6">
                                     <div class="row form-group">
                                        <div class="col-md-3"><label  class=" form-control-label">Street</label></div>
                                        <div class="col-md-9"><input {{$readonly}} type="text"  class="form-control" name="street" value="{{$adress->street}}">

                                            @if ($errors->has('street'))
                                                <small class="form-text" style="color:red">{{ $errors->first('street') }}</small>

                                            @endif
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <div class="col-md-3"><label  class=" form-control-label">appartement</label></div>
                                            <div class="col-md-9"><input  type="text" class="form-control" name="app_num" value="{{$user->app_num}}">
                                                @if ($errors->has('app_num'))
                                                    <small class="form-text" style="color:red">{{ $errors->first('app_num') }}</small>

                                                @endif
                                            </div>
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
                                            <select id="state" {{$readonly}}  class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }} dynamic " name="state"  value="{{ old('state') }}" required autofocus  >


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

                                            <select id="city" {{$readonly}} class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }} dynamic " name="city"  value="{{ old('cty') }}" required autofocus >

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



 jQuery(document).ready(function(){
     jQuery('#submitupdatereunion').click(function(e){
         console.log("nn");

         e.preventDefault();
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                 'id':$('input[name=id]').val(),

             }
         });
         jQuery.ajax({
             url: "{{ url('/reunion/update') }}",
             method: 'post',
             data: {
                 category: jQuery('#categoryrnup').val(),
                 description: jQuery('#descriptionrnup').val(),
                 date: jQuery('#daternup').val(),
                 id: jQuery('#id').val(),
                 _token: '{{csrf_token()}}',

             },
             success: function(result){
                 if(result.errors)
                 {
                     jQuery('.alert-danger').html('');

                     jQuery.each(result.errors, function(key, value){
                         jQuery('.alert-danger').show();
                         jQuery('.alert-danger').append('<li>'+value+'</li>');
                     });
                     console.log("n1");

                 }
                 else
                 {
                     jQuery('.alert-danger').hide();

                     location.reload();
                     console.log("n2");
                 }
             }});
     });
 });

</script>


</body>
</html>
