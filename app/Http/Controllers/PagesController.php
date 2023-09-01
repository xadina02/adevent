<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function home()
    {   
        return view('homepage');
    }

    public function signup()
    {
        return view('login');
    }

    public function fpassd()
    {
        return view('forgot_password');
    }

    public function logout()
    {
        Session::forget('logstate');
        return redirect()->route('homepage');
    }
}
