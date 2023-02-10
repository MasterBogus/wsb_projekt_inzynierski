<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dokumenty;
use App\Models\Najemcy;
use App\Models\Lokale;
use App\Models\Klucze; 
use App\Models\Pomieszczenia;
use App\Models\Instalacje;
use App\Models\Grzejniki;
use App\Models\Liczniki;

class DokumentyController extends Controller
{
    
    //Wyswietla dane z bazy
    public function index()
    {
        if(Auth::id())
        {
            $Dokumenty = Dokumenty::get();

            return view('dokumenty.index', compact('Dokumenty'));
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
            return view('dokumenty.create');
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
            $Dokument = Dokumenty::where('id_dokumentu', $id)->first();
            return view('dokumenty.edit')->with(['Dokument' => $Dokument]);
        }
        else
        {
            return redirect('login');
        }
        
    }
        //Edytuje dane w tabeli
        public function edit_dokument_lokalu($id)
        {   
            if(Auth::id())
            {   
                $Lokale=Lokale::all();
                $Dokument = Dokumenty::where('id_dokumentu', $id)->first();
                return view('dokumenty.edit_dokument_lokalu', compact('Dokument','Lokale'));
                return view('dokumenty.edit_dokument_lokalu', compact('Dokument','Najemcy'));
            }
            else
            {
                return redirect('login');
            }
            
        }

            //Edytuje dane w tabeli
        public function edit_dokument_najemcy($id)
        {   
            if(Auth::id())
            {
                $Najemcy=Najemcy::all();
                $Dokument = Dokumenty::where('id_dokumentu', $id)->first();
                return view('dokumenty.edit_dokument_najemcy', compact('Dokument','Najemcy'));
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
            $Dokumenty = new Dokumenty;
            $Dokumenty->typ_dokumentu = $request->typ_dokumentu;
            $Dokumenty->data_rozpoczecia_okresu_waznosci = $request->data_rozpoczecia_okresu_waznosci;
            $Dokumenty->data_zakonczenia_okresu_waznosci = $request->data_zakonczenia_okresu_waznosci;
            $Dokumenty->data_zakonczenia_najmu = $request->data_zakonczenia_najmu;
            $Dokumenty->identyfikator_wewnetrzny = $request->identyfikator_wewnetrzny;
            $Dokumenty->save();

            return redirect()->route('dokumenty.index');
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
            $Dokumenty = Dokumenty::where('id_dokumentu', $id)->first();
            $Dokumenty->typ_dokumentu = $request->typ_dokumentu;
            $Dokumenty->data_rozpoczecia_okresu_waznosci = $request->data_rozpoczecia_okresu_waznosci;
            $Dokumenty->data_zakonczenia_okresu_waznosci = $request->data_zakonczenia_okresu_waznosci;
            $Dokumenty->data_zakonczenia_najmu = $request->data_zakonczenia_najmu;
            $Dokumenty->identyfikator_wewnetrzny = $request->identyfikator_wewnetrzny;
            $Dokumenty->save();

            return redirect()->route('dokumenty.index');
        }
        else
        {
            return redirect('login');
        }
    }
    public function update_dokument_lokalu(Request $request, $id)
    {
        if(Auth::id())
        {
            $Dokumenty = Dokumenty::where('id_dokumentu', $id)->first();
            $Dokumenty->id_lokalu = $request->id_lokalu;
            $Dokumenty->save();

            return redirect('dokumenty');
        }
        else
        {
            return redirect('login');
        }
    }
    public function update_dokument_najemcy(Request $request, $id)
    {
        if(Auth::id())
        {
            $Dokumenty = Dokumenty::where('id_dokumentu', $id)->first();
            $Dokumenty->id_najemcy = $request->id_najemcy;
            $Dokumenty->save();

            return redirect('dokumenty');
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
            $Dokumenty = Dokumenty::where('id_dokumentu', $id)->first();
            $Dokumenty->delete();
            return redirect()->route('dokumenty.index');
        }
        else
        {
            return redirect('login');
        }
    }
    
    public function print_wybor($id)
    {
        if(Auth::id())
        {
            $Dokumenty = Dokumenty::where('id_dokumentu', $id)->first();
            return view('dokumenty.print_wybor',['Dokumenty' => $Dokumenty]);
        }
        else
        {
            return redirect('login');
        }
    }

    public function zawieranie_umowy($id)
    {
        if(Auth::id())
        {   
            $Dokumenty = Dokumenty::where('id_dokumentu', $id)->first();
            $Najem=$Dokumenty->id_najemcy;
            $Lok=$Dokumenty->id_lokalu;
            $Lokal=Lokale::where('id_lokalu',$Lok)->first();
            $Kod_domofon=Klucze::where('id_lokalu',$Lok)->first();
            $Pomieszczenia=Pomieszczenia::where('id_lokalu','=',$Lok)->get();
            $Klucze=Klucze::where('id_lokalu','=',$Lok)->get();
            $Suma_powierzchni=Pomieszczenia::where('id_lokalu','=',$Lok)->sum('powierzchnia');
            $Instalacje=Instalacje::where('id_lokalu',$Lok)->first();
            $Grzejniki=Grzejniki::where('id_lokalu',$Lok)->first();
            $Liczniki=Liczniki::where('id_lokalu',$Lok)->first();
            
            $Najemca=Najemcy::where('id_najemcy',$Najem)->first();

            return view('dokumenty.zawieranie_umowy', compact('Dokumenty','Najemca','Lokal','Kod_domofon','Pomieszczenia','Suma_powierzchni','Instalacje','Grzejniki','Liczniki','Klucze'));
        }
        else
        {
            return redirect('login');
        } 
    }
    public function zerwanie_umowy($id)
    {
        if(Auth::id())
        { 
            $Dokumenty = Dokumenty::where('id_dokumentu', $id)->first();
            $Najem=$Dokumenty->id_najemcy;
            $Lok=$Dokumenty->id_lokalu;
            $Lokal=Lokale::where('id_lokalu',$Lok)->first();
            $Kod_domofon=Klucze::where('id_lokalu',$Lok)->first();
            $Pomieszczenia=Pomieszczenia::where('id_lokalu','=',$Lok)->get();
            $Klucze=Klucze::where('id_lokalu','=',$Lok)->get();
            $Suma_powierzchni=Pomieszczenia::where('id_lokalu','=',$Lok)->sum('powierzchnia');
            $Instalacje=Instalacje::where('id_lokalu',$Lok)->first();
            $Grzejniki=Grzejniki::where('id_lokalu',$Lok)->first();
            $Liczniki=Liczniki::where('id_lokalu',$Lok)->first();
            
            $Najemca=Najemcy::where('id_najemcy',$Najem)->first();

            return view('dokumenty.zerwanie_umowy', compact('Dokumenty','Najemca','Lokal','Kod_domofon','Pomieszczenia','Suma_powierzchni','Instalacje','Grzejniki','Liczniki','Klucze'));
        
        }
        else
        {
            return redirect('login');
        } 
    }
}