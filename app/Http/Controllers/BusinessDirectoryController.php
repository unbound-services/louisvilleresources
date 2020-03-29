<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Business;
use Carbon\Carbon;

class BusinessDirectoryController extends Controller
{
  public function index(){
      $businesses = Business::all()-> sortBy('name');

      return view('pages.pages-directory')
        ->with(compact('businesses'));
  }

  public function view(Business $business){
    $business->last_confirmed = Carbon::parse($business->last_confirmed)->toFormattedDateString();
    return view('pages.pages-business')
      ->with(compact('business'));
  }

}
