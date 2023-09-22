<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds cmt.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
    }
}
