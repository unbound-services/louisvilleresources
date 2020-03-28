<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Link;

class AdminController extends Controller
{

    //list all the categories
    public function index(){
        $categories = Category::all();

        return view('admin.index')
            ->with(compact('categories'));
    }

    // were going to briefly forego validation since its
    // our staff for now and we need to get this up ASAP
    public function createCategory(Request $request){
        $data = $request->only(['name', 'description']);
        $category = Category::create($data);
        return redirect()->back();
    }

    public function editCategory(Category $category) {

        return view('admin.category')->with(compact('category'));
    }

    public function updateCategory(Request $request, Category $category) {
      $category->update($request->all());
      $category->save();
      return redirect()->back();
    }


    public function createLink(Request $request){
        $data = $request->only($this->getLinkAttributeList());
        $link = Link::create($data);
        return redirect()->back();
    }

    protected function getLinkAttributeList(){
      return ['name',
      'url',
      'phone',
      'phone_string',
      'phone_is_primary',
      'category_id',
      'description'];
    }

    public function editLink(Request $request, Link $link){
      return view('admin.link')->with(compact('link'));
    }

    public function updateLink(Request $request, Link $link){
      $data = $request->only($this->getLinkAttributeList());
      
      if(!isset($data['phone_is_primary'])) {
        $data['phone_is_primary'] = false;
      }

     
      
      $link->update($data);
      $link->save();
      return redirect()->back();
    }
}
