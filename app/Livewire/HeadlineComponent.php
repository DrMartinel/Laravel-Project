<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class HeadlineComponent extends Component
{
    public $headline;

    //    public $isSearchPage;

    public function mount()
    {
        $this->headline = "My Books";
        //        $this->isSearchPage = false;
    }

    #[On('showPosts')]
    public function setHeadline($category)
    {
        switch ($category) {
            case 'newPosts':
                $this->headline = "New Posts";
                break;
            case 'allBooks':
                $this->headline = "All Books";
                break;
            case 'allBlogs':
                $this->headline = "All Blogs";
                break;
            case 'myBooks':
                $this->headline = "My Books";
                break;
            case 'myBlogs':
                $this->headline = "My Blogs";
                break;
            case 'message':
                $this->headline = 'Message';
                break;
        }
        //        $this->isSearchPage = $isSearchPage;
    }

    public function render()
    {
        return view('livewire.headline-component');
    }
}
