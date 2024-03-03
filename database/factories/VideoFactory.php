<?php

namespace Database\Factories;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $createdAt = $this->createdAt();
        return [
            'title' => ucfirst(fake()->words(mt_rand(1, 2), true)),
            'channel_id' => Channel::factory(),
            'description' => $this->faker->sentence(10, true),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,

        ];

    }

    public function createdAt()
    {
        $period = $this->faker->randomElement(['year', 'month', 'week', 'day', 'hour']);

        return $this->faker->dateTimeBetween("-1 {$period}");

        
    }
}
