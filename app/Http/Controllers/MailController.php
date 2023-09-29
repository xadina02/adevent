<?php

namespace App\Http\Controllers;

use App\Mail\NewmemberMail;
use App\Mail\NewparticipantMail;
use App\Mail\PreReminderMail;
use App\Mail\ReminderMail;
use App\Models\Event;
// use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use App\Models\EventNature;

class MailController extends Controller
{
    public function newmember($name, $email): \Illuminate\Http\RedirectResponse
    {
        $book = ['cahier', 'livre'];
        $data = [
            'subject' => 'New Member Alert!🎉',
            'body' => 'Hi, ' . $name . ', welcome to the Adevent team!',
        ];

        Mail::to($email)->send(new NewmemberMail($data));

        return redirect()->route('members/all');
    }

    public function newparticipant(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Participant addition
        $participantsString = $request->query('participants');
        $participants = explode(',', $participantsString);
        $id = $request->query('id');

        $event = Event::where('id', '=', $id)
            ->first(['title', 'startdate', 'starttime']);

        foreach ($participants as $participant) {
            $user = User::where('id', '=', $participant)
                ->first(['name', 'email']);

            $data = [
                'subject' => 'Great Work 🎉!',
                'body' => 'Hello, ' . $user['name'] . ', you were added to "' . $event['title'] . '" event! Stay tuned!',
            ];

            Mail::to($user['email'])->send(new NewparticipantMail($data));

            // Change the code into a cron job scheduling mechanism

            // $startTime = Carbon::parse($event['startdate'] . ' ' . $event['starttime']);
            // $startTime = Carbon::parse($event['startdate'] . ' ' . $event['starttime'])->subHour();
            // $emailTime = $startTime->subMinutes(30);

            // Schedule email 30 minutes before the start time
            // $this->schedulePreEmail($participant, $event['title'], $emailTime);

            // Schedule email at the start time
            // $this->scheduleEmail($participant, $event['title'], $startTime);
        }

        return redirect()->route('events/participants', ['id' => $id]);
    }

    public function newparticipantt(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Event creation
        $participantsString = $request->query('participants');
        $participants = explode(',', $participantsString);
        $id = $request->query('id');

        $event = Event::where('id', '=', $id)
            ->first(['title', 'startdate', 'starttime']);

        foreach ($participants as $participant) {
            $user = User::where('id', '=', $participant)
                ->first(['name', 'email']);

            $data = [
                'subject' => 'Great Work 🎉!',
                'body' => 'Hello, ' . $user['name'] . ', you were added to "' . $event['title'] . '" event! Stay tuned!',
            ];

            // $startTime = Carbon::parse($event['startdate'] . ' ' . $event['starttime']);
            // $startTime = Carbon::parse($event['startdate'] . ' ' . $event['starttime'])->subHour();
            // $emailTime = $startTime->subMinutes(30);

            Mail::to($user['email'])->send(new NewparticipantMail($data));

            // Schedule email 30 minutes before the start time
            // $this->schedulePreEmail($participant, $event['title'], $emailTime);

            // Schedule email at the start time
            // $this->scheduleEmail($participant, $event['title'], $startTime);
        }

        return redirect()->route('events/all');
    }

    // public function schedulePreEmail($participant, $title, $emailTime)
    // {
    //     $user = User::where('id', '=', $participant)->first(['name', 'email']);
    //     $data = [
    //         'subject' => '🚨Reminder',
    //         'body' => $user['name'] . ', get ready, it is almost time for "' . $title . '" event to begin! That is in 30 minutes from now'
    //     ];

    //     Mail::to($user['email'])->later($emailTime, new PreReminderMail($data));
    // }

    // public function scheduleEmail($participant, $title, $startTime)
    // {
    //     $user = User::where('id', '=', $participant)->first(['name', 'email']);
    //     $data = [
    //         'subject' => '⚠️Meeting Time⚠️',
    //         'body' => $user['name'] . ', it is time, hope you are set for "' . $title . '" event?!'
    //     ];

    //     Mail::to($user['email'])->later($startTime, new ReminderMail($data));
    // }
}
