<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/subpages.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/form1.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <form enctype="multipart/form-data" action="{{ route('lokale.update', $Lokal->id_lokalu) }}" method="post" accept-charset="utf-8">
    @csrf
    @method('PATCH')
    <div class="container">
    <p><button type="submit" class="backBtn"><a href="/lokale">Powrót</a></button></p>
        <div class="text-center rounded color">
            <h1 class="headerForm">Edytuj informacje lokalu</h1>
            
        </div>
        <div class="form" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="adres_lokalu" class="col-form-label">Adres lokalu: </label>
            <div class="color ml-auto">
                <input id="adres_lokalu" type="text" class="form-control" name="adres_lokalu" value="{{$Lokal->adres_lokalu}}" required>
                @if ($errors->has('adres_lokalu'))
                    <span class="help-block">
                        <strong>{{ $errors->first('adres_lokalu') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="kod_pocztowy_lokalu" class="col-form-label">Kod pocztowy lokalu: </label>
            <div class="color ml-auto">
                <input id="kod_pocztowy_lokalu" type="text" class="form-control" name="kod_pocztowy_lokalu" value="{{$Lokal->kod_pocztowy_lokalu}}" required>
                @if ($errors->has('kod_pocztowy_lokalu'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kod_pocztowy_lokalu') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="kondygnacja" class="col-form-label">Kondygnacja: </label>
            <div class="color ml-auto">
                <input id="kondygnacja" type="number" class="form-control" name="kondygnacja" value="{{$Lokal->kondygnacja}}" required>
                @if ($errors->has('kondygnacja'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kondygnacja') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="stan_prawny" class="col-form-label">Stan prawny: </label>
            <div class="color ml-auto">
                <input id="stan_prawny" type="text" class="form-control" name="stan_prawny" value="{{$Lokal->stan_prawny}}" required>
                @if ($errors->has('stan_prawny'))
                    <span class="help-block">
                        <strong>{{ $errors->first('stan_prawny') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="winda" class="col-form-label">Winda: </label>
            <div class="color ml-auto">
                <input id="winda" type="checkbox" class="form-control" name="winda" value="1" {{ ($Lokal->winda == '1') ? "checked" : "" }}>
                @if ($errors->has('winda'))
                    <span class="help-block">
                        <strong>{{ $errors->first('winda') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="przyst_niepelnospr" class="col-form-label">Przyst_niepelnospr: </label>
            <div class="color ml-auto">
                <input id="przyst_niepelnospr" type="checkbox" class="form-control" name="przyst_niepelnospr" value="1" {{ ($Lokal->przyst_niepelnospr == '1') ? "checked" : "" }}>
                @if ($errors->has('przyst_niepelnospr'))
                    <span class="help-block">
                        <strong>{{ $errors->first('przyst_niepelnospr') }}</strong>
                    </span>
                @endif
            </div>
        </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="addBtn">Zapisz</button>
            </div>
        </div>
    </div>
</form>

</body>
</html>
