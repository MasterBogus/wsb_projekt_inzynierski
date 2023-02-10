<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lokale;
use App\Models\Grzejniki;
use App\Models\Liczniki;
use App\Models\Klucze;
use App\Models\Pomieszczenia;
use App\Models\Instalacje;


class LokaleController extends Controller
{
    //Wyswietla dane z bazy
    public function index()
    {
        if(Auth::id())
        {
            $Lokale = Lokale::get();
            return view('lokale.index',['Lokale' => $Lokale]);
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
            return view('lokale.create');
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
            $Lokal = Lokale::where('id_lokalu', $id)->first();
            return view('lokale.edit')->with(['Lokal' => $Lokal]);
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
            $Lokale = new Lokale;
            $Lokale->adres_lokalu = $request->adres_lokalu;
            $Lokale->kod_pocztowy_lokalu = $request->kod_pocztowy_lokalu;
            $Lokale->kondygnacja = $request->kondygnacja;
            $Lokale->stan_prawny = $request->stan_prawny;
            $Lokale->winda = (!request()->has('winda') == '1' ? '0' : '1');
            $Lokale->przyst_niepelnospr = (!request()->has('przyst_niepelnospr') == '1' ? '0' : '1');
            $Lokale->save();

            return redirect()->route('lokale.index');
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
            $Lokale = Lokale::where('id_lokalu', $id)->first();
            $Lokale->adres_lokalu = $request->adres_lokalu;
            $Lokale->kod_pocztowy_lokalu = $request->kod_pocztowy_lokalu;
            $Lokale->kondygnacja = $request->kondygnacja;
            $Lokale->stan_prawny = $request->stan_prawny;
            $Lokale->winda = $request->winda;
            $Lokale->przyst_niepelnospr = $request->przyst_niepelnospr;
            $Lokale->save();

            return redirect()->route('lokale.index');
        }
        else
        {
            return redirect('login');
        }
    }


    //Szczegoly lokalu
    public function detail(Request $request, $id)
    {
        if(Auth::id())
        {
            $pomieszczenia=pomieszczenia::where('id_lokalu','=',$id)->get();
            $klucze=klucze::where('id_lokalu','=',$id)->get();
            $grzejniki=grzejniki::find($id);
            $liczniki=liczniki::find($id);
            $instalacje=instalacje::find($id);
            return view('lokale.detail', compact('grzejniki','liczniki','instalacje','pomieszczenia','klucze'));
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
            $Lokale = Lokale::where('id_lokalu', $id)->first();
            $Lokale->delete();
            return redirect()->route('lokale.index');
        }
        else
        {
            return redirect('login');
        }
    }
}
