


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