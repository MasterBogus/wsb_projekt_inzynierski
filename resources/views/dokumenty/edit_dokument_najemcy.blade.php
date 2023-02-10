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

    <form enctype="multipart/form-data" action="{{ url('update_dokument_najemcy', $Dokument->id_dokumentu) }}" method="post" accept-charset="utf-8">
    @csrf
    @method('PATCH')
    <div class="container">
    <button type="submit" class="backBtn"><a href="/dokumenty">Powrót</a></button>
        <div class="text-center rounded color">
            <h1 class="headerForm">Edytuj najemce przypisanego do dokumentu</h1>
            
        </div>
        <div class="form" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="id_najemcy" class="col-form-label">Najemca: </label>
            <div class="color ml-auto">
                <select id="id_najemcy" type="text" class="text_color" name="id_najemcy" value="{{$Dokument->id_najemcy}}" required>
                    <option value="" selected="">Wybierz Najemcę</option>
                    @foreach($Najemcy as $Najemcy)
                    <option value="{{$Najemcy->id_najemcy}}">{{$Najemcy->imie_najemcy}} {{$Najemcy->nazwisko_najemcy}}</option>
                @if ($errors->has('id_najemcy'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_najemcy') }}</strong>
                    </span>
                @endif
                    @endforeach
                    </select>
            </div><br>
        </div>
        
            <div class="d-flex justify-content-center">
                <button type="submit" class="addBtn">Zapisz</button>
            </div>
        </div>
    </div>
</form>

</body>
</html>