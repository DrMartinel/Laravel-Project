<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use App\Models\Chatter;
use App\Models\Message;
use App\Models\User;
use App\Events\NewMessagesCreated;
use Illuminate\Support\Facades\Log;

class MessageComponent extends Component
{
    public string $newMessage;
    public $currentChatMessages;
    public $conversations;
    public int $currentUserId;
    public int $currentChatId;
    public $users; //Demo data

    public function index()
    {
        return view('messages');
    }

    #[On('showMessage')]
    public function mount()
    {
        $this->currentChatMessages = '';
        $this->currentUserId = Auth::id();
        $this->getCurrentConversations();
        $this->currentChatId = $this->conversations[0]->conversation_id; //Demo data
        $this->getMessages();
        $this->users = User::all();
    }

    public function getCurrentConversations()
    {
        $this->conversations = Chatter::where('chatter_id', $this->currentUserId)
            ->with('conversation')
            ->get();
    }

    public function getMessages()
    {
        $this->currentChatMessages = Message::where('chat_id', $this->currentChatId)
            ->with(['sender', 'conversation'])
            ->orderBy('created_at')
            ->get();
    }

    public function selectConversation(int $id)
    {
        $this->currentChatId = $id;
    }

    #[On('echo-private:chat.{currentChatId},.message.sent')]
    public function handleIncomingMessage($eventData)
    {
        $newMessageData = $eventData['message'];
        // Not add own message if sender used ->toOthers()
        if ($newMessageData['sender']['id'] == Auth::id()) {
            logger()->info('Livewire #[On] listener ignoring own message.');
            return;
        }

        $this->currentChatMessages->push((object) $newMessageData);
        $this->dispatch('newMessages');
    }


    public function sendMessage()
    {
        $newMessage = Message::create([
            'content' => $this->newMessage,
            'sender_id' => $this->currentUserId,
            'chat_id' => $this->currentChatId,
        ]);

        $this->dispatch('newMessages');
        broadcast(new NewMessagesCreated($newMessage->load('sender')))->toOthers();
        $this->newMessage = '';
    }


    public function render()
    {
        $this->getMessages();
        return view('livewire.message-component');
    }
}
