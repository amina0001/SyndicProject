<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/syn/bootstrap.min.css">
    <link rel="shortcut icon" href="/images/icon.png">

    <title>RECETTE</title>
</head>
<body>
<h2 style="text-align: center">Fiche des Recettes</h2>

<h6>Batiment: {{$building->name}}</h6>
<h6>Numero des apprtements: {{$building->num_app}}</h6>
<h6>Rue: {{$adress->street}}</h6>
<h6>Ville: {{$cty->name}}</h6>
<h6>Gouvernorat: {{$st->name}}</h6>
<br>
<h2>les recettes des apparetement payé :</h2>
<table class="table table-striped" >
    <tr >
        <th >Appartement</th>
        <th >description</th>
        <th >price</th>
        <th >date</th>


    </tr>
    @if($recettes->isNotEmpty())

    @foreach($recettes as $d)
        <tr >

            <td>Appartement @if($d->app_num!== null){{ $d->app_num }}@else -- @endif</td>
           <td>@if($d->description!== null){{ $d->description }}@else -- @endif</td>
            <td> @if($d->price!== null){{ $d->price }} DNT @else -- @endif</td>
            <td>@if($d->date!== null){{ $d->date }}@else -- @endif</td>

        </tr>
    @endforeach
        @endif

</table>
<hr>
<br>
<h2>les recettes des locaux commercial ou sponsore  payé :
</h2>
@if($recettesloc->isNotEmpty())
<table class="table table-striped" >
    <tr >
        <th >Catégorie</th>
        <th >Nom</th>
        <th >Description</th>
        <th >Prix</th>
        <th >Date</th>


    </tr>

    @foreach($recettesloc as $d)
        <tr >

            <td>@if($d->category!== null){{ $d->category }}@else -- @endif</td>
            <td>@if($d->nom!== null){{ $d->nom }}@else -- @endif</td>
            <td>@if($d->description!== null){{ $d->description }}@else -- @endif</td>
            <td> @if($d->price!== null){{ $d->price }} DNT @else -- @endif</td>
            <td>@if($d->date!== null){{ $d->date }}@else -- @endif</td>

        </tr>
    @endforeach

</table>
@else
    --Pad de recettes pour les locaux commercieux.
@endif

</body>
</html>