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


    <form enctype="multipart/form-data" action="{{ route('lokale.grzejniki.store') }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="container">
    <p><button type="submit" class="backBtn"><a href="/lokale">Powrót</a></button></p>
        <div class="text-center rounded color">
        <h1 class="headerForm">Grzejniki</h1>
        
        </div>
        <div class="form" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="id_lokalu" class="col-form-label">Lokal: </label>
            <div class="color ml-auto">
                <input id="id_lokalu" type="text" class="form-control" name="id_lokalu" value="{{ $Grzejniki->id_lokalu ?? '' }}" required>
                @if ($errors->has('id_lokalu'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_lokalu') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="rodzaj_grzejnikow" class="col-form-label">Rodzaj grzejników: </label>
            <div class="color ml-auto">
                <input id="rodzaj_grzejnikow" type="text" class="form-control" name="rodzaj_grzejnikow" value="{{ $Grzejniki->rodzaj_grzejnikow ?? '' }}" required>
                @if ($errors->has('rodzaj_grzejnikow'))
                    <span class="help-block">
                        <strong>{{ $errors->first('rodzaj_grzejnikow') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="ilosc_grzejnikow" class="col-form-label">ilość grzejników: </label>
            <div class="color ml-auto">
                <input id="ilosc_grzejnikow" type="number" class="form-control" name="ilosc_grzejnikow" value="{{ $Grzejniki->ilosc_grzejnikow ?? 0 }}" required>
                @if ($errors->has('ilosc_grzejnikow'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ilosc_grzejnikow') }}</strong>
                    </span>
                @endif
            </div><br><br>
        </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="addBtn">Zapisz</button>
            </div>
        </div>
    </div>
</form>

</body>
</html>
