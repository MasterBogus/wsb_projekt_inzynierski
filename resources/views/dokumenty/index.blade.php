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
<div class="sidebar">
    

    <ul>
      <li><a href="/dashboard"><i class="fa fa-th-large"></i></a></li>
        <li><a href="/lokale" class="fa fa-home"></i></a></li>
        <li><a href="/najemcy" class="fa fa-address-book"></i></a></li>
        <li><a href="/dokumenty" class="fa fa-file-text"></i></a></li>
    </ul>
    
</div>
<div class="search-lokals">
    <h1>Lista dokumentów</h1>
    <div class="wrap">
        <div class="search">
           <input type="text" class="searchTerm" placeholder="Szukaj dokumentów">
           <button type="submit" class="searchButton">
             <i class="fa fa-search"></i>
          </button>
        </div>
     </div>
     <div class="icons">
        
        <!-- Wylogowanie -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="route('logout')"
            onclick="event.preventDefault();
            this.closest('form').submit();">
            <i class="fa fa-sign-out"></i>
            </a>
        </form>
        <!---->
         
     </div>
</div>

<div class="container">
<div class="Btn">
    <a class="addBtn" href="{{route('dokumenty.create') }}"><p class="text">Dodaj dokument</p></a>
</div>
<div class="table-wrapper" style="overflow-x auto;">
    <table class="fl-table">
    <thead>
      <tr>
        <th>Id dokumentu</th>
        <th>Typ dokumentu</th>
        <th>Data wystawienia</th>
        <th>Ważny do</th>
        <th>Data przedterminowego zakończenia</th>
        <th>Identyfikator wewnętrzny</th>
        <th >Lokal</th>
        <th >Najemca</th>
        <th colspan="2">Operacje wydruku</th>
        <th colspan="2">Operacje na wpisie</td>
      </tr>
    </thead>
    <tbody>
    @foreach ($Dokumenty as $Dokument)
      <tr>
      <td>{{ $Dokument->id_dokumentu }}</td>
      <td>{{ $Dokument->typ_dokumentu }}</td>
      <td>{{ $Dokument->data_rozpoczecia_okresu_waznosci }}</td>
      <td>{{ $Dokument->data_zakonczenia_okresu_waznosci }}</td>
      <td>{{ $Dokument->data_zakonczenia_najmu }}</td>
      <td>{{ $Dokument->identyfikator_wewnetrzny }}</td>
      <td><a href="{{url('edit_dokument_lokalu',$Dokument->id_dokumentu)}}"><button type="button" class="btn btn-primary">{{ $Dokument->Lokale->adres_lokalu }}</button></a></td>
      <td><a href="{{url('edit_dokument_najemcy', $Dokument->id_dokumentu)}}"><button type="button" class="btn btn-primary">{{ $Dokument->Najemcy->imie_najemcy }} {{ $Dokument->Najemcy->nazwisko_najemcy }}</button></a></td>
      <td><a href="{{url('dokumenty/zawarcie_pdf', $Dokument->id_dokumentu) }}"><button type="button" class="btn btn-primary">Zawarcie umowy</button></a></td>
      <td><a href="{{url('dokumenty/zerwanie_pdf', $Dokument->id_dokumentu) }}"><button type="button" class="btn btn-primary">Zerwanie umowy</button></a></td>
      <td><a href="{{route('dokumenty.edit',$Dokument->id_dokumentu) }}"><button type="button" class="btn btn-primary">Edytuj</button></a></td>
      <td>
            <form method="POST" enctype="multipart/form-data" action="{{ route('dokumenty.destroy',[$Dokument->id_dokumentu]) }}" accept-charset="UTF-8">
                @method('DELETE')
                @csrf
                <input class="form-control" type="hidden" name="lokal_id" value="{!!$Dokument->id_dokumentu!!}">
                <button onclick="return confirm('Czy napewno chcesz usunąć ten dokument?')" type="submit" class="btn btn-danger">Usuń</button></a>
            </form>
        </td>
        <!--<td><a href="{{url('print_wybor', $Dokument->id_dokumentu) }}"><button type="button" class="btn btn-primary">Drukuj</button></a></td>-->
      </tr>
        
      @endforeach
    </tbody>
    </table>
    </div>
</div>
</body>
</html>
