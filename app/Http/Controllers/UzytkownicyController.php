<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Uzytkownicy;

class UzytkownicyController extends Controller
{
   //Wyswietla dane z bazy
   public function index()
   {
        $usertype=Auth::user()->usertype;
        if(Auth::id())
        {
            if($usertype=='1')
            {
                $Uzytkownicy = Uzytkownicy::get();
                return view('uzytkownicy.index',['Uzytkownicy' => $Uzytkownicy]);
            }
            else
            {
                return view('index');
            }
        }
        else
        {
            return redirect('login');
        }
   }

   //Edytuje dane w tabeli
   public function edit($id)
   {
        $usertype=Auth::user()->usertype;
        if(Auth::id())
        {
            if($usertype=='1')
            {
                $Uzytkownik = Uzytkownicy::where('id', $id)->first();
                return view('uzytkownicy.edit')->with(['Uzytkownik' => $Uzytkownik]);
            }
        }
        else
        {
            return redirect('login');
        }
   }

   //Aktualizacja danych istniejacych w bazie
   public function update(Request $request, $id)
   {
        $usertype=Auth::user()->usertype;
        if(Auth::id())
        {
            $Uzytkownicy = Uzytkownicy::where('id', $id)->first();
            $Uzytkownicy->usertype = $request->usertype;
            $Uzytkownicy->save();

            return redirect()->route('uzytkownicy.index');
        }
        else
        {
            return redirect('login');
        }
   }

   //Usuniecie wpisu z bazy
   public function destroy($id)
   {
        $usertype=Auth::user()->usertype;
        if(Auth::id())
        {
            if($usertype=='1')
            {
            $Uzytkownicy = Uzytkownicy::where('id', $id)->first();
            $Uzytkownicy->delete();
            return redirect()->route('uzytkownicy.index');
            }
            else
            {
                return view('index');
            }
        }
        else
        {
            return redirect('login');
        }
   }

}
