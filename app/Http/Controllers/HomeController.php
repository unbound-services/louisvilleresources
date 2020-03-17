<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Link;
class HomeController extends Controller
{
    

    public function index(){
        $categories = Category::all();

        return view('welcome')
            ->with(compact('categories'));
    }

    public function login() {
        return view('login');
    }

    public function doLogin(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->to('/admin/');
        }
    }

}
