<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Division;
use App\Models\District;
use App\Models\SubDistrict;

class DefaultController extends Controller
{
    //

// get district by ajax filtering
public function getDistrict(Request $request){

    $division_id = $request->division_id;

    $districts = District::where('division_id', $division_id)->get();

    return response()->json($districts);
} // end mehtod

// get subdistrict by ajax filtering
public function getSubDistrict(Request $request){

   $district_id = $request->district_id;

    $subdistricts = SubDistrict::where('district_id', $district_id)->get();

    return response()->json($subdistricts);
} // end mehtod

// get district by ajax filtering
public function getDistrictAnother(){

    $id = Auth::user()->id;
    $rr = District::where('present_district_id ', $id)->get();

    return response()->json($rr);
} // end mehtod


}
