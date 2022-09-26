<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Division;
use App\Models\District;
use App\Models\SubDistrict;

class SubDistrictController extends Controller
{
    // view all sub district
    public function viewAllSubDistrict(){

    $divisions = Division::all();
    $districts = District::all();
    $subdistricts = SubDistrict::latest()->get();

    return view('backend.modules.subdistrict.view_all_subdistricts',compact('subdistricts','divisions','districts'));

    }//end method


    //insert method
    public function insertSubDistrict(Request $request){

        SubDistrict::insert([
            'sub_district_name' => $request->sub_district_name,
            'district_id' => $request->district_id,
            'division_id' => $request->division_id,

        ]);
        $notification = array(
            'message' => 'Category Add Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.subdistricts')->with($notification);


    }//end method



    // edit ajax modal

    public function editSubDistrict($id){

        $subdistrict = SubDistrict::where('id', $id)->get();

        return response()->json($subdistrict);

    }//end method


    // update method
    public function updateSubDistrict(Request $request){

        $sub_id = $request->id;

        SubDistrict::findOrFail($sub_id)->update([
            'sub_district_name' => $request->sub_district_name,
            'updated_at' => Carbon::now(),

        ]);

        return redirect()->route('view.subdistricts');

    }// end method


    // delete method
    public function deleteSubDistrict($id){

        SubDistrict::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub District Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method




}
