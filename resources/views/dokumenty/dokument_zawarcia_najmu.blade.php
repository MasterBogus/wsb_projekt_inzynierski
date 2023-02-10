<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/documents.css')}}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>ZKZL</title>
</head>

<body>
<img src="{{url('/images/logo.jpg')}}" alt="logo">
<p style="float: right; text-align:right; font-size:12px; margin-top:20px;"> Protokół zdawczo-odbiorczy nieruchomości zabudowanej <br> (przy zawieraniu umowy najmu)</p><br>
<BR>
<center><h2 class="docTitle">Protokół zdawczo-odbiorczy nieruchomości zabudowanej <br> (Przy zawieraniu umowy najmu)</h2></center>

<CENTER><p style="font-size: 11px;">POZOSTAŁE DANE W PROTOKOLE NALEŻY WYPEŁNIAĆ DRUKOWANYMI LITERAMI</p></CENTER>
<BR>
<div class="docCont">
<h3>1. Dane administracyjne:</h3>
<div class="part">
<p>Data sporządzenia: {{$Dokumenty->data_rozpoczecia_okresu_waznosci}}</p>
<p>podstawa sporządzenia protokołu*:___________________________________________________________________</p>
<p>___________________________________________________________________________________________</p>
<p>Indeks dokumentu: {{$Dokumenty->identyfikator_wewnetrzny}}</p>
<p>Adres lokalu: {{$Lokal->adres_lokalu}}</p>
<p>kondygnacja: {{$Lokal->kondygnacja}}</p>
<p>Budynek posiada winde: {{$Lokal->winda}}</p>
<p>Kondygnacja**:___________________</p>
<p>Budynek jest przystosowany dla osób niepełnosprawnych: {{$Lokal->przyst_niepelnospr}} </p>
@if($Kod_domofon == NULL)
<p>Kod do domofonu: BRAK</p>
@else
<p>Kod do domofonu: {{$Kod_domofon->kod_domofon}}</p>
@endif
<p>Stan prawny lokalu: {{$Lokal->stan_prawny}}</p>
<p>obciążenia prawne**: brak, postępowanie o zwrot/zbycie, planowana inwestycja, inne: ___________________________________</p>
<h3>Przekazujący: Zarzad Komunalnych Zasobow Lokalnych Sp. z o.o.</h3>
<p>Punkt Obsugi Klienta Nr: ________</p>
<h3>Przejmujący:</h3>
<p>Imie i nazwisko: {{$Najemca->imie_najemcy}} {{$Najemca->nazwisko_najemcy}}</p>
<p>PESEL: {{$Najemca->nr_pesel}}</p>
<p>Nr telefonu: {{$Najemca->nr_tel_najemcy}},      Adres e-mail: ____________________________</p>

</div><br>

<div class="footer">
    <p>* podstawa sporządzenia protokołu: wypowiedzenie umowy najmu przez najemcę (należy wskazać sygnaturę pisma), eksmisja, komisyjne przejęcie, pożar, przejęcie/    
    /przekazanie lokalu z WGN, zmiana podmiotu, zgon użytkownika, wypowiedzenie przez Wynajmującego, zakończenie terminu obowiązywania umowy najmu; <br>
** niewłaściwe skreślić;<br>
</p>
</div><br><br>
<h3>2. Dane techniczne - powierzchnia lokalu</h3>
<p>Łączna powierzchnia lokalu:{{$Suma_powierzchni}} m2</p>
<table>
<tr>
    
    <td>Nazwa</td>
    <td>Powierzchnia</td>
</tr>
@foreach($Pomieszczenia as $Pomieszczenia)
<tr>
    <td width="200px">{{$Pomieszczenia->nazwa_pomieszczenia}}</td>
    <td width="200px">{{$Pomieszczenia->powierzchnia}}m^2</td>
</tr>
@endforeach
</table> <br><br>

<h3>3. Dane techniczne budynku:</h3>

<p>Lista instalacji:</p>
<table>
    <tr>
<td>Wodna:</td>
<td>Kanalizacyjna:</td>
<td>Gazowa:</td>
<td>Elektryczna:</td>
</tr>
<tr>
<td> {{$Instalacje->woda}}</td>
<td> {{$Instalacje->kanalizacja}}</td>
<td> {{$Instalacje->gazowa}}</td>
<td> {{$Instalacje->elektryczna}}</td>
</tr>

</table>
<p> 1 - posiada instalacje, 0 - nie posiada instalacji</p>
<br>
<div class="part">
<p>Typ ogrzewania: {{$Instalacje->typ_ogrzewania}}</p>
<p>Rodzaj i ilosc grzejnikow: {{$Grzejniki->rodzaj_grzejnikow}}, sztuk: {{$Grzejniki->ilosc_grzejnikow}}</p>
</div>
<table>
<p>Aktualny stan licznika:</p>
<tr>
<td>Gaz: </td><td>{{$Liczniki->gaz}}dm^3</td>
</tr>
<tr>
<td>prąd: </td><td>{{$Liczniki->prad}}mVh</td>
</tr>
<tr>
<td>Ciepła woda: </td><td>{{$Liczniki->ciepla_woda}}dm^3</td>
</tr>
<tr>
<td>Zimna woda:</td><td> {{$Liczniki->zimna_woda}}dm^3</td>
</tr>
</table>
<div >
<p>Spis kluczy:</p>
<table class="kTable">

@if($Klucze == NULL)
<p>Klucze: brak</p>
@else
<tr>
@foreach($Klucze as $Klucze)
<td> Nazwa</td><td>Liczba</td><td>Opis dodatkowy</td>
</tr>
<tr>
<td width="150px">{{$Klucze->typ_klucza}} </td><td width="100px">  {{$Klucze->ilosc_kluczy}}</td><td width="440px" height="40px"></td>
@endforeach
@endif
</tr>
</table>
</div>

</div>
<BR><BR>
<p class="comm">   Dodatkowe uwagi:</p>
<div class="sign">
<h3 class="l1">PRZEKAZUJĄCY</h3>
<h3 class="r1">PRZEJMUJĄCY</h3>
</div>
</body>
</html>
