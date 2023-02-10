<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Najemcy;

class NajemcyController extends Controller
{
    //Wyswietla dane z bazy
    public function index()
    {
        if(Auth::id())
        {
            $Najemcy = Najemcy::get();
            return view('najemcy.index',['Najemcy' => $Najemcy]);
        }
        else
        {
            return redirect('login');
        }
    }

    //Zwraca widok create
    public function create()
    {
        if(Auth::id())
        {
            return view('najemcy.create');
        }
        else
        {
            return redirect('login');
        }
    }

    //Edytuje dane w tabeli
    public function edit($id)
    {
        if(Auth::id())
        {
            $Najemca = Najemcy::where('id_najemcy', $id)->first();
            return view('najemcy.edit')->with(['Najemca' => $Najemca]);
        }
        else
        {
            return redirect('login');
        }
    }

    //Obsluga formu dla dodawania nowych rekordow
    public function store(Request $request)
    {
        if(Auth::id())
        {
            $Najemcy = new Najemcy;
            $Najemcy->imie_najemcy = $request->imie_najemcy;
            $Najemcy->nazwisko_najemcy = $request->nazwisko_najemcy;
            $Najemcy->kod_pocztowy_najemcy = $request->kod_pocztowy_najemcy;
            $Najemcy->miasto_najemcy = $request->miasto_najemcy;
            $Najemcy->adres_najemcy = $request->adres_najemcy;
            $Najemcy->nr_pesel = $request->nr_pesel;
            $Najemcy->nr_tel_najemcy = $request->nr_tel_najemcy;
            $Najemcy->save();

            return redirect()->route('najemcy.index');
        }
        else
        {
            return redirect('login');
        }
    }

    //Aktualizacja danych istniejacych w bazie
    public function update(Request $request, $id)
    {
        if(Auth::id())
        {
            $Najemcy = Najemcy::where('id_najemcy', $id)->first();
            $Najemcy->imie_najemcy = $request->imie_najemcy;
            $Najemcy->nazwisko_najemcy = $request->nazwisko_najemcy;
            $Najemcy->kod_pocztowy_najemcy = $request->kod_pocztowy_najemcy;
            $Najemcy->miasto_najemcy = $request->miasto_najemcy;
            $Najemcy->adres_najemcy = $request->adres_najemcy;
            $Najemcy->nr_pesel = $request->nr_pesel;
            $Najemcy->nr_tel_najemcy = $request->nr_tel_najemcy;
            $Najemcy->save();

            return redirect()->route('najemcy.index');
        }
        else
        {
            return redirect('login');
        }
    }

    //Usuniecie wpisu z bazy
    public function destroy($id)
    {
        if(Auth::id())
        {
            $Najemcy = Najemcy::where('id_najemcy', $id)->first();
            $Najemcy->delete();
            return redirect()->route('najemcy.index');
        }
        else
        {
            return redirect('login');
        }
    }
}
