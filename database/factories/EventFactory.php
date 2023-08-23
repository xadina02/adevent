<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Event::class;

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
