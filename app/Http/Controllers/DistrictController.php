<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\Division;
use App\Models\District;

class DistrictController extends Controller
{

    // view all category
    public function viewAllDistrict(){
        $divisions = Division::all();
        $districts = District::latest()->get();
        return view('backend.modules.district.view_all_districts',compact('districts','divisions'));

    }//end method

    // add category
    public function addDivision(){

        return view('backend.division.add_division');

    }// end method




    //insert method
    public function insertDistrict(Request $request){

        District::insert([
            'district_name' => $request->district_name,
            'division_id' => $request->division_id,

        ]);

        return redirect()->route('view.districts');

    }//end method


    // edit ajax modal

    public function editDistrict(Request $request){

        $division = District::where('id',$request->id)->get();

        return response()->json($division);

    }//end method





    // delete method
      public function deleteDistrict($id){

        District::findOrFail($id)->delete();

         $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method





}
