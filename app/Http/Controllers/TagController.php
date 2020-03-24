<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    //list all the categories
    public function index(){
        $tags = Tag::all();

        return view('admin.tag')
            ->with(compact('tags'));
    }

    public function createTag(Request $request){
        $data = $request->only(['name']);
        $tag = Tag::create($data);
        return redirect()->back();
    }
}
