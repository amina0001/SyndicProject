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
                                <li><a href="#">occupants</a></li>
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

                            <button class="btn btn-primary pull-right" data-building="{{$building->id}}" data-toggle="modal" data-target="#myModal_add_occupants" style="margin-bottom: 1%;"><i class="fa fa-plus-square"></i> Ajouter une occupant</button>
                        </div>

                        <div class="card-body ">

                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">details:</strong>

                                    </div>
                                    <div class="card-body">
                                        <b>Nom du batiment</b> : {{$building->name}} --
                                        <b>Rue</b> : {{$adress->street}} --
                                        <b>Code postal</b>: {{$cty->pcode}} --
                                        <b>Cité</b> : {{$cty->name}} --
                                        <b>Gouvernerat</b> :{{$st->name}} .

                                    </div>
                                </div>

                            <table  id="dtBasicExample1"  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" >
                                <thead>
                                <tr>
                                    <th>nom</th>
                                    <th>prenom</th>
                                    <th>cin</th>
                                    <th>role</th>
                                    <th>email</th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($occupants as $o)
                                    <tr>
                                        <td>{{$o->firstname}}</td>
                                        <td>{{$o->lastname}}</td>
                                        <td>{{$o->cin}}</td>
                                        <td>{{$o->role}}</td>
                                        <td>{{$o->email}}</td>
                                        <td><button class="btn btn-danger" data-toggle="modal" data-target="#myModal_delete_occupants" data-id="{{$o->id}}">Supprimer</button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

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


<div class="modal fade" id="myModal_delete_occupants" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer cet occupants</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Voulez vous supprimer cet occupant?</p>
                <form action="{{ route('userDelete') }}" method="post" id="myModal_delete_occupants_form" enctype="multipart/form-data" class="form-horizontal" >
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
<div class="modal fade" id="myModal_add_occupants" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un occupants</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Voulez vous ajouter cet occupant?</p>
                <form action="{{ route('occupantAdd') }}" method="post" id="myModal_add_occupants_form" enctype="multipart/form-data" class="form-horizontal" >
                    @csrf
                    <input type="hidden" name="building" id="building" value="">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ajouter</button>
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