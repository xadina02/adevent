<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\EventNature;
use App\Models\User;
use Illuminate\Support\Collection;

// $idd = 19;
class UserController extends Controller
{
    public function form()
    {
        if(Session::has('logstate')){
            return view('register_member');
        }
        else{
            return redirect()->route('homepage');
        }
    }

    public function display()
    {   
        if(Session::has('logstate')){
            $members = User::where('role', '=', 'member')
                    ->orderBy('id', 'desc')
                    ->get();

            return view('members', compact('members'));
        }
        else{
            return redirect()->route('homepage');
        }
    }

    public function show($id)
    {
        if(Session::has('logstate')){
            $data = User::where('id', '=', $id)
                    ->first(['id', 'name', 'email', 'phone']);
            return view('edit_member', compact('data'));
        }
        else{
            return redirect()->route('homepage');
        }
    }

    public function create(Request $request)
    {
        if(Session::has('logstate')){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',
                'phone' => 'required',
                'avatar' => 'required|image',
            ], [
                'email.regex' => 'The email must be a valid email address of the format example@service.xx!',
            ]);

            $data = $request->all();
            
            // Retrieve the blob contents of the image file
            // $avatarData = file_get_contents($data['avatar']->getRealPath());

            $member = new User;
            $member->name = $data['name'];
            $member->email = $data['email'];
            $member->phone = $data['phone'];
            // $member->avatar = $avatarData;
            $member->avatar = file_get_contents($data['avatar']);
            $member->role = "member";
            $member->save();

            // return redirect()->route('members/all');
            return redirect()->route('mail/send/member',['name' => $data['name'], 'email' => $data['email']]);
        }
        else{
            return redirect()->route('homepage');
        }
    }

    public function update(Request $request, $id)
    {
        if(Session::has('logstate')){
            // $request->validate([

            //     'name'=>'required',
            //     'email'=>'required',
            //     'phone'=>'required',

            // ]);
            
            $data = $request->all();
            if (!empty($data['name']) || !empty($data['email']) || !empty($data['phone'])) {
                // At least one of the variables is not empty
                $member = new User;
                $member = User::find($id);
                if(!empty($data['name'])){
                    $member->name = $data['name'];
                }
                if(!empty($data['email'])){
                    $member->email = $data['email'];
                }
                if(!empty($data['phone'])){
                    $member->phone = $data['phone'];
                }
                $member->save();
                return redirect()->route('members/all');
            }
            else{
                Session::put('failure', 'Both fields cannot be empty!!');
                return redirect()->route('members/edit', ['id' => $id]);
            }
        }
        else{
            return redirect()->route('homepage');
        }
    }
    
    public function remove($id)
    {
        if(Session::has('logstate')){
            $member = User::find($id);
            $member->delete();
            
            $eventnature = EventNature::pluck('member_id')->all();

            if (in_array($id, $eventnature)) {
                $eventnature1 = EventNature::where('member_id', '=', $id);
                $eventnature1->delete();
            }

            return redirect()->route('members/all');
        }
        else{
            return redirect()->route('homepage');
        }
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
            Session::put('logstate', 'true');
            return redirect()->route('events/all');
        }
        else{
            Session::put('failure', "Sorry! Your credentials don't match our records. Try again!");
            return redirect()->route('signup');
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
