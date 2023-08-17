<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventNature;
use App\Models\User;
use Illuminate\Support\Collection;

class ParticipantController extends Controller
{
    public function index()
    {
        $parts_id = EventNature::where('event_id', '=', '1')
                ->orderBy('member_id', 'desc')
                ->get();

        foreach($parts_id as $part_id){
            $participants = User::where('id','=',$part_id['member_id'])
                    ->get();
        }

        return view('participants', compact('participants'));
        // return view('participants');
    }

    public function remove()
    {
        //
    }

    public function add()
    {
        //
    }
}
