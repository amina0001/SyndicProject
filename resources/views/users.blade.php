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
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Occupants</a></li>
                                <li >liste de occupants</li>
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
                            <strong class="card-title">Occupants</strong>

                        </div>

                        <div class="card-body">
                            @if($users->isNotEmpty())
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>(Par default) Nnom</th>
                                    <th>(Par default) Prenom</th>
                                    <th>(Par default) Appartement</th>
                                    <th>(Par default) Email:</th>
                                    <th>(Par default) Password:</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                    <tr>

                                        <td>
                                            @if( empty($u->firstname))
                                                <p>--</p>
                                            @else
                                                {{ $u->firstname }}
                                            @endif
                                        </td>
                                        <td>@if( empty($u->lastname))
                                                <p>--</p>
                                            @else
                                                {{ $u->lastname }}
                                            @endif</td>
                                        <td>@if( empty($u->app_num))
                                                <p>--</p>
                                            @else
                                                {{ $u->app_num }}
                                            @endif</td>
                                        <td>@if( empty($u->email))
                                                <p>--</p>
                                            @else
                                                {{ $u->email }}
                                            @endif</td>
                                        <td>@if( empty($u->password))
                                                <p>--</p>
                                            @else
                                               {{ $building->name."app".$u->app_num}}
                                            @endif</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
                                    <div class="col-12 col-md-9">{{--<input type="text" id="titre" name="titre" class="form-control" value="{{ old('titre') }}" required><small class="form-text text-muted"></small></div>
                                    @if ($errors->has('titre'))
                                        <small class="form-text ">{{ $errors->first('titre') }}</small>
                                    @endif--}}
                                        <select class="form-control" name="titre">
                                            <option disabled> depense fixes</option>
                                            <option value="STEG"> STEG</option>
                                            <option value="SONEDE"> SONEDE</option>
                                            <option value="Salaire gardient"> Salaire gardient</option>
                                            <option value="Femme des menages"> Femme des menages</option>
                                            <option value="Contrat entretien assanceur"> Contrat entretien assanceur</option>
                                            <option value="Jardinier"> Jardinier</option>
                                            <option disabled> depense courants</option>
                                            <option value="entretien assenceur">entretien assenceur</option>
                                            <option>autre</option>
                                        </select></div>
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
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
{{--<script src="js/jquery-2.1.4.min.js"></script>--}}

{{--
<script src="js/bootstrap.min.js"></script>
--}}

<script src="js/jquery-2.1.4.min.js"></script>


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