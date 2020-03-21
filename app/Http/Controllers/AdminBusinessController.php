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
        return view('admin.businesses.index')->with(compact('businesses'));
    }

    public function createBusiness(Request $request){
        $business = Business::create($request->only('name'));
        return redirect()->to('/admin/businesses/'.$business->id);
    }

    public function editBusiness(Request $request, Business $business){
        return view('admin.business.edit')->with(compact('business'));
    }
}
