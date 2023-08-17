<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Collection;

class EventController extends Controller
{
    public function form()
    {
        return view('add_event');
    }

    public function display()
    {
        $events = Event::all();

        return view('events', compact('events'));
    }

    public function show()
    {
        $data = ['title'=>'DEMO TIME', 'description'=>'We are going to demonstrate our progress in each task we perfom! Let us grow'];
        return view('edit_event', compact('data'));
    }

    public function create()
    {
        // create event in database
    }

    public function update()
    {
        // update event records in database
    }
    
    public function delete()
    {
        // delete event from database
    }
}
