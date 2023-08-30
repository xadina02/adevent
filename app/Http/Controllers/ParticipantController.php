<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewparticipantMail;
use App\Mail\PreReminderMail;
use App\Mail\ReminderMail;
use App\Models\EventNature;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ParticipantController extends Controller
{
    public function index($id)
    {
        $participants = [];
        $partsid = [];
        // $partspantemail = [];
        $event = Event::where('id','=',$id)
                    ->first(['id', 'title', 'startdate', 'starttime']);
        $parts_id = EventNature::where('event_id', '=', $id)
                ->orderBy('member_id', 'asc')
                ->get();

        foreach($parts_id as $part_id){
            $participant = User::where('id','=',$part_id['member_id'])
                    ->first(['id', 'name', 'email', 'avatar']);

            array_push($participants, $participant);
            array_push($partsid, $part_id['member_id']);

            // array_push($partspantemail, $participants['email']);
        }

        $members = User::whereNotIn('id', $partsid)
                ->where('role','=','member')
                ->orderBy('id', 'asc')
                ->get();

        // return view('participants', compact('participants', 'members', 'event'));
        $currentDateTime = Carbon::now('UTC');
        $time = Carbon::parse($event->startdate . ' ' . $event->starttime);
        $timediff = $time->diffInMinutes($currentDateTime);

        if($time->isSameDay($currentDateTime) && ($timediff < 100)){
            // dd($timediff, $currentDateTime, $time);
            return view('not_participants');
        }
        elseif($time->lessThan($currentDateTime)){
            return view('not_participants');
        }
        else{
            // dd($timediff, $currentDateTime, $time);
            return view('participants', compact('participants', 'members', 'event'));
        }
        // return view('participants');
    }

    public function remove(Request $request, $id)
    {
        $request->validate([
            'participants1' => 'required',
        ]);

        $participants = $request->input('participants1');
        foreach($participants as $participant){
            $eventnature = EventNature::where('event_id', '=', $id)->where('member_id', '=', $participant);
            $eventnature->delete();
        }
        return redirect()->route('events/participants', ['id' => $id]);
    }

    public function add(Request $request, $id)
    {
        $request->validate([
            'participants2' => 'required',
        ]);

        $participants = $request->input('participants2');
        foreach($participants as $participant){
            $eventnature = new EventNature;
            $eventnature->event_id = $id;
            $eventnature->member_id = $participant;
            $eventnature->save();
            //QUEUE FOLLOWING MAIL TO EXECUTE AFTER REDIRECTION SO USER DOESN'T HAVE TO WAIT FOR PROCESS COMPLETION TO PROCEED WITH ACTIVITES

            $user = User::where('id', '=', $participant)
                ->first(['name', 'email']);
            $event = Event::where('id', '=', $id)
                ->first(['title', 'starttime', 'startdate']);
            $data = [
                'subject'=>'Great Work 🎉!',
                'body'=>'Hello, '.$user['name'].', you were added to "'.$event['title'].'" event! Stay tuned!'
            ];
        
            Mail::to($user['email'])->send(new NewparticipantMail($data));

            $startTime = Carbon::parse($event['startdate'].' '.$event['starttime']);
            $emailTime = $event['starttime']->subMinutes(30);
            $this->schedulePreEmail($participant, $title, $emailTime);

            // Schedule email at the start time
            $this->scheduleEmail($participant, $title, $startTime);
        }
        return redirect()->route('events/participants', ['id' => $id]);
    }

    public function schedulePreEmail($participant, $title, $emailTime)
    {
        $user = User::where('id', '=', $participant)->first(['name', 'email']);
        $data = [
            'subject' => '🚨Reminder',
            'body' => $user['name'].', get ready, it`s almost time for "'.$title.'" event to begin!'
        ];
    
        Mail::to($user['email'])->later($emailTime, new PreReminderMail($data));
    }

    public function scheduleEmail($participant, $title, $emailTime)
    {
        $user = User::where('id', '=', $participant)->first(['name', 'email']);
        $data = [
            'subject' => '⚠️Meeting Time⚠️',
            'body' => $user['name'].', it`s time, hope you are set for "'.$title.'" event!'
        ];
    
        Mail::to($user['email'])->later($emailTime, new ReminderMail($data));
    }
}
