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
        <h1>Lista dokumentów</h1>
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
    <button type="submit" class="backBtn"><a href="/dokumenty">Powrót</a></button>
    <form enctype="multipart/form-data" action="{{ route('dokumenty.store') }}" method="post" accept-charset="utf-8">
    @csrf
    
        <div class="text-center rounded color">
            <h1 class="headerForm">Tworzenie nowego dokumentu</h1>
            
        </div>
        <div class="form" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="typ_dokumentu" class="col-form-label">Typ dokumentu: </label>
            <div class="color ml-auto">
                <input id="typ_dokumentu" type="text" class="form-control" name="typ_dokumentu" value="" required>
                @if ($errors->has('typ_dokumentu'))
                    <span class="help-block">
                        <strong>{{ $errors->first('typ_dokumentu') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="data_rozpoczecia_okresu_waznosci" class="col-form-label">Data utworzenia: </label>
            <div class="color ml-auto">
                <input id="data_rozpoczecia_okresu_waznosci" type="date" class="form-control" name="data_rozpoczecia_okresu_waznosci" value="" require>
                @if ($errors->has('data_rozpoczecia_okresu_waznosci'))
                    <span class="help-block">
                        <strong>{{ $errors->first('data_rozpoczecia_okresu_waznosci') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="data_zakonczenia_okresu_waznosci" class="col-form-label">Ważny do: </label>
            <div class="color ml-auto">
                <input id="data_zakonczenia_okresu_waznosci" type="date" class="form-control" name="data_zakonczenia_okresu_waznosci" value="">
                @if ($errors->has('data_zakonczenia_okresu_waznosci'))
                    <span class="help-block">
                        <strong>{{ $errors->first('data_zakonczenia_okresu_waznosci') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="identyfikator_wewnetrzny" class="col-form-label">Identyfikator wewnetrzny: </label>
            <div class="color ml-auto">
                <input id="identyfikator_wewnetrzny" type="text" class="form-control" name="identyfikator_wewnetrzny" value="" required>
                @if ($errors->has('identyfikator_wewnetrzny'))
                    <span class="help-block">
                        <strong>{{ $errors->first('identyfikator_wewnetrzny') }}</strong>
                    </span>
                @endif
            </div><BR><BR>
        </div>
        
            <div class="d-flex justify-content-center">
                <button type="submit" class="addBtn">Zapisz</button>
            </div>
        </div>
    </div>
</form>

</body>
</html>
