<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Grzejniki;

class GrzejnikiController extends Controller
{
    public function edit($id)
    {
        if(Auth::id())
        {
            $Grzejniki = Grzejniki::where('id_lokalu', $id)->first();
            return view('lokale.grzejniki.edit',['Grzejniki' => $Grzejniki]);
        }
        else
        {
            return redirect('login');
        }
    }

    public function store(Request $request)
    {
        if(Auth::id())
        {
            $Grzejniki = Grzejniki::where('id_lokalu', $request->id_lokalu)->first();

            if(ISSET($Grzejniki))
            {
                $Grzejniki->rodzaj_grzejnikow = $request->rodzaj_grzejnikow;
                $Grzejniki->ilosc_grzejnikow = $request->ilosc_grzejnikow;
            }
            else 
            {
                $Grzejniki = new Grzejniki;
                $Grzejniki->id_lokalu = $request->id_lokalu;
                $Grzejniki->rodzaj_grzejnikow = $request->rodzaj_grzejnikow;
                $Grzejniki->ilosc_grzejnikow = $request->ilosc_grzejnikow;
            }

            $Grzejniki->save();

            return redirect()->route('lokale.index');
        }
        else
        {
            return redirect('login');
        }
    }
}
