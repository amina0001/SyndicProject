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
                            <button class="btn btn-primary pull-right" onclick="window.location='{{ route("userAdd") }}'" style="margin-bottom: 1%;"><i class="fa fa-plus-square"></i> Ajouter une occupant</button>

                        @if($users->isNotEmpty())
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th> Nom</th>
                                    <th> Prenom</th>
                                    <th> Appartement</th>
                                    <th> Email</th>
                                    <th> (Default)Password</th>
                                    <th></th>

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

                                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal_update_user" data-id="{{ $u->id }}" data-app_num="{{ $u->app_num }}" data-tooltip="tooltip" title="modifier"><i class="fa fa-edit"></i></button></td>
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
<div class="modal fade" id="myModal_update_user" role="dialog">
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
                            <form action="{{ route('userUpdate') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <input type="hidden" id="id" name="id"  class="form-control">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Numero appartement</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="app_num" name="app_num" placeholder="Text" class="form-control"></div>
                                </div>
                                <button type="submit"class="btn btn-primary pull-right">Mettre a jour l'occupant</button>
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


<div class="modal fade" id="myModal_ajout_user" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ajouter</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>

                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body card-block">
                            <form action="{{ route('userAdd') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <input type="hidden" id="id" name="id"  class="form-control">
                                <button type="submit"class="btn btn-primary pull-right">Ajouter l'occupant</button>
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
<!-- Right Panel -->
@include('partials.footer_scripts')
@yield('content')
