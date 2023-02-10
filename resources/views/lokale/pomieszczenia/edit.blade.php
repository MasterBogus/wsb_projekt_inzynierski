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
        <h1>Edycja pomieszczenia</h1>
        
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


    
    <form enctype="multipart/form-data" action="{{ route('lokale.pomieszczenia.update', $Pomieszczenie->id_pomieszczenia) }}" method="post" accept-charset="utf-8">
    @csrf
    @method('PATCH')
    <div class="container">
    <p><button type="submit" class="backBtn"><a href="/lokale/pomieszczenia">Powrót</a></button></p>
        <div class="text-center rounded color">
        <h1 class="headerForm">Edytuj informacje o pomieszczeniu</h1>
        </div>
        <div class="form" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="id_lokalu" class="col-form-label">Id lokalu: </label>
            <div class="color ml-auto">
                <input id="id_lokalu" type="number" class="form-control" name="id_lokalu" value="{{$Pomieszczenie->id_lokalu}}" required>
                @if ($errors->has('id_lokalu'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_lokalu') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row no-gutters mb-2">
            <label for="nazwa_pomieszczenia" class="col-form-label">Nazwa pomieszczenia: </label>
            <div class="color ml-auto">
                <input id="nazwa_pomieszczenia" type="text" class="form-control" name="nazwa_pomieszczenia" value="{{$Pomieszczenie->nazwa_pomieszczenia}}" required>
                @if ($errors->has('nazwa_pomieszczenia'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nazwa_pomieszczenia') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row no-gutters mb-2">
            <label for="powierzchnia" class="col-form-label">Powierzchnia w ㎡: </label>
            <div class="color ml-auto">
                <input id="powierzchnia" type="number" class="form-control" name="powierzchnia" value="{{$Pomieszczenie->powierzchnia}}" required>
                @if ($errors->has('powierzchnia'))
                    <span class="help-block">
                        <strong>{{ $errors->first('powierzchnia') }}</strong>
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