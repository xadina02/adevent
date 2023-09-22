<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     * @psalm-var Admin::class
     */
    protected string $model = Admin::class;

    /**
     * @return (\Illuminate\Support\Carbon|string)[]
     *
     * @psalm-return array{name: string, email: 'admin@mailer.com', phone: string, role: 'admin', password: 'password', email_verified_at: \Illuminate\Support\Carbon, remember_token: string}
     */
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
