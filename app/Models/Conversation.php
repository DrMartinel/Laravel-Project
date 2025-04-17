<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Conversation extends Model
{
    /** @use HasFactory<\Database\Factories\ConversationFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'is_group',
        'name'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_group' => 'boolean',
    ];

    /**
     * Get the chatters for the conversation.
     */
    public function chatters()
    {
        return $this->hasMany(Chatter::class);
    }

    /**
     * Get the messages for the conversation.
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'chat_id');
    }

    /**
     * Get the users in this conversation through chatters.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'chatters');
    }
}
