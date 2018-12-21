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
                                <button  class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#myModal_ajout_depense" >Ajouter depense</button>

                                <button  class="btn btn-primary" style="float: right;margin-right:1%" data-toggle="modal" data-target="#myModal_fiche_depense" >Gener fiche</button>
                            @endif
                        </div>

                        <div class="card-body">
                            @if($depenses->isNotEmpty())
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


                                                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal_update_depense" data-id="{{ $d->id }}" data-titre="{{ $d->titre }}"data-description="{{ $d->description }}" data-price="{{ $d->price }}" data-date="{{ $d->date }}" >
                                                    <span class="fa fa-pencil"></span>&nbsp;Modifier</button>

                                            </td>
                                            <td>


                                                <button class="btn btn-danger" data-toggle="modal" data-target="#myModal_delete_depense" data-id="{{ $d->id }}">
                                                    Supprimer</button>

                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $depenses->render()}}
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
<div class="modal fade" id="myModal_ajout_depense" role="dialog">
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


<div class="modal fade" id="myModal_update_depense" role="dialog">
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
                                    <div class="col-12 col-md-9"><input type="number" id="montant" name="montant" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>

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

                                <button type="submit"  class="btn btn-primary pull-right">
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

<div class="modal fade" id="myModal_fiche_depense" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">gener fiche des depenses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>

            <form action="{{ route('generatepdf') }}" method="post" class="form-horizontal" >
                @csrf
                <div class="modal-body">
                    <select class="form-control" name="month">
                        <option value="{{$month}}">this month</option>
                        <option value="{{$year}}">this year</option>
                        @foreach($dmonths->flatten() as $d)
                            <option value="{{$d->month}}">{{$d->month}}-{{$d->year}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">gener</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="myModal_delete_depense" role="dialog">
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
@include('partials.footer_scripts')
@yield('content')