<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Liczniki;

class LicznikiController extends Controller
{
    public function edit($id)
    {
        if(Auth::id())
        {
            $Liczniki = Liczniki::where('id_lokalu', $id)->first();
            return view('lokale.liczniki.edit',['Liczniki' => $Liczniki]);
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
            $Liczniki = Liczniki::where('id_lokalu', $request->id_lokalu)->first();

            if(ISSET($Liczniki))
            {
                $Liczniki->gaz = $request->gaz;
                $Liczniki->prad = $request->prad;
                $Liczniki->ciepla_woda = $request-> ciepla_woda;
                $Liczniki->zimna_woda = $request-> zimna_woda;
            }
            else 
            {
                $Liczniki = new Liczniki;
                $Liczniki->id_lokalu = $request->id_lokalu;
                $Liczniki->gaz = $request->gaz;
                $Liczniki->prad = $request->prad;
                $Liczniki->ciepla_woda = $request-> ciepla_woda;
                $Liczniki->zimna_woda = $request-> zimna_woda;
            }

            $Liczniki->save();

            return redirect()->route('lokale.index');
        }
        else
        {
            return redirect('login');
        }
    }
}
