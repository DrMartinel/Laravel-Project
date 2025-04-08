<?php

namespace App\Livewire;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\Auth;

class ShowPostsComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public string $category;
    public string $typeOfPages;

    public function mount()
    {
        $this->category = 'myBooks';
        $this->typeOfPages = 'listingPage';
    }


    #[On('showPosts')]
    public function setCategory($category, $typeOfPage)
    {
        // if ($typeOfPage == 'addItemPage') {
        $this->dispatch('reinitializeTinyMCE');
        // }
        $this->category = $category;
        $this->typeOfPages = $typeOfPage;
    }

    public function render()
    {
        if ($this->typeOfPages === 'listingPage') {
            $userId = Auth::user()->id;
            switch ($this->category) {
                case 'allBooks':
                    $userItems = Book::with(['uploader', 'author'])
                        ->paginate(3, ['*'], 'allBooks');
                    break;
                case 'allBlogs':
                    $userItems = Blog::with(['uploader'])
                        ->paginate(3, ['*'], 'allBlogs');
                    break;
                case 'myBooks':
                    $userItems = Book::with(['uploader', 'author'])
                        ->where('uploader_id', $userId)
                        ->paginate(3, ['*'], 'myBooks');
                    break;
                case 'myBlogs':
                    $userItems = Blog::with(['uploader'])
                        ->where('uploader_id', $userId)
                        ->paginate(3, ['*'], 'myBlogs');
                    break;
            }
            return view('livewire.show-posts-component', [
                'userItems' => $userItems,
                'userId' => $userId,
                'category' => $this->category
            ]);
        }
        if ($this->typeOfPages === 'addItemPage') {
            $authors = Author::all();
            return view('livewire.add-posts-component', [
                'authors' => $authors,
            ]);
        }
        if ($this->typeOfPages === 'messagePage') {
            return view('livewire.message-viewing-component');
        }
    }
}
