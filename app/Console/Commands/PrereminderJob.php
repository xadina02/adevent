<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use App\Models\EventNature;

class PrereminderJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adevent:preremind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Event close notice';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //pull every event from the database
        $currentDate = Carbon::now()->format('Y-m-d');
        $currentDateTime = Carbon::now();
        $targetTime = $currentDateTime->addMinutes(30)->format('H:i:s');

        $events = Event::where('startdate', $currentDate)
            ->where('starttime', $targetTime)
            ->get(['id', 'title', 'startdate', 'starttime']);

        foreach($events as $event){

            $participants = EventNature::where('member_id' , '=', $event['id'])
            ->get(['member_id']);

            // $startTime = Carbon::parse($event['startdate'].' '.$event['starttime']);
            // $currentDateTime = Carbon::now();
            $startTime = Carbon::parse($event['startdate'].' '.$event['starttime'])->subHour();
            // $emailTime = $startTime->subMinutes(30);

            // Schedule email 30 minutes before the start time
            // $this->schedulePreEmail($participant, $event['title'], $emailTime);

            foreach($participants as $participant){
                $user = User::where('id', '=', $participant)
                ->first(['name', 'email']);

                $user = User::where('id', '=', $participant)->first(['name', 'email']);
                $data = [
                    'subject' => '🚨Reminder',
                    'body' => $user['name'].', get ready, it is almost time for "'.$title.'" event to begin! That is in 30 minutes from now'
                ];
                
                Mail::to($user['email'])->send(new PreReminderMail($data));
            }
        }
    }
}
