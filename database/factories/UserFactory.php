<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     * @psalm-var User::class
     */
    protected string $model = User::class;

    /**
     * @return (\Illuminate\Support\Carbon|string)[]
     *
     * @psalm-return array{name: string, email: string, phone: string, role: 'member', email_verified_at: \Illuminate\Support\Carbon, remember_token: string}
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'role' => 'member',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
