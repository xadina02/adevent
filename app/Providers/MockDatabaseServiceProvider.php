<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class MockDatabaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Define a mock connection
        DB::extend('mock', function ($config) {
            return new \Illuminate\Database\SQLiteConnection($config);
        });

        // Set the default connection to the mock connection
        config(['database.connections.mock' => [
            'driver' => 'mock',
            'database' => ':memory:',
            'prefix' => '',
        ]]);
    }
}
