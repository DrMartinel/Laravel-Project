<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class NotificationComponent extends Component
{
    public array $errorMessages = [];
    public array $successMessages = [];

    public function mount()
    {
        $this->errorMessages = [];
        $this->successMessages = [];
    }

    #[On('NotificationsFound')]
    public function getSuccessfulNotifications($message, $condition)
    {
        $this->errorMessages = [];
        $this->successMessages = [];
        if ($condition === 'danger') {
            $this->errorMessages[] = $message;
        }
        if ($condition === 'success') {
            $this->successMessages[] = $message;
        }
    }

    public function render()
    {
        return view('livewire.notification-component');
    }
}
