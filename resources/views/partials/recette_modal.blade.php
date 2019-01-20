
<div class="modal fade" id="myModal_fiche" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">générer une  fiche des recettes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
            @if($recettes->isNotEmpty())

                <form action="{{ route('Rgeneratepdf') }}" method="post" class="form-horizontal" >
                    @csrf
                    <div class="modal-body">
                        <select class="form-control" name="month">
                            <option value="{{$month}}">ce mois</option>
                            <option value="{{$year}}">cette année</option>
                            @foreach($dmonths->flatten() as $d)
                                <option value="{{$d->month}}">Le mois {{$d->month}} de l'année {{$d->year}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">gener</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </form>
            @else
                <div class="alert alert-info" role="alert">
                    Aucun recettes.

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            @endif
        </div>
    </div>
</div>

<div class="modal fade" id="myModal_delete_recette_loc" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('deleteloc')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >

                <div class="modal-body">
                    <p>voulez vous supprimer cette recette?</p>
                    @csrf
                    <input type="hidden" name="id" id="id" value="">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Supprimer</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal_delete_recette" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('recettesDelete')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >

                <div class="modal-body">
                    <p>voulez vous supprimer cette recette?</p>
                    @csrf
                    <input type="hidden" name="id" id="id" value="">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Supprimer</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Recu</h4>
            </div>
            <div class="modal-body">
                {{--  <img id="myImg" src="images/recu.jpg"  style="width:100%;" >--}}
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
                <div class="alert alert-danger" id="alertas" style="display:none"></div>
                <div class="col-lg-12">
                    <div class="card">


                        <div class="card-body card-block">

                            <form action="{{route('recetteCreate')  }}" id="ajoutrecette" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Appartement:</label></div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" id="app" name="app">
                                            <option value="0">--Choisir une appartement--</option>
                                            @foreach($buser as $b)

                                                <option  value="{{$b->id}}">appartement {{$b->app_num}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Montant</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="price" name="price" placeholder="Text" class="form-control"></div>
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
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Reçu </label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="image" name="image"  accept="image/*"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                    <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                </div>

                                <button type="submit" id="ajaxSubmit" class="btn btn-primary pull-right">submit</button>



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

<div class="modal fade" id="myModal_ajout_plus" role="dialog">
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

                            <form action="{{route('recettelocCreate')  }}" method="POST" id="myModal_ajout_plus_form" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Catégorie:</label></div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" id="categoryloc" name="category">
                                            <option value="0">--Choisir une category--</option>
                                            <option value="Publicité">Publicité</option>
                                            <option value="Publicité">Locaux commercial</option>
                                            <option value="Autre">Autre</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nom du loacaux ou du sponsore</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="nomloc" name="nom" placeholder="Text" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Montant</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="priceloc" name="price" placeholder="Text" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                                    <div class="col-12 col-md-9">
                                        <div class='input-group date' id='datetimepicker3'>
                                            <input type='text' id="dateloc" name="date" class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>

                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Reçu </label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="image" name="image" class="form-control-file"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                    <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                </div>
                                <button type="submit" id="ajoutloc"  class="btn btn-primary pull-right">Ajouter</button>



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
<div class="modal fade" id="myModal_update_recette" role="dialog">
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
                            <form action="{{ route('recettesUpdate') }}"  id="myModal_update_recette_form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"></label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" name="id" id="idup">
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" name="user_id" id="user_idup">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Appartement:</label></div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" id="appup" name="app">
                                            <option value="0">--Choisir une appartement--</option>
                                            @foreach($buser as $b)

                                                <option  value="{{$b->id}}">appartement {{$b->app_num}} </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">montant</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="priceup" name="price" placeholder="Text" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                                    <div class="col-12 col-md-9">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type='text' id="dateup" name="date" class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">image </label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="imageup" name="image" class="form-control-file"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                    <div class="col-12 col-md-9"><textarea name="descriptionup" id="description" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                </div>
                                <button type="submit" class="btn btn-primary  pull-right" id="ajaxSubmitupdate">mettre a jour</button>



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







<div class="modal fade" id="myModal_update_recette_loc" role="dialog">
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
                            <form action="{{ route('recetteslocUpdate') }}"  id="myModal_update_recette_loc_form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <input type="hidden" name="id" id="idlocup">


                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category</label></div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" id="categorylocup" name="category">
                                            <option value="0">--Choisir une category--</option>
                                            <option value="Publicité">Publicité</option>
                                            <option value="Locaux commercial">Locaux commercial</option>
                                            <option value="Autre">Autre</option>

                                        </select>


                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nom du loacaux ou du sponsore</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="nomlocup" name="nom" placeholder="Text" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">montant</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="pricelocup" name="price" placeholder="Text" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                                    <div class="col-12 col-md-9">
                                        <div class='input-group date' id='datetimepicker4'>
                                            <input type='text' id="datelocup" name="date" class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">image </label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="imagelocup" name="image" class="form-control-file"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                    <div class="col-12 col-md-9"><textarea name="description" id="descriptionlocup" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                </div>
                                <button type="submit" id="updateloc" class="btn btn-primary  pull-right" >mettre a jour</button>


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