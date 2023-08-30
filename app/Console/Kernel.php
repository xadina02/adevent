<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            // Get participants and event details
            $participants = EventNature::pluck('member_id')->toArray();
            $event = Event::find($event_id); // Replace $event_id with the actual event ID
    
            // Schedule pre-emails
            $startTime = Carbon::parse($event->startdate . ' ' . $event->starttime)->subMinutes(30);
            foreach ($participants as $participant) {
                $this->schedulePreEmail($participant, $event->title, $startTime);
            }
    
            // Schedule emails at the start time
            $startTime = Carbon::parse($event->startdate . ' ' . $event->starttime);
            foreach ($participants as $participant) {
                $this->scheduleEmail($participant, $event->title, $startTime);
            }
        })->dailyAt('00:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
