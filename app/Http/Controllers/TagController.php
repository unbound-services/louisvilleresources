<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Business;

class TagController extends Controller
{
    //list all the categories
    public function index(){
        $tags = Tag::all();

        return view('admin.tag')
            ->with(compact('tags'));
    }



    public function addTagsToBusiness(Request $request, Business $business){
        $tags = explode(',',$request->tags);
        foreach($tags as $tag){
        	$newTag = Tag::firstOrCreate(['name' => $tag]);
				if($business->tags->contains($newTag) === false){
					$business->tags()->save($newTag);
				}
        }
        return redirect()->back();
    }

}
