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
    <h1>Lista uzytkownikow</h1>
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
    <a class="addBtn" href="/register"><p class="text">Dodaj użytkownika</p></a>
    
</div>

    <div class="table-wrapper" style="overflow-x auto;">
    <table class="fl-table">
    <thead>
      <tr>
      <th>id</th>
        <th>nazwa</th>
        <th>e-mail</th>
        <th>typ (1 - admin, 0 - standard)</th>
        <th colspan="2">Operacje</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($Uzytkownicy as $Uzytkownik)
    <tr>
      <td>{{ $Uzytkownik->id }}</td>
      <td>{{ $Uzytkownik->name}}</td>
      <td>{{ $Uzytkownik->email}}</td>
      <td>{{ $Uzytkownik->usertype}}</td>
      <td><a href="{{route('uzytkownicy.edit',$Uzytkownik->id) }}"><button type="button" class="btn btn-primary">Edytuj</button></a></td>
      <td><form method="POST" enctype="multipart/form-data" action="{{ route('uzytkownicy.destroy',[$Uzytkownik->id]) }}" accept-charset="UTF-8">
            @method('DELETE')
            @csrf
            <input class="form-control" type="hidden" name="uzytkownik_id" value="{!!$Uzytkownik->id!!}">
            <button onclick="return confirm('Czy napewno chcesz usunąć tego użytkownika?')" type="submit" class="btn btn-danger">Usuń</button></a>
      </form></td>
      </tr>
      @endforeach
    </tbody>
    </table>
  </div>
 </div>

</body>
</html>
