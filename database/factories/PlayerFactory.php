<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->name(),
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'balance' => $this->faker->randomFloat(4, 0, 1000000),
            'rank_id' => $this->faker->randomElement(\App\Models\Rank::pluck('id')->toArray()),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'lang' => 'en',
            'password' => bcrypt($this->faker->name()),
            'is_blocked' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
            ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
