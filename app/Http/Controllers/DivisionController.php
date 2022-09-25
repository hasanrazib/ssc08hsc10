<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\Division;

class DivisionController extends Controller
{


    // view all category
    public function viewAllDivision(){

        $divisions = Division::latest()->get();

        return view('backend.modules.division.view_all_divisions',compact('divisions'));

    }//end method

    //insert method
    public function insertDivision(Request $request){

            Division::insert([
                'division_name' => $request->division_name,
                'created_at' => Carbon::now(),

            ]);

        return redirect()->route('view.divisions');

    }//end method


    // edit ajax modal

    public function editDivision(Request $request){

        $division = Division::where('id',$request->id)->get();
        return response()->json($division);

    }//end method


    // update method
    public function updateDivision(Request $request){

        $division_id = $request->id;

        Division::findOrFail($division_id)->update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now(),

        ]);

        return redirect()->route('view.divisions');

    }// end method

    // delete method for single item
      public function deleteDivision($id){

        Division::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method
}
