<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Business;

class TagController extends Controller
{
    //list all the tags
    public function index(){
        $tags = Tag::all();

        return view('admin.tag.admin-tag')
            ->with(compact('tags'));
    }

    public function create(Request $request){
        $tag = Tag::create($request->only('name', 'slug', 'description'));
        return redirect()->to('/admin/tags/'.$tag->id);
    }

    public function edit(Tag $tag){
        return view('admin.tag.admin-tag-edit')->with(compact('tag'));
    }

    public function update(Request $request, Tag $tag){
        $tag->update($request->only('name'));
        $tag->save();
        return redirect()->back();
    }


    //add a string of tags separated by commas to a business
    public function addTagsToBusiness(Request $request, Business $business){
        //make array of tags from request
        $tags = explode(',',$request->tags);
        foreach($tags as $tag){
            $trimmedTag = trim($tag);
        	//for each tag in request, see if tag already exists or create a new one
        	$newTag = Tag::firstOrCreate(['name' => $trimmedTag]);
				//check if business relationship with tag exists
				if($business->tags->contains($newTag) === false){
					$business->tags()->save($newTag);
				}
        }
        return redirect()->back();
    }

}
