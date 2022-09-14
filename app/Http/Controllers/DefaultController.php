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

// get products by ajax filtering
public function getDistrict(Request $request){

    $division_id = $request->division_id;

    $districts = District::where('division_id', $division_id)->get();

    return response()->json($districts);
} // end mehtod


}
