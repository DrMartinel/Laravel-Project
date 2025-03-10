<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __contruct()
    {

    }

    public function index(){
        return view('register');
    }

    public function register(AuthRequest $request){
        $credentials = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (User::where('email', $credentials['email'])->exists()) {
            return redirect()->route('registerPage')->with('error','Email already exists');
        } else {
            try{
                User::factory()->create([
                    'name' => $credentials['name'],
                   'email' => $credentials['email'],
                   'password' => Hash::make($credentials['password']),
                ]);
            }catch (\Exception $e){
                return redirect()->route('registerPage')->with('error',$e->getMessage());
            }
            return redirect()->route('admin')->with('success','Successfully registered');
        }
    }
}
