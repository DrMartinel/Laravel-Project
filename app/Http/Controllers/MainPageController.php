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

    public function myBooks(BasicRequest $request){
        if(!$request->authorize()) {
            return redirect('admin')->with('error','You are not authorized to access this page');
        }else{
            $userId = auth()->user()->id;
            $userBooks = Book::with(['uploader','author'])
                ->where('uploader_id', $userId)
                ->paginate(3, ['*'], 'books');
            return view('myPosts',compact('userBooks','userId'));
        }
    }

    public function myBlogs(BasicRequest $request){
        if(!$request->authorize()) {
            return redirect('admin')->with('error','You are not authorized to access this page');
        }else{
            $userId = auth()->user()->id;
            $userBlogs = Blog::with('uploader')
                ->where('uploader_id', $userId)
                ->paginate(3, ['*'], 'blogs');
            return view('myPosts',compact('userBlogs','userId'));
        }
    }

    public function searchPosts(BasicRequest $request){
        $data = $request->input("keyword");
        $category = $request->input("category");
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

        $foundResult = ($category == "book") ? $userBooks : $userBlogs;

        return view('foundPosts',compact('foundResult','data','userId'));
    }

    public function allBooks(){
        $userId = auth()->user()->id;
        $userBooks = Book::with(['uploader','author'])->paginate(3, ['*'], 'books');
        return view('allPosts',compact('userBooks','userId'));
    }

    public function allBlogs(){
        $userId = auth()->user()->id;
        $userBlogs = Blog::with('uploader')->paginate(3, ['*'], 'blogs');
        return view('allPosts',compact('userBlogs','userId'));
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

    public function viewPosts(String $category, int $id){
        $userId = auth()->user()->id;
        if($category == 'book'){
            $items = Book::find($id);
        }else {
            $items = Blog::find($id);
        }
        return(view('watchPosts',compact('items', 'id','userId','category')));
    }
}
