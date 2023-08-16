<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    public function form()
    {
        return view('register_member');
    }

    public function display()
    {
        $members = User::where('role', '=', 'member')
                ->orderBy('id', 'desc')
                ->get();

        return view('members', compact('members'));
    }

    public function show()
    {
        // return edit member view
    }

    public function create()
    {
        // create member in database
    }

    public function update()
    {
        // update member records in database
    }
    
    public function delete()
    {
        // delete member from database
    }
}
