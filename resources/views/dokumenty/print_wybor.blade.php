<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/subpages.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/table.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/form1.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>ZKZL</title>
</head>
<style>

</style>
<body>

<div class="search-lokals">
<div class="sidebar">
    

    <ul>
      <li><a href="/dashboard"><i class="fa fa-th-large"></i></a></li>
        <li><a href="/lokale" class="fa fa-home"></i></a></li>
        <li><a href="/najemcy" class="fa fa-address-book"></i></a></li>
        <li><a href="/dokumenty" class="fa fa-file-text"></i></a></li>
    </ul>
    
</div>

    <h1>Wydruk dokumentu</h1>
    

    <div class="wrap">
        <div class="search">
           <input type="text" class="searchTerm" placeholder="Szukaj dokumentów">
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
<h1 class="headerForm">Wybierz dokument do wygenerowania:</h1>

<div class="Btn">
    <a class="docBtn" href="{{ url('zawieranie_umowy', $Dokumenty->id_dokumentu) }}"><p class="text">Dokument zawarcia umowy najmu</p></a>
    <a class="docBtn" href="{{ url('zerwanie_umowy', $Dokumenty->id_dokumentu) }}"><p class="text">Dokument rozwiązywania umowy najmu</p></a>
    
</div>
<div class="Btn">
<a class="docBtn" href="{{url('dokumenty/zawarcie_pdf', $Dokumenty->id_dokumentu) }}"><p class="text">Pobierz dokument zawarcia umowy najmu</p></a>
    <a class="docBtn" href="{{url('dokumenty/zerwanie_pdf', $Dokumenty->id_dokumentu) }}"><p class="text">Pobierz dokument zerwania umowy najmu</p></a>
</div>




</div>

</body>
</html>
