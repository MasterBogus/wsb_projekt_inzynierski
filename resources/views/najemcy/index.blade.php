<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/subpages.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/table.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>ZKZL</title>
</head>


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
    <h1>Lista najemców</h1>
    <div class="wrap">
        <div class="search">
           <input type="text" class="searchTerm" placeholder="Szukaj najemcy">
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
    <a class="addBtn" href="{{route('najemcy.create') }}"><p class="text">Dodaj najemce</p></a>
</div>
  
<div class="table-wrapper" style="overflow-x auto;">
    <table class="fl-table">
    <thead>
      <tr>
        <th>Id najemcy</th>
        <th>Imię najemcy</th>
        <th>Nazwisko najemcy</th>
        <th>Kod pocztowy najemcy</th>
        <th>Miasto najemcy</th>
        <th>Adres najemcy</th>
        <th>Nr pesel</th>
        <th>Nr telefonu najemcy</th>
        <th colspan="2">Operacje</td>
      </tr>
    </thead>
    <tbody>
    @foreach ($Najemcy as $Najemca)
   
      <tr>
      <td>{{ $Najemca->id_najemcy }}</td>
      <td>{{ $Najemca->imie_najemcy }}</td>
      <td>{{ $Najemca->nazwisko_najemcy }}</td>
      <td>{{ $Najemca->kod_pocztowy_najemcy }}</td>
      <td>{{ $Najemca->miasto_najemcy }}</td>
      <td>{{ $Najemca->adres_najemcy }}</td>
      <td>{{ $Najemca->nr_pesel }}</td>
      <td>{{ $Najemca->nr_tel_najemcy }}</td>
      <td><a href="{{route('najemcy.edit',$Najemca->id_najemcy) }}"><button type="button" class="btn btn-primary">Edytuj</button></a></td>
      <td>
            <form method="POST" enctype="multipart/form-data" action="{{ route('najemcy.destroy',[$Najemca->id_najemcy]) }}" accept-charset="UTF-8">
                @method('DELETE')
                @csrf
                <input class="form-control" type="hidden" name="najemca_id" value="{!!$Najemca->id_najemcy!!}">
                <button onclick="return confirm('Czy napewno chcesz usunąć tego najemcę?')" type="submit" class="btn btn-danger">Usuń</button></a>
            </form>
        </td>
      </tr>
        
      @endforeach
    </tbody>
    </table>
    </div>
</div>

</body>
</html>