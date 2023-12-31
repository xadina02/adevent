<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventNature;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function form(): \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View
    {
        if (Session::has('logstate')) {
            $members = User::where('role', '=', 'member')
                ->orderBy('id', 'desc')
                ->get();

            return view('add_event', compact('members'));
        } else {
            return redirect()->route('homepage');
        }
    }

    public function display(): \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View
    {
        if (Session::has('logstate')) {
            $events = Event::orderBy('id', 'desc')
                ->get();

            return view('events', compact('events'));
        } else {
            return redirect()->route('homepage');
        }
    }

    public function show($id): \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View
    {
        if (Session::has('logstate')) {
            $data = Event::where('id', '=', $id)
                ->first(['id', 'title', 'description', 'startdate', 'starttime', 'enddate', 'endtime']);

            $currentDateTime = Carbon::now('UTC');
            $time = Carbon::parse($data->startdate . ' ' . $data->starttime);
            $timediff = $time->diffInMinutes($currentDateTime);

            if ($time->isSameDay($currentDateTime) && ($timediff < 100)) {
                // dd($timediff, $currentDateTime, $time);
                return view('not_edit_event', compact('data'));
            } elseif ($time->lessThan($currentDateTime)) {
                return view('not_edit_event', compact('data'));
            } else {
                // dd($timediff, $currentDateTime, $time);
                return view('edit_event', compact('data'));
            }
        } else {
            return redirect()->route('homepage');
        }
    }

    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        if (Session::has('logstate')) {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'startdate' => 'required|date',
                'starttime' => 'required',
                'enddate' => 'required|date|after_or_equal:startdate',
                'endtime' => 'required|after:starttime',
                'participants' => 'required|array|min:1', // Ensure at least one participant is selected
                'participants.*' => 'integer', // Validate each participant ID
            ], [
                'enddate.after_or_equal' => 'The end date must be equal to or after the start date! ',
                'endtime.after' => 'The end time must be greater than the start time!',
                'participants.required' => 'Please select at least one participant.',
                'participants.min' => 'Please select at least one participant.',
                'participants.*.integer' => 'Invalid participant ID.',
            ]);

            $title = $request->input('title');
            $description = $request->input('description');
            $startdate = $request->input('startdate');
            $starttime = $request->input('starttime');
            $enddate = $request->input('enddate');
            $endtime = $request->input('endtime');
            $participants = $request->input('participants');

            $event = new Event();
            $event->title = $title;
            $event->description = $description;
            $event->startdate = $startdate;
            $event->starttime = $starttime;
            $event->enddate = $enddate;
            $event->endtime = $endtime;
            $event->save();

            $eventt = Event::where('title', '=', $title)->first(['id']);

            foreach ($participants as $participant) {
                $eventnature = new EventNature();
                $eventnature->event_id = $eventt['id'];
                $eventnature->member_id = $participant;
                $eventnature->save();
            }

            return redirect()->route('mail/send/add/participant', ['participants' => implode(',', $participants), 'id' => $eventt['id']]);
        } else {
            return redirect()->route('homepage');
        }
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        if (Session::has('logstate')) {
            $data = $request->all();
            if (! empty($data['title']) || ! empty($data['description'])) {
                // At least one of the variables is not empty
                new Event();
                $event = Event::find($id);
                if (! empty($data['title'])) {
                    $event->title = $data['title'];
                }
                if (! empty($data['description'])) {
                    $event->description = $data['description'];
                }
                $event->save();

                return redirect()->route('events/all');
            } else {
                Session::put('failure', 'Both fields cannot be empty!!');

                return redirect()->route('events/edit', ['id' => $id]);
            }
        } else {
            return redirect()->route('homepage');
        }
    }

    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        if (Session::has('logstate')) {
            $event = Event::find($id);
            $event->delete();

            $eventnature = EventNature::pluck('event_id')->all();

            if (in_array($id, $eventnature)) {
                $eventnature1 = EventNature::where('event_id', '=', $id);
                $eventnature1->delete();
            }

            return redirect()->route('events/all');
        } else {
            return redirect()->route('homepage');
        }
    }
}
