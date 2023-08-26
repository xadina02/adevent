<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewmemberMail;

class MailController extends Controller
{
    public function newmember($name, $email)
    {
        $data = [
            'subject'=>'New Member Alert!🎉',
            'body'=>'Hi '.$name.', welcome to the Adevent team!'
        ];

        Mail::to($email)->send(new NewmemberMail($data));

        return redirect()->route('members/all');
    }
}
