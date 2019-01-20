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
                                <h1>Reunion</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Reunion</a></li>
                                    <li class="active">liste de Reunion</li>
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
                                <strong class="card-title">Reunion</strong>
                                @if(auth::user()->role == "Syndic")
                                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal_ajout_reunion"  style="margin-bottom: 1%;"><i class="fa fa-plus-square"></i> Ajouter une reunion</button>


                                @endif
                            </div>

                    <div class="card-body">


                        @if($reunions->isNotEmpty())

                           <table id="dtBasicExample"  class="table table-striped table-bordered" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th>Sujet</th>
                                            <th>Syndic ou occupant</th>
                                            <th>Date</th>
                                            <th>Fichier du réunion</th>
                                            <th>Description</th>
                                            @if(Auth::user()->role == "Syndic")
                                            <th></th>   
                                            <th></th>
                                                <th></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reunions as $r)
                                        <tr>
                                             <td>{{ $r->category }}</td>
                                            
                                            <td>@if($r->role == "Syndic")
                                                    Syndic
                                                @else
                                                  appartement {{ $r->app_num }}
                                                @endif
                                                </td>
                                            <td>{{ $r->date }}</td>
                                            <td>@if($r->file)<a href="{{route('download',$r->id)}}">Telecharger...</a>@else --- @endif</td>
                                            <td>{{ $r->description }}</td>
                                            @if(Auth::user()->role == "Syndic")
                                           
                                            <td><button class="btn btn-primary" data-toggle="modal" data-target="#submitupdatereunion" data-id="{{ $r->id }}" data-user_id="{{ $r->user_id }}" data-category="{{$r->category}}" data-description="{{$r->description}}"
                                                data-role="{{$r->role}}" data-date="{{ $r->date }}" data-approved="{{  $r->approved  }}" data-description="{{ $r->description }}" data-tooltip="tooltip" title="modifier!"><i class="fa fa-edit"></i></button></td>
                                              <td><button class="btn btn-danger" data-toggle="modal" data-target="#myModal_delete_reunion" data-id="{{ $r->id }}"  data-tooltip="tooltip" title="supprimer!"><i class="fa fa-trash"></i></button></td>
                                                <td><button type="submit" class="btn btn-success" id="mailreunion" onclick="window.location='{{ route("reunionMail", $r->id) }}'" data-tooltip="tooltip" title="envoyer email"><i class="fa fa-envelope"></i></button></td>
                                                @endif
                                        </tr>
                                   
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info" role="alert">
                                    <strong>Desolé.</strong> il y a pas de réunion.
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



@include('partials.reunion_modal')
@yield('content')
<!-- Right Panel -->
@include('partials.footer_scripts')
@yield('content')
