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
    <h1>Lista użytkowników</h1>
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
    
    <form enctype="multipart/form-data" action="{{ route('uzytkownicy.update', $Uzytkownik->id) }}" method="post" accept-charset="utf-8">
    @csrf
    @method('PATCH')
    <div class="container">
        <div class="text-center rounded color">
            <h1 class="display-4">Edytuj typ użytkownika</h1>
            <p><button type="submit" class="backBtn"><a href="/uzytkownicy">Powrót</a></button></p>
            
        </div>
        <div class="container" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="usertype" class="col-form-label">Typ użytkownika: </label>
            <div class="color ml-auto">
                <input id="usertype" type="number" class="form-control" name="usertype" value="{{$Uzytkownik->usertype}}" required>
                @if ($errors->has('usertype'))
                    <span class="help-block">
                        <strong>{{ $errors->first('usertype') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <BR>
            <div class="d-flex justify-content-center">
                <button type="submit" class="addBtn">Zapisz</button>
            </div>
        </div>
    </div>
</form>

    



</body>
</html>
