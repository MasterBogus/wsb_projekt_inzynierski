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

    <form enctype="multipart/form-data" action="{{ route('lokale.instalacje.store') }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="container">
        <div class="text-center rounded color">
        <p><button type="submit" class="backBtn"><a href="/lokale">Powrót</a></button></p>
        <h1 class="headerForm">Instalacje</h1>
        
        </div>
        <div class="form" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="id_lokalu" class="col-form-label">Lokal: </label>
            <div class="color ml-auto">
                <input id="id_lokalu" type="text" class="form-control" name="id_lokalu" value="{{ $Instalacje->id_lokalu ?? '' }}">
                @if ($errors->has('id_lokalu'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_lokalu') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="woda" class="col-form-label">Wodna: </label>
            <div class="color ml-auto">
                <input id="woda" type="checkbox" class="form-control" name="woda" value="1" {{ ($Instalacje->woda == '1') ? "checked" : "" }}>
                @if ($errors->has('woda'))
                    <span class="help-block">
                        <strong>{{ $errors->first('woda') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="kanalizacja" class="col-form-label">Kanalizacja: </label>
            <div class="color ml-auto">
                <input id="kanalizacja" type="checkbox" class="form-control" name="kanalizacja" value="1" {{ ($Instalacje->kanalizacja == '1') ? "checked" : "" }}>
                @if ($errors->has('kanalizacja'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kanalizacja') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="gazowa" class="col-form-label">Gazowa: </label>
            <div class="color ml-auto">
                <input id="gazowa" type="checkbox" class="form-control" name="gazowa" value="1" {{ ($Instalacje->gazowa == '1') ? "checked" : "" }}>
                @if ($errors->has('gazowa'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gazowa') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="elektryczna" class="col-form-label">Elektryczna: </label>
            <div class="color ml-auto">
                <input id="elektryczna" type="checkbox" class="form-control" name="elektryczna" value="1" {{ ($Instalacje->elektryczna == '1') ? "checked" : "" }}>
                @if ($errors->has('elektryczna'))
                    <span class="help-block">
                        <strong>{{ $errors->first('elektryczna') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="typ_ogrzewania" class="col-form-label">Typ ogrzewania: </label>
            <div class="color ml-auto">
                <input id="typ_ogrzewania" type="text" class="form-control" name="typ_ogrzewania" value="{{ $Instalacje->typ_ogrzewania ?? '' }}" required>
                @if ($errors->has('typ_ogrzewania'))
                    <span class="help-block">
                        <strong>{{ $errors->first('typ_ogrzewania') }}</strong>
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
