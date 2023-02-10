<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Instalacje;

class InstalacjeController extends Controller
{
    public function edit($id)
    {
        if(Auth::id())
        {
            $Instalacje = Instalacje::where('id_lokalu', $id)->first();
            return view('lokale.instalacje.edit',['Instalacje' => $Instalacje]);
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
            //dd($request);
            $Instalacje = Instalacje::where('id_lokalu', $request->id_lokalu)->first();

            if(ISSET($Instalacje))
            {
                $Instalacje->woda = (!request()->has('woda') == '1' ? '0' : '1');
                $Instalacje->kanalizacja = (!request()->has('kanalizacja') == '1' ? '0' : '1');
                $Instalacje->gazowa = (!request()->has('gazowa') == '1' ? '0' : '1');
                $Instalacje->elektryczna = (!request()->has('elektryczna') == '1' ? '0' : '1');
                $Instalacje->typ_ogrzewania = $request -> typ_ogrzewania;
            }
            else 
            {
                $Instalacje = new Instalacje;
                $Instalacje->id_lokalu = $request->id_lokalu;
                $Instalacje->woda = (!request()->has('woda') == '1' ? '0' : '1');
                $Instalacje->kanalizacja = (!request()->has('kanalizacja') == '1' ? '0' : '1');
                $Instalacje->gazowa = (!request()->has('gazowa') == '1' ? '0' : '1');
                $Instalacje->elektryczna = (!request()->has('elektryczna') == '1' ? '0' : '1');
                $Instalacje->typ_ogrzewania = $request -> typ_ogrzewania;
            }

            $Instalacje->save();

            return redirect()->route('lokale.index');
        }
        else
        {
            return redirect('login');
        }
    }
}
