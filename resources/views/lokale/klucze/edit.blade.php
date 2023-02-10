<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/subpages.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/form1.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <h1>Edycja klucza</h1>
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


    
    <form enctype="multipart/form-data" action="{{ route('lokale.klucze.update', $Klucz->id_klucza) }}" method="post" accept-charset="utf-8">
    @csrf
    @method('PATCH')
    <div class="container">
    <p><button type="submit" class="backBtn"><a href="/lokale/klucze">Powrót</a></button></p>
        <div class="text-center rounded color">
        <h1 class="headerForm">Edytuj informacje o kluczach</h1>
        
        </div>
        <div class="form" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="ilosc_kluczy" class="col-form-label">Id lokalu: </label>
            <div class="color ml-auto">
                <input id="id_lokalu" type="number" class="form-control" name="id_lokalu" value="{{$Klucz->id_lokalu}}" required>
                @if ($errors->has('id_lokalu'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_lokalu') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="row no-gutters mb-2">
            <label for="typ_klucza" class="col-form-label">Typ klucza: </label>
            <div class="color ml-auto">
                <input id="typ_klucza" type="text" class="form-control" name="typ_klucza" value="{{$Klucz->typ_klucza}}" required>
                @if ($errors->has('typ_klucza'))
                    <span class="help-block">
                        <strong>{{ $errors->first('typ_klucza') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="ilosc_kluczy" class="col-form-label">ilość kluczy: </label>
            <div class="color ml-auto">
                <input id="ilosc_kluczy" type="number" class="form-control" name="ilosc_kluczy" value="{{$Klucz->ilosc_kluczy}}" required>
                @if ($errors->has('ilosc_kluczy'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ilosc_kluczy') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="kod_domofon" class="col-form-label">Kod domofon: </label>
            <div class="color ml-auto">
                <input id="kod_domofon" type="text" class="form-control" name="kod_domofon" value="{{$Klucz->kod_domofon}}">
                @if ($errors->has('kod_domofon'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kod_domofon') }}</strong>
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