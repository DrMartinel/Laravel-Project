<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Chatter;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{chatId}', function ($user, $conversation_id) {
    return Chatter::where('conversation_id', $conversation_id)
        ->where('chatter_id', $user->id)
        ->exists();
});
