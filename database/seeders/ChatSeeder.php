<?php

namespace Database\Seeders;

use App\Models\Chatter;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Conversation::factory(20)->create();
        Chatter::factory(20)->create();
        Message::factory(20)->create();
    }
}
