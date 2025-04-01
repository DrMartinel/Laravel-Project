<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Blog;
use App\Http\Requests\BasicRequest;
use Algolia\AlgoliaSearch\Api\SearchClient;

class MainPageController extends Controller
{
    public function __construct() {}

    public function homePage(BasicRequest $request)
    {
        $userId = auth()->user()->id;
        $userBooks = Book::with(['uploader', 'author'])
            ->where('uploader_id', $userId)
            ->paginate(3, ['*'], 'books');
        return view('homePage', compact('userBooks', 'userId'));
    }

    public function searchPosts(BasicRequest $request)
    {
        $userId = auth()->user()->id;
        $data = $request->input("keyword");
        $category = $request->input("category");

        $userBooks = Book::query() // Start with a base query
            ->with(['uploader', 'author'])  // Eager load relationships
            ->when($data, function ($query, $data) {
                return $query->where('title', 'like', '%' . $data . '%')
                    ->orWhere('content', 'like', '%' . $data . '%');
            })
            ->orderBy('title')
            ->paginate(3, ['*'], 'books');

        $userBlogs = Blog::query()
            ->with('uploader')  // Eager load relationships
            ->when($data, function ($query, $data) {
                return $query->where('title', 'like', '%' . $data . '%')
                    ->orWhere('content', 'like', '%' . $data . '%');
            })
            ->orderBy('title')
            ->paginate(3, ['*'], 'blogs');

        $foundResult = ($category == "book") ? $userBooks : $userBlogs;

        return view('foundPosts', compact('foundResult', 'data', 'userId'));
    }

    public function editBooks(Book $book)
    {
        // Laravel will automatically fetch the book by its ID
        $authors = Author::all();
        return view('editBooks', compact('book', 'authors'));
    }

    public function editBlogs(Blog $blog)
    {
        $authors = Author::all();
        return view('editBlogs', compact('blog', 'authors'));
    }

    public function viewPosts(String $category, int $id)
    {
        $userId = auth()->user()->id;
        if ($category == 'Book') {
            $items = Book::find($id);
        } else {
            $items = Blog::find($id);
        }
        return (view('watchPosts', compact('items', 'id', 'userId', 'category')));
    }
}
