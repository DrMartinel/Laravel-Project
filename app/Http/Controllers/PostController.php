<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasicRequest;
use App\Http\Requests\PostRequest;
use App\Models\Blog;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function __construct()
    {
    }

    public function addPosts(PostRequest $request){
        if(!$request->authorize()) {
            return redirect('admin')->with('error','You are not authorized to access this page');
        }else{
//            return redirect('homepage')->with('sucesss','Successfully added a new post');
            $data = [
              'title' => $request->input('title'),
              'content' => $request->input('content'),
              'author_id' => $request->input('author'),
              'category' => $request->input('category')
            ];
            try{
                if($data['category'] == 'book'){
                    Book::factory()->create([
                        'title' => $data['title'],
                        'content' => $data['content'],
                        'author_id' => $data['author_id'],
                        'uploader_id' => auth()->user()->id,
                    ]);
                }else {
                    Blog::factory()->create([
                        'title' => $data['title'],
                        'content' => $data['content'],
                        'uploader_id' => auth()->user()->id,
                    ]);
                }

            }catch(\Exception $e){
//                return redirect()->back()->with('error',$e->getMessage());
                return redirect()->back()->with('error',$data['title'].'|'.$data['content'].'|'.$data['author'].'<br>'.$e->getMessage());
            }

            return redirect(route('mainpage'))->with('success',$data['title'].'|'.$data['content'].'|'.$data['author_id'].'|'.$data['category']);
        }
    }

    public function editBooks(PostRequest $request){
        if(!$request->authorize()) {
            return redirect('admin')->with('error','You are not authorized to access this page');
        }else{
            $data = [
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'author_id' => $request->input('author'),
            ];
            try{
                $book = Book::find($request->input('id'));
                $book->title = $data['title'];
                $book->content = $data['content'];
                $book->author_id = $data['author_id'];
                $book->save();
            }catch (\Exception $e){
                return redirect()->back()->with('error',$e->getMessage());
            }
            return redirect(route('mainpage'))->with('success','Book updated successfully');
        }
    }

    public function editBlogs(PostRequest $request){
        if(!$request->authorize()) {
            return redirect('admin')->with('error','You are not authorized to access this page');
        }else{
            $data = [
                'title' => $request->input('title'),
                'content' => $request->input('content'),
            ];
            try{
                $blog = Blog::find($request->input('id'));
                $blog->title = $data['title'];
                $blog->content = $data['content'];
                $blog->save();
            }catch (\Exception $e){
                return redirect()->back()->with('error',$e->getMessage());
            }
            return redirect(route('mainpage'))->with('success','Blog updated successfully');
        }
    }

    public function deleteBooks(Book $book){
            $data = $book->id;
            Book::where('id', $data)->delete();
            return redirect(route('mainpage'))->with('success','Book deleted successfully');
    }

    public function deleteBlogs(Blog $blog){
        $data = $blog->id;
        Blog::where('id', $data)->delete();
        return redirect(route('mainpage'))->with('success','Blog deleted successfully');
    }

//    public function changeCategory(BasicRequest $request){
//        if(!$request->authorize()) {
//            return redirect('admin')->with('error','You are not authorized to access this page');
//        }else{
//            $category = $request->input('category_id');
//            return view('mainpage',compact('category'));
//        }
//    }
}
