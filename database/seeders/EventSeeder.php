<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds cmt.
     *
     * @return void
     */
    public function run()
    {
        Event::factory(6)->create();
    }
}
