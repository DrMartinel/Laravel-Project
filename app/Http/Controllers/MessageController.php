<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasicRequest;
use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\ChatParticipant;
use App\Models\Chatter;
use Database\Factories\ChatterFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function createConversation(BasicRequest $request)
    {
        Log::info($request->input("participants"));
        $newParticipants = $request->input("participants");

        $newConversation = Conversation::factory()->create([
            'name' => $request->input('GroupName'),
            'is_group' => true,
        ]);

        // Create chat participants
        $isFirstParticipant = true;
        foreach ($newParticipants as $newParticipantId) {
            Chatter::create([
                'chatter_id' => ($isFirstParticipant) ? Auth::id() : $newParticipantId,
                'conversation_id' => $newConversation->id
            ]);
            $isFirstParticipant = false;
        }

        return redirect()->back()->with('success', 'Conversation created successfully!');
    }
}
