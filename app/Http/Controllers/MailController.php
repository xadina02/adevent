<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewmemberMail;
use App\Models\User;
use App\Models\Event;
use App\Mail\NewparticipantMail;

class MailController extends Controller
{
    public function newmember($name, $email)
    {
        $data = [
            'subject'=>'New Member Alert!🎉',
            'body'=>'Hi, '.$name.', welcome to the Adevent team!'
        ];

        Mail::to($email)->send(new NewmemberMail($data));

        return redirect()->route('members/all');
    }

    public function newparticipant(Request $request)
    {
        $participantsString = $request->query('participants');
        $participants = explode(',', $participantsString);
        $id = $request->query('id');

        foreach($participants as $participant){
            $user = User::where('id', '=', $participant)
            ->first(['name', 'email']);
        
            $event = Event::where('id', '=', $id)
            ->first(['title']);

            $data = [
                'subject'=>'Great Work 🎉!',
                'body'=>'Hello, '.$user['name'].', you were added to "'.$event['title'].'" event! Stay tuned!'
            ];
        
            Mail::to($user['email'])->send(new NewparticipantMail($data));
        }
        return redirect()->route('events/participants', ['id' => $id]);
    }

    public function newparticipantt(Request $request)
    {
        $participantsString = $request->query('participants');
        $participants = explode(',', $participantsString);
        $id = $request->query('id');

        foreach($participants as $participant){
            $user = User::where('id', '=', $participant)
            ->first(['name', 'email']);
        
            $event = Event::where('id', '=', $id)
            ->first(['title']);

            $data = [
                'subject'=>'Great Work 🎉!',
                'body'=>'Hello, '.$user['name'].', you were added to "'.$event['title'].'" event! Stay tuned!'
            ];
        
            Mail::to($user['email'])->send(new NewparticipantMail($data));
        }
        return redirect()->route('events/all');
    }
}
