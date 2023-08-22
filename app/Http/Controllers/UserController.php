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

    public function validatelogin(Request $request)
    {
        $request->validate([

            'email'=>'required',
            'password'=>'required',

        ]);
        
        $data = $request->all();
        // dd($data);

        $details = User::where('role', '=', 'admin')
                ->first(['email', 'password']);

        if(strcmp($data['email'], $details['email']) == 0 && strcmp($data['password'], $details['password']) == 0){
            return redirect()->route('members/all');
        }
        else{
            return redirect()->route('homepage');
        }
    }

    public function newpassword(Request $request)
    {
        $request->validate([

            'email'=>'required',
            'password'=>'required',
            'cpassword'=>'required',

        ]);
        
        $data = $request->all();
        // dd($data);

        $details = User::where('role', '=', 'admin')
                ->first(['email']);
        
        if(strcmp($data['email'], $details['email']) == 0 && strcmp($data['password'], $data['cpassword']) == 0){

            $admin = User::where('role', '=', 'admin')
                ->update(['password'=> $data['cpassword']]);

            return redirect()->route('signup');
        }
        else{
            return redirect()->route('forgotpasswd');
        }
    }
}
