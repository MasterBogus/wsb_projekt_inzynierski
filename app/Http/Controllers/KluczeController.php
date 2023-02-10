<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Klucze;

class KluczeController extends Controller
{
    //Wyswietla dane z bazy
    public function index()
    {
        if(Auth::id())
        {
            $Klucze = Klucze::get();
            return view('lokale.klucze.index',['Klucze' => $Klucze]);
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
            return view('lokale.klucze.create');
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
            $Klucz = Klucze::where('id_klucza', $id)->first();
            return view('lokale.klucze.edit')->with(['Klucz' => $Klucz]);
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
            $Klucze = new Klucze;
            $Klucze->id_lokalu = $request->id_lokalu;
            $Klucze->typ_klucza = $request->typ_klucza;
            $Klucze->ilosc_kluczy = $request->ilosc_kluczy;
            $Klucze->kod_domofon = $request->kod_domofon;
            $Klucze->save();

            return redirect()->route('lokale.klucze.index');
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
            $Klucze = Klucze::where('id_klucza', $id)->first();
            $Klucze->id_lokalu = $request->id_lokalu;
            $Klucze->typ_klucza = $request->typ_klucza;
            $Klucze->ilosc_kluczy = $request->ilosc_kluczy;
            $Klucze->kod_domofon = $request->kod_domofon;
            $Klucze->save();

            return redirect()->route('lokale.klucze.index');
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
            $Klucze = Klucze::where('id_klucza', $id)->first();
            $Klucze->delete();
            return redirect()->route('lokale.klucze.index');
        }
        else
        {
            return redirect('login');
        }
    }
    
}
