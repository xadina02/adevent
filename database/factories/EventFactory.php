<?php

namespace Database\Factories;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     * @psalm-var Event::class
     */
    // protected string $model = Event::class;

    /**
     * @return string[]
     *
     * @psalm-return array{title: string, description: string, startdate: string, starttime: string, enddate: string, endtime: string}
     */
    public function definition(): array
    {
        return [
            'title' => Str::random(5).' '.Str::random(4),
            'description' => fake()->text(150),
            'startdate' => Carbon::parse(fake()->dateTimeThisCentury())->format('Y-m-d'),
            'starttime' => Carbon::parse(fake()->time('H:i:s'))->format('H:i:s'),
            'enddate' => Carbon::parse(fake()->dateTimeThisCentury())->format('Y-m-d'), // password
            'endtime' => Carbon::parse(fake()->time('H:i:s'))->format('H:i:s'),
        ];
    }
}
