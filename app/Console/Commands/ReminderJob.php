<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\EventNature;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ReminderJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adevent:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Event start notice';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //pull every event from the database
        $currentDate = Carbon::now()->format('Y-m-d');
        // $currentDateTime = Carbon::now();
        $targetTime = Carbon::now()->format('H:i:s');

        $events = Event::where('startdate', $currentDate)
            ->where('starttime', $targetTime)
            ->get(['id', 'title', 'startdate', 'starttime']);

        foreach ($events as $event) {
            $participants = EventNature::where('member_id', '=', $event['id'])
                ->get(['member_id']);

            // $startTime = Carbon::parse($event['startdate'].' '.$event['starttime']);
            // $currentDateTime = Carbon::now();
            Carbon::parse($event['startdate'].' '.$event['starttime'])->subHour();
            // $emailTime = $startTime->subMinutes(30);

            // Schedule email 30 minutes before the start time
            // $this->schedulePreEmail($participant, $event['title'], $emailTime);

            foreach ($participants as $participant) {
                $user = User::where('id', '=', $participant)->first(['name', 'email']);
                $data = [
                    'subject' => '⚠️Meeting Time⚠️',
                    'body' => $user['name'].', it is time, hope you are set for "'.$title.'" event?!',
                ];

                Mail::to($user['email'])->send(new ReminderMail($data));
            }
        }
    }
}
