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

    <form enctype="multipart/form-data" action="{{ route('najemcy.update', $Najemca->id_najemcy) }}" method="post" accept-charset="utf-8">
    @csrf
    @method('PATCH')
    <div class="container">
    <p><button type="submit" class="backBtn"><a href="/najemcy">Powrót</a></button></p>
        <div class="text-center rounded color">
            <h1 class="headerForm">Edytuj informacje najemcy</h1>
            
        </div>
        <div class="form" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="imie_najemcy" class="col-form-label">Imię: </label>
            <div class="color ml-auto">
                <input id="imie_najemcy" type="text" class="form-control" name="imie_najemcy" value="{{$Najemca->imie_najemcy}}" required>
                @if ($errors->has('imie_najemcy'))
                    <span class="help-block">
                        <strong>{{ $errors->first('imie_najemcy') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="nazwisko_najemcy" class="col-form-label">Nazwisko: </label>
            <div class="color ml-auto">
                <input id="nazwisko_najemcy" type="text" class="form-control" name="nazwisko_najemcy" value="{{$Najemca->nazwisko_najemcy}}" required>
                @if ($errors->has('nazwisko_najemcy'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nazwisko_najemcy') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="kod_pocztowy_najemcy" class="col-form-label">Kod pocztowy: </label>
            <div class="color ml-auto">
                <input id="kod_pocztowy_najemcy" type="text" class="form-control" name="kod_pocztowy_najemcy" value="{{$Najemca->kod_pocztowy_najemcy}}" required>
                @if ($errors->has('kod_pocztowy_najemcy'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kod_pocztowy_najemcy') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="miasto_najemcy" class="col-form-label">Miasto: </label>
            <div class="color ml-auto">
                <input id="miasto_najemcy" type="text" class="form-control" name="miasto_najemcy" value="{{$Najemca->miasto_najemcy}}" required>
                @if ($errors->has('miasto_najemcy'))
                    <span class="help-block">
                        <strong>{{ $errors->first('miasto_najemcy') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="adres_najemcy" class="col-form-label">Adres zamieszkania: </label>
            <div class="color ml-auto">
                <input id="adres_najemcy" type="text" class="form-control" name="adres_najemcy" value="{{$Najemca->adres_najemcy}}" required>
                @if ($errors->has('adres_najemcy'))
                    <span class="help-block">
                        <strong>{{ $errors->first('adres_najemcy') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="nr_pesel" class="col-form-label">Numer pesel: </label>
            <div class="color ml-auto">
                <input id="nr_pesel" type="text" class="form-control" name="nr_pesel" value="{{$Najemca->nr_pesel}}" required>
                @if ($errors->has('nr_pesel'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nr_pesel') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="nr_tel_najemcy" class="col-form-label">Numer telefonu: </label>
            <div class="color ml-auto">
                <input id="nr_tel_najemcy" type="text" class="form-control" name="nr_tel_najemcy" value="{{$Najemca->nr_tel_najemcy}}" required>
                @if ($errors->has('nr_tel_najemcy'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nr_tel_najemcy') }}</strong>
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
