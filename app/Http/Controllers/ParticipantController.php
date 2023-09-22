<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventNature;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ParticipantController extends Controller
{
    public function index($id): \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View
    {
        if (Session::has('logstate')) {
            $participants = [];
            $partsid = [];
            // $partspantemail = [];
            $event = Event::where('id', '=', $id)
                ->first(['id', 'title', 'startdate', 'starttime']);
            $parts_id = EventNature::where('event_id', '=', $id)
                ->orderBy('member_id', 'asc')
                ->get();

            foreach ($parts_id as $part_id) {
                $participant = User::where('id', '=', $part_id['member_id'])
                    ->first(['id', 'name', 'email', 'avatar']);

                array_push($participants, $participant);
                array_push($partsid, $part_id['member_id']);

                // array_push($partspantemail, $participants['email']);
            }

            $members = User::whereNotIn('id', $partsid)
                ->where('role', '=', 'member')
                ->orderBy('id', 'asc')
                ->get();

            // return view('participants', compact('participants', 'members', 'event'));
            $currentDateTime = Carbon::now('UTC');
            $time = Carbon::parse($event->startdate.' '.$event->starttime);
            $timediff = $time->diffInMinutes($currentDateTime);

            if ($time->isSameDay($currentDateTime) && ($timediff < 100)) {
                // dd($timediff, $currentDateTime, $time);
                return view('not_participants');
            } elseif ($time->lessThan($currentDateTime)) {
                return view('not_participants');
            } else {
                // dd($timediff, $currentDateTime, $time);
                return view('participants', compact('participants', 'members', 'event'));
            }
            // return view('participants');
        } else {
            return redirect()->route('homepage');
        }
    }

    public function remove(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        if (Session::has('logstate')) {
            $request->validate([
                'participants1' => 'required',
            ]);

            $participants = $request->input('participants1');
            foreach ($participants as $participant) {
                $eventnature = EventNature::where('event_id', '=', $id)->where('member_id', '=', $participant);
                $eventnature->delete();
            }

            return redirect()->route('events/participants', ['id' => $id]);
        } else {
            return redirect()->route('homepage');
        }
    }

    public function add(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        if (Session::has('logstate')) {
            $request->validate([
                'participants2' => 'required',
            ]);

            $participants = $request->input('participants2');
            foreach ($participants as $participant) {
                $eventnature = new EventNature();
                $eventnature->event_id = $id;
                $eventnature->member_id = $participant;
                $eventnature->save();
            }

            return redirect()->route('mail/send/event/participant', ['participants' => implode(',', $participants), 'id' => $id]);
        } else {
            return redirect()->route('homepage');
        }
    }
}
