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


    <form enctype="multipart/form-data" action="{{ route('lokale.liczniki.store') }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="container">
    <p><button type="submit" class="backBtn"><a href="/lokale">Powrót</a></button></p>
        <h1 class="headerForm">Liczniki</h1>
        
        <div class="form" style="width:50%;">
        
        <div class="row no-gutters mb-2">
            <label for="id_lokalu" class="col-form-label">Lokal: </label>
            <div class="color ml-auto">
                <input id="id_lokalu" type="text" class="form-control" name="id_lokalu" value="{{ $Liczniki->id_lokalu ?? '' }}">
                @if ($errors->has('id_lokalu'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_lokalu') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="gaz" class="col-form-label">Gazu: </label>
            <div class="color ml-auto">
                <input id="gaz" type="text" class="form-control" name="gaz" value="{{ $Liczniki->gaz ?? '' }}" required>
                @if ($errors->has('gaz'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gaz') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="prad" class="col-form-label">Prądu: </label>
            <div class="color ml-auto">
                <input id="prad" type="number" class="form-control" name="prad" value="{{ $Liczniki->prad ?? '' }}" required>
                @if ($errors->has('prad'))
                    <span class="help-block">
                        <strong>{{ $errors->first('prad') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="ciepla_woda" class="col-form-label">Ciepła woda: </label>
            <div class="color ml-auto">
                <input id="ciepla_woda" type="number" class="form-control" name="ciepla_woda" value="{{ $Liczniki->ciepla_woda ?? '' }}" required>
                @if ($errors->has('ciepla_woda'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ciepla_woda') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="zimna_woda" class="col-form-label">Zimna woda: </label>
            <div class="color ml-auto">
                <input id="zimna_woda" type="number" class="form-control" name="zimna_woda" value="{{ $Liczniki->zimna_woda ?? '' }}" required>
                @if ($errors->has('zimna_woda'))
                    <span class="help-block">
                        <strong>{{ $errors->first('zimna_woda') }}</strong>
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
