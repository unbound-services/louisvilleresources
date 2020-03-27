<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Business;

class BusinessDirectoryController extends Controller
{
  public function index(){
      $businesses = Business::all();

      return view('pages.pages-directory')
        ->with(compact('businesses'));
  }

  public function view(Business $business){
    return view('pages.pages-business')
      ->with(compact('business'));
  }
}
