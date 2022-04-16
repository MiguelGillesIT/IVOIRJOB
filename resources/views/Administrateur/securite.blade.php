<!DOCTYPE html>
<html lang = "fr">
<head>
    <title>IVOIRJOB | Securite</title>
    <meta charset = "utf-8">
</head>
<body>
<h1>Accès aux fonctionnalités</h1>
@foreach($groupes as $key=>$groupe)

    <div>{{$groupe->libelle_Groupe}}</div>
    <form method = "post" action = "{{Route('RegisterAccessGroup', ['idGroup' => $groupe->id_Groupe])}}">
        @csrf
        @foreach($fonctionnalites as $fonctionnalite)
            <label for = "{{Str::lower($fonctionnalite->libelle)}}">{{$fonctionnalite->libelle}}</label>
            <input type="checkbox" id="{{Str::lower($fonctionnalite->libelle)}}" @if(in_array($fonctionnalite->libelle,$fonctionnalites_Groupes[$key]))checked @endif  name="{{$fonctionnalite->libelle}}" value="{{$fonctionnalite->libelle}}">
        @endforeach
        <input type = "submit" value = "Modifier les fonctionnalités">
    </form>
    @php
        $key = 0;
    @endphp
@endforeach
</body>
</html>