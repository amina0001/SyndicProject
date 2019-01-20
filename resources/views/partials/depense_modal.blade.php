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
                <div class="alert alert-danger" style="display:none"></div>

                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body card-block">
                            <form action="{{ route('depenseCreate') }}" id="myModal_ajout_depense_form" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Titre</label></div>
                                    <div class="col-12 col-md-9">{{--<input type="text" id="titre" name="titre" class="form-control" value="{{ old('titre') }}" required><small class="form-text text-muted"></small></div>
                                    @if ($errors->has('titre'))
                                        <small class="form-text ">{{ $errors->first('titre') }}</small>
                                    @endif--}}
                                        <select class="form-control" name="titre" id="titled">
                                            <option disabled selected>--choisir type de depense--</option>
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
                                    <div class="col-12 col-md-9"><input type="number" id="priced" name="price"  class="form-control" value="{{ old('montant') }}"></div>
                                    @if ($errors->has('montant'))
                                        <small class="form-text ">{{ $errors->first('montant') }}</small>
                                    @endif
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                                    <div class="col-12 col-md-9">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' id="dated" name="date" class="form-control" />
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

                                <button type="submit" id="submitajoutdepense" class="btn btn-primary pull-right">
                                    ajouter
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
                <div class="alert alert-danger" style="display:none"></div>

                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body card-block">

                            <form action="{{ route('despenseUpdate') }}" id="myModal_update_depense_form" method="post" enctype="multipart/form-data" class="form-horizontal" id=" edit-item">
                                @csrf
                                <input type="hidden" name="id" id="id" >
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Titre</label></div>
                                    <div class="col-12 col-md-9">{{--<input type="text" id="titre" name="titre" class="form-control" value="{{ old('titre') }}" required><small class="form-text text-muted"></small></div>
                                    @if ($errors->has('titre'))
                                        <small class="form-text ">{{ $errors->first('titre') }}</small>
                                    @endif--}}
                                        <select class="form-control" name="titre" id="titledup">
                                            <option disabled selected>--choisir type de depense--</option>
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
                                    <div class="col-12 col-md-9"><input type="number" id="pricedup" name="price" placeholder="Text" class="form-control"></div>

                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                                    <div class="col-12 col-md-9">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type='text' id="datedup" name="date" class="form-control" />
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

                                <button type="submit"  id="submitajoutdepenseup" class="btn btn-primary pull-right">
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
                <h5 class="modal-title">générer fiche des depenses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
            @if($depenses->isNotEmpty())
            <form action="{{ route('generatepdf') }}" method="post" class="form-horizontal" >
                @csrf
                 <div class="modal-body">
                    <select class="form-control" name="month">
                        <option value="{{$month}}">Ce mois</option>
                        <option value="{{$year}}">Cette année</option>
                        @foreach($dmonths->flatten() as $d)
                            <option value="{{$d->month}}">Le mois {{$d->month}}-{{$d->year}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">générer</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>
                @else
                <div class="alert alert-info" role="alert">
                    Aucun depenes.

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                @endif
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