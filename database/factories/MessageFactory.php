<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_id' => User::inRandomOrder()->first()->id,
            'chat_id' => Conversation::inRandomOrder()->first()->id,
            'content' => fake()->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
