<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel; // Use Private for chats
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessagesCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Message $message;

    /**
     * Create a new event instance.
     */
    public function __construct(Message $message)
    {
        // Eager load sender data to include in the broadcast payload
        $this->message = $message->load('sender');
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn(): array
    {
        // Broadcast on a private channel specific to this chat
        // Only authenticated users who are part of this chat can listen
        return [
            new PrivateChannel('chat.' . $this->message->chat_id),
        ];
    }

    /**
     * The event's broadcast name. Recommended for clarity.
     */
    public function broadcastAs(): string
    {
        return 'message.sent'; // Client will listen for this event name
    }

    /**
     * Get the data to broadcast. Control the payload.
     */
    public function broadcastWith(): array
    {
        return [
            // Wrap the message data in a key for better structure
            'message' => [
                'id' => $this->message->id,
                'chat_id' => $this->message->chat_id,
                'content' => $this->message->content,
                'created_at' => $this->message->created_at->toIso8601String(), // Consistent format
                'sender' => [ // Include sender info
                    'id' => $this->message->sender->id,
                    'name' => $this->message->sender->name,
                    // Add other sender details like avatar if needed
                ],
            ]
        ];
    }
}
