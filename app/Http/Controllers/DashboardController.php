<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()->role=="Super Administrateur")
            return redirect('/personnals');
        return view('dashboard');
    }


}
