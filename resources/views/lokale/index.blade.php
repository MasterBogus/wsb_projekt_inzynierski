<!DOCTYPE html>

<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/subpages.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/table.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>ZKZL</title>
</head>



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
    <h1>Lista lokali</h1>
    <div class="wrap">
        <div class="search">
           <input type="text" class="searchTerm" placeholder="Szukaj lokalu">
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
    <a class="addBtn" href="{{route('lokale.create') }}"><p class="text">Dodaj lokal</p></a>
    <a class="addBtn" href="{{route('lokale.pomieszczenia.index') }}"><p class="text">Pomieszczenia</p></a>
    <a class="addBtn" href="{{route('lokale.klucze.index') }}"><p class="text">Klucze</p></a>

</div>

    <div class="table-wrapper" style="overflow-x auto;">
    <table class="fl-table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Adres</th>
        <th>Kod pocztowy</th>
        <th>Kondygnacja</th>
        <th>Stan prawny</th>
        <th>Winda</th>
        <th>Przystosowanie dla niepelnosprawnych</th>
        <th colspan="3">Podzbiory danych</th>
        <th colspan="3">Operacje</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($Lokale as $Lokal)
      <tr>
      <td>{{ $Lokal->id_lokalu }}</td>
      <td>{{ $Lokal->adres_lokalu}}</td>
      <td>{{ $Lokal->kod_pocztowy_lokalu}}</td>
      <td>{{ $Lokal->kondygnacja}}</td>
      <td>{{ $Lokal->stan_prawny}}</td>
      <td>{{ $Lokal->winda}}</td>
      <td>{{ $Lokal->przyst_niepelnospr}}</td>
      <td><a href="{{route('lokale.instalacje.edit',$Lokal->id_lokalu) }}"><button type="button" class="btn btn-primary">Instalacje</button></a></td>
      <td><a href="{{route('lokale.grzejniki.edit',$Lokal->id_lokalu) }}"><button type="button" class="btn btn-primary">Grzejniki</button></a></td>
      <td><a href="{{route('lokale.liczniki.edit',$Lokal->id_lokalu) }}"><button type="button" class="btn btn-primary">Liczniki</button></a></td>
      <td><a href="{{route('lokale.edit',$Lokal->id_lokalu) }}"><button type="button" class="btn btn-primary">Edytuj</button></a></td>
        <td>
            <form method="POST" enctype="multipart/form-data" action="{{ route('lokale.destroy',[$Lokal->id_lokalu]) }}" accept-charset="UTF-8">
                @method('DELETE')
                @csrf
                <input class="form-control" type="hidden" name="lokal_id" value="{!!$Lokal->id_lokalu!!}">
                <button onclick="return confirm('Czy napewno chcesz usunąć ten lokal?')" type="submit" class="btn btn-danger">Usuń</button></a>
            </form>
        </td>
        <td><a href="{{url('detail', $Lokal->id_lokalu)}}"><button type="button" class="btn btn-primary">Podsumowanie</button></a></td>
      </tr>

      @endforeach
    </tbody>
    </table>
  </div>
 </div>

</body>
</html>
