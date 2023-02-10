<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/login1.css')}}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
    

<div class="container">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

   <p class="heading">Logowanie</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div  class="box">
            <p>Adres e-mail:</p>
            <div>
            <input id="email"  type="text" name="email" placeholder="Wprowadź adres e-mail" :value="old('email')" required autofocus >
            
</div>
<x-input-error :messages="$errors->get('email')" class="mt-0 text-sm" />
        </div><BR>

        <!-- Password -->
        
        <div class="box">
            <p>Hasło:</p>

            <input id="password" 
                            type="password"
                            name="password"
                            placeholder="Wprowadź hasło"
                            required autocomplete="current-password" />

           
        </div><BR><br>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Pamiętaj mnie') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Zapomniałeś hasła?') }}
                </a>
            @endif

            
            <button class="loginBtn">
                {{ __('Zaloguj') }}
</button>
        </div>
    </form>
</div>
</div>

    
</body>
</html>
