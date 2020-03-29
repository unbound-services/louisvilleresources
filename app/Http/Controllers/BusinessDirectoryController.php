<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Log;
use App\Business;

class BusinessDirectoryController extends Controller
{
  public function index(){
      $businesses = Business::all()-> sortBy('name');
      return view('pages.pages-directory')
        ->with(compact('businesses'));
  }

  public function view(Business $business){
    return view('pages.pages-business')
      ->with(compact('business'));
  }

  public function getByZipcodeRange(Request $request){
  	$businesses = Business::all();
  	// $businessQuery = Business::zipcodeRange($request->zipcode,$request->range);
  	$path = storage_path() . "\app\zipcodes.json"; 
	$zipcodes = json_decode(file_get_contents($path), true); 
	var_dump($zipcodes);
  	return view('pages.pages-directory')->with(compact('businesses'));
  }
}
