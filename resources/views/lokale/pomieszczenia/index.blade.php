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
      <li><a href="#"><i class="fa fa-th-large"></i></a></li>
        <li><a href="/lokale" class="fa fa-home"></i></a></li>
        <li><a href="/najemcy" class="fa fa-address-book"></i></a></li>
        <li><a href="/dokumenty" class="fa fa-file-text"></i></a></li>
    </ul>
    
</div>
<div class="search-lokals">
    <h1>Lista pomieszczen</h1>
    
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
<p><button type="submit" class="backBtn"><a href="/lokale">Powrót</a></button></p>
<div class="Btn">

<a class="addBtn" href="{{route('lokale.pomieszczenia.create') }}"><p class="text">Dodaj Pomieszczenie</p></a>
</div>

<div class="table-wrapper" style="overflow-x auto;">

    <table class="fl-table">
    <thead>
      <tr>
        <th>Id lokalu</th>
        <th>Id pomieszczenia</th>
        <th>Nazwa pomieszczenia</th>
        <th>Powierzchnia w ㎡</th>
        <th colspan="2">Opcje</th>

      </tr>
    </thead>
    <tbody>
    @foreach($Pomieszczenia as $Pomieszczenie)
      <tr>
      <td>{{$Pomieszczenie->id_lokalu}}</td>
      <td>{{$Pomieszczenie->id_pomieszczenia}}</td>
      <td>{{$Pomieszczenie->nazwa_pomieszczenia}}</td>
      <td>{{$Pomieszczenie->powierzchnia}}</td>

      <td><a href="{{route('lokale.pomieszczenia.edit',$Pomieszczenie->id_pomieszczenia) }}"><button type="button" class="btn btn-primary">Edytuj</button></a></td>
      <td><form method="POST" enctype="multipart/form-data" action="{{ route('lokale.pomieszczenia.destroy',[$Pomieszczenie->id_pomieszczenia]) }}" accept-charset="UTF-8">
                @method('DELETE')
                @csrf
                <input class="form-control" type="hidden" name="klucz_id" value="{!!$Pomieszczenie->id_pomieszczenia!!}">
                <button onclick="return confirm('Czy napewno chcesz usunąć ten klucz?')" type="submit" class="btn btn-danger">Usuń</button></a>
            </form></td>
      </tr>
        
      @endforeach
    </tbody>
    </table>
    </div>
</div>
</body>
</html>