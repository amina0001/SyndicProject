@include('partials.header')
@yield('content')
    <!-- Header-->

    <!-- Header-->

        <div class="breadcrumbs" >
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Recette</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Recette</a></li>
                                    <li class="active">liste des Recettes</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content"  >
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">

                                <strong class="card-title">Revenu</strong>
                                @if(Auth::user()->role == "Syndic")
                                 <button  class="btn btn-success" style="float: right" data-toggle="modal" id="open" data-target="#myModal_ajout" ><i class="fa fa-plus-square"></i> Ajouter un recette d'une appartement </button>
                                    <button  class="btn btn-primary" style="float: right;margin-right:1%" data-toggle="modal" id="open" data-target="#myModal_ajout_plus" ><i class="fa fa-plus-square"></i> Ajouter un recette plus </button>

                                    <button  class="btn btn-primary" style="float: right;margin-right:1%" data-toggle="modal" data-target="#myModal_fiche" ><i class="fa fa-print"></i> Gener fiche</button>
                                   @endif
                            </div>
                            <div class="card-body  ">
                                @if($recettes->isNotEmpty())
                                    <h3 >les recettes des apparetement payé : </h3>
                                <br>

                                    <table id="dtBasicExample"  class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Appartement</th>

                                            <th>description</th>
                                            <th>date</th>
                                            <th>devis</th>
                                            <th>montant</th>
                                            <th></th>
                                            @if(Auth::user()->role == "Syndic")
                                            <th></th>
                                            <th></th>

                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recettes as $r)
                                        <tr>


                                             <td>@if( empty($r->app))
                                                    <p>--</p>
                                                @else
                                                    {{ $r->app }}
                                                @endif</td>

                                            <td>@if( empty( $r->description ))
                                                    <p>--</p>
                                                @else
                                                   {{ $r->description }}
                                                @endif</td>
                                            <td>@if( empty( $r->date ))
                                                    <p>--</p>
                                                @else
                                                   {{ $r->date }}
                                                @endif</td>
                                            <td>

                                                @if($r->image == null)
                                                <p>pas de recu</p>
                                                @else
                                                <img id="myImg" src="{{ $r->image}}"  style="width:100%;max-width:100px" data-toggle="modal" data-image="{{$r->image}}" data-target="#myModal" data-image="{{ $r->image }}">
                                                @endif
                                            </td>
                                            <td>@if( empty( $r->price ))
                                                    <p>--</p>
                                                @else
                                                   {{ $r->price }}
                                                @endif</td>
                                    <td>

                                      <img  src="images/success.png"> Payé

                                            </td>
                                              @if(Auth::user()->role == "Syndic")
                                            <td><button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal_update_recette" data-id="{{ $r->id }}"  data-app="{{ $r->app }}" data-description="{{ $r->description }}" data-date="{{ $r->date }}" data-price="{{ $r->price }}" data-user_id="{{ $r->user_id }}" data-image="{{ $r->image }}" data-tooltip="tooltip" title="modifier!"><i class="fa fa-edit"></i></button></td>
                                              <td>
                                             <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal_delete_recette" data-id="{{ $r->id }}" data-tooltip="tooltip" title="supprimer!">
                                                 <i class="fa fa-trash"></i></button></td>

                                            @endif
                                        </tr>

                                       @endforeach
                                    </tbody>

                                </table>


                                    @endif


                                    <div >

                                        @if($shit->isNotEmpty())
                                            <hr class="style-seven">
                                            <h3>les appartements non payé :</h3>
                                            <br>

                                            <table id="dtBasicExample2"  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>

                                                    <th  class="th-sm">Apprtement</th>
                                                    <th  class="th-sm">Month/year</th>
                                                    <th  ></th>
                                                    <th></th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($shit as $s)
                                                    <tr>
                                                        {{--{{dd($shit)}}--}}

                                                        <td>{{$s['app_num']}}</td>
                                                        <td>{{$s['months']}}-{{$s['years']}}</td>
                                                        <td>

                                                            <img  src="images/waitting.png"> Waitting
                                                        </td>
                                                        <td>

                                                            <button type="submit" class="btn btn-success pull-right" onclick="window.location='{{ route("recetteMail", $s['email']) }}'" data-tooltip="tooltip" title="Alerter les appartements non payé" ><i class="fa fa-envelope"></i></button></td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>


                                        @endif

                                    </div>
                                    @if($recettes->isNotEmpty())
                                        <hr class="style-seven">
                                        <h3 >les recettes des locaux commercial ou sponsore non payé : </h3>
                                    <br>
                                        <table id="dtBasicExample1"  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>category</th>

                                                <th>nom</th>

                                                <th>montant</th>
                                                <th>date</th>
                                                <th>devis</th>

                                                <th>decription</th>
                                                <th></th>
                                                @if(Auth::user()->role == "Syndic")
                                                    <th></th>
                                                    <th></th>
                                                @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($recettesloc as $r)
                                                <tr>


                                                    <td>@if( empty($r->category))
                                                            <p>--</p>
                                                        @else
                                                            {{ $r->category }}
                                                        @endif</td>
                                                    <td>@if( empty($r->nom))
                                                            <p>--</p>
                                                        @else
                                                            {{ $r->nom }}
                                                        @endif</td>
                                                    <td>@if( empty( $r->price ))
                                                            <p>--</p>
                                                        @else
                                                            {{ $r->price }}
                                                        @endif</td>
                                                    <td>@if( empty( $r->date ))
                                                            <p>--</p>
                                                        @else
                                                            {{ $r->date }}
                                                        @endif</td>

                                                    <td>

                                                        @if($r->image == null)
                                                            <p>pas de recu</p>
                                                        @else
                                                            <img id="myImg" src="{{ $r->image}}"  style="width:100%;max-width:100px" data-toggle="modal" data-target="#myModal" data-image="{{ $r->image }}">
                                                        @endif
                                                    </td>


                                                    <td>@if( empty( $r->description ))
                                                            <p>--</p>
                                                        @else
                                                            {{ $r->description }}
                                                        @endif</td>
                                                    <td>

                                                        <img  src="images/success.png"> Payé

                                                    </td>
                                                    @if(Auth::user()->role == "Syndic")
                                                        <td><button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal_update_recette_loc" data-id="{{ $r->id }}"  data-category="{{ $r->category }}" data-description="{{ $r->description }}" data-date="{{ $r->date }}" data-price="{{ $r->price }}" data-building_id="{{ $r->building_id }}" data-nom="{{ $r->nom}}" data-image="{{ $r->image }}" data-tooltip="tooltip" title="modifier!"><i class="fa fa-edit"></i></button></td>
                                                        <td>
                                                            <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal_delete_recette_loc" data-id="{{ $r->id }}" data-tooltip="tooltip" title="supprimer!">
                                                                <i class="fa fa-trash"></i></button></td>
                                                    @endif
                                                </tr>

                                            @endforeach
                                            </tbody>

                                        </table>


                                    @else
                                        <div class="alert alert-info" role="alert">
                                            <strong>Desolé.</strong> il y a pas de recettes.
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

                                            <small class="form-text text-muted">This is a help text</small></div>
                                    </div>
                                  <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">montant</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="price" name="price" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
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
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">image </label></div>
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
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category:</label></div>
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
                                        <div class="col-12 col-md-9"><input type="text" id="nomloc" name="nom" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                                    </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">montant</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="priceloc" name="price" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
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
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">image </label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="image" name="image" class="form-control-file"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                    <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                </div>
                                <button type="submit" id="ajoutloc"  class="btn btn-primary pull-right">ajouter</button>



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

                                            <small class="form-text text-muted">This is a help text</small></div>
                                    </div>
                                  <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">montant</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="priceup" name="price" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
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


  <div class="modal fade" id="myModal_delete_recette" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <form  method="post" enctype="multipart/form-data" class="form-horizontal" >

      <div class="modal-body">
        <p>voulez vous supprimer cette recette?</p>
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


   <div class="modal fade" id="myModal_fiche" role="dialog">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">générer une  fiche des recettes</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
                <br>

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
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Appartement:</label></div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" id="categorylocup" name="category">
                                            <option value="0">--Choisir une category--</option>
                                            <option value="Publicité">Publicité</option>
                                            <option value="Publicité">Locaux commercial</option>
                                            <option value="Autre">Autre</option>

                                        </select>


                                </div>
                                </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nom du loacaux ou du sponsore</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nomlocup" name="nom" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                                    </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">montant</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="pricelocup" name="price" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
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
@include('partials.footer_scripts')
@yield('content')