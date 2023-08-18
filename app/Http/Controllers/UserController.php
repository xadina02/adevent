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

    public function show($id)
    {
        $data = User::where('id', '=', $id)
                ->first(['id', 'name', 'email', 'phone']);
        return view('edit_member', compact('data'));
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
