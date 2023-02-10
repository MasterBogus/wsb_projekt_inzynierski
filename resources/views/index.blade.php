<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">
    <meta charset="UTF-8">
    <title>ZKZL</title>
</head>

<body>
    

    
    <div class="sidebar">
    <header>ZKZL</header>
    
    <ul>
    <li><a href="/dashboard"><i class="fa fa-th-large"></i>Dashboard</a></li>
    <li><a href="/lokale" ><i class="fa fa-home"></i>Lokale</a></li>
    <li><a href="/najemcy"><i class="fa fa-address-book"></i>Najemcy</a></li>
    <li><a href="/dokumenty"><i class="fa fa-file-text"></i>Dokumenty</a></li>
    
    </ul>
</div>
<div class="search-bar">

        <div class="wrap">
            <div class="search">
               <input type="text" class="searchTerm" placeholder="Szukaj">
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

</body>
</html>
