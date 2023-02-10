<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/subpages.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/form1.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/table.css')}}">
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
        <h1 class="headerForm">Podsumowanie</h1><br><br>
        
    
        
        

                @if ($errors->has('id_lokalu'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_lokalu') }}</strong>
                    </span>
                @endif


    <!-- Tabela Grzejniki -->
    <div  class="table-wrapper" style="float:left" >

        <table class="fl-table">
        <thead>
        <tr><th colspan='2'>Grzejniki</th></tr>
        <tr>
            <th>Rodzaj grzejników</th>
            <th>Ilość grzejników</th>

        </tr>
        </thead>
        <tbody>
        <tr>
        <td>{{$grzejniki->rodzaj_grzejnikow}}</td>
        <td>{{$grzejniki->ilosc_grzejnikow}}</td>
        </tr>
        </tbody>
        </table>
    </div>

    <!---->
    
    <!-- Tabela Instalacje -->
    <div class="table-wrapper" style="float:left">

        <table class="fl-table">
        <thead>
        <tr><th colspan='5'>Instalacje</th></tr>
        <tr>
            <th>Wodna</th>
            <th>Kanalizacyjna</th>
            <th>Gazowa</th>
            <th>Elektryczna</th>
            <th>Typ ogrzewania</th>

        </tr>
        </thead>
        <tbody>
        <tr>
        <td>{{$instalacje->woda}}</td>
        <td>{{$instalacje->kanalizacja}}</td>
        <td>{{$instalacje->gazowa}}</td>
        <td>{{$instalacje->elektryczna}}</td>
        <td>{{$instalacje->typ_ogrzewania}}</td>
        </tr>
        </tbody>
        </table>
    </div>
    <!---->    

    <!-- Tabela Liczniki -->
    <div class="table-wrapper" style="float:left">

        <table class="fl-table">
        <thead>
        <tr><th colspan='4'>Liczniki</th></tr>
        <tr>
        <th>Gaz</th>
        <th>Prąd</th>
        <th>Ciepła woda</th>
        <th>Zimna woda</th>

        </tr>
        </thead>
        <tbody>
        <tr>
        <td>{{$liczniki->gaz}}</td>
        <td>{{$liczniki->prad}}</td>
        <td>{{$liczniki->ciepla_woda}}</td>
        <td>{{$liczniki->zimna_woda}}</td>
        </tr>
        </tbody>
        </table>
    </div>
    <!---->   

    <!-- Tabela Pomieszczenia -->

    <div class="table-wrapper"  style="float:left" >

        <table  class="fl-table" >
        <thead>
        <tr><th colspan='2'>Pomieszczenia</th></tr>
        <tr>
        <th>Nazwa Pomieszczenia</th>
        <th>Powierzchnia</th>


        </tr>
        </thead>
        @foreach($pomieszczenia as $pomieszczenia)
        <tbody>
        <tr>
        <td>{{$pomieszczenia->nazwa_pomieszczenia}}</td>
        <td>{{$pomieszczenia->powierzchnia}}</td>

        @endforeach
        </tr>
        </tbody>
        </table>
    </div>
    <!---->   

    <!-- Tabela Klucze -->

    <div class="table-wrapper"  style="float:left" width="40%" >

        <table class="fl-table">
        <thead>
        <tr><th colspan='3'>Klucze</th></tr>
        <tr>
        <th>Typ klucza</th>
        <th>Ilość kluczy</th>
        <th>Kod domofonu</th>


        </tr>
        </thead>
        @foreach($klucze as $klucze)
        <tbody>
        <tr>
        <td>{{$klucze->typ_klucza}}</td>
        <td>{{$klucze->ilosc_kluczy}}</td>
        <td>{{$klucze->kod_domofon}}</td>

        @endforeach
        </tr>
        </tbody>
        </table>
    </div>
    <!---->  

</div>
</body>
</html>
