<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/subpages.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/form.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <title>ZKZL - dodawanie użytkownika</title>
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
<div class="container">
    <form enctype="multipart/form-data" action="{{ route('uzytkownicy.store') }}" method="post" accept-charset="utf-8">
    @csrf
    
        
        <div class="text-center rounded color">
            <h1 class="headerForm">Podaj informacje o nowym uzytkowniku</h1>
        </div>
        <div class="container" style="width:50%;">
        
        <div class="row">
            <label for="name" class="col-form-label">Nazwa: </label>
            <div class="color ml-auto">
                <input id="name" type="text" class="form-control" name="name" value="" required>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row">
            <label for="email" class="col-form-label">Adres e-mail: </label>
            <div class="color ml-auto">
                <input id="email" type="text" class="form-control" name="email" value="" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row">
            <label for="password" class="col-form-label">Podaj haslo: </label>
            <div class="color ml-auto">
                <input id="password" type="text" class="form-control" name="password" value="" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row">
            <label for="usertype" class="col-form-label">Typ uzytkownika (1 - Admin, 0 - standard): </label>
            <div class="color ml-auto">
                <input id="usertype" type="text" class="form-control" name="usertype" value="" required>
                @if ($errors->has('usertype'))
                    <span class="help-block">
                        <strong>{{ $errors->first('usertype') }}</strong>
                    </span>
                @endif
            </div>
        </div><br>
            <div class="d-flex justify-content-center">
                <button type="submit" class="addBtn">Zapisz</button>
            </div>
        </div>
    </div>
</form>



</body>
</html>
