<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pomieszczenia;

class PomieszczeniaController extends Controller
{
    //Wyswietla dane z bazy
    public function index()
    {
        if(Auth::id())
        {
            $Pomieszczenia = Pomieszczenia::get();
            return view('lokale.pomieszczenia.index',['Pomieszczenia' => $Pomieszczenia]);
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
            return view('lokale.pomieszczenia.create');
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
            $Pomieszczenie = Pomieszczenia::where('id_pomieszczenia', $id)->first();
            return view('lokale.pomieszczenia.edit')->with(['Pomieszczenie' => $Pomieszczenie]);
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
            $Pomieszczenia = new Pomieszczenia;
            $Pomieszczenia->id_lokalu = $request->id_lokalu;
            $Pomieszczenia->nazwa_pomieszczenia = $request->nazwa_pomieszczenia;
            $Pomieszczenia->powierzchnia = $request->powierzchnia;
            $Pomieszczenia->save();

            return redirect()->route('lokale.pomieszczenia.index');
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
            $Pomieszczenia = Pomieszczenia::where('id_pomieszczenia', $id)->first();
            $Pomieszczenia->id_lokalu = $request->id_lokalu;
            $Pomieszczenia->nazwa_pomieszczenia = $request->nazwa_pomieszczenia;
            $Pomieszczenia->powierzchnia = $request->powierzchnia;
            $Pomieszczenia->save();

            return redirect()->route('lokale.pomieszczenia.index');
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
            $Pomieszczenia = Pomieszczenia::where('id_pomieszczenia', $id)->first();
            $Pomieszczenia->delete();
            return redirect()->route('lokale.pomieszczenia.index');
        }
        else
        {
            return redirect('login');
        }
    }
    
}
