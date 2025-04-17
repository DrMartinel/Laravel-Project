<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class HomepageComponent extends Component
{
    public $category = 'myBooks';

    public function mount()
    {
        $this->category = "myBooks";
    }

    #[On('showMessage')]
    public function setTypeOfPage(String $typeOfPage)
    {
        $this->category = $typeOfPage;
    }


    public function render()
    {
        return view('livewire.homepage-component');
    }
}
