<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/subpages.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/table.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>ZKZL</title>
</head>
<style>

</style>
<body>
<BR>
<center><h2>Protokol zdawczo-odbiorczy nieruchomosci zabudowanej</h2></center>
<center><h3>(Przy zerwaniu umowy najmu)</h3></center>
<BR>
<p><button type="submit"><a href="{{url('print_wybor', $Dokumenty->id_dokumentu) }}">Powrót</a></button></p>
<h3>1. Dane administracyjne:</h3>
<p>Data sporzadzenia: {{$Dokumenty->data_rozpoczecia_okresu_waznosci}}</p>
<p>Indeks dokumentu: {{$Dokumenty->identyfikator_wewnetrzny}}</p>
<p>Adres lokalu: {{$Lokal->adres_lokalu}}</p>
<p>kondygnacja: {{$Lokal->kondygnacja}}</p>
<p>Budynek posiada winde: {{$Lokal->winda}}</p>
<p>Budynek jest przystosowany dla osob niepelnosprawnych: {{$Lokal->przyst_niepelnospr}} </p>
@if($Kod_domofon == NULL)
<p>Kod domofonu: -</p>
@else
<p>Kod domofonu: {{$Kod_domofon->kod_domofon}}</p>
@endif
<p>Stan prawny lokalu: {{$Lokal->stan_prawny}}</p>
<h3>Przekazujacy: </h3>
<p>Imie i nazwisko: {{$Najemca->imie_najemcy}} {{$Najemca->nazwisko_najemcy}}</p>
<p>PESEL: {{$Najemca->nr_pesel}}</p>
<p>Adres do doreczen: ulica: {{$Najemca->adres_najemcy}}, miasto: {{$Najemca->miasto_najemcy}}, kod pocztowy: {{$Najemca->kod_pocztowy_najemcy}}</p>
<p>Nr telefonu: {{$Najemca->nr_tel_najemcy}}</p>
<h3>Przyjmujacy: Zarzad Komunalnych Zasobow Lokalnych Sp. z o.o.</h3>
<h3>2. Spis pomieszczen lokalu</h3>
<table border="1px solid black">
<tr>
    
    <td>Nazwa</td>
    <td>Powierzchnia</td>
</tr>
@foreach($Pomieszczenia as $Pomieszczenia)
<tr>
    <td>{{$Pomieszczenia->nazwa_pomieszczenia}}</td>
    <td>{{$Pomieszczenia->powierzchnia}}m^2</td>
</tr>
@endforeach
</table>
<p>Laczna powierzchnia lokalu:{{$Suma_powierzchni}}m^2</p>
<h3>3. Dane techniczne:</h3>
<p>Lista instalacji:</p>
<p>Wodna: {{$Instalacje->woda}}</p>
<p>Kanalizacyjna: {{$Instalacje->kanalizacja}}</p>
<p>Gazowa: {{$Instalacje->gazowa}}</p>
<p>Elektryczna: {{$Instalacje->elektryczna}}</p>
<p>Typ ogrzewania: {{$Instalacje->typ_ogrzewania}}</p>
<p>Rodzaj i ilosc grzejnikow:</p>
<p>{{$Grzejniki->rodzaj_grzejnikow}}, sztuk: {{$Grzejniki->ilosc_grzejnikow}}</p>
<p>Aktualny stan licznikow:</p>
<p>Gaz: {{$Liczniki->gaz}}dm^3</p>
<p>Prad: {{$Liczniki->prad}}mVh</p>
<p>Ciepla woda: {{$Liczniki->ciepla_woda}}dm^3</p>
<p>Zimna woda: {{$Liczniki->zimna_woda}}dm^3</p>
<p>Spis kluczy:</p>
@if($Klucze == NULL)
<p>Klucz:-</p>
@else
@foreach($Klucze as $Klucze)
<p>Klucz: {{$Klucze->typ_klucza}} , ilosc: {{$Klucze->ilosc_kluczy}}</p>
@endforeach
@endif
<h3></h3>
<BR><BR>
<h3>PRZEKAZUJACY</h3>
<h3>PRZEJMUJACY</h3>
</body>
</html>
