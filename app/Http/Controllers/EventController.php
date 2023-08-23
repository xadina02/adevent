<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventNature;
use App\Models\User;
use Illuminate\Support\Collection;

class EventController extends Controller
{
    public function form()
    {
        $members = User::where('role', '=', 'member')
                ->orderBy('id', 'desc')
                ->get();

        return view('add_event', compact('members'));
    }

    public function display()
    {
        $events = Event::orderBy('id', 'desc')
                ->get();

        return view('events', compact('events'));
    }

    public function show($id)
    {
        $data = Event::where('id', '=', $id)
                ->first(['id', 'title', 'description', 'startdate', 'starttime', 'enddate', 'endtime']);
        return view('edit_event', compact('data'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'startdate' => 'required',
            'starttime' => 'required',
            'enddate' => 'required',
            'endtime' => 'required',
        ]);

        $title = $request->input('title');
        $description = $request->input('description');
        $startdate = $request->input('startdate');
        $starttime = $request->input('starttime');
        $enddate = $request->input('enddate');
        $endtime = $request->input('endtime');
        $participants = $request->input('participants');

        $event = new Event;
        $event->title = $title;
        $event->description = $description;
        $event->startdate = $startdate;
        $event->starttime = $starttime;
        $event->enddate = $enddate;
        $event->endtime = $endtime;
        $event->save();

        $redirections = [];

        if (!empty($participants)) {
            $eventt = Event::where('title', '=', $title)->first(['id']);

            foreach ($participants as $participant) {
                $eventnature = new EventNature;
                $eventnature->event_id = $eventt['id'];
                $eventnature->member_id = $participant;
                $eventnature->save();
            }
            return redirect()->route('events/all');
        }

        // foreach ($redirections as $redirection) {
        //     // $redirection->send();
        //     return $redirection;
        // }
    }
    // public function create(Request $request)
    // {
    //     $request->validate([

    //         'title'=>'required',
    //         'description'=>'required',
    //         'startdate'=>'required',
    //         'starttime'=>'required',
    //         'enddate'=>'required',
    //         'endtime'=>'required',

    //     ]);
        
    //     $title = $request->input('title');
    //     $description = $request->input('description');
    //     $startdate = $request->input('startdate');
    //     $starttime = $request->input('starttime');
    //     $enddate = $request->input('enddate');
    //     $endtime = $request->input('endtime');
    //     $participants = $request->input('participant');

    //     $event = new Event;
    //     $event->title = $title;
    //     $event->description = $description;
    //     // $participants ID = $data['participant']; //Look for a way of collecting the values of all selected 'participant'(name) checkboxes and put in an array tht can be accessed using $data['participant']
    //     $event->startdate = $startdate;
    //     $event->starttime = $starttime;
    //     $event->enddate = $enddate;
    //     $event->endtime = $endtime;
    //     $event->save();
    //     if(!empty($participants)){
    //         $eventt = Event::where('title', '=', $title)
    //             ->first(['id']);
            
    //         foreach ($participants as $participant) {
    //             $redirections[] = redirect()->route('events/participants/create', ['id' => $eventt['id'], 'participant' => $participant]);
    //         }
    //     }
    //     else{
    //         return redirect()->route('events/all');
    //     }
    //     return $redirections;
    // }

    public function update(Request $request, $id)
    {
        // $request->validate([

        //     'name'=>'required',
        //     'email'=>'required',
        //     'phone'=>'required',

        // ]);
        
        $data = $request->all();
        if (!empty($data['title']) || !empty($data['description']) || !empty($data['startdate']) || !empty($data['starttime']) || !empty($data['enddate']) || !empty($data['endtime'])) {
            // At least one of the variables is not empty
            $event = new Event;
            $event = Event::find($id);
            if(!empty($data['title'])){
                $event->title = $data['title'];
            }
            if(!empty($data['description'])){
                $event->description = $data['description'];
            }
            if(!empty($data['startdate'])){
                $event->startdate = $data['startdate'];
            }
            if(!empty($data['starttime'])){
                $event->starttime = $data['starttime'];
            }
            if(!empty($data['enddate'])){
                $event->enddate = $data['enddate'];
            }
            if(!empty($data['endtime'])){
                $event->endtime = $data['endtime'];
            }
            $event->save();
            return redirect()->route('events/all');
        }
        else{
            return redirect()->route('events/edit', ['id' => $id]);
        }
    }
    
    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('events/all');
    }
}
