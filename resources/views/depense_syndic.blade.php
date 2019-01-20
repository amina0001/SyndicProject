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
                            <h1>Dépense</h1>
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
                                <button  class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#myModal_ajout_depense" ><i class="fa fa-plus-square"></i> Ajouter depense</button>

                                <button  class="btn btn-primary" style="float: right;margin-right:1%" data-toggle="modal" data-target="#myModal_fiche_depense" ><i class="fa fa-print"></i> Gener fiche</button>
                            @endif
                        </div>

                        <div class="card-body">
                            @if($depenses->isNotEmpty())
                            <table id="dtBasicExample"  class="table table-striped table-bordered" style="width:100%">
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
                                                <img id="myImg" src="{{ $d->image}}"  style="width:100%;max-width:100px" data-toggle="modal" data-target="#myModal" data-image="{{ $d->image }}">
                                            @endif</td>
                                        @if(Auth::user()->role == "Syndic")
                                            <td>


                                                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal_update_depense" data-id="{{ $d->id }}" data-titre="{{ $d->titre }}"data-description="{{ $d->description }}" data-price="{{ $d->price }}" data-date="{{ $d->date }}" data-tooltip="tooltip" title="modifier!">
                                                    <i class="fa fa-edit"></i></button>

                                            </td>
                                            <td>


                                                <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal_delete_depense" data-id="{{ $d->id }}" data-tooltip="tooltip" title="supprimer!">
                                                    <i class="fa fa-trash"></i></button>

                                            </td>
                                        @endif
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
                    Copyright &copy; SyndicTn
                </div>

            </div>
        </div>
    </footer>

</div><!-- /#right-panel -->
<!-- Modal -->  <!-- Modal -->
@include('partials.depense_modal')
@yield('content')
<!-- Right Panel -->
@include('partials.footer_scripts')
@yield('content')