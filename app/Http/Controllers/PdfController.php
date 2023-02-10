<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumenty;
use Illuminate\Support\Facades\Auth;
use App\Models\Lokale;
use App\Models\Najemcy;
use App\Models\Grzejniki;
use App\Models\Liczniki;
use App\Models\Klucze;
use App\Models\Pomieszczenia;
use App\Models\Instalacje;
use PDF;

class PdfController extends Controller
{

        public function drukowanie_zawarcia_umowy($id)
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
            $pdf = PDF::loadView('dokumenty.dokument_zawarcia_najmu',array('Dokumenty' => $Dokumenty, 'Najemca'=>$Najemca,'Kod_domofon'=>$Kod_domofon,'Suma_powierzchni'=>$Suma_powierzchni,
            'Lokal'=>$Lokal,'Pomieszczenia'=>$Pomieszczenia,'Klucze'=>$Klucze,'Instalacje'=>$Instalacje,'Grzejniki'=>$Grzejniki,'Liczniki'=>$Liczniki));
            return $pdf->download('dokument_zawarcia_najmu.pdf');
            }
        }
        public function drukowanie_zerwania_umowy($id)
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
            $pdf = PDF::loadView('dokumenty.dokument_zerwania_najmu',array('Dokumenty' => $Dokumenty, 'Najemca'=>$Najemca,'Kod_domofon'=>$Kod_domofon,'Suma_powierzchni'=>$Suma_powierzchni,
            'Lokal'=>$Lokal,'Pomieszczenia'=>$Pomieszczenia,'Klucze'=>$Klucze,'Instalacje'=>$Instalacje,'Grzejniki'=>$Grzejniki,'Liczniki'=>$Liczniki));
            return $pdf->download('dokument_zerwania_najmu.pdf');
            }
        }

}
