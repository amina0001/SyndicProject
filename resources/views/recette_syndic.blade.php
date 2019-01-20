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
                                    <li><a href="#">Tableau de bord</a></li>
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

                                <strong class="card-title">Recette</strong>
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
                                            <th>montant</th>
                                            <th>date</th>
                                            <th>devis</th>
                                            <th>description</th>

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
                                            <td>@if( empty( $r->description ))
                                                    <p>--</p>
                                                @else
                                                    {{ $r->description }}
                                                @endif</td>
                                            <td>
                                                @if($r->image == null)
                                                <p>pas de recu</p>
                                                @else
                                                <img id="myImg" src="{{ $r->image}}"  style="width:100%;max-width:100px" data-toggle="modal" data-image="{{$r->image}}" data-target="#myModal" data-image="{{ $r->image }}">
                                                @endif
                                            </td>

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
                                                    <th  class="th-sm">Mois/Année</th>
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

                                                            <img  src="images/waitting.png"> en attente
                                                        </td>
                                                        <td>

                                                            <button type="submit" class="btn btn-success pull-right" onclick="window.location='{{ route("recetteMail", $s['email']) }}'" data-tooltip="tooltip" title="Alerter les appartements non payé" ><i class="fa fa-envelope"></i></button></td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>


                                        @endif

                                    </div>
                                    @if($recettesloc->isNotEmpty())
                                        <hr class="style-seven">
                                        <h3 >les recettes des locaux commercial ou sponsore  payé : </h3>
                                    <br>
                                        <table id="dtBasicExample1"  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Catégorie</th>

                                                <th>Nom</th>

                                                <th>Montant</th>
                                                <th>Date</th>
                                                <th>Devis</th>

                                                <th>Decription</th>
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
                        Copyright &copy; SyndicTn
                    </div>

                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->
@include('partials.recette_modal')
@yield('content')
@include('partials.footer_scripts')
@yield('content')