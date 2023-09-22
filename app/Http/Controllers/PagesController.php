<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function home(): \Illuminate\Contracts\View\View
    {
        return view('homepage');
    }

    public function signup(): \Illuminate\Contracts\View\View
    {
        return view('login');
    }

    public function fpassd(): \Illuminate\Contracts\View\View
    {
        return view('forgot_password');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Session::forget('logstate');

        return redirect()->route('homepage');
    }
}
