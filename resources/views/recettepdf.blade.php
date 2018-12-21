<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/syn/bootstrap.min.css">
    <title>Hi</title>
</head>
<body>
<h2 style="text-align: center">Fiche des Recette</h2>

<h6>Batiment: {{$building->name}}</h6>
<h6>Numero des apprtements: {{$building->num_app}}</h6>
<h6>Rue: {{$adress->street}}</h6>
<h6>Ville: {{$cty->name}}</h6>
<h6>Gouvernorat: {{$st->name}}</h6>
<table class="table table-striped" >
    <tr >
        <th >Appartement</th>
        <th >description</th>
        <th >price</th>
        <th >date</th>


    </tr>

    @foreach($recettes as $d)
        <tr >

            <td>Appartement @if($d->app_num!== null){{ $d->app_num }}@else -- @endif</td>
           <td>@if($d->description!== null){{ $d->description }}@else -- @endif</td>
            <td> @if($d->price!== null){{ $d->price }} DNT @else -- @endif</td>
            <td>@if($d->date!== null){{ $d->date }}@else -- @endif</td>

        </tr>
    @endforeach

</table>



</body>
</html>