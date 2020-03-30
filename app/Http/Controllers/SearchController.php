<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Business;


class SearchController extends Controller
{



    function search(Request $request) {

        $searchTerm = $request->search;

        $businessQuery = Business::query()
           ->where('name', 'LIKE', '%'.$searchTerm.'%');

       	if($request->filled('latitude','longitude', 'radius')){
       		$businessQuery->distance($request->latitude, $request->longitude, $request->radius);
       	}

       	$businesses = $businessQuery->get();
        // address stuff:
        // $data = $request->only(
        //   'street_address',
        //   'latitude',
        //   'longitude',
        //   'zipcode',
        //   'radius',
        // );
        // dd($data);
        return view('pages.pages-directory')->with(['businesses'=>$businesses, 'searchTerm'=>$searchTerm]);

    }

}
