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
                                            <th>Fichier ou image</th>
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

  




    <div class="modal fade" id="myModal_ajout_reunion" role="dialog">
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
                                <form action="{{ route('reunionCreate')}}" id="submitajoutreunion" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sujet:</label></div>
                                        <div class="col-md-9">
                                            <select class="form-control" id="categoryr" name="category">
                                                <option disabled selected>--choisir Sujet de reunion--</option>
                                                <option  value="Securite">Securite</option>
                                                <option  value="Dépenses ou recettes">Dépenses ou recettes</option>
                                                <option value="Réclamation">Réclamation</option>
                                                <option value="Événement">Événement</option>
                                                <option value="Prise de conscience">Prise de conscience</option>
                                                <option value="Autre">Autre</option>

                                              </select>

                                        </div>
                                    </div>
                                 
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                                        <div class='col-md-9'>

                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' name="date" id="dater" class="form-control" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>

                                    </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="filer" name="file" class="form-control-file" ></div>

                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                        <div class="col-12 col-md-9"><textarea name="description" id="descriptionr" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                    </div>
                                    <button type="submit" id="" class="btn btn-primary pull-right">Ajouter une reunion</button>
                                
                               
                                  
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


    <div class="modal fade" id="submitupdatereunion" role="dialog">
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
                                <form action="{{ route('reunionUpdate') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                  @csrf
                                    <input type="hidden" id="id" name="id"  class="form-control">

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category:</label></div>
                                        <div class="col-md-9">
                                            <select class="form-control" id="categoryrnup" name="category">
                                                <option disabled selected>--choisir category de reunion--</option>
                                                <option  value="Securite">securite</option>
                                                <option  value="Dépenses ou recettes">Dépenses ou recettes</option>
                                                <option value="Réclamation">Réclamation</option>
                                                <option value="Événement">Événement</option>
                                                <option value="Prise de conscience">Prise de conscience</option>
                                                <option value="Autre">Autre</option>
                                              </select>
                                         </div>
                                    </div>
                                 
                                       <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                                        <div class="col-md-9">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type='text' id="daternup" name="date" class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                   
                                    </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="filerup" name="file" class="form-control-file" ></div>

                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                        <div class="col-md-9"><textarea name="description" id="descriptionrnup" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                    </div>
                                    <button type="submit"  class="btn btn-primary pull-right">Mettre a jour la reunion</button>
                                
                               
                                  
                                  
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

<div class="modal fade" id="myModal_delete_reunion" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('deletereunion')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >

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
<script>
$(document).ready(function(){
$("#mailreunion").click(function(){
alert("veuillez patienter jusqu'à l'actualisation de la page pour que le courrier  soit envoyé");
});
});
</script>
<!-- Right Panel -->
@include('partials.footer_scripts')
@yield('content')
