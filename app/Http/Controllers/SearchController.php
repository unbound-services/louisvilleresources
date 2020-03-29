<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Business;


class SearchController extends Controller
{

    function search(Request $request) {

        $searchTerm = $request->search;

        $results = Business::query()
           ->where('name', 'LIKE', '%'.$searchTerm.'%')
           ->get();

        // address stuff:
        // $data = $request->only(
        //   'street_address',
        //   'latitude',
        //   'longitude',
        //   'zipcode',
        //   'radius',
        // );
        // dd($data);
        return view('pages.search-results-page')->with(['results'=>$results, 'searchTerm'=>$searchTerm]);

    }

}
