<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Chatter extends Model
{
    /** @use HasFactory<\Database\Factories\ChatterFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'chatter_id',
        'conversation_id'
    ];

    /**
     * Get the user that belongs to the chat.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the conversation that belongs to the chat.
     */
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
