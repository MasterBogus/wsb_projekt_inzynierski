<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/login1.css')}}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>

<div class="container_reg">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <p class="heading">Rejestracja nowego użytkownika</p>
        <p><button type="submit"><a href="/uzytkownicy">Powrót</a></button></p>

        <!-- Name -->
        <div class="box">
            <p>Imię i nazwisko</p>
            <div>
            <input id="name" type="text" name="name" placeholder="Wprowadź imię i nazwisko" :value="old('name')" required autofocus />
</div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div><br>
        <!-- Email Address -->
        <div class="box">
            <p>Email:</p>
            <div>
            <input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Wprowadź adres e-mail" :value="old('email')" required />
</div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div><br>

        <!-- Password -->
        <div class="box">
            <p>Hasło:</p>
            <div>
            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="Wprowadź hasło"
                            required autocomplete="new-password" />
</div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div><br>

        <!-- Confirm Password -->
        <div class="box">
            <p>Powtórz hasło:</p>
<div>
            <input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            placeholder="Wprowadź ponownie hasło"
                            name="password_confirmation" required />
                            
</div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div><br>

            <button class="loginBtn">
                {{ __('Zarejestruj') }}
            <button>
        </div>
    </form>
</div>

</body>
</html>