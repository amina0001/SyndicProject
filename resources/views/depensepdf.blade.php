<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/syn/bootstrap.min.css">
    <link rel="shortcut icon" href="/images/icon.png">

    <title>Depenses</title>
</head>
<body>
<h2 style="text-align: center">Fiche des depenses</h2>

<h6>Batiment: {{$building->name}}</h6>
<h6>Numero des apprtements: {{$building->num_app}}</h6>
<h6>Rue: {{$adress->street}}</h6>
<h6>Ville: {{$cty->name}}</h6>
<h6>Gouvernorat: {{$st->name}}</h6>
<table class="table table-striped" >
    <tr >
    <th scope="col">titre</th>
        <th >description</th>
    <th >price</th>
    <th >date</th>


    </tr>
    @if($depenses->isNotEmpty())
    @foreach($depenses as $d)
    <tr>
        <td>@if($d->titre!== null){{ $d->titre }} @else -- @endif</td>
         <td>@if($d->description!== null){{ $d->description }}@else -- @endif</td>
        <td> @if($d->price!== null){{ $d->price }} DNT @else -- @endif</td>
        <td>@if($d->date!== null){{ $d->date }}@else -- @endif</td>

    </tr>
    @endforeach
        @endif

</table>



</body>
</html>