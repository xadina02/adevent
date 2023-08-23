<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
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
        $events = Event::all();

        return view('events', compact('events'));
    }

    public function show($id)
    {
        $data = Event::where('id', '=', $id)
                ->first(['id', 'title', 'description', 'startdate', 'starttime', 'enddate', 'endtime']);
        return view('edit_event', compact('data'));
    }

    public function create()
    {
        // create event in database
    }

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
    
    public function delete()
    {
        // delete event from database
    }
}
