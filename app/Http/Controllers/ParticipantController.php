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
        $participants = [];
        // $partspantemail = [];
        $parts_id = EventNature::where('event_id', '=', '1')
                ->orderBy('member_id', 'asc')
                ->get();

        foreach($parts_id as $part_id){
            $participant = User::where('id','=',$part_id['member_id'])
                    ->first(['id', 'name', 'email', 'avatar']);

            array_push($participants, $participant);
            // array_push($partspantemail, $participants['email']);
        }

        $members = User::where('role', '=', 'member')
                ->orderBy('id', 'desc')
                ->get();

        return view('participants', compact('participants', 'members'));
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
