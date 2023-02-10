<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/documents.css')}}">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>ZKZL</title>
</head>
<style>

</style>
<body>
<p><button type="submit"><a href="{{url('print_wybor', $Dokumenty->id_dokumentu) }}">Powrót</a></button></p>
<img src="{{url('/images/logo.jpg')}}" alt="logo">
<p style="float: right; text-align:right;"> Protokół zdawczo-odbiorczy nieruchomości zabudowanej <br> (przy zawieraniu umowy najmu)</p><br>


<BR>
<center><h2>Protokol zdawczo-odbiorczy nieruchomosci zabudowanej <br> (Przy zawieraniu umowy najmu)</h2></center>
<CENTER><p>POZOSTAE DANE W PROTOKOLE NALEŻY WYPEŁNIAĆ DRUKOWANYMI LITERAMI</p></CENTER>
<BR>
<h3>1. Dane administracyjne:</h3>
<div class="docTable">

<p>Data sporzadzenia: {{$Dokumenty->data_rozpoczecia_okresu_waznosci}}</p>
<p>podstawa sporzdzenia protokou*:________________________________________________________________________________________</p>
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
<p>obciążenia prawne**: brak, postępowanie o zwrot/zbycie, planowana inwestycja, inne: ___________________________________________________</p>
<h3>Przekazujacy: Zarzad Komunalnych Zasobow Lokalnych Sp. z o.o.</h3>
<p>Punkt Obsugi Klienta Nr: ________</p>
<h3>Przejmujacy:</h3>
<p>Imie i nazwisko: {{$Najemca->imie_najemcy}} {{$Najemca->nazwisko_najemcy}}</p>
<p>PESEL: {{$Najemca->nr_pesel}}</p>
<p>Nr telefonu: {{$Najemca->nr_tel_najemcy}}</p>
<p>Adres e-mail: ____________________________</p>
</div><br>
<div class="docTable"> 
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
</div> <br>
<div class="docTable">
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
<BR><BR>
</div>
<div class="sign">
<h3 class="l1">PRZEKAZUJACY</h3>
<h3 class="r1">PRZEJMUJACY</h3>
</div>
</body>
</html>
