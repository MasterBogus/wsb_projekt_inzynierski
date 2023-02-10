<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;


class HomeController extends Controller
{
    //Controller do przekierowywania logowania
    public function dashboard()
    {
        $usertype=Auth::user()->usertype;


        if($usertype=='1')
        {   

            return view('admin_index');
        }
        else
        {


            return view('index');
        }
    }





}
