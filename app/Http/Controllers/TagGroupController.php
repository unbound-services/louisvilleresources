<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\TagGroup;

class TagGroupController extends Controller
{
    public function index(){
        $tagGroups = TagGroup::all();

        return view('admin.tag.group.admin-tag-group')
            ->with(compact('tagGroups'));
    }

    public function create(Request $request){
        $data = $request->only(['name', 'description', 'slug']);
        $category = TagGroup::create($data);
        return redirect()->back();
    }

    public function edit(TagGroup $tagGroup){
        $tags = $tagGroup->tags;
        return view('admin.tag.group.admin-tag-group-edit')
            ->with(compact('tagGroup','tags'));
    }

    public function update(Request $request, TagGroup $tagGroup){
        $tagGroup->update($request->only('name',
            'slug',
            'description'));
        $tagGroup->save();
        return redirect()->back();
    }


    public function addTagToGroup(Request $request, TagGroup $tagGroup){
        //make array of tags from request
        $tags = explode(',',$request->tags);
        foreach($tags as $tag){
            $trimmedTag = trim($tag);
            $newTag = Tag::firstOrCreate(['name' => $trimmedTag]);
                //check if tag group relationship with tag exists
                if($tagGroup->tags->contains($newTag) === false){
                    $tagGroup->tags()->save($newTag);
                }
        }
        return redirect()->back();
    }

    public function removeTagFromGroup(TagGroup $tagGroup, Tag $tag){
        $tagGroup->tags()->detach($tag);
        $tagGroup->save();
        return redirect()->back();
    }
}
