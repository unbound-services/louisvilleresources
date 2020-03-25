<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Business;

/// ==========================================================
//      we are not validating yet because its only our staff
//      and were going for speed
// ============================================================
class AdminBusinessController extends Controller
{
    //

    public function index(){
        $businesses = Business::all();
        return view('admin.business.index')->with(compact('businesses'));
    }

    public function createBusiness(Request $request){
        $business = Business::create($request->only('name'));
        return redirect()->to('/admin/business/'.$business->id);
    }

    public function edit(Request $request, Business $business){
        $tags = $business->tags;
        return view('admin.business.edit')->with(compact('business'))->with(compact('tags'));
    }

    public function update(Request $request, Business $business){
        $business->update($request->only('name',
            'description',
            'street_address',
            'latitude',
            'longitude',
            'zipcode',
            'email',
            'phone',
            'current_status',
            'hours',
            'website',
            'notes',
            'active'));
        $business->save();
        return redirect()->back();
    }
}
