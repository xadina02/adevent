<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Admin::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => 'admin@mailer.com',
            'phone' => fake()->phoneNumber(),
            'role' => 'admin',
            'password' => 'password', // password
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
