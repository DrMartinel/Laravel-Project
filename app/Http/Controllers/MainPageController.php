<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Blog;
use App\Http\Requests\BasicRequest;
use Algolia\AlgoliaSearch\Api\SearchClient;

class MainPageController extends Controller
{
    public function __construct()
    {
    }

    public function index(BasicRequest $request){
        if(!$request->authorize()) {
            return redirect('admin')->with('error','You are not authorized to access this page');
        }else{
            $userId = auth()->user()->id;
            $userBooks = Book::with(['uploader','author'])
                ->where('uploader_id', $userId)
                ->paginate(3, ['*'], 'books');
//                ->get();
            $userBlogs = Blog::with('uploader')
                ->where('uploader_id', $userId)
                ->paginate(3, ['*'], 'blogs');
//                ->get();
            return view('mainpage',compact('userBooks','userBlogs','userId'));
        }
    }

    public function searchPosts(BasicRequest $request){
        $data = $request->input("search");
        $userId = auth()->user()->id;

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

        return view('foundPosts',compact('userBooks','userBlogs','data','userId'));
    }

    public function allPosts(){
        $userId = auth()->user()->id;
        $userBooks = Book::with(['uploader','author'])->paginate(3, ['*'], 'books');
        $userBlogs = Blog::with('uploader')->paginate(3, ['*'], 'blogs');
        return view('allPosts',compact('userBooks','userBlogs','userId'));
    }

    public function newPosts(BasicRequest $request){
        if(!$request->authorize()) {
            return redirect('admin')->with('error','You are not authorized to access this page');
        }else{
            $authors = Author::all();
            return view('addBlogsOrBooks', compact('authors'));
        }
    }

    public function editBooks(Book $book)
    {
        // Laravel will automatically fetch the book by its ID
        $authors = Author::all();
        return view('editBooks', compact('book','authors'));
    }

    public function editBlogs(Blog $blog){
        $authors = Author::all();
        return view('editBlogs', compact('blog','authors'));
    }

}
